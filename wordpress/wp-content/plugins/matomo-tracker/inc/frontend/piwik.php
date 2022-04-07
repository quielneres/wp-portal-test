<?php
	/**
	 * Piwik - free/libre analytics platform
	 * Piwik Proxy Hide URL
	 *
	 * @link http://piwik.org/faq/how-to/#faq_132
	 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
	 */
	
	
	// -----
	// Important: read the instructions in README.md or at:
	// https://github.com/piwik/tracker-proxy#piwik-tracker-proxy
	// -----
	define( 'WP_USE_THEMES', false );
	$root = $_SERVER['DOCUMENT_ROOT'];
	$file = $_SERVER['REQUEST_URI'];
	if (strpos($file, '/wp-content') !== 0) {//CHECK FOR SUBFOLDER INSTALL
		$dirs = explode("/", $file);
		foreach ($dirs as $dir) {
			if($dir === 'wp-content') break;
			$root = rtrim($root, '/');
			$root .= '/'.$dir;
		}
	}
	require_once($root.'/wp-load.php'); 
	include_once($root.'/wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'matomo-tracker/matomo-tracker.php' ) && !empty(get_option( 'matomo-tracker-url' )) && !empty(get_option( 'matomo-tracker-tracking-id' )) && !empty(get_option( 'matomo-tracker-token' )) ) {
		// Edit the line below, and replace http://your-piwik-domain.example.org/piwik/
		// with your Piwik URL ending with a slash.
		// This URL will never be revealed to visitors or search engines.
		if (! isset($PIWIK_URL)) {
			$PIWIK_URL = trailingslashit( get_option( 'matomo-tracker-url' ) );
		}

		// Edit the line below, and replace xyz by the token_auth for the user "UserTrackingAPI"
		// which you created when you followed instructions above.
		if (! isset($TOKEN_AUTH)) {
			$TOKEN_AUTH = get_option( 'matomo-tracker-token' );
		}

		// Maximum time, in seconds, to wait for the Piwik server to return the 1*1 GIF
		if (! isset($timeout)) {
			$timeout = 5;
		}

		// The HTTP User-Agent to set in the request sent to Piwik Tracking API
		if (empty($user_agent)) {
			$user_agent = arrayValue($_SERVER, 'HTTP_USER_AGENT', '');
		}
		
		$cacheDuration = 60 * 60 * 24 * 7;

				
		// 1) PIWIK.JS PROXY: No _GET parameter, we serve the JS file
		if (empty($_GET)) {
			$modifiedSince = false;
			if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
				$modifiedSince = $_SERVER['HTTP_IF_MODIFIED_SINCE'];
				// strip any trailing data appended to header
				if (false !== ($semicolon = strpos($modifiedSince, ';'))) {
					$modifiedSince = substr($modifiedSince, 0, $semicolon);
				}
				$modifiedSince = strtotime($modifiedSince);
			}
			// Re-download the piwik.js once a day maximum
			$lastModified = time() - 86400;
		
			// set HTTP response headers
			sendHeader('Vary: Accept-Encoding');
		
			// Returns 304 if not modified since
			if (!empty($modifiedSince) && $modifiedSince > $lastModified) {
				sendHeader(sprintf("%s 304 Not Modified", $_SERVER['SERVER_PROTOCOL']));
			} else {
				$ts = gmdate("D, d M Y H:i:s", time() + $cacheDuration) . " GMT";
				sendHeader("Expires: $ts");
				sendHeader("Pragma: cache");
				sendHeader("Cache-Control: max-age=$cacheDuration");
						
				sendHeader('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
				sendHeader('Content-Type: application/javascript; charset=UTF-8');
				
				// Silent fail: hide Warning in 'piwik.js' response
				list($content, $httpStatus) = getHttpContentAndStatus($PIWIK_URL . 'piwik.js', $timeout, $user_agent);
				if ($piwikJs = $content) {
					echo $piwikJs;
				} else {
					echo '/* there was an error loading piwik.js at '. $PIWIK_URL . 'piwik.js */';
				}
			}
			exit;
		}
		
		@ini_set('magic_quotes_runtime', 0);
		
		// 2) PIWIK.PHP PROXY: GET parameters found, this is a tracking request, we redirect it to Piwik
		$url = sprintf("%spiwik.php?cip=%s&token_auth=%s&", $PIWIK_URL, getVisitIp(), $TOKEN_AUTH);
		
		foreach ($_GET as $key => $value) {
			$url .= urlencode($key ). '=' . urlencode($value) . '&';
		}
		
		if(!isset($_GET['send_image']) || $_GET['send_image'] == 1) {
			sendHeader("Content-Type: image/gif");
		}
		
		if (version_compare(PHP_VERSION, '5.3.0', '<')) {
		
			// PHP 5.2 breaks with the new 204 status code so we force returning the image every time
			list($content, $httpStatus) = getHttpContentAndStatus($url . '&send_image=1', $timeout, $user_agent);
			echo $content;
		
		} else {
		
			// PHP 5.3 and above
			list($content, $httpStatus) = getHttpContentAndStatus($url, $timeout, $user_agent);
		
			// Forward the HTTP response code
			if (!headers_sent() && !empty($httpStatus)) {
				header($httpStatus);
			}
		
			echo $content;
		
		}
	}
function getVisitIp()
{
    $matchIp = '/^([0-9]{1,3}\.){3}[0-9]{1,3}$/';
    $ipKeys = array(
        'HTTP_X_FORWARDED_FOR',
        'HTTP_CLIENT_IP',
        'HTTP_CF_CONNECTING_IP',
    );
    foreach($ipKeys as $ipKey) {
        if (isset($_SERVER[$ipKey])
            && preg_match($matchIp, $_SERVER[$ipKey])) {
            return $_SERVER[$ipKey];
        }
    }
    return arrayValue($_SERVER, 'REMOTE_ADDR');
}

function getHttpContentAndStatus($url, $timeout, $user_agent)
{
    $useFopen = @ini_get('allow_url_fopen') == '1';

    $stream_options = array('http' => array(
        'user_agent' => $user_agent,
        'header'     => sprintf("Accept-Language: %s\r\n", str_replace(array("\n", "\t", "\r"), "", arrayValue($_SERVER, 'HTTP_ACCEPT_LANGUAGE', ''))),
        'timeout'    => $timeout
    ));
/*
	$args = $stream_options['http'];
		
	$response = wp_remote_get( $url, $args );

	if ( is_array( $response ) ) {
		  //$header = $response['headers']; // array of http header lines
		$header = 'HTTP/1.1 ' . $response['response']['code'] .' '. $response['response']['message']; // array of http header lines
		$content = $response['body']; // use the content
		
		//var_dump($response);
		
		$httpStatus = $header;
	

	} else*/ if($useFopen) {
        $ctx = stream_context_create($stream_options);
        $content = @file_get_contents($url, 0, $ctx);

        $httpStatus = '';
        if (isset($http_response_header[0])) {
            $httpStatus = $http_response_header[0];
        }

    } else {
        if(!function_exists('curl_init')) {
            throw new Exception("You must either set allow_url_fopen=1 in your PHP configuration, or enable the PHP Curl extension.");
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $stream_options['http']['user_agent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $stream_options['http']['header']);
        curl_setopt($ch, CURLOPT_TIMEOUT, $stream_options['http']['timeout']);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $stream_options['http']['timeout']);
        curl_setopt($ch, CURLOPT_URL, $url);
        $content = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if(!empty($httpStatus)) {
            $httpStatus = 'HTTP/1.1 ' . $httpStatus;
        }
        curl_close($ch);
    }

    return array(
        $content,
        $httpStatus
    );

}

function sendHeader($header, $replace = true)
{
    headers_sent() || header($header, $replace);
}

function arrayValue($array, $key, $value = null)
{
    if (!empty($array[$key])) {
        $value = $array[$key];
    }
    return $value;
}
?>
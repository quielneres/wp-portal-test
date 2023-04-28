<?php
require_once get_template_directory() . '/inc/services/SessionIntranetService.php';

class UsuarioIntranetService
{
    public function getAtributos($BB_SSOToke ,$BB_SSOACR, $SSO_URL, $prefixBBSSOToken)
    {
        $prefixo       = explode('.', $BB_SSOACR)[1];

        $arr_cookies = [
            'ssoacr'          => $SSO_URL,
            $prefixBBSSOToken => $BB_SSOToke
        ];

        $cookies = [];
        foreach ($arr_cookies as $key => $value) {
            $cookie = new WP_Http_Cookie( $key );
            $cookie->name = $key;
            $cookie->value =  $value;
            $cookie->path = '/';
            $cookie->domain = ".{$prefixo}.bb.com.br";
            $cookies[] = $cookie;
        }

        $args = array(
            'cookies' => $cookies,
            'sslverify' => false,
        );

        $users = wp_remote_post($SSO_URL, $args);

        $arr_data = [];

        if (isset($users->errors)) {
            return [
                'code' => 500
            ];
        }

        if ($users['response']['code'] === 200) {
            $arr_data = json_decode($users['body']);
        }

        return [
            'code' => $users['response']['code'],
            'data' => $arr_data
        ];
    }
}

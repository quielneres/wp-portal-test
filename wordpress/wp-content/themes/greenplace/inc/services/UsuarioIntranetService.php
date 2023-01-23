<?php

class UsuarioIntranetService
{
    public function getAtributos()
    {
        $arr_cookies = [
            'ssoacr'     => BB_SSOACR,
            'BBSSOTokenDS' => BB_SSOToke
        ];

        $cookies = [];
        foreach ($arr_cookies as $key => $value) {
            $cookie = new WP_Http_Cookie( $key );
            $cookie->name = $key;
            $cookie->value =  $value;
            $cookie->path = '/';
            $cookie->domain = '.desenv.bb.com.br';
            $cookies[] = $cookie;
        }

        $args = array(
            'cookies' => $cookies,
            'sslverify' => false,
        );

        $users = wp_remote_post(SSO_URL, $args);

        $arr_data = [];

        if ($users['response']['code'] === 200) {
            $arr_data = json_decode($users['body']);
        }

        return [
            'code' => $users['response']['code'],
            'data' => $arr_data
        ];
    }
}

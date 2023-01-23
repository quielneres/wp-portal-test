<?php

//namespace auth;

class BB_Auth
{
    protected string $url_login_intranet;
    protected string $ssoacr;
    protected string $BBSSOToken;

    public function __construct()
    {
        $this->url_login_intranet
            = 'https://login.intranet.bb.com.br/sso/XUI/#login/&goto=https://' . $_SERVER['HTTP_HOST'];
    }

    public function checkLogin(): void
    {
        if (empty($_COOKIE['BBSSOToken']) && empty($_COOKIE['ssoacr'])) {
            header('Location: ' . $this->url_login_intranet);
            exit;
        }

        ## https://login.desenv.bb.com.br/sso/XUI/#login/&goto=https://portal.stt.desenv.bb.com.br/ :443/sso/identity/json/attributes
    }
}
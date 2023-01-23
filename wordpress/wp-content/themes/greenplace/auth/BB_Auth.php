<?php

//namespace auth;

class BB_Auth
{
    protected $urlLoginIntranet;
    protected $ssoacr;
    protected $BBSSOToken;
    protected $prefixAmbiente;

    public function __construct()
    {
        session_start();
        $this->prefixAmbiente = explode('.', $_SERVER['HTTP_HOST'])[2];
        $this->urlLoginIntranet
            = "https://login.{$this->prefixAmbiente}.bb.com.br/sso/XUI/#login/&goto=https://portal.stt.{$this->prefixAmbiente}.bb.com.br/";
    }

    public function checkLogin(): void
    {
        if (empty($_COOKIE['BBSSOToken']) && empty($_COOKIE['ssoacr'])) {
            header('Location: ' . $this->urlLoginIntranet);
            exit;
        }

//        $this->setCookieAmbienteLocal();

        define( 'BB_SSOACR', $_COOKIE['ssoacr'] );
        define( 'BB_SSOToke',$_COOKIE['BBSSOToken']);
        define( 'SSO_URL', 'https://sso.desenv.bb.com.br/sso/identity/json/attributes');
    }

    public function setCookieAmbienteLocal(): void
    {
        setcookie('ssoacr', 'sso.desenv.bb.com.br');
        setcookie('BBSSOToken', 'GfCBiWdbhHeCBRHqRuHd2AXaFl8.*AAJTSQACMDIAAlNLABw4dHVxeWtrc2ErZ3lpT3FBM0k4ckcrZlZBSWc9AAR0eXBlAANDVFMAAlMxAAIwNg..*');
    }
}

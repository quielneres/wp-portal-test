<?php

class SessionIntranetService
{
    protected $ssoacr;
    protected $BBSSOToken;
    protected $prefixBBSSOToken;
    protected $domimioSsoacr;
    protected $prefixAmbiente;
    protected $urlLoginIntranet;
    protected $urlSSOIntranet;


    public function __construct()
    {
        session_start();
        $this->prefixAmbiente = explode('.', $_SERVER['HTTP_HOST'])[2];

        ##utiliza-se para definir os cookeis no ambiente local
        $this->setCookieAmbienteLocal();

        $this->urlLoginIntranet
            = "https://login.{$this->prefixAmbiente}.bb.com.br/sso/XUI/#login/&goto=https://portal.stt.{$this->prefixAmbiente}.bb.com.br/";
        $this->urlSSOIntranet
            = "https://sso.{$this->prefixAmbiente}.bb.com.br/sso/identity/json/attributes";
        $this->domimioSsoacr
            = "sso.{$this->prefixAmbiente}.bb.com.br";

        switch ($this->prefixAmbiente){
            case 'desenv':
                $this->prefixBBSSOToken = 'BBSSOTokenDS';
                break;
            case 'hm':
                $this->prefixBBSSOToken = 'BBSSOTokenHM';
                break;
            case 'intranet':
                $this->prefixBBSSOToken = 'BBSSOToken';
                break;
        }

        if (!empty($_COOKIE['ssoacr']) &&
            !empty($_COOKIE[$this->prefixBBSSOToken])
        ) {
            $this->ssoacr     = $_COOKIE['ssoacr'];
            $this->BBSSOToken = $_COOKIE[$this->prefixBBSSOToken];
        }
    }

    public function getSsoacr()
    {
        return $this->ssoacr;
    }

    public function getBBSSOToken()
    {
        return $this->BBSSOToken;
    }

    public function getUrlLoginIntranet():string
    {
        return $this->urlLoginIntranet;
    }

    public function getUrlSsoIntranet():string
    {
        return $this->urlSSOIntranet;
    }
    public function getPrefixBBSSOToken()
    {
        return $this->prefixBBSSOToken;
    }

    public function getVariaveis(): array
    {
        setcookie('logado_intranet', true);

        return [
            'BB_SSOACR' => $this->ssoacr,
            'BB_SSOToke' => $this->BBSSOToken,
            'SSO_URL' => $this->urlSSOIntranet
        ];
    }

    public function unsetCookies()
    {
        session_destroy();
        unset($_COOKIE['logado_intranet']);
        unset($_COOKIE['ssoacr']);
        unset($_COOKIE['BBSSOToken']);

    }
    public function setCookieAmbienteLocal(): void
    {
        $this->prefixAmbiente = 'desenv';
        setcookie('ssoacr', 'sso.desenv.bb.com.br');
        setcookie('BBSSOTokenDS', '3WaoHVOuQMQdqqOVQsI0KfSXLX8.*AAJTSQACMDIAAlNLABxjQkcydTR3TjA0Y1JvS2h5U3BtR1gveGNUYXM9AAR0eXBlAANDVFMAAlMxAAIwNg..*');
    }
}

<?php

class SessionIntranetService
{
    protected $ssoacr;
    protected $BBSSOToken = [];
    protected $domimioSsoacr;
    protected $prefixAmbiente;
    protected $urlLoginIntranet;
    protected $urlSSOIntranet;


    public function __construct()
    {
        session_start();
        $this->prefixAmbiente = explode('.', $_SERVER['HTTP_HOST'])[2];

        if (empty($this->prefixAmbiente)) {
            $this->setCookieAmbienteLocal();
        }

        $this->urlLoginIntranet
            = "https://login.{$this->prefixAmbiente}.bb.com.br/sso/XUI/#login/&goto=https://portal.stt.{$this->prefixAmbiente}.bb.com.br/";
        $this->urlSSOIntranet
            = "https://sso.{$this->prefixAmbiente}.bb.com.br/sso/identity/json/attributes";
        $this->domimioSsoacr
            = "sso.{$this->prefixAmbiente}.bb.com.br";

        if (empty($_COOKIE['ssoacr'])) {

            $this->ssoacr = $_COOKIE['ssoacr'];
            switch ($this->prefixAmbiente){
                case 'desenv':
                    $this->BBSSOToken = [
                        'BBSSOTokenDS' => $_COOKIE['BBSSOTokenDS']
                    ];
                    break;
                case 'hml':
                    $this->BBSSOToken = [
                        'BBSSOTokenHM' => $_COOKIE['BBSSOTokenHM']
                    ];
                    break;
                case 'intranet':
                    $this->BBSSOToken = [
                        'BBSSOToken' => $_COOKIE['BBSSOToken']
                    ];
                    break;
            }
        }
    }

    public function getSsoacr()
    {
        return $this->ssoacr;
    }

    public function getBBSSOToken(): array
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
        setcookie('BBSSOTokenDS', '3Eim_Jd72qJcLXVsR8LEFHcSGzo.*AAJTSQACMDIAAlNLABxlZFB2ZjBjVjlTZVhPSFVYNjVNYW4wV1FKTGs9AAR0eXBlAANDVFMAAlMxAAIwNg..*');
    }
}

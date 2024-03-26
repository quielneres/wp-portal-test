<?php

require_once get_template_directory() . '/inc/services/SessionIntranetService.php';
require get_template_directory() . '/inc/services/UsuarioIntranetService.php';


class BB_AuthIntranet
{
    protected $sessionIntranetService;
    protected $usuarioIntranetService;

    public function __construct()
    {
        $this->sessionIntranetService = new SessionIntranetService();
        $this->usuarioIntranetService = new UsuarioIntranetService();
    }

    public function checkLogin(): void
    {
        $ssoacr = $this->sessionIntranetService->getSsoacr();
        $ssoToken = $this->sessionIntranetService->getBBSSOToken();

        if ( empty($ssoacr) && empty($ssoToken) ) {
            header('Location: ' . $this->sessionIntranetService->getUrlLoginIntranet());
            exit();
        }

        $atributos = $this->usuarioIntranetService->getAtributos(
            $this->sessionIntranetService->getBBSSOToken(),
            $this->sessionIntranetService->getSsoacr(),
            $this->sessionIntranetService->getUrlSsoIntranet(),
            $this->sessionIntranetService->getPrefixBBSSOToken()
        );

        $this->loginIntranet($atributos);
    }

    private function loginIntranet($atributos): void
    {

//		var_dump($atributos['code']);
//		echo "<script>console.log('Atribuos: " . $atributos . "' );</script>";
//		echo "<script>console.log('Codigo: " . $atributos['code'] . "' );</script>";

        if ($atributos['code'] === 403 || $atributos['code'] === 500) {
            header('Location: ' . $this->sessionIntranetService->getUrlLoginIntranet());
            exit();
        }

        if ($atributos['code'] === 200) {
			setcookie('logado_intranet', true);
            define('USUARIO_INTRANET', json_encode($atributos['data']));
        }
    }

    public function logoutIntranet(): array
    {
        $resposta = [
            'code' => 203
        ];

        if (isset($_COOKIE['logado_intranet'])) {
            $this->sessionIntranetService->unsetCookies();
            $resposta['code'] = 200;
        }
        return $resposta;
    }
}

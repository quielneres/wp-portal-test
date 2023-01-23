<?php

require get_template_directory() . '/inc/services/UsuarioIntranetService.php';

class UsuarioIntranet
{
    protected $usuarioIntranet;
    public function __construct()
    {
        $this->usuarioIntranet = new UsuarioIntranetService();
    }

    public function obterUsuario()
    {
        $usuario = [];
        $dados = $this->usuarioIntranet->getAtributos();

        if ($dados['code'] === 200) {
            foreach ( $dados['data']->attributes as $value ){

                if ($value->name === 'displayname') {
                    $usuario = [
                        'nome_funcioanrio' => $value->values['0']
                    ];
                }
            }
        }

        return $usuario;
    }
}

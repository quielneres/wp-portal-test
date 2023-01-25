<?php

class UsuarioIntranet
{
    public function obterUsuario()
    {
        $usuario = [];

        if (defined('USUARIO_INTRANET')) {

            $dados = json_decode(USUARIO_INTRANET);

            foreach ($dados->attributes as $value) {
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

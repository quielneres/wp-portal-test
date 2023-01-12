<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
//define( 'DB_NAME', 'fabricaSoftwareHm' );
//define( 'DB_NAME', 'fabricaSoftwareDev' );
define( 'DB_NAME', 'stt-fabrica' );

/** Usuário do banco de dados MySQL */
//define( 'DB_USER', 'user_fabrica_software' );
define( 'DB_USER', 'ezequiel' );

/** Senha do banco de dados MySQL */
//define( 'DB_PASSWORD', 'f4br1c4S0ftw4r3Hm' );
//define( 'DB_PASSWORD', 'U$3R_f4br1c4S0ftw4reDe3v' );
//define( 'DB_PASSWORD', 'U$3R_f4br1c4S0ftw4reDe3v' );
define( 'DB_PASSWORD', '458261' );

/** Nome do host do MySQL */
//define( 'DB_HOST', 'silo01.mysql.bdh.hm.bb.com.br' );
//define( 'DB_HOST', 'silo01.mysql.bdh.desenv.bb.com.br' );
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );


define('WP_HOME','http://localhost:8000/');
define('WP_SITEURL','http://localhost:8000/');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'f&hO9nh6T<Lv6Yq>Z*#l&<jn^0]Y7T)rD#=MQ>eX?hyXn5dC@L5k0s!?o<{#9zi0' );
define( 'SECURE_AUTH_KEY',  '_rWOFkhIbh)?JSQbj1l]e)ShcKRz!i(byt<JAp^HE=g0u!*w*hQ&b^vXw:;h@?}c' );
define( 'LOGGED_IN_KEY',    ' mm(O,qKf|UobP3$7y``8swI!;GX+w:o-z0]^cNuY_80>WG1s:a,rjRUCMF@c}7X' );
define( 'NONCE_KEY',        'm5P=6;CuZsLm;;vrhYZ&3s]eex@id!KH}-PC >!L/_9eAZ6#&p=z}Rx#4ngOS>LI' );
define( 'AUTH_SALT',        '6]xOTtGgMv3>`*$[cM;uB~zd]`SHR;=KKd28 >q^81yN#I^[RZ+`Q8z3i}=aX>cD' );
define( 'SECURE_AUTH_SALT', 'Wu4-|4vf+u^%tdL%(0e[i=zecymA7t7P#t#V*L/(2wVk>V4L<=g%( KAPp?%B)AE' );
define( 'LOGGED_IN_SALT',   'A~9enovO7X:gc#/t9q)$1b3a)WB.xs#l)Lz[)X=!Jk$U+.xx,uM3tbtC>v*=&Ws0' );
define( 'NONCE_SALT',       'S6<d[YgBO)$>z=.&&,xwp wM0lZ8T1Z9vc [`_I*f]iQ9Q;R5-B9QdXDqq!;r>Cp' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';

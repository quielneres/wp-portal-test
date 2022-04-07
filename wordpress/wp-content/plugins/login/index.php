<?php
/*
 * Plugin Name: Login e Cadastro
 * Description: Plugin de login e cadastro de users
 * Version: 1.0.0
 * Author Name: Ezequiel Neres Nascimento
 */

if (!function_exists('add_action')) {
    echo "O plugin não pode ser acessado diretamente!";
    exit;
}

//Ativação plugin
function bb_ativacao_plugin()
{
    if (version_compare(get_bloginfo('version'), '4.8', '<')) {
        wp_die('Versão do worpress imcompativel.');
    }
}

register_activation_hook(__FILE__, 'bb_ativacao_plugin');

//Carregar css e js
function carregar_js_css()
{
    wp_enqueue_style('css', plugins_url('style.css', __FILE__));
    wp_enqueue_script('js', plugins_url('script.js', __FILE__), array('jquery'), '3.6.6', true);

    //transferir dados do php para o javascript
    wp_localize_script('js', 'login_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => home_url('/'),
    ));

}

add_action('wp_enqueue_scripts', 'carregar_js_css');



//// criação de shortcode de login e cadastro
//function bb_auth_form_shortcode()
//{
//
//    $file_path = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/login/template_login.php';
//
//    $formHTML = file_get_contents($file_path);
//    echo $formHTML;
//}
//
//add_shortcode('login_auth_form', 'bb_auth_form_shortcode');

function bb_criar_conta()
{
    $array = array('status' => 1);

    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['senha']) || !is_email($_POST['email'])) {
        wp_send_json($array);
    }

    $name = sanitize_text_field($_POST['name']);
    $senha = sanitize_text_field($_POST['senha']);
    $email = sanitize_email($_POST['email']);

    $username = explode('@', $email);
    $username = $username[0];

    if (username_exists($username) || email_exists($email)) {
        wp_send_json($array);
    }

    $user_id = wp_insert_user(array(
        'user_login' => $username,
        'user_email' => $email,
        'user_pass' => $senha,
        'user_nicename' => $username,
    ));

    if(is_wp_error($user_id)){
        wp_send_json($array);
    }

    // se der tudo certo, redireciona para o home

    $user = get_user_by('id', $user_id);

    wp_set_current_user($user_id, $user->user_login);
    wp_set_auth_cookie($user_id, false);

    do_action('wp_login',  $user->user_login, $user);

    $array['status'] = 2;

    wp_send_json($array);

}

add_action('wp_ajax_nopriv_criar_conta', 'bb_criar_conta');



function bb_login()
{
    $array = array('status' => 1);

    if (empty($_POST['email']) || empty($_POST['senha']) || !is_email($_POST['email'])) {
        wp_send_json($array);
    }

    $senha = sanitize_text_field($_POST['senha']);
    $email = sanitize_email($_POST['email']);


    if (! email_exists($email)) {
        wp_send_json($array);
    }


    $userdata = get_user_by('email', $email);

    $user = wp_signon(array(
        'user_login' => $userdata->user_login,
        'user_password' => $senha,
        'remember' => true,
    ));

    if (is_wp_error($user)){
        wp_send_json($array);

    }

    $array['status'] = 2;

    wp_send_json($array);

}

add_action('wp_ajax_nopriv_login', 'bb_login');
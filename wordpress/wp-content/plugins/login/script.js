jQuery('#cadastro').on('submit', function (e) {

    e.preventDefault()

    let $ = jQuery

    $('.message_cadastro').html('Carregando...')
    $('#btn_cadastro').hide()

    let form = {
        action: 'criar_conta',
        name: $('#cadastro_name').val(),
        email: $('#cadastro_email').val(),
        senha: $('#cadastro_senha').val(),
    }

    console.log(form);

    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: login_obj.ajax_url,
        data: form,
        success: function (json) {
            if (json.status !== 2) {
                $('.message_cadastro').html('Error ao caadastrar')

            } else {
                $('.message_cadastro').html('Cadastrado com secesso')
                window.location.href = login_obj.home_url
            }
        }
    })
})

jQuery('#login').on('submit', function (e) {

    e.preventDefault()

    let $ = jQuery

    $('.message_login').html('Carregando...')
    $('#btn_login').hide()

    let form = {
        action: 'login',
        email: $('#login_email').val(),
        senha: $('#login_senha').val(),
    }

    console.log(form);

    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: login_obj.ajax_url,
        data: form,
        success: function (json) {
            if (json.status !== 2) {
                $('.message_login').html('Logado ao caadastrar')

            } else {
                $('.message_login').html('Error ao  logar')
                window.location.href = login_obj.home_url
            }
        }
    })
})

jQuery(function($) {
    $('body').on('click', '.view-post', function() {

        console.log(2222222);
        var postModal = new bootstrap.Modal(document.getElementById('postModal'));
        postModal.show();

        // var data = {
        //     'action': 'load_post_by_ajax',
        //     'id': $(this).data('id'),
        //     'security': blog.security
        // };
        //
        // console.log(data);
        //
        // $.post(blog.ajaxurl, data, function(response) {
        //     response = JSON.parse(response);
        //     $('#postModal h5#postModalLabel').text(response.title);
        //     $('#postModal .modal-body').html(response.content);
        //
        //     var postModal = new bootstrap.Modal(document.getElementById('postModal'));
        //     postModal.show();
        // });
    });
});
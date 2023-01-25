(function ($) {
    $('#logout-intranet').click(function () {
        const ajaxscript = {ajax_url: '/wp-admin/admin-ajax.php'}
        $.ajax({
            url: ajaxscript.ajax_url,
            data: {
                action: 'get_logout_intranet',
            },
            method: 'GET',
            success: function (response) {
                let data = JSON.parse(response)

                console.log(11111);
                console.log(data.code );

                if (data.code === 200 ) {
                    window.location.reload(true);
                }
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
})(jQuery)
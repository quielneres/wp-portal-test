(function( $ ) {
    let global_category

    alert(12341)



    $('#combo_categories').change(function () {
        console.log(111111);
        console.log(global_category);

        const category = $("#combo_categories option:selected").val();
        const ajaxscript = { ajax_url : '/wp-admin/admin-ajax.php' }

        global_category = category

        $.ajax({
            url : ajaxscript.ajax_url,
            data : {
                action : 'get_professional_profiles',
                category : category
            },
            method : 'GET',
            success : function( response ){
                if (response) {
                    $("#combo_profiles").removeAttr("disabled");
                    $("#combo_profiles").html('').append('<option>Selecione o perfil</option>');

                    $.each(JSON.parse(response), function(index, profile){
                        $("#combo_profiles").append(new Option(profile, index));
                    });
                }
            },
            error : function(error){ console.log(error) }
        })

    })

    $('#combo_profiles').change(function () {

        const profile_id = $("#combo_profiles option:selected").val();
        const link_profile_develop = `https://banco365.sharepoint.com.mcas.ms/sites/contratacaoporacionamento/Lists/Desenvolvimento/DispForm.aspx?ID=${profile_id}`
        const link_profile_Analytics = `https://banco365.sharepoint.com.mcas.ms/sites/contratacaoporacionamento/Lists/Perfis%20de%20IA%20Analytics%20e%20Gesto%20de%20Dados/DispForm.aspx?ID=${profile_id}`

        let link_redirect =  global_category === 'gestao_dados'
            ? link_profile_Analytics
            : link_profile_develop

        window.open(link_redirect, '_blank');
    })
})(jQuery)
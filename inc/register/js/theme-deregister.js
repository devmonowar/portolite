;(function($){
    "use strict";
    var url = theme_data.url,
        code = theme_data.code,
        domain  = theme_data.domain;
        
    $('#deactivate').on('click', function(e){
        e.preventDefault();
        $.ajax({
            method:'POST',
            url:url,
            data:{
                code:code,
                domain:domain
            },
            beforeSend:function(){
                $('#deactivate').text('Deactivatig...').attr('disabled', 'disabled');
            },
            success:function(res){
                if(res.code == 'ptl_api_success' && res.status == 'deactivated'){
                    $('#deactivate').closest('wrap').append(`<div class="notice notice-success"><p>${res.message}</p></div>`);
                }
                if(res.code == 'ptl_api_error' && res.status == 'not_found'){
                    $('#deactivate').closest('wrap').append(`<div class="notice notice-error"><p>${res.message}</p></div>`);
                }
                setTimeout(() => {
                    window.location.href = theme_data.admin_url + '&deactivate=true&success='+res.message;
                }, 1000);
            },
            complete:function(){
                $('#deactivate').text('Deactivated').removeAttr('disabled');
            }
        });
    });
    

})(jQuery)
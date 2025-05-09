;(function($){
    "use strict";
    
    var url = theme_reg_data.url,
        domain  = theme_reg_data.domain,
        theme = theme_reg_data.theme,
        version = theme_reg_data.version,
        author = theme_reg_data.author;
        

        
    $('#register').on('click', function(e){
        
        e.preventDefault();
        var code = $('#purchase_code').val();
        var checkfield = $('input[name="confirm_activation"]').prop('checked');
        if(code == ''){
            $('#error').html('<div class="notice notice-error"><p>Please enter the purchase code!</p></div>');
        }else if(!checkfield){
            $('#error').html('<div class="notice notice-error"><p>Checked the checkbox to confirm the policy!</p></div>');
        } else{
            $('#error').html('');
            // console.log(code, checkfield, url, domain, theme, version, author);
            $.ajax({
                method:'GET',
                url:url,
                data:{
                    code:code,
                    domain:domain,
                    theme:theme,
                    author:author,
                    version:version
                },
                beforeSend:function(){
                    $('#register').text('Registering your theme...').attr('disabled', 'disabled');
                },
                success:function(res){
                    // console.log(res);
                    if(res.code == 'tp_api_success' && res.status == 'registered'){
                        $('#error').html(`<div class="notice notice-success"><p>${res.message}</p></div>`);
                        setTimeout(() => {
                            window.location.href = theme_reg_data.admin_url + '&activate=true&item_id='+res.item_id+'&code='+code;
                        }, 1000);
                    }else if(res.code == 'tp_api_error'){
                        $('#error').html(`<div class="notice notice-error"><p>${res.message}</p></div>`);
                    }else{
                        setTimeout(() => {
                            window.location.href = theme_reg_data.admin_url;
                        }, 1000);
                    }
                    // $('#register').text('Registering theme').attr('disabled', '');
                },
                complete:function(){
                    $('#register').text('Registering theme').removeAttr('disabled');
                    // $('#register').text('Done!');
                }
            });
        }
        
    });

    $(document).ready(function(){
        $(document).on('click', '[data-slug="tp-core"] .activate a', function(e){
            e.preventDefault();
            $('#register-modal').show();
        });

        $('.tp-modal-close').on('click', function(){
            $('#register-modal').hide();
        })
    })

    $(window).on('click', function(e){
        if(e.target == document.getElementById('register-modal')){
            $('#register-modal').hide();
        }
    });
    

})(jQuery)
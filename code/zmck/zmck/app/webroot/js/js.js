$('.login-trigger').click(function () {
    $('#loginContent').css({"margin-top":'-290px'});
    $('#wrap').css({display:'block',height:'350px'});
    $('.login-wrap-arrow').removeClass('login-wrap-arrow-register');

    
    //$('.registerwrap').css('display', 'none');
    $('.loginwrap').show();
    $('.registerwrap').hide();
    if($("#login_username").val()!=''){
        //$('#loginusernamelabel').html('');
    }
})
$('.register-trigger').click(function () {
    $('.login-wrap-arrow').addClass('login-wrap-arrow-register');
    $('#loginContent').css({"margin-top":'-290px'});
    $('#wrap').css({display:'block',height:'350px'});
    $('.loginwrap').hide();
    $('.registerwrap').show();
})
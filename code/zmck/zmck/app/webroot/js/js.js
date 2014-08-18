$('.login-trigger').click(function () {
    $('.loginwrap').show();
    $('.registerwrap').hide();
    if($("#login_username").val()!=''){
        //$('#loginusernamelabel').html('');
    }
})
$('.register-trigger').click(function () {
    $('.loginwrap').hide();
    $('.registerwrap').show();
})
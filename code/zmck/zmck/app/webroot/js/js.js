$(function(){
    ﻿$('.login-trigger').bind('click', function () {
        $('#loginContent').css({"margin-top":'-290px'});
        $('#wrap').css({display:'block',height:'350px'});
        $('.login-wrap-arrow').removeClass('login-wrap-arrow-register');

        $('.loginwrap').show();
        $('.registerwrap').hide();
        if($("#login_username").val()!=''){
            //$('#loginusernamelabel').html('');
        }
    })
    $('.register-trigger').bind('click',function () {
        $('.login-wrap-arrow').addClass('login-wrap-arrow-register');
        $('#loginContent').css({"margin-top":'-290px'});
        $('#wrap').css({display:'block',height:'350px'});
        $('.loginwrap').hide();
        $('.registerwrap').show();
        
        if($('#reguseremail').val()!=''){
            $('#reg_usernameLabel').html('');
        }
        if($('#regpassword').val()!=''){
            $('#reg_passwordLabel').html('');
        }
    })
})
// onfocus="$('#reg_passwordLabel').html('');" onblur="if($(this).val()==''){$('#reg_passwordLabel').html('密码');}"
$('#reguseremail').bind('focus', function(){
    $('#reg_usernameLabel').html('');
}).bind('blur',function(){
    if($(this).val()==''){$('#reg_usernameLabel').html('邮箱');}
});
$('#regpassword').bind('focus', function(){
    $('#reg_passwordLabel').html('');
}).bind('blur',function(){
    if($(this).val()==''){$('#reg_passwordLabel').html('密码');}
});

$('.js-prev-navbar').click(function(){
    var top=$('.js-userList').css('margin-top');
    top=parseInt(top);
    if(top<0){
        $('.js-userList').animate({marginTop:'+=366px'},{duration: "slow"});
        $('.js-next-navbar').removeClass('hidden');
    }else{
        $('.js-prev-navbar').addClass('hidden');
    }
});

$('.js-next-navbar').click(function(){
    var top=$('.js-userList').css('margin-top');
    top=parseInt(top);
    var height=$('.js-userList').height();
    //console.log(top, height, top+height);
    if(top+height>366){
        var top=$('.js-userList').animate({marginTop:'-=366px'},{duration: "slow"});
        $('.js-prev-navbar').removeClass('hidden');
    }else{
        $('.js-next-navbar').addClass('hidden');
    }
})
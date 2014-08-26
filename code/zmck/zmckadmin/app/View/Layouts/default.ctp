<?php
    /**
    * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
    * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
    *
    * Licensed under The MIT License
    * For full copyright and license information, please see the LICENSE.txt
    * Redistributions of files must retain the above copyright notice.
    *
    * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
    * @link          http://cakephp.org CakePHP(tm) Project
    * @package       app.View.Layouts
    * @since         CakePHP(tm) v 0.10.0.1076
    * @license       http://www.opensource.org/licenses/mit-license.php MIT License
    */

    $cakeDescription = __d('cake_dev', '');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <title>众梦创客 - 后台管理中心</title>
        <link href="<?php echo $dm['www'];?>css/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $dm['www'];?>css/zh-cn-system.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $dm['www'];?>css/dialog.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $dm['www'];?>css/zh-cn-styles1.css" title="styles1" media="screen" />
        <script language="javascript" type="text/javascript" src="<?php echo $dm['www'];?>js/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo $dm['www'];?>js/styleswitch.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo $dm['www'];?>js/dialog.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo $dm['www'];?>js/hotkeys.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo $dm['www'];?>js/jquery.sgallery.js"></script>
        <script type="text/javascript">
            var pc_hash = 'aw8sc8'
        </script>
        <style type="text/css">
            .objbody{overflow:hidden}

            .btns{background-color:#666;}
            .btns{position: absolute; top:116px; right:30px; z-index:1000; opacity:0.6;}
            .btns2{background-color:rgba(0,0,0,0.5); color:#fff; padding:2px; border-radius:3px; box-shadow:0px 0px 2px #333; padding:0px 6px; border:1px solid #ddd;}
            .btns:hover{opacity:1;}
            .btns h6{padding:4px; border-bottom:1px solid #666; text-shadow: 0px 0px 2px #000;}
            .btns .pd4{ padding-top:4px; border-top:1px solid #999;}
            .pd4 li{border-radius:0px 6px 0px 6px; margin-top:2px; margin-bottom:3px; padding:2px 0px;}
            .btns .pd4 li span{padding:0px 6px;}
            .pd{padding:4px;}
            .ac{background-color:#333; color:#fff;}
            .hvs{background-color:#555; cursor: pointer;}
            .bg_btn{background: url(<?php echo $dm['www'];?>admin_img/icon2.jpg) no-repeat; width:32px; height:32px;}
        </style>
    </head>
    <body scroll="no" class="objbody">
        <div class="header">
            <div class="logo5 lf"><span style="font-size: 25px;color:#ffffff;display: block;width: 150px;"> 众 梦 <br/>  创 客</span></div>
            <div class="rt-col">

            </div>
            <div class="col-auto">
                <div class="log white cut_line">您好！phpcms  [超级管理员]<span>|</span><a href="?m=admin&c=index&a=public_logout">[退出]</a><span>|</span>
                    <a href="http://www.zmck.com/" target="_blank" id="site_homepage">站点首页</a><span>|</span>
                </div>
                
            </div>
        </div>
        <div id="content">
            <div class="col-left left_menu">
                <div id="Scroll"><div id="leftMain"></div></div>
                <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="展开与关闭"><span class="hidden">展开</span></a>
            </div>
            <div class="col-1 lf cat-menu" id="display_center_id" style="display:none" height="100%">
                <div class="content">
                    <iframe name="center_frame" id="center_frame" src="" frameborder="false" scrolling="auto" style="border:none" width="100%" height="auto" allowtransparency="true"></iframe>
                </div>
            </div>
            <div class="col-auto mr8">
                <div class="crumbs">
                    当前位置：<span id="current_pos"></span></div>
                <div class="col-1">
                    <div class="content" style="position:relative; overflow:hidden">
                        <iframe name="right" id="rightMain" src="<?php echo $dm['www'];?>default" frameborder="false" scrolling="auto" style="border:none; margin-bottom:30px" width="100%" height="auto" allowtransparency="true"></iframe>
                        <div class="fav-nav">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll"><a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);"></a><a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);"></a></div>
        <script type="text/javascript"> 
            if(!Array.prototype.map)
                Array.prototype.map = function(fn,scope) {
                var result = [],ri = 0;
                for (var i = 0,n = this.length; i < n; i++){
                    if(i in this){
                        result[ri++]  = fn.call(scope ,this[i],i,this);
                    }
                }
                return result;
            };

            var getWindowSize = function(){
                return ["Height","Width"].map(function(name){
                    return window["inner"+name] ||
                    document.compatMode === "CSS1Compat" && document.documentElement[ "client" + name ] || document.body[ "client" + name ]
                });
            }
            window.onload = function (){
                if(!+"\v1" && !document.querySelector) { // for IE6 IE7
                    document.body.onresize = resize;
                } else { 
                    window.onresize = resize;
                }
                function resize() {
                    wSize();
                    return false;
                }
            }
            function wSize(){
                //这是一字符串
                var str=getWindowSize();
                var strs= new Array(); //定义一数组
                strs=str.toString().split(","); //字符分割
                var heights = strs[0]-150,Body = $('body');$('#rightMain').height(heights);   
                //iframe.height = strs[0]-46;
                if(strs[1]<980){
                    $('.header').css('width',980+'px');
                    $('#content').css('width',980+'px');
                    Body.attr('scroll','');
                    Body.removeClass('objbody');
                }else{
                    $('.header').css('width','auto');
                    $('#content').css('width','auto');
                    Body.attr('scroll','no');
                    Body.addClass('objbody');
                }

                var openClose = $("#rightMain").height()+39;
                $('#center_frame').height(openClose+9);
                $("#openClose").height(openClose+30);    
                $("#Scroll").height(openClose-20);
                windowW();
            }
            wSize();
            function windowW(){
                if($('#Scroll').height()<$("#leftMain").height()){
                    $(".scroll").show();
                }else{
                    $(".scroll").hide();
                }
            }
            windowW();
            //站点下拉菜单
            $(function(){
                //默认载入左侧菜单
                $("#leftMain").load("<?php echo $dm['www'];?>menu/publicMenuLeft?menuid=10");

                //面板切换
                $("#btnx").removeClass("btns2");
                $("#Site_model,#btnx h6").css("display","none");
                $("#btnx").hover(function(){$("#Site_model,#btnx h6").css("display","block");$(this).addClass("btns2");$(".bg_btn").hide();},function(){$("#Site_model,#btnx h6").css("display","none");$(this).removeClass("btns2");$(".bg_btn").show();});
                $("#Site_model li").hover(function(){$(this).toggleClass("hvs");},function(){$(this).toggleClass("hvs");});
                $("#Site_model li").click(function(){$("#Site_model li").removeClass("ac"); $(this).addClass("ac");});
            })

            //左侧开关
            $("#openClose").click(function(){
                if($(this).data('clicknum')==1) {
                    $("html").removeClass("on");
                    $(".left_menu").removeClass("left_menu_on");
                    $(this).removeClass("close");
                    $(this).data('clicknum', 0);
                    $(".scroll").show();
                } else {
                    $(".left_menu").addClass("left_menu_on");
                    $(this).addClass("close");
                    $("html").addClass("on");
                    $(this).data('clicknum', 1);
                    $(".scroll").hide();
                }
                return false;
            });

            function _M(menuid,targetUrl) {
                $("#menuid").val(menuid);
                $("#bigid").val(menuid);
                $("#leftMain").load("?m=admin&c=index&a=public_menu_left?menuid="+menuid, {limit: 25}, function(){
                    windowW();
                });
                
                $('.top_menu').removeClass("on");
                $('#_M'+menuid).addClass("on");
                $.get("?m=admin&c=index&a=public_current_pos&menuid="+menuid, function(data){
                    $("#current_pos").html(data);
                });
                //当点击顶部菜单后，隐藏中间的框架
                $('#display_center_id').css('display','none');
                //显示左侧菜单，当点击顶部时，展开左侧
                $(".left_menu").removeClass("left_menu_on");
                $("#openClose").removeClass("close");
                $("html").removeClass("on");
                $("#openClose").data('clicknum', 0);
                $("#current_pos").data('clicknum', 1);
            }
            function _MP(menuid, targetUrl) {
                $("#menuid").val(menuid);

                $("#rightMain").attr('src', targetUrl+'?menuid='+menuid);
                $('.sub_menu').removeClass("on fb blue");
                $('#_MP'+menuid).addClass("on fb blue");
                //$.get("?m=admin&c=index&a=public_current_pos&menuid="+menuid, function(data){
                    //$("#current_pos").html(data+'<span id="current_pos_attr"></span>');
                //});
                $("#current_pos").data('clicknum', 1);
            }

            (function(){
                var addEvent = (function(){
                    if (window.addEventListener) {
                        return function(el, sType, fn, capture) {
                            el.addEventListener(sType, fn, (capture));
                        };
                    } else if (window.attachEvent) {
                        return function(el, sType, fn, capture) {
                            el.attachEvent("on" + sType, fn);
                        };
                    } else {
                        return function(){};
                    }
                })(),
                Scroll = document.getElementById('Scroll');
                // IE6/IE7/IE8/Opera 10+/Safari5+
                addEvent(Scroll, 'mousewheel', function(event){
                    event = window.event || event ;  
                    if(event.wheelDelta <= 0 || event.detail > 0) {
                        Scroll.scrollTop = Scroll.scrollTop + 29;
                    } else {
                        Scroll.scrollTop = Scroll.scrollTop - 29;
                    }
                }, false);

                // Firefox 3.5+
                addEvent(Scroll, 'DOMMouseScroll',  function(event){
                    event = window.event || event ;
                    if(event.wheelDelta <= 0 || event.detail > 0) {
                        Scroll.scrollTop = Scroll.scrollTop + 29;
                    } else {
                        Scroll.scrollTop = Scroll.scrollTop - 29;
                    }
                }, false);

            })();
            function menuScroll(num){
                var Scroll = document.getElementById('Scroll');
                if(num==1){
                    Scroll.scrollTop = Scroll.scrollTop - 60;
                }else{
                    Scroll.scrollTop = Scroll.scrollTop + 60;
                }
            }
            function _Site_M(project) {
                var id = '';
                $('#top_menu li').each(function (){
                    var S_class = $(this).attr('class');
                    if ($(this).attr('id')){
                        $(this).hide();
                    }
                    if (S_class=='on top_menu' || S_class=='top_menu on'){
                        id = $(this).attr('id');
                    }
                });
                $('#'+id).show();
                id = id.substring(2, id.length);
                if (!project){
                    project = 0;
                }
                $.ajaxSettings.async = false; 
                $.getJSON('index.php', {m:'admin', c:'index', a:'public_set_model', 'site_model':project, 'time':Math.random()}, function (data){
                    $.each(data, function(i, n){
                        $('#_M'+n).show();
                    })
                })
                //$("#leftMain").load("?m=admin&c=index&a=public_menu_left&menuid="+id+'&time='+Math.random());
            }

        </script>
    </body>
</html>
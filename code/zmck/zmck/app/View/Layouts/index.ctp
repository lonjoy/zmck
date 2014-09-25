<!doctype html>
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 7]><html class="ie7"><![endif]-->
<!--[if IE 6><html class="ie6"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html>
    <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="#" />
        <meta name="description" content="#" />
        <title>众梦创客</title>
        <link rel="stylesheet" href="<?php echo $dm['www'];?>css/main.min.css" />
        <link rel="stylesheet" href="<?php echo $dm['www'];?>css/page.min.css" />
        <link href="<?php echo $dm['www'];?>css/style.css" rel="stylesheet" />
        <script src="<?php echo $dm['www'];?>js/jquery.min.js"></script>

        <!--[if lt IE 10]><link rel="stylesheet" href="css/hacks.css" /><![endif]-->
        <!--[if lt IE 9]> <script type="text/javascript"> (function (){ var tag = ['section','header','footer','nav','hgroup','article','aside'],i=0; for(i in tag){ document.createElement(tag[i]); } })();</script><![endif]-->
    </head>
    <body data-log="pLogin" class="pLogin">
        <div class="login-wrapper js-wrapper">
            <div class="login-userBox" id="sliderUserbox">
                <ul class="login-user-list js-userList">
                    <?php 
                        if(!empty($data)){
                            foreach($data as $val){
                            ?>
                            <li>
                                <div class="login-user-item js-userItem">
                                    <img src="<?php echo Url::getUserPic(array('uid'=>$val['id'], 'tp'=>'b'));?>" class="js-preview-img" data-src="<?php echo Url::getUserPic(array('uid'=>$val['id'], 'tp'=>'b'));?>" />
                                    <i class="login-user-mask"></i>
                                    <a class="login-user-target" href="/partner/detail?id=<?php echo $val['id'];?>" target="_blank"></a>
                                    <div class="login-user-info">
                                        <p class="login-user-nickname">
                                            <span title="<?php echo !empty($val['nickname'])?$val['nickname'].'-':''?>
                                                <?php echo $val['role']?$roles[$val['role']]:'';?>">
                                                <?php echo !empty($val['nickname'])?$val['nickname'].'-':''?><?php echo $val['role']?$roles[$val['role']]:'';?>
                                            </span>
                                        </p>
                                        <p><span class="cy_prov" cy="<?php echo $val['province'];?>"></span>-<span class="cy_city" cy="<?php echo $val['city'];?>"></span></p>
                                    </div>
                                    <div class="login-user-down">
                                        <div class="down-title">
                                            <?php echo !empty($val['nickname'])?$val['nickname'].'-':''?><?php echo $val['role']?$roles[$val['role']]:'';?>
                                        </div>
                                        <div class="down-area">

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php 
                            }
                        }
                    ?>
                </ul>
                <div class="login-user-prev js-prev-navbar hidden">
                    <a href="javascript:;" class="prev-trigger"><em></em></a>
                    <i></i>
                </div>
                <div class="login-user-next js-next-navbar">
                    <a href="javascript:;" class="next-trigger"><em></em></a>
                    <i></i>
                </div>
            </div>
            <div class="login-mainBox">
                <div id="loginContent" class="login-content">
                    <div class="login-logo"></div>
                    <div class="login-operate login-ope rate-actived">
                        <div id="operateBox" class="login-operate-inner">
                            <a data-log="openLogin" class="login-operate-btn current login-trigger" hidefocus="true" href="javascript:;">登录</a>
                            <a data-log="openLogin" class="login-operate-btn register-trigger" hidefocus="true" href="javascript:;">注册</a>
                            <a class="login-operate-btn login-operate-btn-vistor" target="_blank" href="<?php echo $dm['www'];?>default">游客浏览</a>
                        </div>
                    </div>
                </div>
                <div class="login-footer">

                    <span>众梦版权所有©2014-2019 </span>| <a href="#">商务合作</a> <a href="#">官方博客</a> <a href="<?php echo isset($sitesetting['weibo'])?$sitesetting['weibo']:'javascript:;'?>">官方微博</a> 
                    <!-- <a href="#"><img src="<?php echo $dm['www'];?>img/add.png" /></a>-->

                </div>
                <div id="wrap" class="login-wrap" style="height: 0px; overflow: hidden">
                    <div class="login-wrap-arrowBox"><span class="login-wrap-arrow js-arrow"></span></div>
                    <div class="login-wrap-main js-main">
                        <div class="login-wrap-content clearfix">
                            <div class="loginwrap">
                                <div class="login-wrap-form ">
                                    <div class="login-wrap-title clearfix">
                                        <p class="form-notice " style="color: #54546b; ">使用邮箱/手机登录</p>
                                    </div>
                                    <form data-log="ursLogin" action="/login" method="POST" id="Form1" name="Form1" autocomplete="off" target="_self">
                                        <div>
                                            <ul class="login-box">
                                                <li class="login-error">
                                                    <span class="text-icon-tips js-tips hidden"></span>
                                                </li>
                                                <li class="login-input js-row">
                                                    <div class="form-input-wrapper js-inputItem">
                                                        <label class="text-gray js-usernameLabel" >邮箱</label>
                                                        <input type="text" class="js-username" name="email" value="" tabindex="1" autocomplete="off" disableautocomplete id=""/>
                                                    </div>
                                                </li>
                                                <li class="login-input js-row">
                                                    <div class="form-input-wrapper js-inputItem">
                                                        <label class="text-gray js-passwordLabel" >密码</label>
                                                        <input type="password" class="js-password" name="password" tabindex="2" id="loginpassword"/>
                                                    </div>
                                                </li>
                                                <li class="login-btnBox">
                                                    <input id="loginCallBack" type="hidden" value="http://love.163.com/" name="url">
                                                    <input type="hidden" name="product" value="ht">
                                                    <input type="hidden" value="1" name="type">
                                                    <input type="submit" class="login-btn submit-trigger" style="padding-left:0;width:350px;" value="登 录">
                                                </li>

                                                <li class="login-extend clearfix">
                                                    <a class="login-forgot" href="#" style="color: #4cbbd9" target="_blank">找回密码?</a>
                                                    <span class="login-checkbox js-login">
                                                        <span class="saveLogin-trigger" style="display: block;">
                                                            <em class="icon-checkbox"></em><span style="color: #54546b">记住密码</span>
                                                            <input type="checkbox" hidefocus="true" style="opacity: 0; filter: alpha(opacity=0);" tabindex="3" value="1" name="savelogin" checked="checked">
                                                        </span>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>

                                <div class="login-wrap-other">
                                    <p class="form-notice" style="color: #54546b;">合作账号登录：</p>
                                    <ul class="list-other">
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo $dm['www'];?>img/qq1.png" />
                                            </a>

                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo $dm['www'];?>img/qq2.png" />
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="registerwrap">
                                <div class="login-wrap-form registerwrap">
                                    <div class="login-wrap-title clearfix">
                                        <p class="form-notice " style="color: #54546b;">加入众梦创客</p>
                                    </div>
                                    <form action="/reg" method="POST" id="Form2" name="Form2" autocomplete="off" target="_self">
                                        <div>
                                            <ul class="login-box">
                                                <li class="login-error">
                                                    <span class="text-icon-tips js-tips hidden"></span>
                                                </li>
                                                <li class="login-input js-row">
                                                    <div class="form-input-wrapper js-inputItem">
                                                        <label class="text-gray js-usernameLabel" id="login_usernameLabel">邮箱</label>
                                                        <a class="icon-close hidden clear-trigger" href="javascript:;"></a>
                                                        <input type="text" class="js-username" name="username" value="" tabindex="1" autocomplete="on" id="loginuseremail" />
                                                    </div>
                                                </li>
                                                <li class="login-input js-row">
                                                    <div class="form-input-wrapper js-inputItem">
                                                        <label class="text-gray js-passwordLabel" id="reg_passwordLabel">密码</label>
                                                        <input type="password" class="js-password" name="password" tabindex="2" id="regpassword"/>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text1">你的创业心态是?</div>
                                                </li>
                                                <li>
                                                    <ul class="list-radio">
                                                        <?php foreach($xintai as $key=>$val){ ?>
                                                            <li>
                                                                <label>
                                                                <input type="radio" name="xintai" value="<?php echo $key;?>" /><?php echo $val;?></label></li>

                                                            <?php } ?>

                                                    </ul>
                                                </li>
                                                <li class="login-btnBox" style="margin-top:15px; ">
                                                    <input type="submit" class="login-btn submit-trigger" style="width:370px;padding-left:0;" name="dosubmit" value="创建账号">
                                                </li>

                                            </ul>
                                        </div>
                                    </form>
                                </div>
                                <div class="login-wrap-other">
                                    <p class="form-notice" style="color: #54546b;">合作账号登录：</p>
                                    <ul class="list-other">
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo $dm['www'];?>img/qq1.png" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo $dm['www'];?>img/qq2.png" />
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <p class="row1 ">已经有账号了? <a href="#">这里登录</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="<?php echo $dm['www'];?>js/common.js"></script>    
        <script src="<?php echo $dm['www'];?>js/js.js"></script>
        <script type="text/javascript" src="<?php echo $dm['www'];?>js/procity.js"></script>
        <script type="text/javascript">
            $(function(){
                $('.js-userList li').each(function(i){
                    var prov=$(this).find('.cy_prov').eq(0).attr('cy');
                    var city=$(this).find('.cy_city').eq(0).attr('cy');
                    var _city=[];
                    for (P in arrCity) {
                        if(P==0) continue;
                        if(arrCity[P].id==prov){
                            $(this).find('.cy_prov').eq(0).html(arrCity[P].name);
                            _city=arrCity[P].sub;
                        }
                    }
                    for(C in _city){
                        if(C==0)continue;
                        if(_city[C].id==city){
                            $(this).find('.cy_city').eq(0).html(_city[C].name);
                        }
                    }
                    $(this).find('.down-area').html($(this).find('.cy_prov').eq(0).parent().html());
                });                

            });
        </script>
    </body>
</html>

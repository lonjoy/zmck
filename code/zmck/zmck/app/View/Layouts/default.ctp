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
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php if(isset($title)){ echo $title;}?> <?php echo SITE_NAME;?></title>
        <link href="<?php echo $dm['www'];?>css/global.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $dm['www'];?>css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $dm['www'];?>css/main.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $dm['www'];?>css/page.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $dm['www'];?>css/lanrenzhijia.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo $dm['www'];?>js/jquery.min.js"></script>
    </head>
    <body>
        <div id="xg">
            <ul>
                <li><a href="<?php echo isset($sitesetting['weibo'])?$sitesetting['weibo']:'#'?>" class="bg1" target="_blank">微博</a></li>
                <li><a href="<?php echo isset($sitesetting['wexin'])?$sitesetting['wexin']:'#'?>" class="bg2">微信</a></li>
                <li><a href="javascript:void(0);" class="bg3" onclick="suggest();">建议</a></li>
                <li><a href="#" class="bg4"></a></li>
            </ul>
        </div>
        <div id="top">
            <div class="top mid">
                <div class="logo"><a href="/default"><img src="<?php echo $dm['www'];?>img/logo.gif" width="184" height="70" /></a></div>
                <div class="nav">
                    <ul>
                        <li><a href="<?php echo $dm['www'];?>default">首页</a></li>
                        <li><a href="<?php echo $dm['www'];?>partner">合伙人</a></li>
                        <li><a href="<?php echo $dm['www'];?>company">创业直招</a></li>
                        <li><a href="<?php echo $dm['www'];?>bbs">创业圈</a></li>
                    </ul>
                </div>

                <div class="grzx">
                    <ul>
                        <?php 
                            if(!empty($userInfo)){
                            ?>
                            <li class="grzx_l"><a href="/message/">站内信</a></li>
                            <li class="grzx_r"><div class="grzx_r_xl">
                                    <ul>
                                        <li><a href="/user">个人资料</a></li>
                                        <li><a href="/qa">创业问答</a></li>
                                        <li><a href="/comment">评价管理</a></li>
                                        <li><a href="/user/topic">我的创业话题</a></li>
                                        <li><a href="/user/project">我的创业项目</a></li>
                                        <li><a href="/follow/">我的联系人</a></li>
                                        <li><a href="/login/loginout">退出</a></li>
                                    </ul>
                                </div><a class="bg">个人中心</a></li>
                            <?php }else{ ?>
                            <li class="grzx_r"><a class="theme-logind bg2" href="javascript:;">登录</a></li>
                            <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
        <?php echo $this->fetch('content'); ?>
        <div class="theme-popover">
            <div class="theme-poptit">
                <a href="javascript:;" title="关闭" class="close"><img src="<?php echo $dm['www'];?>img/ring_1.gif" /></a>
                <h3>建议</h3>
            </div>
            <div class="tangc">
                <h3>感谢对我们的支持</h3>
                <div>
                    <div class="tangc_c">

                        <div class="tangc_c_c">
                            <textarea name="textarea2" class="tangc_c_c_sr" id="suggest_content"></textarea>
                        </div>
                    </div>
                    <div class="tangc_tj">
                        <input type="button" value="提交" onclick="commitsuggest();"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="重置" onclick="resetsuggest();"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="theme-popover-mask"></div>
        <?php 
            echo $this->element('pop_reg');
            echo $this->element('pop_login');
        ?>
        <script>
            function suggest(){
                $('.theme-popover-mask').fadeIn(100);
                $('.theme-popover').slideDown(200);
            }
            $(document).ready(function($) {
                $('.theme-poptit .close').click(function(){
                    $('.theme-popover-mask').fadeOut(100);
                    $('.theme-popover').slideUp(200);
                })

            })
            function commitsuggest(){
                var suggest_content = $("#suggest_content").val();
                $.ajax({
                    type: "POST",
                    url: "/suggest/add",
                    dataType: 'json',
                    data: "content="+suggest_content+"&dosubmit=1",
                    success: function(data){
                        alert(data.msg);
                        window.location.reload();
                    }
                });
            }
            function resetsuggest(){
                $("#suggest_content").val('');
            }

            jQuery(document).ready(function($) {
                $('.theme-loginx').click(function(){
                    $('.theme-popover-maskx').fadeIn(100);
                    $('.theme-popoverx').slideDown(200);
                })
                $('.theme-poptitx .close').click(function(){
                    $('.theme-popover-maskx').fadeOut(100);
                    $('.theme-popoverx').slideUp(200);
                })

            })
            jQuery(document).ready(function($) {
                $('.theme-logind').click(function(){
                    $('.theme-popover-maskd').fadeIn(100);
                    $('.theme-popoverd').slideDown(200);
                })
                $('.theme-poptitd .close').click(function(){
                    $('.theme-popover-maskd').fadeOut(100);
                    $('.theme-popoverd').slideUp(200);
                })

            })

        </script>
        <div class="clear"></div>
        </div>
        <div id="foot">
            <div class="mid foot">
                <div class="foot_jr">加入我们，成就所有人的梦想！</div>
                <div class="foot_zc"><a class="theme-loginx" href="javascript:; ">立即注册</a></div>
                <div class="foot_db">
                    <div class="foot_db_l">
                        <a href="/default/aboutus">关于众梦创客</a> | 
                        <a href="/default/contactus" target="_blank">联系我们</a> | 
                        <a href="/default/zhaopin" target="_blank">招贤纳士</a> | 
                        <a href="/default/#mobile" target="_blank">移动客户端</a> | 
                        <a href="<?php echo isset($sitesetting['weibo'])?$sitesetting['weibo']:'#'?>" target="_blank">官方微博</a> 
                    </div>
                    <div class="foot_db_r">众梦创客版权所有  @2014-2019  某ICP备00000000号 </div>
                </div>
            </div>
        </div>
    </body>
</html>

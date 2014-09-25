<!-- 顶部登录开始 -->
<div class="theme-popoverd">
    <div class="theme-poptitd">
        <a href="javascript:;" title="关闭" class="close"><img src="<?php echo $dm['www'];?>img/ring_1.gif" /></a>
        <h3>登录</h3>
    </div>

    <div class="db_zhuce">


        <div class="loginwrap">
            <div class="login-wrap-form ">
                <div class="login-wrap-title clearfix">
                    <p class="form-notice " style="color: #54546b; ">使用邮箱/手机登录</p>
                </div>
                <form data-log="ursLogin" action="/login" method="POST" name="Form1" autocomplete="off" target="_self">
                    <div>
                        <ul class="login-box">
                            <li class="login-error">
                                <span class="text-icon-tips js-tips hidden"></span>
                            </li>
                            <li class="login-input2 js-row">
                                <div class="form-input-wrapper js-inputItem">
                                    <label class="text-gray js-usernameLabel" >账号</label>
                                    <input type="text" class="js-username" name="email" value="" tabindex="1" autocomplete="off" disableautocomplete />
                                </div>
                            </li>
                            <li class="login-input2 js-row">
                                <div class="form-input-wrapper js-inputItem">
                                    <label class="text-gray js-passwordLabel" >密码</label>
                                    <input type="password" class="js-password" name="password" tabindex="2" />
                                </div>
                            </li>
                            <li class="login-btnBox">
                                <input id="loginCallBack" type="hidden" value="http://love.163.com/" name="url">
                                <input type="hidden" name="product" value="ht">
                                <input type="hidden" value="1" name="type">
                                <input type="submit" class="login-btn submit-trigger" value="登 录" style="width: 374px;padding-left:0;" />
                            </li>

                            <li class="login-extend2 clearfix">
                                <a class="login-forgot" href="#" style="color: #4cbbd9" target="_blank">找回密码?</a>
                                <span class="login-checkbox js-login">
                                    <span class="saveLogin-trigger" style="display: block;">
                                        <input type="checkbox" tabindex="3" value="1" name="savelogin" style="width: auto;">
                                        <span style="color: #54546b">记住密码</span>
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


    </div>
</div>
<div class="theme-popover-maskd"></div>
<!-- 顶部登录结束 -->

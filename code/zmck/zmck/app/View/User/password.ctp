<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>修改密码</h3>
    </div>
    <div class="gsgk_bd">
        <form name="passform" method="post" action="/user/password">
            <table width="750" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="200" height="40"></td>
                    <td class="c_password">注：第三方登录不能修改，用户绑定手机号或邮箱后才可以修改密码！</td>
                </tr>
                <tr>
                    <td width="200" height="40"><span>当前密码：</span></td>
                    <td><input type="password" name="oldpassword" class="td" /></td>
                </tr>

                <tr>
                    <td width="200" height="40"><span>新密码：</span></td>
                    <td><input type="password" name="newpassword" class="td" /></td>
                </tr>

                <tr>
                    <td width="200" height="40"><span>确认新密码：</span></td>
                    <td><input type="password" name="newpasswordconfirm" class="td" /></td>
                </tr>



                <tr>
                    <td height="60">&nbsp;</td>
                    <td><div class="gagk_an">
                            <ul>
                                <li><input type="submit" value="提交" name="dosubmit" />
                                </li>
                            </ul>
                        </div></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php echo $this->element('user_info'); ?>



<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title_35">
        <h3>个人认证&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/user/companyauth">企业认证</a></h3>
    </div>
    <div class="gsgk_bd">
        <form action="/usr/auth" method="post" name="authform" enctype="mutile" enctype="multipart/form-data">
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <!--
            <tr>
            <td width="200" height="40"><span>手机：</span></td>
            <td class="fe_13"><input type="text" name="textfield" class="td" />
            <a href="#">发送验证码</a> <input type="text" name="textfield" class="td_13" /> <input type="button" value="验证" class="td_13_1" /></td>
            </tr>
            -->
            <tr>
                <td width="200" height="40"><span>Email：</span></td>
                <td class="fe_13"><input type="text" name="email" class="td" />
                    <font color="red">*</font> <a href="#">发送邮箱验证</a>，没收到请查看垃圾箱！ </td>
            </tr>
            <tr>
                <td width="200" height="40"><span>新浪微博：</span></td>
                <td class="fe_13"><input type="text" name="weibo" class="td" /> <font color="red">*</font>
                    如：http://weibo.com/zmckr </td>
            </tr>
            <tr>
                <td width="200" height="40"><span>QQ：</span></td>
                <td><input type="text" name="qq" class="td" /> <font color="red">*</font></td>
            </tr>
            <tr>
                <td width="200" height="40"><span>微信号：</span></td>
                <td><input type="text" name="wexin" class="td" /> <font color="red">*</font></td>
            </tr>
            <tr>
                <td width="200" height="140"><span>个人身份证：</span></td>
                <td class="pro_a23_2"><a class="pro_a23_21"></a>
                    <input type="hidden" name="identitycard" >
                    <a class="pro_a23_22">
                        <input type="button" value="上传" id="spanButtonPlaceHolder1"/><br /><font color="red">*</font>请上传自己清晰的身份证扫描件！
                    </a></td>
            </tr>
            <tr>
                <td height="60">&nbsp;</td>
                <td><div class="gagk_an">
                        <ul>
                            <li><input type="submit" value="提交" name="dosubmit" />
                            </li>
                            <li><input type="reset" value="重置" />
                            </li>
                        </ul>
                    </div></td>
            </tr>
        </table>
    </div>
</div>
<?php echo $this->element('user_info'); ?>



<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title_35">
        <h3>个人认证&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/user/companyauth">企业认证</a></h3>
    </div>
    <div class="gsgk_bd">
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="200" height="40"><span>手机：</span></td>
                <td class="fe_13"><input type="text" name="textfield" class="td" />
                    <a href="#">发送验证码</a> <input type="text" name="textfield" class="td_13" /> <input type="button" value="验证" class="td_13_1" /></td>
            </tr>
            <tr>
                <td width="200" height="40"><span>Email：</span></td>
                <td class="fe_13"><input type="text" name="textfield" class="td" />
                    <a href="#">发送邮箱验证</a>，没收到请查看垃圾箱！ </td>
            </tr>
            <tr>
                <td width="200" height="40"><span>新浪微博：</span></td>
                <td class="fe_13"><input type="text" name="textfield" class="td" /> 
                    如：http://weibo.com/zmckr </td>
            </tr>
            <tr>
                <td width="200" height="40"><span>QQ：</span></td>
                <td><input type="text" name="textfield" class="td" /></td>
            </tr>
            <tr>
                <td width="200" height="40"><span>微信号：</span></td>
                <td><input type="text" name="textfield" class="td" /></td>
            </tr>
            <tr>
                <td width="200" height="140"><span>个人身份证：</span></td>
                <td class="pro_a23_2"><a class="pro_a23_21"></a><a class="pro_a23_22"><input type="button" value="上传" /><br />请上传自己清晰的身份证扫描件！</a></td>
            </tr>
            <tr>
                <td height="60">&nbsp;</td>
                <td><div class="gagk_an">
                        <ul>
                            <li><input type="button" value="提交" />
                            </li>
                            <li><input type="button" value="重置" />
                            </li>
                        </ul>
                    </div></td>
            </tr>
        </table>
    </div>
</div>
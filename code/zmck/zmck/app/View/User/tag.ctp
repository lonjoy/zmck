<div class="mid" id="box_13">
    <div class="basic_infor_1">
        <div class="basic_infor_tx"><span><a href="#">上传头像</a></span><img src="<?php echo $dm['www'];?>img/basic_infor_1.jpg" /></div>
        <div class="basic_infor_zl"><h3>个人资料完整度 <a>70%</a></h3></div>
        <div class="basic_infor_zl"><img src="<?php echo $dm['www'];?>img/basic_infor_2.jpg" /></div>
        <div class="basic_infor_zl"><h3>所在位置：<select name="select" class="dd_13">
                    <option>北京</option>
                </select> <select name="select2" class="dd_13">
                    <option>北京</option>
                </select></h3></div>
        <div class="basic_infor_zl"><h3>允许哪些地方的合伙人联系我： <label>
                    <input type="radio" name="RadioGroup1" value="单选" />
                    只限本地        </label>
                <label>
                    <input type="radio" name="RadioGroup1" value="单选" />
                    外地也行        </label></h3></div>
    </div>
</div>


<div class="mid" id="box">
<div class="yhzx">
    <h3>个人中心</h3>
    <div class="yhzx_c">
        <ul>
            <li><a href="/user">基本资料</a></li>
            <li><a href="/user/detail">详细资料</a></li>
            <li><a href="/user/tag">我的标签</a></li>
            <li><a href="/user/state">创业状态</a></li>
            <li><a href="/user/background">创业背景</a></li>
            <li><a href="/user/auth">认证信息</a></li><br /><br /><br />
            <li><a href="/user/password">修改密码</a></li>
        </ul>
    </div>
</div>
<div class="gszy">
    <div class="title">
        <h3>我的标签</h3>
    </div>
    <div class="gsgk_bd">
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="70" height="40"></td>
                <td>
                    <div class="tag_2">
                        <ul>
                            <li class="tag_2_l"><a>电子商务</a><a href="#"><img src="<?php echo $dm['www'];?>img/tag_1.gif" /></a></li><li class="tag_2_l"><a>社交</a><a href="#"><img src="<?php echo $dm['www'];?>img/tag_1.gif" /></a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="70" height="40"></td>
                <td><input name="textfield" style="color:#ccc" value="回车增加一个标签" onfocus="if(this.value=='回车增加一个标签'){this.value=''};this.style.color='black';" onblur="if(this.value==''||this.value=='回车增加一个标签'){this.value='回车增加一个标签';this.style.color='#ccc';}" checked="checked" class="tag_dd" /></td>
            </tr>

            <tr>
                <td height="40">&nbsp;</td>
                <td class="tag_1"><input type="button" value="提交" />删除或添加标签完成后请点击提交！</td>
            </tr>
        </table>
    </div>
</div>

<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
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

<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>详细资料</h3>
    </div>
    <div class="gsgk_bd">
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="200" height="40"><span>关注领域：</span></td>
                <td><select name="industry" class="ly">
                        <option value="0">请选择</option>
                        <?php foreach($industry as $key=>$val){ ?>
                                <option value="<?php echo $val['id'];?>" <?php echo $userinfo['industry']==$val['id'] ? 'selected="selected"' : '';?>><?php echo $val['name']; ?></option>
                                <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td width="200" height="174"><span>个人简介：</span></td>
                <td><textarea name="textarea" class="srk"><?php echo $userinfo['intro'];?></textarea></td>
            </tr>
            <tr>
                <td width="200" height="184"><span>学习经历：</span></td>
                <td class="details_infor_1"><textarea name="textarea" class="srk"></textarea><br />请勿在个人简介中加入个人的联系方式(QQ或电话)</td>
            </tr>
            <tr>
                <td width="200" height="174"><span>工作经历：</span></td>
                <td><textarea name="textarea" class="srk"></textarea></td>
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

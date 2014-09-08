<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>详细资料</h3>
    </div>
    <div class="gsgk_bd">
        <form action="/user/detail" method="post" name="userdetail">
            <table width="750" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="200" height="40"><span>关注领域：</span></td>
                    <td><select name="industry_id" class="ly">
                            <option value="0">请选择</option>
                            <?php foreach($industry as $key=>$val){ ?>
                                <option value="<?php echo $val['id'];?>" <?php echo $userdetail['industry_id']==$val['id'] ? 'selected="selected"' : '';?>><?php echo $val['name']; ?></option>
                                <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <td width="200" height="174"><span>个人简介：</span></td>
                    <td><textarea name="intro" class="srk"><?php echo isset($userdetail['intro']) ? $userdetail['intro'] : '';?></textarea></td>
                </tr>
                <tr>
                    <td width="200" height="184"><span>学习经历：</span></td>
                    <td class="details_infor_1"><textarea name="study_experience" class="srk"><?php echo isset($userdetail['study_experience']) ? $userdetail['study_experience'] : '';?></textarea><br />请勿在个人简介中加入个人的联系方式(QQ或电话)</td>
                </tr>
                <tr>
                    <td width="200" height="174"><span>工作经历：</span></td>
                    <td><textarea name="work_experience" class="srk"><?php echo isset($userdetail['work_experience']) ? $userdetail['work_experience'] :'';?></textarea></td>
                </tr>


                <tr>
                    <td height="60">&nbsp;</td>
                    <td>
                        <div class="gagk_an">
                            <ul>
                                <li><input type="submit" value="提交" name="dosubmit" />
                                </li>
                                <li><input type="reset" value="重置" />
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

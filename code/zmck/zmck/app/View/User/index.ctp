<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>基本资料</h3>
    </div>
    <div class="gsgk_bd">
        <form action="/user/index" name="baseinfo" method="post" >
            <table width="750" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="200" height="40"><span>昵称：</span></td>
                    <td><input type="text" name="nickname" class="td" value="<?php echo $userinfo['nickname'];?>" /></td>
                </tr>
                <tr>
                    <td width="200" height="40"><span>姓名：</span></td>
                    <td><input type="text" name="name" class="td" value="<?php echo $userinfo['name'];?>"/></td>
                </tr>
                <tr>
                    <td width="200" height="40"><span>性别：</span></td>
                    <td>
                        <label>
                            <input type="radio" name="gender" value="1" <?php echo $userinfo['gender']==1 ? 'checked="checked"' : '';?>/>
                            男        </label>
                        <label>
                            <input type="radio" name="gender" value="2" <?php echo $userinfo['gender']==2 ? 'checked="checked"' : '';?>/>
                        女        </label>       </td>
                </tr>
                <tr>
                    <td width="200" height="40"><span>年龄区间：</span></td>
                    <td><select name="agerange" class="ly">
                            <option value="0">请选择年龄</option>
                            <?php foreach($age as $key=>$val){ ?>
                                <option value="<?php echo $key;?>" <?php echo $userinfo['agerange']==$key ? 'selected="selected"' : '';?>><?php echo $val; ?></option>
                                <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <td width="200" height="40"><span>工作年限：</span></td>
                    <td><select name="workyears" class="ly">
                            <?php foreach($workyears as $key=>$val){ ?>
                                <option value="<?php echo $key;?>" <?php echo $userinfo['workyears']==$key ? 'selected="selected"' : '';?>><?php echo $val; ?></option>
                                <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <td width="200" height="40"><span>个人定位：</span></td>
                    <td><select name="role" class="ly">
                            <?php foreach($roleList as $key=>$val){ ?>
                                <option value="<?php echo $val['id'];?>" <?php echo $userinfo['role']==$val['id'] ? 'selected="selected"' : '';?>><?php echo $val['name']; ?></option>
                                <?php } ?>
                        </select></td>
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
        </form>
    </div>
</div>


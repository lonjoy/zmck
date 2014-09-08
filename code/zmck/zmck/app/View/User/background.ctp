<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>创业背景</h3>
    </div>
    <div class="gsgk_bd">
        <form action="/user/background" method="post" name="backgroundform">
            <table width="750" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="200" height="40"><span>创业经验：</span></td>
                    <td><select name="startupExperience" class="ly">
                            <option value="0"></option>
                            <?php 
                                if($startupExperience){
                                    foreach($startupExperience as $key=>$val){
                                    ?>
                                    <option value="<?php echo $key;?>" <?php if($userInfo['startupExperience']==$key){echo 'selected="selected"';}?>><?php echo $val;?></option>
                                    <?php
                                    }
                                }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td width="200" height="40"><span>创业资金：</span></td>
                    <td><select name="startupMoney" class="ly">
                            <option value="0"></option>
                            <?php 
                                if($startupMoney){
                                    foreach($startupMoney as $key=>$val){
                                    ?>
                                    <option value="<?php echo $key;?>" <?php if($userInfo['startupMoney']==$key){echo 'selected="selected"';}?>><?php echo $val;?></option>
                                    <?php
                                    }
                                }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td width="200" height="40"><span>投入时间：</span></td>
                    <td><select name="spenttime" class="ly">
                            <option value="0"></option>
                            <?php 
                                if($spenttime){
                                    foreach($spenttime as $key=>$val){
                                    ?>
                                    <option value="<?php echo $key;?>" <?php if($userInfo['spenttime']==$key){echo 'selected="selected"';}?>><?php echo $val;?></option>
                                    <?php
                                    }
                                }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <td width="200" height="40"><span>创业地点：</span></td>
                    <td><p>
                            <?php
                                if($startupArea){
                                    foreach($startupArea as $key=>$val){
                                    ?>
                                    <label>
                                        <input type="radio" name="startupArea" value="<?php echo $key;?>" <?php if($userInfo['startupArea']==$key){echo 'checked="checked"';}?>/>
                                        <?php echo $val?>
                                    </label>
                                    <?php
                                    }
                                }
                            ?>
                            <br />
                        </p></td>
                </tr>

                <tr>
                    <td height="60">&nbsp;</td>
                    <td><div class="gagk_an">
                            <ul>
                                <li><input type="submit" value="提交" name="dosubmit"/>
                                </li>
                            </ul>
                        </div></td>
                </tr>
            </table>
        </form>
    </div>
</div>
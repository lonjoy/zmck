<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>创业状态</h3>
    </div>
    <div class="gsgk_bd">
    <form action="/user/state" method="post" name="stateform" >
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="200" height="40"><span>创业心态：</span></td>
                <td><select name="xintai" class="ly">
                        <?php 
                            if($xintai){
                                foreach($xintai as $key=>$val){
                                ?>
                                <option value="<?php echo $key;?>" <?php if($userInfo['xintai']==$key){echo 'selected="selected"';}?>><?php echo $val;?></option>
                                <?php
                                }
                            }
                        ?>
                    </select></td>
            </tr>

            <tr>
                <td width="200" height="40"><span>目前状态：</span></td>
                <td><select name="nowstatus" class="ly">
                        <option value="0">全部</option>
                        <?php 
                            if($nowstatus){
                                foreach($nowstatus as $key=>$val){
                                ?>
                                <option value="<?php echo $key;?>" <?php if($userInfo['nowstatus']==$key){echo 'selected="selected"';}?>><?php echo $val;?></option>
                                <?php
                                }
                            }
                        ?>
                    </select></td>
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

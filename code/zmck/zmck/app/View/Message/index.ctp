<div class="mid" id="box">
<?php echo $this->element('message_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>合伙人信息</h3>
    </div>
    <div class="care">
        <div class="care_1">发信人</div>
        <div class="care_2">内容</div>
        <div class="care_3">操作</div>
    </div>
    <div class="care_2_1">
        <ul>
            <?php 
                if(!empty($data)){ 
                    foreach($data as $val){
                    ?>
                    <li>
                        <table>
                            <tr>
                                <td class="care_11"><a target="_blank" href="/partner/detail?id=<?php echo $val['fromuser_id'];?>"><img src="<?php echo Url::getUserPic(array('uid'=>$val['fromuser_id'], 'tp'=>'b'));?>" width="50" height="50"/></a><br /><a href="#"><?php echo $val['userinfo']['nickname'];?></a></td>
                                <td class="care_22"><?php echo $val['message']?></td>
                                <td class="care_33">
                                <input type="button" value="查看" onclick="window.location.href='<?php echo $dm['www']?>partner/interview?user_id=<?php echo $val['fromuser_id'];?>'" />
                                <!--<input type="button" value="屏蔽" />-->
                                </td>
                            </tr>
                        </table>
                    </li>
                    <?php
                    }
                }
            ?>
        </ul>
    </div>
</div>

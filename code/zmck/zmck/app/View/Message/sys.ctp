<div class="mid" id="box">
<?php echo $this->element('message_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>系统信息</h3>
    </div>
    <div class="care">
        
        <div class="care_2">标题</div>
        <div class="care_1">时间</div>
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
                                <td class="care_22"><?php echo mb_substr($val['title'], 0, 30);?></td>
                                <td class="care_11"><?php echo date('Y-m-d H:i:s', $val['ctime']);?></td>
                                <td class="care_33"><input type="button" value="查看" /></td>
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

<div class="box">
    <div class="title">
        <h3>用户评价</h3>
    <span class="wysjj"><a href="javascript:;" onclick="showsay();">我也说几句</a></span>  </div>
    <div class="yhpj">
        <?php foreach($user_comment as $val){ ?>
            <div class="yhpj_list">
                <dl>
                    <dt><img src="<?php echo Url::getUserPic(array('uid'=>$val['user_id'], 'tp'=>'b'));?>" width="50" height="50" /></dt>
                    <dd><?php echo $val['comment'];?></dd>
                </dl>
                <div class="yhpj_mc_sj">
                    <ul>
                        <li class="bg1"><?php echo $val['user']['nickname'];?></li>
                        <li class="bg2"><?php echo date('Y-m-d i:s', $val['ctime']);?></li>
                    </ul>
                </div>
            </div>
            <?php } ?>
        <!--
        <div class="yhpj_an">
        <ul>
        <li><a href="#">上一页</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">下一页</a></li>
        </ul>
        <div class="clear"></div>
        </div>
        -->
    </div>
</div>
<?php
    if(!empty($hot_topic)){
    ?>
    <div class="box">
        <div class="title">
            <h3>热门话题</h3>
        </div>
        <div class="huati">
            <?php 
                foreach($hot_topic as $val){
                ?>
                <div class="ht_list">
                    <dl>
                        <dt><img src="<?php echo $dm['www'];?>img/tx.gif" width="50" height="50" /></dt>
                        <dd><h3><a href="#"><?php echo $val['author'];?></a></h3>
                            <div class="ht_list_c"><?php echo mb_substr($val['content'],0,10);?></div>
                            <div class="ht_list_sj">
                                <ul>
                                    <li class="bg1"><?php echo date('Y-m-d', $val['ctime']);?></li>
                                    <li class="bg2"><?php echo date('Y-m-d', $val['replytime']);?></li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <div class="clear"></div>
                </div>
                <?php
                }
            ?>
            <div class="clear"></div>
        </div>
    </div>
    <?php
    }
?>
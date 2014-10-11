<div class="mid" id="box">
    <div class="con_l">
        <div class="box">

            <div class="title">
                <h3>创业圈</h3>
                <div class="title_circle5">
                    <!--<a class="btn btn-large theme-login"  href="javascript:;">创建新圈子</a>-->
                </div>
            </div>

            <div class="circle5">
                <ul>
                    <?php 
                        if(!empty($data)){ 
                            foreach($data as $val){    
                            ?>
                            <li>
                                <div class="circle5_1"><a href="/bbs/subject?fid=<?php echo $val['id'];?>"><img src="<?php echo Url::getForum($val['id']);?>" width="57" height="57"/></a></div>
                                <div class="circle5_2"><a href="/bbs/subject?fid=<?php echo $val['id'];?>"><?php echo $val['name'];?></a><br /><img src="<?php echo $dm['www'];?>img/circle5_2.gif" /><?php echo $val['posts'];?> 个话题</div>
                                <div class="circle5_3"><?php echo $val['desc'];?></div>
                            </li>
                            <?php 
                            }
                        }
                    ?>
                </ul>
            </div>

            <div class="clear"></div>
        </div>
    </div>



    <div class="con_r">
        <?php 
            if(!empty($userInfo)){
                echo $this->element('user_block');
            }
            echo $this->element('hot_topic'); 
        ?>
    </div>
</div>

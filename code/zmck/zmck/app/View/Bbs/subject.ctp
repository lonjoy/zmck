<div class="mid" id="box">
    <div class="con_l box">
        <div class="quan_t">
            <div class="quan_t_l">
                <a href="/bbs/subject?fid=<?php echo $fid;?>&order=time">默认</a> | 
                <a href="/bbs/subject?fid=<?php echo $fid;?>&order=time">最新</a> | 
                <a href="/bbs/subject?fid=<?php echo $fid;?>&order=hot">最热</a> | 
                <a href="/bbs/subject?fid=<?php echo $fid;?>&order=jinghua">精华</a></div>
            <!--
            <form action="/bbs/searchposts" method="post" name="searchpostsforum">
            <div class="quan_t_c">
            <div class="quan_s1">
            <input type="text" name="textfield" />
            </div>
            <div class="quan_s2">
            <input type="submit" name="Submit" value=" " />
            </div>
            </div>
            </form>
            -->
            <div class="quan_sx">
                <ul>
                    <li></li><!--<li><a href="#">刷新</a></li>-->
                    <li><a class="btn btn-primary btn-large publish_post"  href="javascript:;">发话题</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="q_ht_t">
            <div class="q_t1">话题标题</div>
            <div class="q_t2">作者</div>
            <div class="q_t2">点击</div>
            <div class="q_t2">回复</div>
            <div class="q_t3">回复时间</div>
        </div>
        <div class="q_ht_c">
            <?php 
                if(!empty($data)){ 
                    foreach($data as $val){
                    ?>
                    <div class="q_c">
                        <div class="q_c1"><a href="/bbs/threads?fid=<?php echo $fid;?>&pid=<?php echo $val['pid'];?>"><?php echo mb_substr($val['subject'], 0, 30);?></a></div>
                        <div class="q_c2"><?php echo $val['author'];?></div>
                        <div class="q_c2"><?php echo $val['clicknum'];?></div>
                        <div class="q_c2"><?php echo $val['replynum'];?></div>
                        <div class="q_c3"><?php echo $val['replytime']?date('H:i',$val['replytime']):'';?></div>
                        <div class="clear"></div>
                    </div>
                    <?php
                    }
                }
            ?>
        </div>
        <div class="fy">
            <div class="fy_r">
                <ul>
                    <?php echo $pagehtml;?>
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

<div class="theme-popover-p">
    <div class="theme-poptit-p">
        <a href="javascript:;" title="关闭" class="close"><img src="<?php echo $dm['www'];?>img/ring_1.gif" /></a>
        <h3>发话题</h3>
    </div>
    <form action="/bbs/publish" name="subjectform" method="post">
        <input type="hidden" name="fid" value="<?php echo $fid;?>" />
        <div class="tangc">
            <h3>标题</h3>
            <div class="tangc_c2">
                <input name="subject" type="text" />
            </div>
            <h3>内容</h3>
            <div>
                <div class="tangc_c">
                    <div class="tangc_c_t">
                        <ul>
                            <li><a href="#" class="bg1_12">表情</a></li>
                            <li><a href="#" class="bg2_12">图片</a></li>
                        </ul>
                    </div>
                    <div class="tangc_c_c">
                        <textarea name="content" class="tangc_c_c_sr"></textarea>
                    </div>
                </div>
                <div class="tangc_tj">
                    <input type="submit" value="发表" name="dosubmit"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置" />
                </div>
            </div>
        </div>
    </form>
</div>
<div class="theme-popover-mask-p"></div>
<script>
    jQuery(document).ready(function($) {
        $('.publish_post').click(function(){
            $('.theme-popover-mask-p').fadeIn(100);
            $('.theme-popover-p').slideDown(200);
        })
        $('.theme-poptit-p .close').click(function(){
            $('.theme-popover-mask').fadeOut(100);
            $('.theme-popover').slideUp(200);
        })

    })
    </script>
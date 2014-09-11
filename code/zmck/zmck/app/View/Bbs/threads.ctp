<div class="mid" id="box">
    <div class="con_l">
        <div class="box">
            <div class="title">
                <h3 style=" font-size:16px;"><?php echo $postinfo['subject'];?></h3>
                <div class="tz_title">
                    <ul>
                        <li><a href="/bbs/viewthread?tid=<?php echo 1;?>&author_id=<?php echo $postinfo['userinfo']['id']; ?>">只看楼主</a></li>
                        <li><a href="#">收藏</a></li>
                        <li><a href="#replyform">回复</a></li>
                    </ul>
                </div>
            </div>
            <div class="tz_c">
                <div class="tz_list">
                    <div class="tz_list_tx">
                        <div class="tz_tx_img"><img src="<?php echo $postinfo['userinfo']['avater'];?>" width="125" height="125" /></div>
                        <div class="tz_tx_bt"><?php echo isset($postinfo['userinfo']['nickname'])?$postinfo['userinfo']['nickname']:'';?></div>
                        <div class="tz_tx_gz"><a href="#" class="bg">关注</a><a href="#">发信息</a></div>
                    </div>
                    <div class="ht_nr">
                        <div class="ht_nr_c"><?php echo $postinfo['content'];?></div>
                        <div class="ht_nr_lz">
                            <div class="ht_nr_lz_c">
                                <div class="ht_nr_lz_c1"><a href="#">楼主</a></div>
                                <div class="ht_nr_lz_c3"><?php echo date('Y-m-d H:i', $postinfo['ctime']);?></div>
                                <div class="ht_nr_lz_c4"><a href="#replyform">回复&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php 
                    if(!empty($reply_list)){ 
                        foreach($reply_list as $val){    
                        ?>
                        <div class="tz_list">
                            <div class="tz_list_tx">
                                <div class="tz_tx_img"><img src="<?php echo $val['userinfo']['avater'];?>" width="125" height="125" /></div>
                                <div class="tz_tx_bt"><?php echo isset($postinfo['userinfo']['nickname'])?$postinfo['userinfo']['nickname']:'';?></div>
                                <div class="tz_tx_gz"><a href="javascript:void(0);" class="bg" onclick="followme(<?php echo $val['userinfo']['id'];?>);">关注</a><a href="#">发信息</a></div>
                            </div>
                            <div class="ht_nr">
                                <div class="ht_nr_c"><?php echo $val['content'];?></div>
                                <div class="ht_nr_lz">
                                    <div class="ht_nr_lz_c">
                                        <div class="ht_nr_lz_c1"><a href="#">楼主</a></div>
                                        <?php if($val['floor']!=0){ ?>
                                            <div class="ht_nr_lz_c2">1楼</div>
                                            <?php } ?>
                                        <div class="ht_nr_lz_c3"><?php echo date('Y-m-d H:i', $val['ctime']);?></div>
                                        <div class="ht_nr_lz_c4"><a href="#replyform">回复&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
                                    </div>
                                </div>
                                <!--
                                <div class="ht_hf">
                                <div class="ht_hf1">
                                <div class="ht_hf1_sj"></div>
                                <div>
                                <textarea name="textarea" class="ht_hf1_srk"></textarea>
                                </div>
                                <div style="padding-top:10px;">
                                <input type="submit" name="Submit" value="提交" class="ht_hf1_an" />
                                <div class="clear"></div>
                                </div>
                                </div>
                                <div class="ht_hfr">
                                <div class="ht_hfr_tx"><img src="../images/tx.gif" width="50" height="50" /></div>
                                <div class="ht_hfr_c">
                                <div class="ht_hfr_c1"><span>心路：</span>回复 奋斗者 : 哈哈哈哈哈哈哈！</div>
                                <div class="ht_hfr_c2">2014-06-10  15：53  <a href="#">回复</a></div>
                                </div>
                                <div class="clear"></div>
                                </div>
                                <div class="ht_hfr">
                                <div class="ht_hfr_tx"><img src="../images/tx.gif" width="50" height="50" /></div>
                                <div class="ht_hfr_c">
                                <div class="ht_hfr_c1"><span>心路：</span>回复 奋斗者 : 哈哈哈哈哈哈哈！</div>
                                <div class="ht_hfr_c2">2014-06-10  15：53 <a href="#">回复</a></div>
                                </div>
                                <div class="clear"></div>
                                </div>
                                </div>
                                -->
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        }
                    }
                ?>
                <!--<div class="tz_list" style="background:#fbfbfb;">
                <div class="tz_list_tx">
                <div class="tz_tx_img"><img src="../images/tx.gif" width="125" height="125" /></div>
                <div class="tz_tx_bt">奋斗者</div>
                <div class="tz_tx_gz"><a href="#" class="bg">关注</a><a href="#">发信息</a></div>
                </div>
                <div class="ht_nr">
                <div class="ht_nr_c">创业初期，是团队人员能力重要，还是价值观重要？你是怎么认为的呢！我
                认为价值观比较重要，他取决于创业的持续性！</div>
                <div class="ht_nr_lz">
                <div class="ht_nr_lz_c">
                <div class="ht_nr_lz_c1">楼主</div>
                <div class="ht_nr_lz_c2">1楼</div>
                <div class="ht_nr_lz_c3">2014-06-10   15：38</div>
                <div class="ht_nr_lz_c4"><a href="#">回复（2）</a></div>
                </div>
                </div>
                </div>
                <div class="clear"></div>
                </div>-->
                <div class="fy">
                    <div class="fy_r">
                        <ul>
                            <?php echo $pagehtml;?>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <form action="/bbs/reply" method="post" name="replyform">
                    <input type="hidden" name="subject" value="<?php echo $postinfo['subject'];?>">
                    <input type="hidden" name="fid" value="<?php echo $postinfo['fid'];?>">
                    <input type="hidden" name="pid" value="<?php echo $postinfo['pid'];?>">
                    <div class="fbhf" id="replyform">
                        <h3>发表回复</h3>
                        <div>
                            <div class="fbhf_c">
                                <div class="fbhf_c_t">
                                    <ul>
                                        <li><a href="#" class="bg1">表情</a></li>
                                        <li><a href="#" class="bg2">图片</a></li>
                                    </ul>
                                </div>
                                <div class="fbhf_c_c">
                                    <textarea name="content" class="fbhf_c_c_sr"></textarea>
                                </div>
                            </div>
                            <div class="fbhf_tj">
                                <input type="submit" value="回复" name="dosubmit"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
<script type="text/javascript">
    function followme(uid){
        $.ajax({
            url:'/follow/ajaxcare',
            type: 'POST',
            data: "follower_id="+uid,
            dataType: 'json',
            success: function(data){
                if(data.errCode=='0'){
                    $('#care_'+uid).html('<span>已关注</span>');
                }
                alert(data.msg)
            }
        });
    }
</script>
<div class="mid" id="box">
    <div class="con_l">
        <div class="hhr_js">
            <div class="tz_list_tx">
                <div class="tz_tx_img"><img src="<?php echo Url::getUserPic(array('uid'=>$user_info['id'], 'tp'=>'b'));?>" width="125" height="125" /></div>
                <div class="tz_tx_gz"><a href="javascript:;" onclick="followme(<?php echo $user_info['id'];?>);">关注</a><a href="/partner/interview?user_id=<?php echo $user_info['id'];?>">约谈</a></div>
            </div>
            <div class="hhr_xq">
                <div class="hhr_hr_mc"><h3><?php echo isset($user_info['nickname'])?$user_info['nickname']:'';?></h3>
                    <?php if($user_info['status']){ ?>
                        <span><a href="#">在线</a></span>
                        <?php } ?>
                </div>
                <div class="xq_dj_xm">
                    <div class="xq_dj"><h3>80%&nbsp;&nbsp;靠谱</h3></div>
                    <div class="xq_xm">有项目 - 已在全职创业</div>
                </div>
                <div class="xq_cydw">
                    <h3 class="bg1">创业定位：</h3>
                    <div class="xq_cydw_c"><?php echo isset($user_info['role']) && $user_info['role']!=0 && !empty($roleRs)?$roleRs[$user_info['role']]:'未填';?></div>

                </div>
                <!--
                <div class="xq_cydw">
                <h3 class="bg2">回复率：</h3>
                <div class="xq_cydw_c">100%</div>
                </div>
                -->
                <div class="xq_bq">
                    <h3>个人标签<span class="bg2">：</span></h3>
                    <div class="xq_bg_c">
                        <?php 

                            if(!empty($user_tags)){
                                $ts = unserialize($user_tags['tags']);
                                foreach($ts as $vt){
                                ?>
                                <a href="#"><?php echo $vt;?></a> | 
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box hhrjs">
            <div class="title">
                <h3>他的资料</h3>
                <?php if(empty($user_comment)){ ?><span class="wysjj"><a href="javascript:;" onclick="showsay();">我也说几句</a></span><?php } ?>
            </div>
            <div class="tdzl">
                <div class="tdzl_div">
                    <h3>年龄：</h3>
                    <div class="tdzl_div_c"><?php echo isset($user_info['agerange'])&&$user_info['agerange']!=0?$age[$user_info['agerange']]:'未填';?></div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>关注领域：</h3>
                    <div class="tdzl_div_c"><?php echo isset($user_info['industry']) && $user_info['industry']!=0 && !empty($industryRs)?$industryRs[$user_info['industry']]:'未填';?></div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>个人简介：</h3>
                    <div class="tdzl_div_c"><?php echo isset($user_info['intro'])?'<pre style="word-wrap:break-word">'.$user_info['intro'].'</pre>':'未填';?></div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>学习经历：</h3>
                    <div class="tdzl_div_c"><?php echo isset($user_info['study_experience'])?'<pre style="word-wrap:break-word">'.$user_info['study_experience'].'</pre>':'';?></div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>工作经历：</h3>
                    <div class="tdzl_div_c"><?php echo isset($user_info['work_experience'])?'<pre style="word-wrap:break-word">'.$user_info['work_experience'].'</pre>':'';?></div>
                    <div class="clear"></div>
                </div>
            </div>
            <?php if(!empty($hisProject)){ ?>
                <div class="title" style="BORDER-TOP:solid 2PX #4cbbd9;">
                    <h3>他的项目</h3>
                </div>
                <?php foreach($hisProject as $val){ ?>
                    <div class="tdzl">
                        <div class="tdzl_div">
                            <h3>项目名称：</h3>
                            <div class="tdzl_div_c"><?php echo $val['name'];?></div>
                            <div class="clear"></div>
                        </div>
                        <div class="tdzl_div">
                            <h3>项目方向：</h3>
                            <div class="tdzl_div_c"><?php echo $val['name'];?></div>
                            <div class="clear"></div>
                        </div>
                        <div class="tdzl_div">
                            <h3>项目简介：</h3>
                            <div class="tdzl_div_c"><?php echo $val['brief'];?></div>
                            <div class="clear"></div>
                        </div>
                        <div class="tdzl_div">
                            <h3>项目优势：</h3>
                            <div class="tdzl_div_c"><?php echo $val['advantage'];?></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <?php }} ?>
        </div>
        <!--
        <div class="box">
        <div class="title">
        <h3>同类合伙人</h3>
        </div>
        <div class="tlhhr">
        <dl>
        <dt><img src="../images/tx.gif" width="100" height="100" /></dt>
        <dd>情侣玻璃人</dd>
        </dl>
        <dl>
        <dt><img src="../images/tx.gif" width="100" height="100" /></dt>
        <dd>情侣玻璃人</dd>
        </dl>
        <dl>
        <dt><img src="../images/tx.gif" width="100" height="100" /></dt>
        <dd>情侣玻璃人</dd>
        </dl>
        <dl>
        <dt><img src="../images/tx.gif" width="100" height="100" /></dt>
        <dd>情侣玻璃人</dd>
        </dl>
        <dl style="margin-right:0;">
        <dt><img src="../images/tx.gif" width="100" height="100" /></dt>
        <dd>情侣玻璃人</dd>
        </dl>
        <div class="clear"></div>
        </div>
        </div>
        -->
    </div>

    <div class="con_r">
        <?php if(!empty($surveyData)){ ?>
            <div class="box cywd">
                <div class="title">
                    <h3>创业问答</h3>
                </div>
                <div class="cywd_c"><?php echo isset($surveyData['content'])?$surveyData['content']:'';?></div>
            </div>
            <?php } ?>

        <?php 
            if(!empty($user_comment)){
                echo $this->element('user_comment');
            } 
        ?>       
    </div>
</div>
<!--comment-->
<div style="z-index:9999;position:fixed;top:40%;left:50%;width:660px;height:auto;margin:-180px 0 0 -330px;border-radius:5px;border:solid 2px #666;background-color:#fff;display:none;box-shadow: 0 0 10px #666;" id="user_comment">
    <div class="theme-poptit">
        <a href="javascript:;" title="关闭" class="close"><img src="<?php echo $dm['www'];?>img/ring_1.gif" /></a>
        <h3>评价</h3>
    </div>
    <div class="tangc" style="text-align: center;">
        <form action="/partner/addcomment" method="post" >
            <input type="hidden" value="<?php echo $user_info['id'];?>" name="touser_id"/>
            <textarea class="tangc_c_c_sr" style="border: 1px #e9e9e9 solid;" name="content"></textarea>
            <div class="tangc_tj">
                <input type="submit" value="提交" class="">
            </div>
        </form>
    </div>
</div>
<div class="theme-popover-mask"></div>
<!--wexinend-->
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
    function showsay(){
        $('#user_comment').show();
        $('#user_comment .close').live('click', function(){
            $('#user_comment').hide();
        });
    }
</script>
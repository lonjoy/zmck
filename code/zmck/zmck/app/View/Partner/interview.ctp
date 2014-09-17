<div class="mid" id="box">
    <div class="con_l">
        <div class="box">
            <div class="title">
                <h3>对话</h3>
                <!--
                <div class="title_circle5">
                <a class="btn btn-large theme-login"  href="javascript:;">我要约见</a>
                </div>
                -->
            </div>
            <div>
                <div class="duihua">
                    <div class="dh_jj">
                        <div class="dh_jj_l">
                            <div class="dh_jj_tx">
                                <dl>
                                    <dt><img src="<?php echo Url::getUserPic(array('uid'=>$user_info['id'], 'tp'=>'b'));?>" width="90" height="90"/></dt>
                                    <dd><a href="javascript:;" onclick="followme(<?php echo $user_info['id'];?>)" class="bg">关注</a></dd>
                                </dl>
                            </div>
                            <div class="dh_jj_nr">
                                <div class="dh_jj_mc">
                                    <h3><?php echo isset($user_info['nickname'])?$user_info['nickname']:'';?></h3>
                                    <?php if($user_info['online']){ ?>
                                        <span><a href="javascript:;">在线</a></span>
                                        <?php } ?>
                                </div>
                                <div class="dh_jj_xm">有项目 - 已在全职创业</div>
                                <div class="dh_jj_dw"><span>创业定位：</span><?php echo isset($user_info['role']) && $user_info['role']!=0 && !empty($roleRs)?$roleRs[$user_info['role']]:'未填';?></div>
                            </div>
                        </div>
                        <div class="dh_jj_r"><?php echo !empty($user_info['intro'])?'<pre style="word-wrap:break-word">'.mb_substr($user_info['intro'],0,10).'...</pre>':'';?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="dh_c">
                        <?php 
                            if(!empty($message)){ 
                                foreach($message as $val){
                                ?>
                                <div class="dh_c_list">
                                    <div class="dh_div<?php echo $userInfo['id']==$val['fromuser_id']?1:2;?>">
                                        <?php if($userInfo['id']==$val['fromuser_id']){ ?>
                                            <div class="dh_wz">
                                                <div class="dh_wz_sjx<?php echo $userInfo['id']==$val['fromuser_id']?'':2;?>"></div>
                                                <h3><?php echo date('m月n日 H:i', $val['ctime']);?></h3>
                                                <div class="dh_wz_c"><?php echo $val['message'];?></div>
                                            </div>
                                            <div class="dh_tx"><img src="<?php echo Url::getUserPic(array('uid'=>$val['fromuser_id'], 'tp'=>'b'));?>" width="50" height="50" /></div>
                                            <?php }else{ ?>
                                            <div class="dh_tx2"><img src="<?php echo Url::getUserPic(array('uid'=>$val['fromuser_id'], 'tp'=>'b'));?>" width="50" height="50" /></div>
                                            <div class="dh_wz">
                                                <div class="dh_wz_sjx<?php echo $userInfo['id']==$val['fromuser_id']?'':2;?>"></div>
                                                <h3><?php echo date('m月n日 H:i', $val['ctime']);?></h3>
                                                <div class="dh_wz_c"><?php echo $val['message'];?></div>
                                            </div>
                                            <?php } ?>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <?php 
                                }
                            }
                        ?>
                        <!--
                        <div class="dh_c_list">
                        <div class="dh_div2"><div class="dh_tx2"><img src="../images/tx.gif" width="50" height="50" /></div>
                        <div class="dh_wz">
                        <div class="dh_wz_sjx2"></div>
                        <h3>6月14日  20：00</h3>
                        <div class="dh_wz_c">您好！我这有个项目找PHP技术合伙人，不知道有
                        没有兴趣聊下。</div>
                        </div>

                        </div>
                        <div class="clear"></div>
                        </div>
                        -->
                        <div class="clear"></div>
                    </div>
                    <div class="hf">
                        <div class="hf1">
                            <textarea name="message" id="message"></textarea>
                        </div>
                        <div class="hf2">
                            <input type="button" value="回复" onclick="submitmessage(<?php echo $user_info['id'];?>);" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="重置" />
                        </div>
                    </div>
                </div>
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


<div class="theme-popover">
    <div class="theme-poptit">
        <a href="javascript:;" title="关闭" class="close"><img src="####" /></a>
        <h3>约见</h3>
    </div>
    <div class="yuejian">
        <div class="yuejian_1">咖啡馆名称</div>
        <div class="yuejian_2">地点</div>
        <div class="yuejian_3">联系人</div>
        <div class="yuejian_4">联系电话</div>
    </div>
    <div class="yuejian2">
        <ul>
            <li>
                <table>
                    <tr>
                        <td class="yuejian2_1"><input name="Input" type="checkbox" value="" />厘苏咖啡西安徐家湾店</td>
                        <td class="yuejian2_2">西安未央凤城十路</td>
                        <td class="yuejian2_3">王先生</td>
                        <td class="yuejian2_4">13571245654</td>
                    </tr>
                </table>
            </li>
        </ul>
    </div>
    <div class="yuej3">
        <ul>
            <li><input type="button" value="提交" />
            </li>
        </ul>
    </div>
</div>
<div class="clear"></div>
</div>
<div class="theme-popover-mask"></div>
<script>
    jQuery(document).ready(function($) {
        $('.theme-login').click(function(){
            $('.theme-popover-mask').fadeIn(100);
            $('.theme-popover').slideDown(200);
        })
        $('.theme-poptit .close').click(function(){
            $('.theme-popover-mask').fadeOut(100);
            $('.theme-popover').slideUp(200);
        })

    })
    function submitmessage(touid){
        var message=$('#message').val();
        $.ajax({
            url:'/partner/ajaxinterview',
            type: 'POST',
            data: "touser_id="+touid+"&fromuser_id=<?php echo $userInfo['id'];?>&message="+message,
            dataType: 'json',
            success: function(data){
                var m='';
                if(data.errCode=='0'){
                    m+='<div class="dh_c_list">';
                    m+='<div class="dh_div1">';
                    m+='<div class="dh_wz">';
                    m+='<div class="dh_wz_sjx"></div>';
                    m+='<h3>'+data.msg.ctime+'</h3>';
                    m+='<div class="dh_wz_c">'+data.msg.message+'</div>';
                    m+='</div>';
                    m+='<div class="dh_tx"><img src="'+data.msg.avater+'" width="50" height="50" /></div>';
                    m+='</div>';
                    m+='<div class="clear"></div>';
                    m+='</div>';
                }
                $('.dh_c').append(m);
                $('#message').val('');
            }
        }); 
    }
</script>
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
<div class="mid" id="box">
    <div class="con_l">
        <div class="search">
            <div class="ssk">
                <form action="/partner" method="get" onsubmit="return checkform();">
                    <div class="s1">
                        <input name="searchname" type="text" id="searchname"/>
                    </div>
                    <div class="s2">
                        <input type="submit"  value="提交" />
                    </div>
                </form>
            </div>
            <div class="sx">
                <?php if(!empty($roleList)){ ?>
                    <div class="hhr_dw">
                        <h3 class="bg">条件:</h3>
                        <ul>
                            <?php foreach($roleList as $val){ ?>
                                <li><a href="javascript:;" onclick="selectp('prole', <?php echo $val['id'];?>)"><?php echo $val['name'];?></a></li>
                                <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                <div class="sx_tt">
                    <h3 class="bg">条件:</h3>
                    <ul>
                        <li><select name="" class="xl"  onchange="selectp('ta', this.value);">
                                <option value="0">地理位置</option>
                                <?php 
                                    if(!empty($arealist)){
                                        foreach($arealist as $area){
                                            $str = '<option value="'.$area['id'].'" ';
                                            if($ta==$area['id']){
                                                $str .= 'selected="selected"';
                                            }
                                            $str .= '>'.$area['name'].'</option>';
                                            echo $str;
                                        }
                                    }
                                ?>
                            </select></li>
                        <!--
                        <li><select name="" class="xl">
                        <option>方向</option>
                        </select>
                        </li>
                        -->
                        <li><select name="xintai" class="xl" onchange="selectp('xt',this.value);">
                                <option value="0">心态</option>
                                <?php 
                                    if(!empty($xintai)){
                                        foreach($xintai as $key=>$val){
                                            $str = '<option value="'.$key.'" ';
                                            if($xt==$key){
                                                $str .= 'selected="selected"';
                                            }
                                            $str .= '>'.$val.'</option>';
                                            echo $str;
                                        }
                                    }
                                ?>
                            </select></li>
                        <li><select name="" class="xl" onchange="selectp('ts', this.value);">
                                <option value="0">状态</option>
                                <?php 
                                    if(!empty($nowstatus)){
                                        foreach($nowstatus as $key=>$val){
                                            $str = '<option value="'.$key.'" ';
                                            if($ts==$key){
                                                $str .= 'selected="selected"';
                                            }
                                            $str .='>'.$val.'</option>';
                                            echo $str;
                                        }
                                    }
                                ?>
                            </select></li>
                        <li>
                            <select name="" class="xl" onchange="selectp('tage', this.value);">
                                <option value="0">年龄</option>
                                <?php 
                                    if(!empty($age)){
                                        foreach($age as $key=>$val){
                                            $str = '<option value="'.$key.'" ';
                                            if($tage==$key){
                                                $str .= 'selected="selected"';
                                            }
                                            $str .= '>'.$val.'</option>';
                                            echo $str;
                                        }
                                    }
                                ?>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="title">
                <h3>合伙人</h3>
                <div class="hhr_sx">
                    <ul>
                        <li><input name="" type="checkbox" value="" />当前在线</li>
                        <li><input name="" type="checkbox" value="" />有项目</li>
                        <!--<li><input name="" type="checkbox" value="" />回复率</li>
                        <li><input name="" type="checkbox" value="" />用户等级</li>-->
                        <li><input name="" type="checkbox" value="" />认证用户 </li>
                        <li><input name="" type="checkbox" value="" />最新注册</li>
                        <!--<li><input name="" type="checkbox" value="" />信息完善</li>-->
                    </ul>
                </div>
            </div>
            <?php 
                if(!empty($userList)){
                    foreach($userList as $val){
                    ?>
                    <div class="hhr">
                        <div class="hhr_c">
                            <div class="hhr_tx">
                                <dl><dt><a href="/partner/detail?id=<?php echo $val['id'];?>"><img src="<?php echo Url::getUserPic(array('uid'=>$val['id'], 'tp'=>'b'));?>" width="90" height="90" /></a></dt><!--<dd>北京-海淀区</dd>-->
                                </dl>
                            </div>
                            <div class="hhr_nr">
                                <div class="hhr_hr_mc">
                                    <h3><a href="/partner/detail?id=<?php echo $val['id'];?>"><?php echo isset($val['nickname'])?$val['nickname'].'-':'';?><?php echo isset($val['rolename'])?$val['rolename'].'-':'';?><?php echo isset($val['xintai']) && $val['xintai']!=0?$xintai[$val['xintai']]:'';?></a></h3>
                                    <span><a href="#">在线</a></span>
                                </div>
                                <div class="hhr_hr_dj"><h3>80%&nbsp;&nbsp;靠谱</h3></div>
                                <div class="hhr_hr_bq">
                                    <?php 

                                        if(!empty($val['tags']['tags'])){
                                            $ts = unserialize($val['tags']['tags']);
                                            foreach($ts as $vt){
                                            ?>
                                            <span href="#"><?php echo $vt;?></span> | 
                                            <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="hhr_hr_ms"><?php echo isset($val['detail_info']['intro'])?$val['detail_info']['intro']:'';?></div>
                            </div>
                            <div class="hhr_ty">
                                <ul>
                                    <li><a href="/partner/interview?user_id=<?php echo $val['id'];?>">约谈</a></li>
                                    <li id="care_<?php echo $val['id'];?>"><a href="javascript:void(0);" onclick="followme(<?php echo $val['id'];?>);">关注</a></li>
                                    <!--<li><a href="#">屏蔽</a></li>-->
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <?php
                    }
                }
            ?>

            <div class="fy">
                <!--
                <div class="fy_l">每页显示：  
                <select name="select" class="venture_1">
                <option>10</option>
                </select>
                </div>
                -->
                <div class="fy_r">
                    <ul>
                        <?php echo $pagehtml;?>
                    </ul>
                    <!-- <span>跳转到&nbsp;&nbsp;<input name="" type="text" />&nbsp;&nbsp;页</span>-->
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>



    <div class="con_r">
        <?php 
            if(!empty($userInfo)){
                echo $this->element('user_block');
            } 
            echo $this->element('recommend_partner');
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
    function selectp(t, val){
        var url = window.location.href;
        var tag = url.indexOf('?')=='-1' ? '?' : '&';
        var params='';
        if(tag=='&'){
            var params=url.substring(parseInt(url.indexOf('?'))+1);
            var position_url=url.substring(0,parseInt(url.indexOf('?')))
        }else{
            var position_url=url;
        }
        var p=params.split('&');
        var j=0;
        for(i in p){
            v=p[i].split('=');
            if(t==v[0]){
                v[1]=val;
                p[i] = t+'='+val;
                j=1;
            }
        }
        if(j==0){
            var s=t+'='+val;
            p.push(s);
        }
        if(tag=='?'){
            url = position_url+'?'+p.join('');
        }else{
            url = position_url+'?'+p.join('&');
        }
        window.location.href=url;
    }
    function checkform(){
        if($('#searchname').val().trim()==''){
            alert('请输入关键词进行搜索');
            return false;
        }
        return true;
    }

    function in_array(stringToSearch, arrayToSearch) {
        for (s = 0; s < arrayToSearch.length; s++) {
            thisEntry = arrayToSearch[s].toString();
            if (thisEntry == stringToSearch) {
                return true;
            }
        }
        return false;
    }

</script>


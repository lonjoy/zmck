<div class="mid" id="box">
<div class="yhzx">
    <h3>我的联系人</h3>
    <div class="yhzx_c">
        <ul>
            <li><a href="/follow/">我关注的合伙人</a></li>
            <!--<li><a href="/follow/company">我关注的公司</a></li>-->
            <li><a href="/follow/care" class="on">关注我的合伙人</a></li>
        </ul>
    </div>
</div>
<div class="gszy">
    <div class="title">
        <h3>关注我的合伙人</h3>
        <!--
        <div class="fartner_1">
        <ul>
        <li>
        <input name="textfield" style="color:#ccc" value="输入公司名或关键词搜索联系人" onfocus="if(this.value=='输入公司名或关键词搜索联系人'){this.value=''};this.style.color='black';" onblur="if(this.value==''||this.value=='输入公司名或关键词搜索联系人'){this.value='输入公司名或关键词搜索联系人';this.style.color='#ccc';}" checked="checked" /><a href="#"><img src="<?php echo $dm['www'];?>img/fartner_1.gif" /></a></li>
        <li><select name="" class="fartner_11">
        <option>地区</option>
        </select></li>
        <li><select name="" class="fartner_11">
        <option>定位</option>
        </select></li>
        <li><select name="" class="fartner_11">
        <option>目前状态</option>
        </select></li>
        </ul>
        </div>
        -->
    </div>
    <div class="cygs">
        <?php
            if(!empty($data)){
                foreach($data as $val){
                ?>
                <div class="hhr_c">
                    <div class="hhr_tx">
                        <dl><dt><img src="<?php echo Url::getUserPic(array('uid'=>$val['follower_id'], 'tp'=>'b'));?>" width="90" height="90" /></dt>
                            <!--<dd>北京-海淀区</dd>-->
                        </dl>
                    </div>
                    <div class="hhr_nr">
                        <div class="hhr_hr_mc">
                            <h3><?php echo isset($val['userinfo']['nickname'])?$val['userinfo']['nickname'].'-':'';?><?php echo isset($val['rolename'])?$val['rolename'].'-':'';?>有项目-已在全职创业</h3>
                            <span><a href="#">在线</a></span>
                        </div>
                        <div class="fartner_2"><h3>80%&nbsp;&nbsp;靠谱</h3></div>
                        <div class="hhr_hr_bq">
                            <?php 

                                if(!empty($val['userinfo']['tags'])){
                                    $ts = unserialize($val['userinfo']['tags']);
                                    foreach($ts as $vt){
                                    ?>
                                    <span href="#"><?php echo $vt;?></span> | 
                                    <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="hhr_ty_28">
                        <ul>
                            <li><a href="/partner/interview?user_id=<?php echo $val['follower_id'];?>">约谈</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php
                }
            }
        ?>
    </div>
</div>
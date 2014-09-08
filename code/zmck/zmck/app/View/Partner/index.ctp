<div class="mid" id="box">
    <div class="con_l">
        <div class="search">
            <div class="ssk">
                <div class="s1">
                    <input name="" type="text" />
                </div>
                <div class="s2">
                    <input type="submit" name="Submit" value="提交" />
                </div>
            </div>
            <div class="sx">
                <?php if(!empty($roleList)){ ?>
                    <div class="hhr_dw">
                        <h3 class="bg">条件:</h3>
                        <ul>
                            <?php foreach($roleList as $val){ ?>
                                <li><a href="<?php echo $val['id'];?>"><?php echo $val['name'];?></a></li>
                                <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                <div class="sx_tt">
                    <h3 class="bg">条件:</h3>
                    <ul>
                        <li><select name="" class="xl">
                                <option>地理位置</option>
                            </select></li>
                        <li><select name="" class="xl">
                                <option>方向</option>
                            </select></li>
                        <li><select name="" class="xl">
                                <option>心态</option>
                            </select></li>
                        <li><select name="" class="xl">
                                <option>状态</option>
                            </select></li>
                        <li>
                            <select name="" class="xl">
                                <option>年龄</option>
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
            <div class="hhr">
                <div class="hhr_c">
                    <div class="hhr_tx">
                        <dl><dt><a href="/partner/detail?id=1"><img src="img/tx.gif" width="90" height="90" /></a></dt><dd>北京-海淀区</dd>
                        </dl>
                    </div>
                    <div class="hhr_nr">
                        <div class="hhr_hr_mc"><h3><a href="/partner/detail?id=1">奋斗者-创始人-有项目-已在全职创业</a></h3><span><a href="#">在线</a></span></div>
                        <div class="hhr_hr_dj"><h3>80%&nbsp;&nbsp;靠谱</h3></div>
                        <div class="hhr_hr_bq"><span href="#">电商</span> | </div>
                        <div class="hhr_hr_ms">从曾经的记者、创业者到投资人，多年关注互联网和移动互联网、IT服
                            务领域，为多家创业公司和风险投资机构服务，2010开...</div>
                        <!--
                        <div class="hhr_hr_tp">
                        <ul>
                        <li><img src="img/tx.gif" width="51" height="51" /></li>
                        <li><img src="img/tx.gif" width="51" height="51" /></li>
                        <li><img src="img/tx.gif" width="51" height="51" /></li>
                        <li><img src="img/tx.gif" width="51" height="51" /></li><li><img src="img/tx.gif" width="51" height="51" /></li>
                        </ul>
                        </div>
                        -->
                    </div>
                    <div class="hhr_ty">
                        <ul>
                            <li><a href="#">约谈</a></li>
                            <li><a href="#">关注</a></li>
                            <li><a href="#">屏蔽</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
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
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">下一页</a></li>
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
        ?>
        <div class="box">
            <div class="title">
                <h3>推荐合伙人</h3>
            </div>
            <div class="project_1">
                <ul>
                    <li>
                        <div><a href="#"><img src="img/project_1.jpg" /></a></div>
                        <div class="pro_t">
                            <div class="pro_t1"><img src="img/project_2.gif" /><a href="#">皖青年-创始人</a></div>
                            <div class="pro_t2"><img src="img/project_3.gif" /><a>广东-东莞市</a></div>
                            <div class="pro_t3">2012年7月在河南新华任职创立A时代网络...</div>  
                        </div>
                    </li>
                    <li>
                        <div><a href="#"><img src="img/project_1.jpg" /></a></div>
                        <div class="pro_t">
                            <div class="pro_t1"><img src="img/project_2.gif" /><a href="#">皖青年-创始人</a></div>
                            <div class="pro_t2"><img src="img/project_3.gif" /><a>广东-东莞市</a></div>
                            <div class="pro_t3">2012年7月在河南新华任职创立A时代网络...</div>  
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
        </div>


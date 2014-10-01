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
                <div class="sx_tt">
                    <h3 class="bg">条件:</h3>
                    <ul>
                        <li><select name="" class="xl">
                                <option>北京</option>
                            </select></li>
                        <li><select name="" class="xl">
                                <option>方向</option>
                            </select></li>
                        <li><select name="" class="xl">
                                <option>状态</option>
                            </select></li>
                    </ul>
                </div>
                <div class="sx_xc">
                    <h3 class="bg">薪酬体系:</h3>
                    <ul>
                        <li><input name="" type="checkbox" value="" />
                            全部</li>
                        <li><input name="" type="checkbox" value="" />
                            基本薪资</li>
                        <li><input name="" type="checkbox" value="" />
                            基本薪资+提成</li>
                        <li><input name="" type="checkbox" value="" />
                            基本薪资+原始股</li>
                        <li><input name="" type="checkbox" value="" />
                            基本薪资+期权</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="title">
                <h3>创业公司</h3>
            </div>
            <div class="cygs">
                <div class="cygs_c">
                    <div class="cygs_list">
                        <div class="cygs_tx">
                            <dl>
                                <dt><img src="../images/tx.gif" /></dt>
                                <!-- <dd><a href="#">速投简历</a></dd>-->
                            </dl>
                        </div>
                        <div class="cygs_nr">
                            <div class="cygs_bt"><h3><a href="/company/detail">北京创客科技有限公司</a></h3></div>
                            <div class="cygs_mc">
                                <h3>杨博-CEO</h3>
                                <span><a href="#">在线</a></span></div>
                            <div class="cygs_xz">基本薪资+原始股</div>
                            <div class="cygs_wz">北京-海淀区</div>
                            <div class="cygs_bq">
                                <ul>
                                    <li><a href="#">产品经理</a></li>
                                    <li><a href="#">技术总监</a></li>
                                    <li><a href="#">运营经理</a></li>
                                    <li><a href="#">UI设计师</a></li>
                                    <li><a href="#">销售总监</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cygs_list" style="margin:0;">
                        <div class="cygs_tx">
                            <dl>
                                <dt><img src="../images/tx.gif" /></dt>
                                <!-- <dd><a href="#">速投简历</a></dd>-->
                            </dl>
                        </div>
                        <div class="cygs_nr">
                            <div class="cygs_bt"><h3><a href="#">北京创客科技有限公司</a></h3></div>
                            <div class="cygs_mc">
                                <h3>杨博-CEO</h3>
                                <span><a href="#">在线</a></span></div>
                            <div class="cygs_xz">基本薪资+原始股</div>
                            <div class="cygs_wz">北京-海淀区</div>
                            <div class="cygs_bq">
                                <ul>
                                    <li><a href="#">产品经理</a></li>
                                    <li><a href="#">技术总监</a></li>
                                    <li><a href="#">运营经理</a></li>
                                    <li><a href="#">UI设计师</a></li>
                                    <li><a href="#">销售总监</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="fy">
                <div class="fy_l">每页显示：  
                    <select name="select" class="venture_1">
                        <option>10</option>
                    </select>
                </div>
                <div class="fy_r">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">下一页</a></li>
                    </ul>
                    <span>跳转到&nbsp;&nbsp;<input name="" type="text" />&nbsp;&nbsp;页</span>
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
            echo $this->element('hot_topic'); 
        ?>
    </div>
</div>

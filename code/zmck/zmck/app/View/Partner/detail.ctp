<div class="mid" id="box">
    <div class="con_l">
        <div class="hhr_js">
            <div class="tz_list_tx">
                <div class="tz_tx_img"><img src="<?php echo Url::getUserPic(array('uid'=>$user_info['id'], 'tp'=>'b'));?>" width="125" height="125" /></div>
                <div class="tz_tx_gz"><a href="#" >关注</a><a href="#">约谈</a></div>
            </div>
            <div class="hhr_xq">
                <div class="hhr_hr_mc"><h3><?php echo $user_info['nickname'];?></h3><span><a href="#">在线</a></span></div>
                <div class="xq_dj_xm">
                    <div class="xq_dj"><h3>80%&nbsp;&nbsp;靠谱</h3></div>
                    <div class="xq_xm">有项目 - 已在全职创业</div>
                </div>
                <div class="xq_cydw">
                    <h3 class="bg1">创业定位：</h3>
                    <div class="xq_cydw_c"><?php echo $user_info['role'];?></div>

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
            </div>
            <div class="tdzl">
                <div class="tdzl_div">
                    <h3>年龄：</h3>
                    <div class="tdzl_div_c"><?php echo isset($age[$user_info['agerange']])?$age[$user_info['agerange']]:'未填';?></div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>关注领域：</h3>
                    <div class="tdzl_div_c">电子商务、教育、社交</div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>个人简介：</h3>
                    <div class="tdzl_div_c">5年开发经验，软硬通吃，熟悉单片机开发、OpenWRT系统移植修改、<br />
                        Android开发、Java和PHP服务器开发，有一定的运营管理经验。曾经带领原<br />
                        公司团队完成中国移动手机二维码客户端的开发、华为手机定制阅读客户端；<br />
                        公司是中国移动手机二维码、咪咕音乐的官方合作伙伴。</div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>学习经历：</h3>
                    <div class="tdzl_div_c">本科-电子信息与工程<br />
                        研究生-IC设计、软件工程</div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>工作经历：</h3>
                    <div class="tdzl_div_c">2011年，中国pinterest迷尚网，安卓开发工程师<br />
                        2012-2013年，方正移动，高级安卓开发工程师<br />
                        2013-今，北京初创未来科技，总工程师</div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>工作经历：</h3>
                    <div class="tdzl_div_c">创业经验    多次    有回报<br />
                        创业资金   原大力投资<br />
                        投入时间   全部时间参与创业<br />
                        创业地点   我所在的城市</div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="title" style="BORDER-TOP:solid 2PX #4cbbd9;">
                <h3>他的项目</h3>
            </div>
            <div class="tdzl">
                <div class="tdzl_div">
                    <h3>项目名称：</h3>
                    <div class="tdzl_div_c">蜗牛管家</div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>项目方向：</h3>
                    <div class="tdzl_div_c">硬件 </div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>项目简介：</h3>
                    <div class="tdzl_div_c">“蜗牛管家”是一款结合物联网、互联网的技术优势，专为家庭用户打造全<br />
                        新体验的智能安防产品。与传统安防产品不同，我们有如下特色：<br />
                        （1）免配置。正在研发的基于声波配对技术，让产品更加易用，免除传<br />
                        统安防的配置成本。<br />
                        （2）免施工安装。产品外壳采用特殊材质，配以特殊不干胶，让用户再<br />
                        也不用打洞钉钉，只需轻轻一按就能完成安装，另外这种特殊胶也能多次使<br />
                        用，墙面毫无痕迹。<br />
                        （3）云+物联网技术实现全自动控制。传统安防需要很多的人工操作，<br />
                        蜗牛管家提供了一款全自动无线钥匙，可以轻松可靠实现出门布防、回家撤<br />
                        防，用户再也不用操心家里的安防布置情况。<br />
                        （4）模块化、易扩展。蜗牛管家的所有产品采用模块化设计，有统一的<br />
                        接口和通讯协议，另外支持多种无线协议，所以可以实现无线模块扩展能力。<br />
                        目前我们还设计出了室内空气质量、灾难预警等模块。</div>
                    <div class="clear"></div>
                </div>
                <div class="tdzl_div">
                    <h3>项目优势：</h3>
                    <div class="tdzl_div_c">经过将近一年的对“智能管家”产品的研发、各种技术实验和选型，积累了<br />
                        相当多的经验，总结出了一套解决方案，成本低、技术风险小、产品灵活、<br />
                        无供应商风险。 同时，一年多不断的对市场上产品的调研，对产品的不断自<br />
                        我剖析，对智能家居产品有自己一些独到的看法.</div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
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
    </div>
    <div class="con_r">
        <div class="box cywd">
            <div class="title">
                <h3>创业问答</h3>
            </div>
            <div class="cywd_c">我属于互联网行业技术人士。我随时关注国<br />
                外的创业项目和报道。我又进展中项目，想<br />
                找合伙人。我认为创业核心资源最重要的是<br />
                商业运作能力。</div>
        </div>
        <!--
        <div class="box">
        <div class="title">
        <h3>用户评价</h3>
        <span class="wysjj"><a href="#">我也说几句</a></span>  </div>
        <div class="yhpj">
        <div class="yhpj_list">
        <dl>
        <dt><img src="../images/tx.gif" width="50" height="50" /></dt>
        <dd>非常不错的合伙人，大家可以尽情<br />
        合作，一路成长，好伙伴！</dd>
        </dl>
        <div class="yhpj_mc_sj">
        <ul>
        <li class="bg1">苏北地区帅小伙</li>
        <li class="bg2">2014-07-15  08:00</li>
        </ul>
        </div>
        </div>
        <div class="yhpj_list">
        <dl>
        <dt><img src="../images/tx.gif" width="50" height="50" /></dt>
        <dd>非常不错的合伙人，大家可以尽情<br />
        合作，一路成长，好伙伴！</dd>
        </dl>
        <div class="yhpj_mc_sj">
        <ul>
        <li class="bg1">苏北地区帅小伙</li>
        <li class="bg2">2014-07-15  08:00</li>
        </ul>
        </div>
        </div>
        <div class="yhpj_list">
        <dl>
        <dt><img src="../images/tx.gif" width="50" height="50" /></dt>
        <dd>非常不错的合伙人，大家可以尽情<br />
        合作，一路成长，好伙伴！</dd>
        </dl>
        <div class="yhpj_mc_sj">
        <ul>
        <li class="bg1">苏北地区帅小伙</li>
        <li class="bg2">2014-07-15  08:00</li>
        </ul>
        </div>
        </div>
        <div class="yhpj_list">
        <dl>
        <dt><img src="../images/tx.gif" width="50" height="50" /></dt>
        <dd>非常不错的合伙人，大家可以尽情<br />
        合作，一路成长，好伙伴！</dd>
        </dl>
        <div class="yhpj_mc_sj">
        <ul>
        <li class="bg1">苏北地区帅小伙</li>
        <li class="bg2">2014-07-15  08:00</li>
        </ul>
        </div>
        </div>
        <div class="yhpj_list">
        <dl>
        <dt><img src="../images/tx.gif" width="50" height="50" /></dt>
        <dd>非常不错的合伙人，大家可以尽情<br />
        合作，一路成长，好伙伴！</dd>
        </dl>
        <div class="yhpj_mc_sj">
        <ul>
        <li class="bg1">苏北地区帅小伙</li>
        <li class="bg2">2014-07-15  08:00</li>
        </ul>
        </div>
        </div>
        <div class="yhpj_an">
        <ul>
        <li><a href="#">上一页</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">下一页</a></li>
        </ul>
        <div class="clear"></div>
        </div>
        </div>
        </div>
        -->
    </div>
</div>

<style type="text/css">
    .index_banner1{position:relative;height:548px;margin-top:-30px;}
    .index_banner1 li{position:absolute;top:0;left:0;overflow:hidden;width:100%;height:548px;}
    .index_banner1 li.first{background:url(<?php echo $dm['img'];?>data/homepic/1.jpg) center top no-repeat;}
    .index_banner1 li.second{background:url(<?php echo $dm['img'];?>data/homepic/2.jpg) center top no-repeat;}
    .index_banner1 li.third{background:url(<?php echo $dm['img'];?>data/homepic/3.jpg) center top no-repeat;}
    .index_banner1 li a{display:block;margin:0 auto;width:1000px;height:548px;}
    .index_banner1 cite{position:absolute;bottom:10px;left:50%;z-index:999;display:block;margin-left:-34px;width:288px;height:15px;_display:none;}
    .index_banner1 cite span{float:left;display:block;margin:0 4px;width:17px;height:15px;background:url(<?php echo $dm['www'];?>img/ico81.png) no-repeat;text-indent:-999em;opacity:.8;cursor:pointer;}
    .index_banner1 cite span:hover{background:url(<?php echo $dm['www'];?>img/ico82.png) no-repeat;}
    .index_banner1 cite span.cur{background:url(<?php echo $dm['www'];?>img/ico82.png) no-repeat;cursor:default;}
</style>
<div id="banner">
    <script type="text/javascript" src="<?php echo $dm['www'];?>js/jcarousellite_index.js"></script>
    <div class="index_banner1" id="banner_tabs">
        <ul>
            <li class="first"><a target="_blank"></a></li>
            <li class="second"><a  target="_blank"></a></li>      
            <li class="third"><a  target="_blank"></a></li>    
        </ul>
    <cite><span class="cur">1</span><span>2</span><span>3</span></cite> </div>
    <script type="text/javascript">
        (function(){
            if(!Function.prototype.bind){
                Function.prototype.bind = function(obj){
                    var owner = this,args = Array.prototype.slice.call(arguments),callobj = Array.prototype.shift.call(args);
                    return function(e){e=e||top.window.event||window.event;owner.apply(callobj,args.concat([e]));};
                };
            }
        })();
        var banner_tabs = function(id){
            this.ctn = document.getElementById(id);
            this.adLis = null;
            this.btns = null;
            this.animStep = 0.2;//动画速度0.1～0.9
            this.switchSpeed = 6;//自动播放间隔(s)
            this.defOpacity = 1;
            this.tmpOpacity = 1;
            this.crtIndex = 0;
            this.crtLi = null;
            this.adLength = 0;
            this.timerAnim = null;
            this.timerSwitch = null;
            this.init();
        };
        banner_tabs.prototype = {
            fnAnim:function(toIndex){
                if(this.timerAnim){window.clearTimeout(this.timerAnim);}
                if(this.tmpOpacity <= 0){
                    this.crtLi.style.opacity = this.tmpOpacity = this.defOpacity;
                    this.crtLi.style.filter = 'Alpha(Opacity=' + this.defOpacity*100 + ')';
                    this.crtLi.style.zIndex = 0;
                    this.crtIndex = toIndex;
                    return;
                }
                this.crtLi.style.opacity = this.tmpOpacity = this.tmpOpacity - this.animStep;
                this.crtLi.style.filter = 'Alpha(Opacity=' + this.tmpOpacity*100 + ')';
                this.timerAnim = window.setTimeout(this.fnAnim.bind(this,toIndex),50);
            },
            fnNextIndex:function(){
                return (this.crtIndex >= this.adLength-1)?0:this.crtIndex+1;
            },
            fnSwitch:function(toIndex){
                if(this.crtIndex==toIndex){return;}
                this.crtLi = this.adLis[this.crtIndex];
                for(var i=0;i<this.adLength;i++){
                    this.adLis[i].style.zIndex = 0;
                }
                this.crtLi.style.zIndex = 2;
                this.adLis[toIndex].style.zIndex = 1;
                for(var i=0;i<this.adLength;i++){
                    this.btns[i].className = '';
                }
                this.btns[toIndex].className = 'cur'
                this.fnAnim(toIndex);
            },
            fnAutoPlay:function(){
                this.fnSwitch(this.fnNextIndex());
            },
            fnPlay:function(){
                this.timerSwitch = window.setInterval(this.fnAutoPlay.bind(this),this.switchSpeed*1000);
            },
            fnStopPlay:function(){
                window.clearTimeout(this.timerSwitch);
            },
            init:function(){
                this.adLis = this.ctn.getElementsByTagName('li');
                this.btns = this.ctn.getElementsByTagName('cite')[0].getElementsByTagName('span');
                this.adLength = this.adLis.length;
                for(var i=0,l=this.btns.length;i<l;i++){
                    with({i:i}){
                        this.btns[i].index = i;
                        this.btns[i].onclick = this.fnSwitch.bind(this,i);
                        this.btns[i].onclick = this.fnSwitch.bind(this,i);
                    }
                }
                this.adLis[this.crtIndex].style.zIndex = 2;
                this.fnPlay();
                this.ctn.onmouseover = this.fnStopPlay.bind(this);
                this.ctn.onmouseout = this.fnPlay.bind(this);
            }
        };
        var player1 = new banner_tabs('banner_tabs');
    </script>

</div>
<?php if(!empty($userList)){ ?>
<div id="zxhhr">
    <div class="zxhhr mid">
        <div class="zxhhr_t">
            <h3>最新合伙人</h3><span><a href="/partner">查看更多>></a></span>
        </div>
        <div class="zxhhr_list">
            <?php
            foreach($userList as $key=>$val){
            ?>
            <dl <?if($key==4|| $key==9){echo 'style="margin-right:0;"';}?>>
                <dt><img src="<?php echo Url::getUserPic(array('uid'=>$val['id'], 'tp'=>'b'))?>" width="100"  height="100"/></dt>
                <dd><a href="#"><?php echo !empty($val['baseinfo']['nickname'])?$val['baseinfo']['nickname']:'&nbsp;';?></a></dd>
            </dl>
            <?php
            }
            ?>
            <!--
            </div>
            <div class="diqu">&nbsp;&nbsp;&nbsp;&nbsp;2011年创立WL工作室2002年7月
            在河南新华任职创立A...
            <h3>北京-海淀区</h3>
            </div>

            <div class="zxhhr_list">
            -->
        </div>
    </div>
</div>
<?php } ?>
<div id="sy_cygs">
    <div class="mid sy_cygs">
        <div class="zxhhr_t">
            <h3>创业公司</h3>
        <span><a href="/company">查看更多&gt;&gt;</a></span> </div>
        <div class="zxhhr_list">
            <dl>
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
            <dl style="margin-right:0;">
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
        </div>
        <div class="diqu">&nbsp;&nbsp;&nbsp;&nbsp;2011年创立WL工作室2002年7月
            在河南新华任职创立A...
            <h3>北京-海淀区</h3>
        </div>
        <div class="zxhhr_list">
            <dl>
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
            <dl style="margin-right:0;">
                <dt><img src="img/tx.gif" width="100"  height="100"/></dt>
                <dd><a href="#">我你他</a></dd>
            </dl>
        </div>
    </div>
</div>
<div id="sy_rmht">
    <div class="sy_rmht mid">
        <div class="zxhhr_t">
            <h3>热门话题</h3>
        <span><a href="/bbs">查看更多&gt;&gt;</a></span> </div>
        <div class="sy_rmht_c">
            <dl>
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl style="margin-right:0">
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl style="margin-right:0;">
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl style="margin-right:0;">
                <dt><img src="img/tx.gif" width="79" height="79" /></dt>
                <dd>
                    <h3>风光无限</h3>
                    扶个体助小微 税收优惠政策解读...
                    <div class="ht_list_sj">
                        <ul>
                            <li class="bg1">2014-07-15</li>
                            <li class="bg2">2014-07-15</li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <div class="clear"></div>
        </div>
    </div>
</div>

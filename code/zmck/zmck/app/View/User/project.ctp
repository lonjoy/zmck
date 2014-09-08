<div class="mid" id="box">
    <div class="con_l">
        <div class="box">

            <div class="title">
                <h3>我的创业项目</h3>
                <div class="title_circle5">
                    <a href="/user/addproject">创建新项目</a>
                </div>
            </div>
            <div class="pro_meu">
                <div class="pro_meu_1">创建时间</div>
                <div class="pro_meu_2">项目名称</div>
                <div class="pro_meu_3">操作</div>
            </div>
            <div class="pro_list">
                <ul>
                    <li>
                        <table>
                            <tr>
                                <td class="pro_list_11">2014-06-14</td>
                                <td class="pro_list_22">智能机器人</td>
                                <td class="pro_list_33"><input type="button" value="编辑" /><input type="button" value="删除" /></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table>
                            <tr>
                                <td class="pro_list_11">2014-06-14</td>
                                <td class="pro_list_22">智能机器人</td>
                                <td class="pro_list_33"><input type="button" value="编辑" /><input type="button" value="删除" /></td>
                            </tr>
                        </table>
                    </li>
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
        ?>
        <div class="box">
            <div class="title">
                <h3>推荐合伙人</h3>
            </div>
            <div class="project_1">
                <ul>
                    <li>
                        <div><a href="#"><img src="<?php echo $dm['www'];?>img/project_1.jpg" /></a></div>
                        <div class="pro_t">
                            <div class="pro_t1"><img src="<?php echo $dm['www'];?>img/project_2.gif" /><a href="#">皖青年-创始人</a></div>
                            <div class="pro_t2"><img src="<?php echo $dm['www'];?>img/project_3.gif" /><a>广东-东莞市</a></div>
                            <div class="pro_t3">2012年7月在河南新华任职创立A时代网络...</div>  
                        </div>
                    </li>
                    <li>
                        <div><a href="#"><img src="<?php echo $dm['www'];?>img/project_1.jpg" /></a></div>
                        <div class="pro_t">
                            <div class="pro_t1"><img src="<?php echo $dm['www'];?>img/project_2.gif" /><a href="#">皖青年-创始人</a></div>
                            <div class="pro_t2"><img src="<?php echo $dm['www'];?>img/project_3.gif" /><a>广东-东莞市</a></div>
                            <div class="pro_t3">2012年7月在河南新华任职创立A时代网络...</div>  
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

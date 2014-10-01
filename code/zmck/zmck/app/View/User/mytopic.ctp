<div class="mid" id="box">
<div class="yhzx">
    <h3>创业话题</h3>
    <div class="yhzx_c">
        <ul>
            <li class="on"><a href="/user/mytopic" style="background: #4cbbd9; color: #ffffff;">我发起的话题</a></li>
            <li><a href="/user/topic">我参与的话题</a></li>
        </ul>
    </div>
</div>
<div class="gszy">
    <div class="title">
        <h3>我发起的话题</h3>
    </div>
    <div class="topics">
        <div class="topics_1">话题标题</div>
        <div class="topics_2">作者</div>
        <div class="topics_3">点击</div>
        <div class="topics_4">回复</div>
        <div class="topics_5">回复时间</div>
        <div class="topics_6">操作</div>
    </div>
    <div class="topicss_2">
        <ul>
            <?php
                if(!empty($data)){
                    foreach($data as $val){
                    ?>
                    <li>
                        <table>
                            <tr>
                                <td class="topics_11"><img src="<?php echo $dm['www'];?>img/topics_1.gif"  />
                                <a href="<?php echo $dm['www'];?>bbs/threads?fid=<?php echo $val['fid'];?>&pid=<?php echo $val['pid'];?>"><?php echo $val['subject'];?></a>
                                </td>
                                <td class="topics_22"><?php echo $userInfo['nickname'];?></td>
                                <td class="topics_33"><?php echo $val['clicknum'];?></td>
                                <td class="topics_44"><?php echo $val['replynum'];?></td>
                                <td class="topics_55"><?php echo date('H:i',$val['replytime']);?></td>
                                <td class="topics_66"><input type="button" value="删除" onclick="if(confirm('确认删除此话题么， 删除后，话题相关的回复也会自动删除？')){window.location.href='';}else{return false;}"/></td>
                            </tr>
                        </table>
                    </li>
                    <?php 
                    }
                }
            ?>
        </ul>
    </div>
    <div class="fy">
        <div class="fy_r" style="width: auto;">
            <ul>
                <?php echo $pagehtml;?>
            </ul>
        </div>
    </div>
</div>


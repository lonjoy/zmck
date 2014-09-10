<div class="grxx">
    <div class="grxx_nr">
        <div class="grxx_nr1"><img src="<?php echo $userInfo['useravater'];?>" height="60" width="60" /></div>
        <div class="grxx_nr2">
            <div class="grxx_nr_bj"><a href="/user">编辑</a></div>
            <div class="grxx_nr2_c"><a href="#"><?php echo $userInfo['nickname'];?></a></div>
            <div class="grxx_dj"><h3>80%&nbsp;&nbsp;靠谱</h3></div>
        </div>
        </dd>
    </div>
    <div class="gz_bgz">
        <div class="gz_bgz_gz">关注：&nbsp;&nbsp;&nbsp;<span><?php echo $userInfo['follows'];?></span>人</div>
        <div class="gz_bgz_bgz">被关注：&nbsp;&nbsp;&nbsp;<span><?php echo $userInfo['followed'];?></span>人</div>
    </div>
</div>
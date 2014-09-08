<meta charset="UTF-8">
<link href="<?php echo $dm['www'];?>css/tiaozhuan.css" rel="stylesheet" type="text/css">

<!--======跳转成功 star=======-->

<div class="success">
    <p>
        <?php if($message):?>
            <?php echo $message;?>
        <?php else:?>
            操作成功！
        <?php endif;?>
        <span>
            <?php if($url):?>
                <script type="text/javascript">setTimeout(function(){self.location="<?php echo $url;?>"},<?php echo $time; ?>);</script>
                <br />
                <a href="<?php echo $url;?>">页面跳转中...</a>
            <?php else:?>
                <br />
                <a href='<?php echo $dm['www'];?>'>返回首页</a>
            <?php endif;?>
        </span>
    </p>
</div>

<!--======跳转成功 end=======-->


<!--======跳转失败 star=======-->
<!--
<div class="failure">
    <p>
        啊哦，页面加载失败
        <span>页面正在跳转中...</span>
    </p>
</div>
-->
<!--======跳转失败 end=======-->
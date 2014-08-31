<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/suggest/index'><em>建议意见列表</em></a><span>|</span>
        <a href='/suggest/view?id=<?php echo $id;?>' class="on"><em>查看建议</em></a>
    </div>
</div>


<div class="pad-lr-10">
    <form name="myform" action="#" method="post" onsubmit="checkuid();return false;">
        <textarea cols="150" rows="20"><?php echo $data['content'];?></textarea>
    </form>
</div>
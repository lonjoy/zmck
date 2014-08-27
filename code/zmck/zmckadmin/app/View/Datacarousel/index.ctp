<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/datacarousel/index' class="on"><em>首页轮播图管理</em></a><span>|</span>
        <a href='/datacarousel/add'><em>添加轮播图</em></a>
    </div>
</div>


<div class="pad-lr-10">
    <form name="myform" action="#" method="post" onsubmit="checkuid();return false;">
        <div class="table-list">
            <table width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th  align="left" width="20"><input type="checkbox" value="" id="check_box" onclick="selectall('userid[]');"></th>
                        <th align="left"></th>
                        <th align="left">ID</th>
                        <th align="left">名称</th>
                        <th align="left">图片</th>
                        <th align="left">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($data) && is_array($data)){
                            foreach($data as $k=>$v) {
                            ?>
                            <tr>
                                <td align="left"><input type="checkbox" value="<?php echo $v['id'];?>" name="userid[]"></td>
                                <td align="left"></td>
                                <td align="left"><?php echo $v['id'];?></td>
                                <td align="left"><?php echo $v['name'];?></td>
                                <td align="left"><img src="<?php echo Url::getHomePic($v['id']); ?>" width="100" height="50" /></td>
                                <td align="left">
                                    <a href="/datacarousel/edit?id=<?php echo $v['id'];?>">[编辑]</a>
                                    <a href="/datacarousel/del?id=<?php echo $v['id'];?>">[删除]</a>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <div class="btn">
                <label for="check_box">全选/取消</label> <input type="submit" class="button" name="dosubmit" value="删除" onclick="return confirm('')"/>
            </div>

            <div id="pages">pages</div>
        </div>
    </form>
</div>
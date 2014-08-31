<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/bbs/subject' class="on"><em>话题列表</em></a>
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
                        <th align="left">主题</th>
                        <th align="left">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($data) && is_array($data)){
                            foreach($data as $k=>$v) {
                            ?>
                            <tr>
                                <td align="left"><input type="checkbox" value="<?php echo $v['pid']?>" name="userid[]"></td>
                                <td align="left"></td>
                                <td align="left"><?php echo $v['pid'];?></td>
                                <td align="left"><?php echo $v['subject'];?></td>
                                <td align="left">
                                    <a href="/bbs/subjectpreview?pid=<?php echo $v['pid'];?>">[预览]</a>
                                    <a href="/bbs/subjectdel?pid=<?php echo $v['pid'];?>">[删除]</a>
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
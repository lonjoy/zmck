<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/user/' class="on"><em>用户列表</em></a><span>|</span>
        <a href='/user/addUser'><em>添加用户</em></a>
    </div>
</div>


<div class="pad-lr-10">
    <!--
    <form name="searchform" action="" method="get" >
    <input type="hidden" value="member" name="m">
    <input type="hidden" value="member" name="c">
    <input type="hidden" value="search" name="a">
    <input type="hidden" value="879" name="menuid">
    <table width="100%" cellspacing="0" class="search-form">
    <tbody>
    <tr>
    <td>
    <div class="explain-col">

    <select name="status">
    <option value='0' >33</option>
    <option value='1' >22</option>
    <option value='2' >11</option>
    </select>


    <input name="keyword" type="text" value="0" class="input-text" />
    <input type="submit" name="search" class="button" value="搜索" />
    </div>
    </td>
    </tr>
    </tbody>
    </table>
    </form>
    -->
    <form name="myform" action="?m=member&c=member&a=delete" method="post" onsubmit="checkuid();return false;">
        <div class="table-list">
            <table width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th  align="left" width="20"><input type="checkbox" value="" id="check_box" onclick="selectall('userid[]');"></th>
                        <th align="left"></th>
                        <th align="left">ID</th>
                        <th align="left">邮箱</th>
                        <th align="left">注册IP</th>
                        <th align="left">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($data) && is_array($data)){
                            foreach($data as $k=>$v) {
                            ?>
                            <tr>
                                <td align="left"><input type="checkbox" value="<?php echo $v['id']?>" name="userid[]"></td>
                                <td align="left"></td>
                                <td align="left"><?php echo $v['id']?></td>
                                <td align="left"><?php echo $v['email']?></td>
                                <td align="left"><?php echo $v['regip']?></td>
                                <td align="left">
                                    <a href="/user/editUser?id=<?php echo $v['id'];?>">[编辑]</a>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <div class="btn">
                <label for="check_box">全选/取消</label> <input type="submit" class="button" name="dosubmit" value="删除" onclick="return confirm('<?php echo ('sure_delete')?>')"/>
            </div>

            <div id="pages">pages</div>
        </div>
    </form>
</div>

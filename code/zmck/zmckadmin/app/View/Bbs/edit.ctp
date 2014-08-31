<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/bbs/index'><em>创业圈管理</em></a><span>|</span>
        <a href='/bbs/add'><em>添加创业圈</em></a><span>|</span>
        <a href='/bbs/edit?id=<?php echo $id;?>' class="on"><em>编辑创业圈</em></a>
    </div>
</div>

<form name="adduser" method="post" action="/bbs/edit" >
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">圈子名称：</th>
                <td>
                    <input type="text" name="name" value="<?php echo $data['name'];?>">
                </td>
            </tr>
            <tr>
                <th width="200">圈子描述：</th>
                <td>
                    <textarea name="desc" cols="50" rows="5"><?php echo $data['desc'];?></textarea>
                </td>
            </tr>
            <tr>
                <th width="200">排序：</th>
                <td>
                    <input type="text" name="listorder" value="<?php echo $data['listorder'];?>">
                </td>
            </tr>
            <tr>
                <th width="200">是否有效：</th>
                <td>
                    <input type="radio" name="enable" value="0" <?php echo $data['enable']==0?'checked="checked"':'';?>> 隐藏
                    <input type="radio" name="enable" value="1" <?php echo $data['enable']==1?'checked="checked"':'';?>> 显示
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
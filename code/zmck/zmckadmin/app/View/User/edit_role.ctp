<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/user/roles' ><em>类型列表</em></a><span>|</span>
        <a href='/user/addRole'><em>添加类型</em></a><span>|</span>
        <a href='/user/editRole?id=<?php echo $id;?>' class="on"><em>编辑类型</em></a>   
    </div>
</div>
<form name="adduser" method="post" action="/user/editRole" >
<input type="hidden" name="id" value="<?php echo $id;?>">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">类型名称：</th>
                <td>
                    <input type="text" name="name" value="<?php echo $data['name'];?>">
                </td>
            </tr>
            <tr>
                <th width="200">是否有效：</th>
                <td>
                    <input type="radio" name="state" value="0" <?php if($data['state']=='0'){echo 'checked="checked"';}?>> 隐藏
                    <input type="radio" name="state" value="1" <?php if($data['state']=='1'){echo 'checked="checked"';}?>> 显示
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
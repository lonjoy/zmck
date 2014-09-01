<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/systemTag/index'><em>标签列表</em></a><span>|</span>
        <a href='/systemTag/add'><em>添加标签</em></a><span>|</span>
        <a href='/systemTag/edit?id=<?php echo $id;?>' class="on"><em>编辑标签</em></a>   
    </div>
</div>
<form name="adduser" method="post" action="/systemTag/edit" >
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">标签名称：</th>
                <td>
                    <input type="text" name="name" value="<?php echo $data['name'];?>">
                </td>
            </tr>
            <tr>
                <th width="200">是否有效：</th>
                <td>
                    <input type="radio" name="enable" value="1" <?php if($data['enable']=='1'){echo 'checked="checked"';}?>> 有效
                    <input type="radio" name="enable" value="0" <?php if($data['enable']=='0'){echo 'checked="checked"';}?>> 无效
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
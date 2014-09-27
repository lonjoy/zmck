<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/project/direction' ><em>项目方向列表</em></a><span>|</span>
        <a href='/project/adddirection'><em>添加项目方向</em></a><span>|</span>
        <a href='/project/editdirection?id=<?php echo $id;?>' class="on"><em>编辑项目方向</em></a>   
    </div>
</div>
<form name="editform" method="post" action="/project/editdirection" >
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">名称：</th>
                <td>
                    <input type="text" name="name" value="<?php echo $data['name'];?>">
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
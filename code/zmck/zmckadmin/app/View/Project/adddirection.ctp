<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/project/direction' ><em>项目方向列表</em></a><span>|</span>
        <a href='/project/adddirection' class="on"><em>添加项目方向</em></a>   
    </div>
</div>
<form name="add" method="post" action="/project/adddirection" >
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">名称：</th>
                <td>
                    <input type="text" name="name" value="">
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
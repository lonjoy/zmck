<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/systemTag/index'><em>标签列表</em></a><span>|</span>
        <a href='/systemTag/add' class="on"><em>添加标签</em></a>
    </div>
</div>
<form name="adduser" method="post" action="/systemTag/add" >
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">标签名称：</th>
                <td>
                    <input type="text" name="name" value="">
                </td>
            </tr>
            <tr>
                <th width="200">是否有效：</th>
                <td>
                    <input type="radio" name="enable" value="1"> 有效
                    <input type="radio" name="enable" value="0" checked="checked"> 无效
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
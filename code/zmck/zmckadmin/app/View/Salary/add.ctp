<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/salary/index' ><em>薪酬体系管理列表</em></a><span>|</span>
        <a href='/salary/add' class="on"><em>添加</em></a>   
    </div>
</div>
<form name="adduser" method="post" action="/salary/add" >
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">名称：</th>
                <td>
                    <input type="text" name="name" value="">
                </td>
            </tr>
            <tr>
                <th width="200">是否有效：</th>
                <td>
                    <input type="radio" name="isdel" value="1"> 隐藏
                    <input type="radio" name="isdel" value="0" checked="checked"> 显示
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/message/sys' ><em>消息列表</em></a><span>|</span>
        <a href='/message/add' class="on"><em>添加系统消息</em></a>   
    </div>
</div>
<form name="adduser" method="post" action="/message/add" >
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">标题</th>
                <td>
                    <input type="text" name="title" value="">
                </td>
            </tr>
            <tr>
                <th width="200">内容：</th>
                <td>
                    <textarea cols="120" rows="15" name="content"></textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
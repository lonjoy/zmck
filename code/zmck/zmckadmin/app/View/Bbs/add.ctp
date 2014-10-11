<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/bbs/index'><em>创业圈管理</em></a><span>|</span>
        <a href='/bbs/add' class="on"><em>添加创业圈</em></a>
    </div>
</div>

<form name="adduser" method="post" action="/bbs/add" enctype="multipart/form-data">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">圈子LOGO：</th>
                <td>
                    <input type="file" name="logo" value="">
                </td>
            </tr>            
            <tr>
                <th width="200">圈子名称：</th>
                <td>
                    <input type="text" name="name" value="">
                </td>
            </tr>
            <tr>
                <th width="200">圈子描述：</th>
                <td>
                    <textarea name="desc" cols="50" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <th width="200">排序：</th>
                <td>
                    <input type="text" name="listorder" value="0">
                </td>
            </tr>
            <tr>
                <th width="200">是否有效：</th>
                <td>
                    <input type="radio" name="enable" value="0"> 隐藏
                    <input type="radio" name="enable" value="1" checked="checked"> 显示
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
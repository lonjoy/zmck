<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/datacarousel/index'><em>首页轮播图管理</em></a><span>|</span>   
        <a href='/datacarousel/add' class="on"><em>添加轮播图</em></a>   
    </div>
</div>
<form name="sitemanage" method="post" action="/datacarousel/add" enctype="multipart/form-data">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">名称</th>
                <td>
                    <input type="text" name="homepicname" value="" />
                </td>
            </tr>
                    <tr>
                <th width="200">URL</th>
                <td>
                    <input type="text" name="url" value="" />
                </td>
            </tr>
            <tr>
                <th width="200">排序</th>
                <td>
                    <input type="text" name="order" value="0" />
                </td>
            </tr>
            <tr>
                <th width="200">图片上传</th>
                <td>
                    <input type="file" name="homepic" value="上传">
                </td>
            </tr>

        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
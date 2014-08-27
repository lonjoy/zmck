<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/datacarousel/index'><em>首页轮播图管理</em></a><span>|</span>   
        <a href='/datacarousel/add'><em>添加轮播图</em></a> <span>|</span>  
        <a href='/datacarousel/edit?id=<?php echo $id;?>'  class="on"><em>编辑轮播图</em></a>   
    </div>
</div>
<form name="datacarousel" method="post" action="/datacarousel/edit"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">名称</th>
                <td>
                    <input type="text" name="homepicname" value="<?php echo  $data['name'];?>" />
                </td>
            </tr>
            <tr>
                <th width="200">URL</th>
                <td>
                    <input type="text" name="url" value="<?php echo  $data['url'];?>" />
                </td>
            </tr>
            <tr>
                <th width="200">排序</th>
                <td>
                    <input type="text" name="order" value="<?php echo  $data['order'];?>" />
                </td>
            </tr>
            <tr>
                <th width="200">图片上传</th>
                <td>
                    <input type="file" name="homepic" value="上传">
                </td>
            </tr>
            <tr>
            <td colspan="2"><img src="<?php echo Url::getHomePic($id); ?>" width="500" height="200" /></td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
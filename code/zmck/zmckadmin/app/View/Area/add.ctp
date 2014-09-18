<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/area/index' ><em>地区列表</em></a><span>|</span>
        <a href='/area/add' class="on"><em>添加地区</em></a>   
    </div>
</div>
<form name="addarea" method="post" action="/area/add" >
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">名称：</th>
                <td>
                    <input type="text" name="name" value="">
                </td>
            </tr>
            <tr>
                <th width="200">父级：</th>
                <td>
                    <select name="parentid">
                    <option value="0">请选择父级区域</option>
                    <?php
                    if(!empty($arealist)){
                        foreach($arealist as $val){
                            ?>
                            <option <?php echo $val['id'];?>><?php echo $val['name'];?></option>
                            <?php
                        }
                    }
                    ?>
                    </select>
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
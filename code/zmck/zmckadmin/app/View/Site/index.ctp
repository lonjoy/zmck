<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/site/index' class="on"><em>站点配置</em></a>   
    </div>
</div>
<form name="sitemanage" method="post" action="/site/index" >
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">官方微博地址：</th>
                <td>
                    <input type="text" name="weibo" value="<?php echo isset($data['weibo']) ? $data['weibo'] : '';?>">
                </td>
            </tr>             
            <tr>
                <th width="200">微信地址：</th>
                <td>
                    <input type="text" name="wexin" value="<?php echo isset($data['wexin']) ? $data['wexin'] : '';?>">
                </td>
            </tr>            
            
            <tr>
                <th width="200">关于我们：</th>
                <td>
                    <textarea class="aboutus" name="aboutus" rows="15" cols="100"><?php echo isset($data['aboutus']) ? $data['aboutus'] : '';?></textarea>
                </td>
            </tr>            
            <tr>
                <th width="200">联系我们：</th>
                <td>
                    <textarea class="contactus" name="contactus" rows="15" cols="100"><?php echo isset($data['contactus']) ? $data['contactus'] : '';?></textarea>
                </td>
            </tr>            
            
            <tr>
                <th width="200">加入我们：</th>
                <td>
                    <textarea class="joinus" name="joinus" rows="15" cols="100"><?php echo isset($data['joinus']) ? $data['joinus'] : '';?></textarea>
                </td>
            </tr>

        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/user/' ><em>用户列表</em></a><span>|</span>
        <a href='/user/addUser' class="on"><em>添加用户</em></a>   
    </div>
</div>
<form name="adduser" method="post" action="/user/editUser" >
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">用户邮箱：</th>
                <td>
                    <input type="text" name="email" value="<?php echo $data['email'];?>">
                </td>
            </tr>
            <tr>
                <th width="200">昵称：</th>
                <td>
                    <input type="text" name="nickname" value="<?php echo $data['nickname'];?>">
                </td>
            </tr>
            <tr>
                <th width="200">性别：</th>
                <td>
                    <input type="radio" name="gender" value="0" <?php if($data['gender']==0){echo 'checked="checked"';}?>>男
                    <input type="radio" name="gender" value="1" <?php if($data['gender']==1){echo 'checked="checked"';}?>>女
                </td>
            </tr>
            <tr>
                <th width="200">个人介绍：</th>
                <td>
                    <textarea cols="50" rows="5" name="intro"><?php echo $data['intro'];?></textarea>
                </td>
            </tr>
            <tr>
                <th width="200">个人头像：</th>
                <td>
                    <?php echo 1;?>
                    <input name="avatar" type="file" value="上传">
                </td>
            </tr>
            <tr>
                <th width="200">用户角色：</th>
                <td>
                    <select name="role">
                        <?php 
                            if(!empty($roles)){ 
                                foreach($roles as $v){    
                                ?>
                                <option value="<?php echo $v['id'];?>" <?php if($v['id']==$data['role']){echo 'selected="selected"';}?>><?php echo $v['name'];?></option>
                                <?php 
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>            
            <tr>
                <th width="200">年龄范围</th>
                <td>
                    <select name="agerange">
                        <option value="1">0-10</option>
                        <option value="2">20-30</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th width="200">工作年限</th>
                <td>
                    <select name="workyears">
                        <option value="1">0-10</option>
                        <option value="2">20-30</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
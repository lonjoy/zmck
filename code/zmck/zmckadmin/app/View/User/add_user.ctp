<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href='/user/' ><em>用户列表</em></a><span>|</span>
        <a href='/user/addUser' class="on"><em>添加用户</em></a>   
    </div>
</div>
<form name="adduser" method="post" action="/user/addUser" enctype="multipart/form-data">
    <div id="div_setting_1" class="contentList pad-10">
        <table width="100%" class="table_form ">
            <tr>
                <th width="200">用户邮箱：</th>
                <td>
                    <input type="text" name="email" value="">
                </td>
            </tr>
            <tr>
                <th width="200">密码：</th>
                <td>
                    <input type="text" name="password" value="">
                </td>
            </tr>
            <tr style="">
                <td colspan="2"><h2>基本资料</h2></td>
            </tr>
            <tr>
                <th width="200">昵称：</th>
                <td>
                    <input type="text" name="nickname" value="">
                </td>
            </tr>
            <tr>
                <th width="200">姓名：</th>
                <td>
                    <input type="text" name="name" value="">
                </td>
            </tr>
            <tr>
                <th width="200">性别：</th>
                <td>
                    <input type="radio" name="gender" value="1" checked="checked">男
                    <input type="radio" name="gender" value="2">女
                </td>
            </tr>            
            <tr>
                <th width="200">个人头像：</th>
                <td>
                    <input name="avatar" type="file" value="上传">
                </td>
            </tr>
            <tr>
                <th width="200">个人定位：</th>
                <td>
                    <select name="role">
                        <?php 
                            if(!empty($roles)){ 
                                foreach($roles as $v){    
                                ?>
                                <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                                <?php 
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>            
            <tr>
                <th width="200">年龄范围：</th>
                <td>
                    <select name="agerange">
                        <option value="0">请选择年龄</option>
                        <?php foreach($age as $key=>$val){ ?>
                            <option value="<?php echo $key;?>" <?php echo isset($userinfo['agerange'])?($userinfo['agerange']==$key ? 'selected="selected"' : ''):'';?>><?php echo $val; ?></option>
                            <?php } ?>>
                    </select>
                </td>
            </tr>
            <tr>
                <th width="200">工作年限：</th>
                <td>
                    <select name="workyears">
                        <?php foreach($workyears as $key=>$val){ ?>
                            <option value="<?php echo $key;?>" <?php echo isset($userinfo['workyears'])?($userinfo['workyears']==$key ? 'selected="selected"' : ''):'';?>><?php echo $val; ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr> 
            <tr style="">
                <td colspan="2"><h2>详细资料</h2></td>
            </tr>          
            <tr>
                <th width="200">关注领域</th>
                <td>
                    <select name="industry_id">
                        <?php foreach($industry as $key=>$val){ ?>
                            <option value="<?php echo $val['id'];?>" ><?php echo $val['name']; ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th width="200">个人介绍：</th>
                <td>
                    <textarea cols="50" rows="5" name="intro"></textarea>
                </td>
            </tr>
            <tr>
                <th width="200">学习经历：</th>
                <td>
                    <textarea cols="60" rows="10" name="study_experience"></textarea>
                </td>
            </tr>
            <tr>
                <th width="200">工作经历：</th>
                <td>
                    <textarea cols="60" rows="10" name="work_experience"></textarea>
                </td>
            </tr>
            <tr style="">
                <td colspan="2"><h2>创业状态</h2></td>
            </tr>
            <tr>
                <th width="200"><span>创业心态：</span></th>
                <td><select name="xintai" class="ly">
                        <?php 
                            if($xintai){
                                foreach($xintai as $key=>$val){
                                ?>
                                <option value="<?php echo $key;?>" ><?php echo $val;?></option>
                                <?php
                                }
                            }
                        ?>
                    </select></td>
            </tr>

            <tr>
                <th width="200"><span>目前状态：</span></th>
                <td><select name="nowstatus" class="ly">
                        <option value="0">全部</option>
                        <?php 
                            if($nowstatus){
                                foreach($nowstatus as $key=>$val){
                                ?>
                                <option value="<?php echo $key;?>"><?php echo $val;?></option>
                                <?php
                                }
                            }
                        ?>
                    </select></td>
            </tr>

            <tr style="">
                <td colspan="2"><h2>创业背景</h2></td>
            </tr>
            <tr>
                <th width="200">创业经验：</th>
                <td>
                    <select name="startupExperience">
                        <?php foreach($startupExperience as $key=>$val){ ?>
                            <option value="<?php echo $key;?>" <?php echo isset($userinfo['workyears'])?($userinfo['workyears']==$key ? 'selected="selected"' : ''):'';?>><?php echo $val; ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th width="200">创业资金：</th>
                <td>
                    <select name="startupMoney">
                        <?php foreach($startupMoney as $key=>$val){ ?>
                            <option value="<?php echo $key;?>" <?php echo isset($userinfo['workyears'])?($userinfo['workyears']==$key ? 'selected="selected"' : ''):'';?>><?php echo $val; ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th width="200">投入时间：</th>
                <td>
                    <select name="spenttime">
                        <?php foreach($spenttime as $key=>$val){ ?>
                            <option value="<?php echo $key;?>" <?php echo isset($userinfo['workyears'])?($userinfo['workyears']==$key ? 'selected="selected"' : ''):'';?>><?php echo $val; ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th width="200">创业地点：</th>
                <td>
                    <?php
                        if($startupArea){
                            foreach($startupArea as $key=>$val){
                            ?>
                            <label>
                                <input type="radio" name="startupArea" value="<?php echo $key;?>" <?php echo $key==1?'checked="checked"':'';?>/>
                                <?php echo $val?>
                            </label>
                            <?php
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th width="200">设置：</th>
                <td>
                   首页推荐<input type="checkbox" value="1" name="homeshow"> <span>|</span> 推荐用户<input type="checkbox" value="1" name="recommend">
                </td>
            </tr>
        </table>
    </div>
    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="提交" class="button">
</form>
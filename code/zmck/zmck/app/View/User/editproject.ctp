<div class="mid" id="box">
    <div class="con_l">
        <div class="box">

            <div class="title">
                <h3>我的创业项目</h3>
                <div class="title_circle5">
                    <a href="/user/addproject">创建新项目</a>
                </div>
            </div>
            <div class="gsgk_bd">
                <form action="/user/editproject?proid=<?php echo $data['id'];?>" name="editproject" method="post" enctype="multipart/form-data">
                <table width="650" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="170" height="152"><span>上传项目LOGO：</span></td>
                        <td class="pro_a23_2">
                            <a class="pro_a23_21" id="pic"><img src="<?php echo Url::getProjectPic($data['logo'])?>" width="155" height="155" /></a>
                            <a class="pro_a23_22">
                                <input type="hidden" name="logo" id="piclogo" value="<?php echo $data['logo'];?>">
                                <input type="button" value="上传" id="spanButtonPlaceHolder" />
                                <br />没有上传LOGO项目不显示在推荐页<br />宽度比请按照1:1上传</a></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>项目名称：</span></td>
                        <td><input type="text" name="name" class="td" value="<?php echo $data['name'];?>"/></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>项目方向：</span></td>
                        <td><select name="direction" class="ly">
                                <option value="0">请选择</option>
                                <?php 
                                    if(!empty($prodirection)){
                                        foreach($prodirection as $val){
                                        ?>
                                        <option value="<?php echo $val['id'];?>" <?php echo $data['direction']==$val['id']?'selected="selected"':'';?>><?php echo $val['name'];?></option>
                                        <?php
                                        }
                                }?>
                            </select></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>项目阶段：</span></td>
                        <td><select name="stage" class="ly">
                                <option value="0" <?php echo $data['stage']=='0'?'selected="selected"':'';?>> 请选择 </option>
                                <option value="1" <?php echo $data['stage']=='1'?'selected="selected"':'';?>> 有个好主意 </option>
                                <option value="2" <?php echo $data['stage']=='2'?'selected="selected"':'';?>> 原型阶段 </option>
                                <option value="3" <?php echo $data['stage']=='3'?'selected="selected"':'';?>> 产品开发中 </option>
                                <option value="4" <?php echo $data['stage']=='4'?'selected="selected"':'';?>> 上线Beta测试 </option>
                                <option value="5" <?php echo $data['stage']=='5'?'selected="selected"':'';?>> 正式运营 </option>
                            </select></td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>项目简介：</span></td>
                        <td><textarea name="brief" class="srk"><?php echo $data['brief'];?></textarea></td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>项目优势：</span></td>
                        <td><textarea name="advantage" class="srk"><?php echo $data['advantage'];?></textarea></td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>团队情况：</span></td>
                        <td><textarea name="teamstatus" class="srk"><?php echo $data['teamstatus'];?></textarea></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>投资情况：</span></td>
                        <td><select name="investstatus" class="ly">
                                <option>正式运营</option>
                            </select><input type="text" name="investmoney" class="td_23" value="<?php echo $data['investmoney'];?>"/>万</td>
                    </tr>
                    <tr>
                        <td width="170" height="80"><span>需要合伙人：</span></td>
                        <td class="pro_a23_1">
                            <?php 
                            $r = explode('|', $data['needpartner']);
                                if(!empty($roleList)){
                                    foreach($roleList as $val){ ?>
                                    <input name="needpartner[]" type="checkbox" value="<?php echo $val['id'];?>" <?php echo in_array($val['id'], $r) ? 'checked="checked"' :'';?>/><?php echo $val['name'];?>&nbsp;&nbsp;
                                    <?php 
                                    }
                                } 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>合伙人职责：</span></td>
                        <td><textarea name="partnerduty" class="srk"><?php echo $data['partnerduty'];?></textarea></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>合作方式：</span></td>
                        <td>
                            <label>
                                <input type="radio" name="cooperation" value="1" <?php echo $data['cooperation']=='1'?'checked="checked"':'';?> />
                                兼职加入</label>
                            <label>
                                <input type="radio" name="cooperation" value="2" <?php echo $data['cooperation']=='2'?'checked="checked"':'';?> />
                                全职加入</label>
                            <label>
                                <input type="radio" name="cooperation" value="3" <?php echo $data['cooperation']=='3'?'checked="checked"':'';?> />
                                双方协商</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>合伙人回报：</span></td>
                        <td><textarea name="huibao" class="srk"><?php echo $data['huibao'];?></textarea></td>
                    </tr>
                    <tr>
                        <td height="60">&nbsp;</td>
                        <td><div class="gagk_an">
                                <ul>
                                    <li><input type="submit" name="dosubmit" value="提交" />
                                    </li>
                                    <li><input type="reset" value="重置" />
                                    </li>
                                </ul>
                            </div></td>
                    </tr>
                </table>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="con_r">
        <?php 
            if(!empty($userInfo)){
                echo $this->element('user_block');
            }
            echo $this->element('recommend_partner'); 
        ?>
    </div>
</div>
<script type="text/javascript" src="http://static.haibian.com/js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo $dm['www'];?>js/swfupload.js"></script>
<script type="text/javascript" src="<?php echo $dm['www'];?>js/handleproject.js"></script>
<script type="text/javascript">
    var settings = {
        flash_url : "<?php echo $dm['www'];?>js/swfupload.swf",
        upload_url: '<?php echo $dm['www'];?>user/ajaxprojectpic', 
        post_params: {},
        file_post_name: 'pic',
        file_size_limit : "100 MB",
        file_types : "*.jpg;*.jpeg;*.png;*.",
        file_types_description : "All Files",
        file_upload_limit : 100,
        file_queue_limit : 0,
        custom_settings : {
            progressTarget : "fsUploadProgress",
            cancelButtonId : "btnCancel",
            upload_target : "divFileProgressContainer"
        },

        // Button settings
        button_image_url: "<?php echo $dm['www'];?>img/up_project.jpg",
        button_width: "90",
        button_height: "30",
        button_placeholder_id: "spanButtonPlaceHolder",
        button_text: '',
        button_text_style: "",
        button_text_left_padding: 30,
        button_text_top_padding: 5,
        debug: false,

        // The event handler functions are defined in handlers.js
        file_queue_error_handler : fileQueueError,
        file_dialog_complete_handler : fileDialogComplete,
        upload_progress_handler : uploadProgress,
        upload_error_handler : uploadError,
        upload_success_handler : uploadSuccess,
        upload_complete_handler : uploadComplete,
    };
    var swf = new SWFUpload(settings);
</script>

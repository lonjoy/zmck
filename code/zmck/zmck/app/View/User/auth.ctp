<?php echo $this->element('user_info'); ?>
<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title_35">
        <h3>个人认证&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/user/companyauth">企业认证</a></h3>
    </div>
    <div class="gsgk_bd">
        <form action="/user/auth" method="post" name="authform" enctype="multipart/form-data" onsubmit="return checkform();" >
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <!--
            <tr>
            <td width="200" height="40"><span>手机：</span></td>
            <td class="fe_13"><input type="text" name="textfield" class="td" />
            <a href="#">发送验证码</a> <input type="text" name="textfield" class="td_13" /> <input type="button" value="验证" class="td_13_1" /></td>
            </tr>
            -->
            <tr>
                <td width="200" height="40"><span>Email：</span></td>
                <td class="fe_13"><input type="text" name="email" class="td" id="email"/>
                    <font color="red">*</font> <a href="#" onclick="sendemail();">发送邮箱验证</a>，没收到请查看垃圾箱！
                </td>
            </tr>
            <tr>
                <td width="200" height="40"><span>新浪微博：</span></td>
                <td class="fe_13"><input type="text" name="weibo" class="td"  id="weibo"/> <font color="red">*</font>
                    如：http://weibo.com/zmckr </td>
            </tr>
            <tr>
                <td width="200" height="40"><span>QQ：</span></td>
                <td><input type="text" name="qq" class="td" id="qq" /> <font color="red">*</font></td>
            </tr>
            <tr>
                <td width="200" height="40"><span>微信号：</span></td>
                <td><input type="text" name="wexin" class="td" /> <font color="red">*</font></td>
            </tr>
            <tr>
                <td width="200" height="140"><span>个人身份证：</span></td>
                <td class="pro_a23_2"><a class="pro_a23_21"></a>
                    <input type="hidden" name="identitycard" >
                    <a class="pro_a23_22">
                        <input type="button" value="上传"  id="spanButtonPlaceHolder1"/><br /><font color="red">*</font>请上传自己清晰的身份证扫描件！
                    </a></td>
            </tr>
            <tr>
                <td height="60">&nbsp;</td>
                <td><div class="gagk_an">
                        <ul>
                            <li><input type="submit" value="提交" name="dosubmit" />
                            </li>
                            <li><input type="reset" value="重置" />
                            </li>
                        </ul>
                    </div></td>
            </tr>
        </table>
    </div>
</div>
<script type="text/javascript">
    var settings = {
        flash_url : "<?php echo $dm['www'];?>js/swfupload.swf",
        upload_url: '<?php echo $dm['www'];?>user/uploadavater', 
        post_params: {},
        file_post_name: 'avatar',
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
        button_placeholder_id: "spanButtonPlaceHolder1",
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

    function checkform(){
        var email = $("#email").val();
        var weibo = $("#weibo").val();
        var qq = $("#qq").val();
        var wexin = $("#wexin").val();
        var identitycard=$("#identitycard").val();
        if($.trim(email)==''){
            alert('请输入Email');return false;
        }
        var r=new RegExp("^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$");
        if(!r.test(email)){
            alert('请输入正确的邮箱');return false;
        }
        if($.trim(weibo)==''){
            alert('请输入新浪微博账号');return false;
        }
        if($.trim(qq)==''){
            alert('请输入QQ');return false;
        }
        if($.trim(wexin)==''){
            alert('请输入微信');return false;
        }
        if($.trim(identitycard)==''){
            alert('请上传身份证照片！');return false;
        }
        return true;
    }
    function sendemail(){
        var email = $("#email").val();
        $.ajax({
            url:'/user/sendemail?email='+email,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                alert(data);
            }
        });
    }
</script>
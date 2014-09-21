<link href="<?php echo $dm['www'];?>css/uploadify.css" rel="stylesheet" type="text/css" />
<div class="mid" id="box_13">
    <div class="basic_infor_1">
        <div class="basic_infor_tx">
        <span class="uploadify"><a id="spanButtonPlaceHolder" ></a></span>
        <img src="<?php echo $userInfo['useravater'];?>" id="useravater" width="115" height="115"/></div>
        <div class="basic_infor_zl"><h3>个人资料完整度 <a>70%</a></h3></div>
        <div class="basic_infor_zl"><img src="<?php echo $dm['www'];?>img/basic_infor_2.jpg" /></div>
        <div class="basic_infor_zl"><h3>所在位置：<select name="select" class="dd_13">
                    <option>北京</option>
                </select> <select name="select2" class="dd_13">
                    <option>北京</option>
                </select></h3></div>
        <div class="basic_infor_zl"><h3>允许哪些地方的合伙人联系我： <label>
                    <input type="radio" name="RadioGroup1" value="单选" />
                    只限本地        </label>
                <label>
                    <input type="radio" name="RadioGroup1" value="单选" />
                    外地也行        </label></h3></div>
    </div>
</div>
<script type="text/javascript" src="http://static.haibian.com/js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo $dm['www'];?>js/swfupload.js"></script>
<script type="text/javascript" src="<?php echo $dm['www'];?>js/handlers.js"></script>
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
        button_image_url: "<?php echo $dm['www'];?>img/uploadavater.jpg",
        button_width: "68",
        button_height: "27",
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
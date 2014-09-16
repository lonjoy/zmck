<link href="<?php echo $dm['www'];?>css/uploadify.css" rel="stylesheet" type="text/css" />
<div class="mid" id="box_13">
    <div class="basic_infor_1">
        <div class="basic_infor_tx"><span class="uploadify"><input type='file' id="file_upload" >上传头像</span><img src="<?php echo $userInfo['useravater'];?>" /></div>
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
<script src="<?php echo $dm['www'];?>js/jquery.uploadify.js"></script>
<script type="text/javascript">
    $(function() {
        $('#file_upload').uploadify({
            swf      : '<?php echo $dm['www'];?>js/uploadify.swf',
            uploader : '<?php echo $dm['www'];?>user/uploadavater',
            debug:true,
            auto: true,
            uploadLimit: 1,
            onComplete  : function(event, ID, fileObj, response, data) {
                //alert('There are ' + data.fileCount + ' files remaining in the queue.');
                alert('qerew');
            },
            buttonText:'上传头像',
            onUploadSuccess:function(file,data,response){
                alert('123');
            },
            onUploadError:function(){
                alert(11);
            }
        });
    });

</script>
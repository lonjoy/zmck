<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>我的标签</h3>
    </div>
    <div class="gsgk_bd">
        <form action="/user/tag" name="tagform" method="post" id="tagform">
            <table width="750" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="70" height="40"></td>
                    <td>
                        <div class="tag_2">
                            <ul id="addtags">
                                <?php if(!empty($userTags)){ ?>
                                    <?php foreach($userTags as $val){ ?>
                                        <li class="tag_2_l">
                                            <a><?php echo $val;?></a><a href="#"><img src="<?php echo $dm['www'];?>img/tag_1.gif" onclick="$(this).parents('li').remove();" /></a><input type="hidden" name="usertags[]" value="<?php echo $val;?>" />
                                        </li>
                                        <?php } ?>
                                    <?php } ?>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="70" height="40"></td>
                    <td><input name="taginput" style="color:#ccc" value="回车增加一个标签" onfocus="if(this.value=='回车增加一个标签'){this.value=''};this.style.color='black';" onblur="if(this.value==''||this.value=='回车增加一个标签'){this.value='回车增加一个标签';this.style.color='#ccc';}" checked="checked" class="tag_dd" id="taginput" /></td>
                </tr>

                <tr>
                    <td height="40">&nbsp;</td>
                    <td class="tag_1"><input type="submit" value="提交" name="dosubmit" />删除或添加标签完成后请点击提交！</td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function($) {
        document.onkeydown = function(event_e){
            if( window.event ) event_e = window.event;
            var int_keycode = event_e.charCode || event_e.keyCode;
            if(int_keycode == 13){
                if($('#taginput').val()!=''){
                    var str='<li class="tag_2_l"><a>'+$('#taginput').val()+'</a><a href="#"><img src="<?php echo $dm['www'];?>img/tag_1.gif" onclick="$(this).parents(\'li\').remove();"/></a><input type="hidden" name="usertags[]" value='+$('#taginput').val()+' /></li>';
                    $('#addtags').append(str);
                    $('#taginput').val('');
                }
                return false;
            }
        };
    });
</script>
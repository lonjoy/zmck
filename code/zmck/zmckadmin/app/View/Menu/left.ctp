<?php
    //var_dump($datas);die;
    foreach($datas as $_value) {
        echo '<h3 class="f14"><span class="switchs cu on" title="'.'expand_or_contract'.'"></span>'.$_value['name'].'</h3>';
        echo '<ul>';
        $sub_array = $_value['sub'];
        if(!empty($sub_array)){
            foreach($sub_array as $_key=>$_m) {
                if($_m['id'] == $menu_id) { //左侧菜单不显示选中状态
                    $classname = 'class="sub_menu"';
                } else {
                    $classname = 'class="sub_menu"';
                }
                echo '<li id="_MP'.$_m['id'].'" '.$classname.'><a href="javascript:_MP('.$_m['id'].',\''.$_m['url'].'\');" hidefocus="true" style="outline:none;">'.$_m['name'].'</a></li>';
            }
        }
        echo '</ul>';
    }
?>
<script type="text/javascript">
    $(".switchs").each(function(i){
        var ul = $(this).parent().next();
        $(this).click(
        function(){
            if(ul.is(':visible')){
                ul.hide();
                $(this).removeClass('on');
            }else{
                ul.show();
                $(this).addClass('on');
            }
        })
    });
</script>
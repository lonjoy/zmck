<div class="box">
    <div class="title">
        <h3>推荐合伙人</h3>
    </div>
    <div class="project_1">
        <ul class="recommend-userList">
            <?php
                if(!empty($recommend_user['users'])){
                    foreach($recommend_user['users'] as $val){
                    ?>
                    <li>
                        <div><a href="/partner/detail?id=<?php echo $val['id'];?>"><img src="<?php echo Url::getUserPic(array('uid'=>$val['id'], 'tp'=>'b'));?>" width="124" height="124" /></a></div>
                        <div class="pro_t">
                            <div class="pro_t1"><img src="<?php echo $dm['www'];?>img/project_2.gif" />
                                <a href="/partner/detail?id=<?php echo $val['id'];?>">
                                    <?php echo !empty($val['nickname'])?$val['nickname'].'-':''?>
                                    <?php echo $val['role']?$recommend_user['roles'][$val['role']]:'';?>
                                </a>
                            </div>
                            <div class="pro_t2">
                                <img src="<?php echo $dm['www'];?>img/project_3.gif" />
                                <a href="/partner/detail?id=<?php echo $val['id'];?>"><span class="cy_prov" cy="<?php echo $val['province'];?>"></span>-<span class="cy_city" cy="<?php echo $val['city'];?>"></span>
                                </a>
                            </div>
                            <div class="pro_t3"><?php echo $val['intro'];?></div>  
                        </div>
                    </li>
                    <?php 
                    }
                }
            ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $dm['www'];?>js/procity.js"></script>
<script type="text/javascript">
    $(function(){
        $('.recommend-userList li').each(function(i){
            var prov=$(this).find('.cy_prov').eq(0).attr('cy');
            var city=$(this).find('.cy_city').eq(0).attr('cy');
            var _city=[];
            for (P in arrCity) {
                if(P==0) continue;
                if(arrCity[P].id==prov){
                    $(this).find('.cy_prov').eq(0).html(arrCity[P].name);
                    _city=arrCity[P].sub;
                }
            }
            for(C in _city){
                if(C==0)continue;
                if(_city[C].id==city){
                    $(this).find('.cy_city').eq(0).html(_city[C].name);
                }
            }
            $(this).find('.down-area').html($(this).find('.cy_prov').eq(0).parent().html());
        });                

    });
        </script>
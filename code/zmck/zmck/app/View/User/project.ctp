<div class="mid" id="box">
    <div class="con_l">
        <div class="box">

            <div class="title">
                <h3>我的创业项目</h3>
                <div class="title_circle5">
                    <a href="/user/addproject">创建新项目</a>
                </div>
            </div>
            <div class="pro_meu">
                <div class="pro_meu_1">创建时间</div>
                <div class="pro_meu_2">项目名称</div>
                <div class="pro_meu_3">操作</div>
            </div>
            <div class="pro_list">
                <ul>
                    <?php 
                        if(!empty($projectList)){
                            foreach($projectList as $val){
                            ?>
                            <li>
                                <table>
                                    <tr>
                                        <td class="pro_list_11"><?php echo date('Y-m-d', $val['ctime']);?></td>
                                        <td class="pro_list_22"><?php echo $val['name'];?></td>
                                        <td class="pro_list_33"><input type="button" value="编辑" onclick="window.location.href='/user/editproject?proid=<?php echo $val['id'];?>'" /><input type="button" value="删除" onclick="if(confirm('确定要删除此项目么？')){window.location.href='/user/delproject?proid=<?php echo $val['id'];?>';}else{return false;}" /></td>
                                    </tr>
                                </table>
                            </li>
                            <?php   
                            }
                        }
                    ?>
                </ul>
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

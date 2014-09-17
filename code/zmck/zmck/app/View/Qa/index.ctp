<div class="mid" id="box">
    <div class="con_l">
        <div class="box">
            <div class="title">
                <h3>创业问答</h3>
            </div>
            <div class="quiz">
                <ul>
                    <?php 
                        if(!empty($data)){ 
                            foreach($data as $val){
                            ?>
                            <form action="/qa/add" method="post" name="qa_<?php echo $val['id'];?>">
                                <input type="hidden" name="subject_id" value="<?php echo $val['id'];?>">
                                <li>
                                    <h3><?php echo $val['title'];?></h3>
                                    <div class="quiz_1">
                                        <p>
                                            <?php  
                                                if(!empty($val['options'])){
                                                    foreach($val['options'] as $v){
                                                    ?>
                                                    <label>
                                                        <input type="radio" name="options[<?php echo $val['id'];?>]" value="<?php echo $v['id'];?>" <?php if(isset($user_qa_data[$v['survey_id']]) && $v['id']==$user_qa_data[$v['survey_id']]){echo 'checked="checked"';}?>/>
                                                        <?php echo $v['name'];?>
                                                    </label>
                                                    <br />
                                                    <?php 
                                                    }
                                                }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="quiz_2"><input type="submit" value="提交" name="dosubmit"/>
                                        <!--<input type="reset" value="取消" />--></div>
                                </li>
                            </form>
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
            echo $this->element('hot_topic');
        ?>
    </div>
</div>

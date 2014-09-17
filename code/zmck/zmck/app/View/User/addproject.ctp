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
                <form action="/user/addproject" name="addproject" method="post" enctype="multipart/form-data">
                <table width="650" border="0" cellpadding="0" cellspacing="0">
                    <!--
                    <tr>
                    <td width="170" height="152"><span>上传项目LOGO：</span></td>
                    <td class="pro_a23_2"><a class="pro_a23_21"></a><a class="pro_a23_22"><input type="button" value="上传" /><br />没有上传LOGO项目不显示在推荐页<br />宽度比请按照1:1上传</a></td>
                    </tr>
                    -->
                    <tr>
                        <td width="170" height="40"><span>项目名称：</span></td>
                        <td><input type="text" name="textfield" class="td" /></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>项目方向：</span></td>
                        <td><select name="select" class="ly">
                                <option>社交</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>项目阶段：</span></td>
                        <td><select name="select" class="ly">
                                <option>正式运营</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>项目简介：</span></td>
                        <td><textarea name="textarea" class="srk"></textarea></td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>项目优势：</span></td>
                        <td><textarea name="textarea" class="srk"></textarea></td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>团队情况：</span></td>
                        <td><textarea name="textarea" class="srk"></textarea></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>投资情况：</span></td>
                        <td><select name="select" class="ly">
                                <option>正式运营</option>
                            </select><input type="text" name="textfield" class="td_23" />万</td>
                    </tr>
                    <tr>
                        <td width="170" height="80"><span>需要合伙人：</span></td>
                        <td class="pro_a23_1"><input name="" type="checkbox" value="" />
                            创始人<input name="" type="checkbox" value="" />
                            技术合伙人<input name="" type="checkbox" value="" />
                            产品合伙人<input name="" type="checkbox" value="" />
                            运营合伙人<br /><input name="" type="checkbox" value="" />
                            营销合伙人<input name="" type="checkbox" value="" />
                            销售合伙人<input name="" type="checkbox" value="" />
                            其他合伙人</td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>合伙人职责：</span></td>
                        <td><textarea name="textarea" class="srk"></textarea></td>
                    </tr>
                    <tr>
                        <td width="170" height="40"><span>合作方式：</span></td>
                        <td>
                            <label>
                                <input type="radio" name="RadioGroup1" value="兼职加入" />
                                兼职加入</label>
                            <label>
                                <input type="radio" name="RadioGroup1" value="全职加入" />
                                全职加入</label>
                            <label>
                                <input type="radio" name="RadioGroup1" value="双方协商" />
                                双方协商</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="170" height="174"><span>合伙人回报：</span></td>
                        <td><textarea name="textarea" class="srk"></textarea></td>
                    </tr>
                    <tr>
                        <td height="60">&nbsp;</td>
                        <td><div class="gagk_an">
                                <ul>
                                    <li><input type="button" value="提交" />
                                    </li>
                                    <li><input type="button" value="重置" />
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
            echo $this->element('hot_topic'); 
        ?>
    </div>
</div>

<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>创业背景</h3>
    </div>
    <div class="gsgk_bd">
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="200" height="40"><span>创业经验：</span></td>
                <td><select name="select" class="ly">
                        <option>多次，有所斩获</option>
                    </select></td>
            </tr>

            <tr>
                <td width="200" height="40"><span>创业资金：</span></td>
                <td><select name="select" class="ly">
                        <option>愿大力出资</option>
                    </select></td>
            </tr>

            <tr>
                <td width="200" height="40"><span>投入时间：</span></td>
                <td><select name="select" class="ly">
                        <option>全部时间创业</option>
                    </select></td>
            </tr>

            <tr>
                <td width="200" height="40"><span>创业地点：</span></td>
                <td><p>
                        <label>
                            <input type="radio" name="RadioGroup2" value="我所处的城市" />
                            我所处的城市</label>
                        <label>
                            <input type="radio" name="RadioGroup2" value="外地也可考虑" />
                            外地也可考虑</label>
                        <br />
                    </p></td>
            </tr>

            <tr>
                <td height="60">&nbsp;</td>
                <td><div class="gagk_an">
                        <ul>
                            <li><input type="button" value="提交" />
                            </li>
                        </ul>
                    </div></td>
            </tr>
        </table>
    </div>
</div>
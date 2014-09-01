<?php echo $this->element('user_info'); ?>

<div class="mid" id="box">
<?php echo $this->element('user_info_left'); ?>
<div class="gszy">
    <div class="title">
        <h3>创业状态</h3>
    </div>
    <div class="gsgk_bd">
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="200" height="40"><span>创业心态：</span></td>
                <td><select name="select" class="ly">
                        <option>有项目主导创业</option>
                    </select></td>
            </tr>

            <tr>
                <td width="200" height="40"><span>目前状态：</span></td>
                <td><select name="select" class="ly">
                        <option>已在全职创业</option>
                    </select></td>
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

<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p><b>客户信息</b></p>
</div>
<div class="info">
    <div class="order_form">
        <h2>客户信息</h2>
        <ul>
            <li><b>客户用户名:</b> <?php echo htmlspecialchars($this->_var['buyer']['buyer_name']); ?></li>
            <li><b>真实姓名:</b> <?php echo htmlspecialchars($this->_var['buyer']['real_name']); ?></li>
            <li><b>客户类型:</b> <?php if ($this->_var['buyer']['buyer_type'] == '1'): ?>世界窗<?php elseif ($this->_var['buyer']['buyer_type'] == '2'): ?>淘宝<?php elseif ($this->_var['buyer']['buyer_type'] == '0'): ?>其他<?php endif; ?></li>
            <li><b>性别:</b> <?php if ($this->_var['buyer']['gender'] == 1): ?>男<?php elseif ($this->_var['buyer']['gender'] == 2): ?>女<?php else: ?>保密<?php endif; ?></li>
            <li><b>所在地区:</b> <?php echo htmlspecialchars($this->_var['buyer']['region_name']); ?></li>
            <li><b>详细地址:</b> <?php echo htmlspecialchars($this->_var['buyer']['address']); ?></li>
            <li><b>出生日期:</b> <?php echo htmlspecialchars($this->_var['buyer']['birthday']); ?></li>
            <li><b>电子邮件:</b> <?php echo htmlspecialchars($this->_var['buyer']['email']); ?></li>
            <li><b>传真:</b> <?php echo htmlspecialchars($this->_var['buyer']['phone_fax']); ?></li>
            <li><b>固定电话:</b> <?php echo htmlspecialchars($this->_var['buyer']['phone_tel']); ?></li>
            <li><b>手机:</b> <?php echo htmlspecialchars($this->_var['buyer']['phone_mob']); ?></li>
            <li><b>QQ:</b> <?php echo htmlspecialchars($this->_var['buyer']['im_qq']); ?></li>
            <li><b>MSN:</b> <?php echo htmlspecialchars($this->_var['buyer']['im_msn']); ?></li>
            <li><b>Skype:</b> <?php echo htmlspecialchars($this->_var['buyer']['im_skype']); ?></li>
            <li><b>Yahoo:</b> <?php echo htmlspecialchars($this->_var['buyer']['im_yahoo']); ?></li>
            <li><b>旺旺:</b> <?php echo htmlspecialchars($this->_var['buyer']['im_aliww']); ?></li>
            <li><b>银行账号:</b> <?php echo htmlspecialchars($this->_var['buyer']['bank_account']); ?></li>
            <li><b>一般纳税人资格证:</b> <?php echo htmlspecialchars($this->_var['buyer']['taxpayer_qualification']); ?></li>
            <li><b>营业执照:</b> <?php echo htmlspecialchars($this->_var['buyer']['business_license']); ?></li>
            <li><b>添加时间:</b> <?php echo local_date("Y-m-d H:i:s",$this->_var['buyer']['add_time']); ?></li>
            <li><b>更新时间:</b> <?php echo local_date("Y-m-d H:i:s",$this->_var['buyer']['update_time']); ?></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="order_form" align="center">
    	<input class="formbtn1" type="button" name="Submit" value="返回上一页" onclick="javascript:history.go(-1);" />
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p><b>订单信息</b></p>
</div>
<div class="info">
    <div class="order_form">
        <h1>订单状态</h1>
        <ul>
            <li><b>订单号:</b><?php echo $this->_var['order']['order_sn']; ?></li>
            <li><b>订单类别:</b><?php if ($this->_var['order']['order_type'] == '1'): ?>世界窗<?php elseif ($this->_var['order']['order_type'] == '2'): ?>淘宝<?php elseif ($this->_var['order']['order_type'] == '0'): ?>其他<?php endif; ?></li>
            <li><b>店铺名称:</b><?php echo htmlspecialchars($this->_var['order']['store_name']); ?></li>
            <li><b>订单总价:</b> <span style="color:#CC0000; font-size:14px; font-weight:bold;"><em><?php echo price_format($this->_var['order']['order_amount']); ?></em></span></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="order_form">
        <h2>商品信息</h2>
        <?php $_from = $this->_var['order']['og']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <div class="order_info">
            <a href="<?php echo $this->_var['goods']['default_image']; ?>" target="_blank" class="order_info_pic"><img width="80" height="80" alt="goods_pic" src="<?php echo $this->_var['goods']['default_image']; ?>" /></a>
            <div class="order_info_text"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?><br /><?php echo htmlspecialchars($this->_var['goods']['goods_specification']); ?></div>
            <p class="price"><b>单价 :</b> <span class="red_common"><?php echo price_format($this->_var['goods']['price']); ?></span></p>
            <p class="amount"><b>数量 :</b> <span><?php echo $this->_var['goods']['quantity']; ?></span></p>
        </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <div class="clear"></div>
    </div>
    <div class="order_form" align="center">
    	<input class="formbtn1" type="button" name="Submit" value="返回上一页" onclick="javascript:history.go(-1);" />
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>出仓列表</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=warehouse">出仓列表</a></li>
  </ul>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color:#B9FFFF;">
            <td class="firstCell">原销售单号</td>
            <td class="table-center">出仓时间</td>
            <td class="table-center">出仓渠道</td>
        	<td>订单编号</td>
            <td>客户用户名</td>
            <td>物流方式</td>
            <td>快递单号</td>
            <td>运费</td>
            <td>客户备注</td>
            <td>提单用户</td>
            <td>出仓用户</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><?php echo (htmlspecialchars($this->_var['data']['sell_sn']) == '') ? '-' : htmlspecialchars($this->_var['data']['sell_sn']); ?></td>
            <td class="table-center"><?php echo (htmlspecialchars($this->_var['data']['refund_time']) == '') ? '-' : htmlspecialchars($this->_var['data']['refund_time']); ?></td>
            <td class="table-center"><?php if ($this->_var['data']['refund_type'] == '0'): ?>其他<?php elseif ($this->_var['data']['refund_type'] == '1'): ?>世界窗<?php elseif ($this->_var['data']['refund_type'] == '2'): ?>淘宝商城<?php elseif ($this->_var['data']['refund_type'] == '3'): ?>渠道<?php endif; ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['order_sn']) == '') ? '-' : htmlspecialchars($this->_var['data']['order_sn']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['buyer_name']) == '') ? '-' : htmlspecialchars($this->_var['data']['buyer_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['shipping_name']) == '') ? '-' : htmlspecialchars($this->_var['data']['shipping_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['shipping_sn']) == '') ? '-' : htmlspecialchars($this->_var['data']['shipping_sn']); ?></td>
            <td><?php echo price_format($this->_var['data']['shipping_fee'], '%s'); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['buyer_remark']) == '') ? '-' : htmlspecialchars($this->_var['data']['buyer_remark']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['lister']) == '') ? '-' : htmlspecialchars($this->_var['data']['lister']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['warehouse_username']) == '') ? '-' : htmlspecialchars($this->_var['data']['warehouse_username']); ?></td>
        </tr>
        </tbody>
    </table>
    
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color: #BDF;">
            <td class="firstCell">世界窗货号</td>
            <td>商品名称</td>
            <td>品牌</td>
        	<td>供应商货号</td>
            <td>颜色</td>
            <td class="table-center">单位</td>
            <td>规格</td>
            <td>出仓数量</td>
            <td>出仓价格</td>
            <td>出仓金额</td>
            <td>是否次品</td>
            <td>备注</td>
        </tr>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data']['rd']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><?php echo (htmlspecialchars($this->_var['goods']['goods_sn']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_sn']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['brand_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['brand_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['store_goods_code']) == '') ? '-' : htmlspecialchars($this->_var['goods']['store_goods_code']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_colour']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_colour']); ?></td>
            <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['unit']) == '') ? '-' : htmlspecialchars($this->_var['goods']['unit']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_specification']); ?></td>
            <td><?php echo $this->_var['goods']['quantity']; ?></td>
            <td><?php echo $this->_var['goods']['price']; ?></td>
            <td><?php echo $this->_var['goods']['money']; ?></td>
            <td><?php if ($this->_var['goods']['defective'] == '0'): ?>否<?php else: ?>是<?php endif; ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['remark']) == '') ? '-' : htmlspecialchars($this->_var['goods']['remark']); ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
    <div class="order_form" align="center">
    	<input class="formbtn1" type="button" name="Submit" value="返回上一页" onclick="javascript:history.go(-1);" />
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
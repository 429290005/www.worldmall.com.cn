<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.AddIncSearch-min.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
//提交
function confirm_submit() {
	if(!confirm('确定要导出吗？')){
		return false;
    }
	$('#export_form').submit();
}
</script>
<div id="rightTop">
  <p>销售提单</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=sell">管理</a></li>
    <li><a class="btn1" href="index.php?app=sell&amp;act=add">销售提单</a></li>
    <li><span>查看</span></li>
  </ul>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color:#B9FFFF;">
            <td class="firstCell">销售单号</td>
            <td class="table-center">销售日期</td>
            <td class="table-center">销售渠道</td>
        	<td>订单编号</td>
            <td>客户用户名</td>
            <td>支付方式</td>
            <td>物流方式</td>
            <td>快递单号</td>
            <td>运费</td>
            <td>客户备注</td>
            <td>销售员</td>
            <td>提单用户</td>
            <td>出仓用户</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><?php echo (htmlspecialchars($this->_var['data']['sell_sn']) == '') ? '-' : htmlspecialchars($this->_var['data']['sell_sn']); ?></td>
            <td class="table-center"><?php echo (htmlspecialchars($this->_var['data']['sell_time']) == '') ? '-' : htmlspecialchars($this->_var['data']['sell_time']); ?></td>
            <td class="table-center"><?php if ($this->_var['data']['sell_type'] == '0'): ?>其他<?php elseif ($this->_var['data']['sell_type'] == '1'): ?>世界窗<?php elseif ($this->_var['data']['sell_type'] == '2'): ?>淘宝商城<?php elseif ($this->_var['data']['sell_type'] == '3'): ?>渠道<?php endif; ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['order_sn']) == '') ? '-' : htmlspecialchars($this->_var['data']['order_sn']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['buyer_name']) == '') ? '-' : htmlspecialchars($this->_var['data']['buyer_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['payment']) == '') ? '-' : htmlspecialchars($this->_var['data']['payment']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['shipping_name']) == '') ? '-' : htmlspecialchars($this->_var['data']['shipping_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['shipping_sn']) == '') ? '-' : htmlspecialchars($this->_var['data']['shipping_sn']); ?></td>
            <td><?php echo price_format($this->_var['data']['shipping_fee'], '%s'); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['buyer_remark']) == '') ? '-' : htmlspecialchars($this->_var['data']['buyer_remark']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['buyer']) == '') ? '-' : htmlspecialchars($this->_var['data']['buyer']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['lister']) == '') ? '-' : htmlspecialchars($this->_var['data']['lister']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['data']['warehouse_username']) == '') ? '-' : htmlspecialchars($this->_var['data']['warehouse_username']); ?></td>
        </tr>
        <?php $_from = $this->_var['data']['client_p']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'client_p');if (count($_from)):
    foreach ($_from AS $this->_var['client_p']):
?>
        <tr class="tatr2" style="background-color:#E1FFF0;">
          <td class="firstCell">收件人姓名：</td>
          <td><?php echo $this->_var['client_p']['name']; ?></td>
          <td>&nbsp;</td>
          <td colspan="2">收件人电话：<?php echo $this->_var['client_p']['phone']; ?></td>
          <td colspan="8">收件人地址:<?php echo $this->_var['client_p']['address']; ?></td>
        </tr>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
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
            <td>吊牌价</td>
            <td>零售价</td>
            <td>销售单价</td>
            <td>折扣率(%)</td>
            <td>提单数量</td>
            <td>销售金额</td>
            <td>成本价</td>
            <td>成本金额</td>
            <td>备注</td>
           
            
            <?php if ($this->_var['data']['warehouse_username']): ?>
             <td>出仓数量</td>
              <td>退货数量</td>
              <td>状态</td>
              <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data']['sd']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <tr class="tatr2" style="background-color:<?php if ($this->_var['data']['warehouse_username'] && ! $this->_var['goods']['warehouse_state']): ?>#eee<?php else: ?>#E1FFF0<?php endif; ?>;">
            <td class="firstCell"><?php echo (htmlspecialchars($this->_var['goods']['goods_sn']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_sn']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['brand_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['brand_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['store_goods_code']) == '') ? '-' : htmlspecialchars($this->_var['goods']['store_goods_code']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_colour']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_colour']); ?></td>
            <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['unit']) == '') ? '-' : htmlspecialchars($this->_var['goods']['unit']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_specification']); ?></td>
            <td><?php echo price_format($this->_var['goods']['price_crane'], '%s'); ?></td>
            <td><?php echo price_format($this->_var['goods']['price_retail'], '%s'); ?></td>
            <td><?php echo price_format($this->_var['goods']['price'], '%s'); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['discount']) == '') ? '-' : htmlspecialchars($this->_var['goods']['discount']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['quantity']) == '') ? '-' : htmlspecialchars($this->_var['goods']['quantity']); ?></td>
            <td><?php echo price_format($this->_var['goods']['money'], '%s'); ?></td>
            <td><?php echo price_format($this->_var['goods']['price_cost'], '%s'); ?></td>
            <td><?php echo price_format($this->_var['goods']['price_total_cost'], '%s'); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['remark']) == '') ? '-' : htmlspecialchars($this->_var['goods']['remark']); ?></td>
            <?php if ($this->_var['data']['warehouse_username']): ?>
            
            <td <?php if ($this->_var['goods']['watehouse_num'] != $this->_var['goods']['quantity'] && $this->_var['goods']['warehouse_state']): ?>style="color:red"<?php endif; ?>>
         
            <?php echo (htmlspecialchars($this->_var['goods']['watehouse_num']) == '') ? '-' : htmlspecialchars($this->_var['goods']['watehouse_num']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['refund_num']) == '') ? '-' : htmlspecialchars($this->_var['goods']['refund_num']); ?></td>
            <td><?php if ($this->_var['goods']['warehouse_state'] == 1): ?>己出仓<?php else: ?>未出仓<?php endif; ?></td>
            <?php endif; ?>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
    <form method="post" name="export_form" id="export_form" action="index.php?app=sell&amp;act=export">
    <input type="hidden" name="sell_id" value="<?php echo $this->_var['sell_id']; ?>" />
    <div class="order_form" align="center">
    	<input class="formbtn1" type="button" name="Submit" value="返回上一页" onclick="javascript:history.go(-1);" />
    	<?php if ($this->_var['data']['sd']): ?>
    	<input class="formbtn1" type="submit" name="Export" value="导出" onclick="confirm_submit();" />
    	<?php endif; ?>
    </div>
    </form>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
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
  <p>盘亏盘盈</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=inventory">管理</a></li>
    <li><a class="btn1" href="index.php?app=inventory&amp;act=add">盘亏盘盈</a></li>
    <li><span>查看</span></li>
  </ul>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color:#B9FFFF;">
            <td width="16%" class="firstCell">单号</td>
            <td width="16%">日期</td>
            <td width="16%">供应商</td>
        	<td width="16%">供应商单号</td>
            <td width="10%" class="table-center">类型</td>
            <td>操作员</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><?php echo htmlspecialchars($this->_var['purchase']['purchase_sn']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['purchase']['purchase_time']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['purchase']['store_name']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['purchase']['seller_sn']); ?></td>
            <td class="table-center"><?php if ($this->_var['purchase']['purchase_type'] == 0): ?>盘盈入库<?php elseif ($this->_var['purchase']['purchase_type'] == 2): ?><span style="color:red;">盘亏出库</span><?php else: ?>其他<?php endif; ?></td>
            <td><?php echo htmlspecialchars($this->_var['purchase']['buyer']); ?></td>
        </tr>
        </tbody>
    </table>
    
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color: #BDF;">
            <td class="firstCell" width="12%">世界窗货号</td>
            <td>商品名称</td>
            <td>商品类别</td>
            <td width="8%">品牌</td>
        	<td width="10%">供应商货号</td>
            <td width="5%">颜色</td>
            <td width="4%" class="table-center">单位</td>
            <td width="8%">规格</td>
 
            <td width="6%">成本价</td>
            <td width="6%">折扣率(%)</td>
            <td width="4%">数量</td>
            <td width="6%">金额</td>
            <td width="6%">备注</td>
        </tr>
        </thead>
        <tbody>
        <?php $_from = $this->_var['purchase']['ck']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><?php echo (htmlspecialchars($this->_var['goods']['goods_sn']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_sn']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_category']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_category']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['brand_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['brand_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['store_goods_code']) == '') ? '-' : htmlspecialchars($this->_var['goods']['store_goods_code']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_colour']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_colour']); ?></td>
            <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['unit']) == '') ? '-' : htmlspecialchars($this->_var['goods']['unit']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_specification']); ?></td>
          
            <td><?php echo price_format($this->_var['goods']['price_purchase'], '%s'); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['discount']) == '') ? '-' : htmlspecialchars($this->_var['goods']['discount']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['quantity']) == '') ? '-' : htmlspecialchars($this->_var['goods']['quantity']); ?></td>
            <td><?php echo price_format($this->_var['goods']['money'], '%s'); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['remark']) == '') ? '-' : htmlspecialchars($this->_var['goods']['remark']); ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
    <form method="post" name="export_form" id="export_form" action="index.php?app=inventory&amp;act=export">
    <input type="hidden" name="purchase_id" value="<?php echo $this->_var['purchase_id']; ?>" />
    <div class="order_form" align="center">
    	<input class="formbtn1" type="button" name="Submit" value="返回上一页" onclick="javascript:history.go(-1);" />
    	<?php if ($this->_var['purchase']['pd']): ?>
    	<input class="formbtn1" type="submit" name="Export" value="导出" onclick="confirm_submit();" />
    	<?php endif; ?>
    </div>
    </form>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
	$('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
	$('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});

	
    $("tbody tr").hover(
		function() {
			$(this).css({background:"#EAF8DB"});
		},
		function(){
			$(this).css({background:"#FBFDFF"});
		}
	);
});
</script>
<div id="rightTop">
  <p>库存管理</p>
  <ul class="subnav">
    <li><span>管理</span></li>
  </ul>
</div>
<div class="mrightTop info">
  <div class="fontl">
    <form method="get">
      <input type="hidden" name="app" value="stock" />
      <select class="querySelect" name="field_name">
      <?php echo $this->html_options(array('options'=>$this->_var['query_fields'],'selected'=>$_GET['field_name'])); ?>
      </select>
      <input class="queryInput" type="text" name="field_value" value="<?php echo htmlspecialchars($_GET['field_value']); ?>" />
      
      <input class="queryInput pick_date" type="hidden" value="1971-01-01" id="add_time_from" name="add_time_from" />
                至:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['add_time_to']; ?>" id="add_time_to" name="add_time_to" />
      
      <input type="submit" class="formbtn" value="查询" />
      <input type="submit" class="formbtn" name="export_all" value="导出" />
    </form>
  </div>
  <div class="fontr"><?php if ($this->_var['goods_list']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['goods_list']): ?>
    <tr class="tatr1">
      <td width="12%" class="firstCell">世界窗货号</td>
      <td>商品名称</td>
      <td width="8%">品牌</td>
      <td width="10%">供应商商品编号</td>
      <td width="4%">颜色</td>
      <td width="6%">规格</td>
      <td width="5%">总数量</td>
      <td width="6%">成本均价</td>
      <td width="8%">总库存金额</td>
      <td width="12%" class="table-center">更新时间</td>
      <td width="12%" class="table-center">添加时间</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <tr class="tatr2">
      <td class="firstCell"><?php echo (htmlspecialchars($this->_var['goods']['goods_sn']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_sn']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['brand_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['brand_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['store_goods_code']) == '') ? '-' : htmlspecialchars($this->_var['goods']['store_goods_code']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_colour']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_colour']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_specification']); ?></td>
      <td><?php if ($this->_var['goods']['quantity'] <= '10'): ?><strong><?php echo (htmlspecialchars($this->_var['goods']['quantity']) == '') ? '-' : htmlspecialchars($this->_var['goods']['quantity']); ?></strong><?php else: ?><?php echo (htmlspecialchars($this->_var['goods']['quantity']) == '') ? '-' : htmlspecialchars($this->_var['goods']['quantity']); ?><?php endif; ?></td>
      <td><?php echo price_format($this->_var['goods']['price_average'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['goods']['price'], '%s'); ?></td>
      <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['goods']['update_time']); ?></td>
      <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['goods']['add_time']); ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="11">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['goods_list']): ?>
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1">
            <td width="16%" class="firstCell">总数量</td>
            <td width="16%">总库存金额</td>
            <td width="16%">本页数量</td>
            <td>本页库存金额</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2">
            <td class="firstCell"><span class="total_text"><?php echo ($this->_var['total']['total_q'] == '') ? '0' : $this->_var['total']['total_q']; ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['total_p'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo ($this->_var['total']['total_quantity'] == '') ? '0' : $this->_var['total']['total_quantity']; ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['total_price'], '%s'); ?></span></td>
        </tr>
        </tbody>
    </table>
  <div id="dataFuncs">
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
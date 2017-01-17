<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
	$('#add_time_from').datepicker({dateFormat: 'yy-mm'});
	$('#add_time_to').datepicker({dateFormat: 'yy-mm'});
	
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
  <p>进销存报表</p>
</div>
<div class="mrightTop info">
  <div class="fontl">
    <form method="get">
    	<input type="hidden" name="app" value="<?php echo $_GET['app']; ?>" />
        <input type="hidden" name="act" value="<?php echo $_GET['act']; ?>" />
        <select class="querySelect" name="field">
        <?php echo $this->html_options(array('options'=>$this->_var['search_options'],'selected'=>$_GET['field'])); ?>
        </select>
        <input class="queryInput" type="text" name="search_name" value="<?php echo htmlspecialchars($this->_var['query']['search_name']); ?>" />
        查询日期:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['add_time_from']; ?>" id="add_time_from" name="add_time_from" />
        <input type="submit" class="formbtn" value="查询" />
        <input type="submit" class="formbtn" name="export_all" value="导出" />
    </form>
  </div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['data_list']): ?>
    <tr class="tatr1">
      <td colspan="5" class="table-center">商品信息</td>
      <td colspan="3" class="table-center" style="border-left:1px solid #BBDBF1;border-right:1px solid #BBDBF1;">上月结存</td>
      <td colspan="3" class="table-center" style="border-right:1px solid #BBDBF1;">本月入库</td>
      <td colspan="3" class="table-center" style="border-right:1px solid #BBDBF1;">本月出库</td>
      <td colspan="3" class="table-center">本月结存</td>
    </tr>
    <tr class="tatr1">
      <td width="30px" class="firstCell">序号</td>
      <td width="120px" class="table-center">世界窗货号</td>
      <td width="120px" class="table-center">商品名称</td>
      <td width="30px">规格</td>
      <td width="30px" style="border-right:1px solid #BBDBF1;">颜色</td>
      <td class="table-center">数量</td>
      <td class="table-center">单价</td>
      <td class="table-center" style="border-right:1px solid #BBDBF1;">金额</td>
      <td class="table-center">数量</td>
      <td class="table-center">单价</td>
      <td class="table-center" style="border-right:1px solid #BBDBF1;">金额</td>
      <td class="table-center">数量</td>
      <td class="table-center">单价</td>
      <td class="table-center" style="border-right:1px solid #BBDBF1;">金额</td>
      <td class="table-center">数量</td>
      <td class="table-center">单价</td>
      <td class="table-center">金额</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <tr class="tatr2">
      <td class="firstCell"><?php echo $this->_var['goods']['sn']; ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['goods_sn']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_sn']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['goods_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_name']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_specification']); ?></td>
      <td class="table-center" style="border-right:1px solid #BBDBF1;"><?php echo (htmlspecialchars($this->_var['goods']['goods_colour']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_colour']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['xyjc_num']) == '') ? '-' : htmlspecialchars($this->_var['goods']['xyjc_num']); ?></td>
      <td class="table-center"><?php echo price_format($this->_var['goods']['xyjc_price'], '%s'); ?></td>
      <td class="table-center" style="border-right:1px solid #BBDBF1;"><?php echo price_format($this->_var['goods']['xyjc_money'], '%s'); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['byrk_num']) == '') ? '-' : htmlspecialchars($this->_var['goods']['byrk_num']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['byrk_price']) == '') ? '-' : htmlspecialchars($this->_var['goods']['byrk_price']); ?></td>
      <td class="table-center" style="border-right:1px solid #BBDBF1;"><?php echo price_format($this->_var['goods']['byrk_money'], '%s'); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['byck_num']) == '') ? '-' : htmlspecialchars($this->_var['goods']['byck_num']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['byck_price']) == '') ? '-' : htmlspecialchars($this->_var['goods']['byck_price']); ?></td>
      <td class="table-center" style="border-right:1px solid #BBDBF1;"><?php echo price_format($this->_var['goods']['byck_money'], '%s'); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['byjc_num']) == '') ? '-' : htmlspecialchars($this->_var['goods']['byjc_num']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['byjc_price']) == '') ? '-' : htmlspecialchars($this->_var['goods']['byjc_price']); ?></td>
      <td class="table-center"><?php echo price_format($this->_var['goods']['byjc_money'], '%s'); ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="17">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['data_list']): ?>
  <div id="dataFuncs">
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
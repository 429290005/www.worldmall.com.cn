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
  <p>销售成本报表</p>
  <ul class="subnav">
    <li><span>管理</span></li>
  </ul>
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
        销售日期从:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['add_time_from']; ?>" id="add_time_from" name="add_time_from" />
        至:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['add_time_to']; ?>" id="add_time_to" name="add_time_to" />
        销售渠道:
        <select class="querySelect" name="sell_type">
        <option value="">所有</option>
        <?php echo $this->html_options(array('options'=>$this->_var['sell_type'],'selected'=>$_GET['sell_type'])); ?>
        </select>
        销售状态:
        <select class="querySelect" name="status">
        <option value="">所有</option>
        <?php echo $this->html_options(array('options'=>$this->_var['status'],'selected'=>$_GET['status'])); ?>
        </select>
        <input type="submit" class="formbtn" value="查询" />
      <?php if ($this->_var['filtered']): ?>
	  <a class="formbtn1" href="index.php?app=report&amp;act=cost">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php if ($this->_var['data_list']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['data_list']): ?>
    <tr class="tatr1">
      <td colspan="4" class="table-center">销售单信息</td>
      <td colspan="3" class="table-center" style="border-left:1px solid #BBDBF1;border-right:1px solid #BBDBF1;">收入</td>
      <td colspan="3" class="table-center" style="border-right:1px solid #BBDBF1;">成本</td>
      <td colspan="2" class="table-center">毛利</td>
    </tr>
    <tr class="tatr1">
      <td width="10%" class="firstCell">销售单号</td>
      <td width="8%" class="table-center">销售日期</td>
      <td width="6%">销售渠道</td>
      <td width="10%" style="border-right:1px solid #BBDBF1;">订单编号</td>
      <td width="8%">含税销售额</td>
      <td width="8%">销项税</td>
      <td width="8%" style="border-right:1px solid #BBDBF1;">不含税销售额</td>
      <td width="8%">含税进货额</td>
      <td width="8%">进项税</td>
      <td width="8%" style="border-right:1px solid #BBDBF1;">不含税进货额</td>
      <td width="8%">含税毛利额</td>
      <td>毛利率(%)</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['data']):
?>
    <tr class="tatr2">
      <td class="firstCell"><?php echo (htmlspecialchars($this->_var['data']['sell_sn']) == '') ? '-' : htmlspecialchars($this->_var['data']['sell_sn']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['data']['sell_time']) == '') ? '-' : htmlspecialchars($this->_var['data']['sell_time']); ?></td>
      <td><?php if ($this->_var['data']['sell_type'] == '0'): ?>其他<?php elseif ($this->_var['data']['sell_type'] == '1'): ?>世界窗<?php elseif ($this->_var['data']['sell_type'] == '2'): ?>淘宝商城<?php endif; ?></td>
      <td style="border-right:1px solid #BBDBF1;"><?php echo (htmlspecialchars($this->_var['data']['order_sn']) == '') ? '-' : htmlspecialchars($this->_var['data']['order_sn']); ?></td>
      <td><?php echo price_format($this->_var['data']['sell_money'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['output_tax'], '%s'); ?></td>
      <td style="border-right:1px solid #BBDBF1;"><?php echo price_format($this->_var['data']['untax_money'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['total_cost_money'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['income_tax'], '%s'); ?></td>
      <td style="border-right:1px solid #BBDBF1;"><?php echo price_format($this->_var['data']['untax_cost'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['maori_forehead'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['gross_profit_margin'], '%s'); ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="12">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['data_list']): ?>
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1">
            <td width="18%" class="firstCell">含税销售额</td>
            <td width="16%">含税进货额</td>
            <td width="16%">含税毛利额</td>
            <td>毛利率(%)</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2">
            <td class="firstCell"><span class="total_text"><?php echo price_format($this->_var['total']['sell_money'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['total_cost_money'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['maori_forehead'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['gross_profit_margin'], '%s'); ?></span></td>
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
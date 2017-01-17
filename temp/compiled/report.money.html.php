<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
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
<div class="ttab">
	<p>本月报表统计</p>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['current_data']): ?>
    <tr class="tatr1">
      <td width="20%" class="firstCell">供应商</td>
      <td width="12%">上期未付款</td>
      <td width="12%">本期应付款</td>
      <td width="12%">本期已付款</td>
      <td>期末未付款</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['current_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['data']):
?>
    <tr class="tatr2">
      <td class="firstCell"><a href="index.php?app=purchase&field=store_name&search_name=<?php echo $this->_var['data']['store_name']; ?>&add_time_from=<?php echo $this->_var['cur_day']['firstday']; ?>&add_time_to=<?php echo $this->_var['cur_day']['lastday']; ?>"><?php echo (htmlspecialchars($this->_var['data']['store_name']) == '') ? '-' : htmlspecialchars($this->_var['data']['store_name']); ?></a></td>
      <td><?php echo price_format($this->_var['data']['period_unpaid'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['current_payables'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['issue_paid'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['non_payment_period'], '%s'); ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="5">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['current_data']): ?>
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1">
            <td width="18%" class="firstCell">上期未付款</td>
            <td width="16%">本期应付款</td>
            <td width="16%">本期已付款</td>
            <td>期末未付款</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2">
            <td class="firstCell"><span class="total_text"><?php echo price_format($this->_var['cur_total']['period_unpaid'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['cur_total']['current_payables'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['cur_total']['issue_paid'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['cur_total']['non_payment_period'], '%s'); ?></span></td>
        </tr>
        </tbody>
    </table>
  <?php endif; ?>
  <div class="clear"></div>
</div>

<div class="ttab">
	<p>以往报表统计</p>
</div>
<div class="mrightTop info">
  <div class="fontl">
    <form method="get">
    	<input type="hidden" name="app" value="<?php echo $_GET['app']; ?>" />
        <input type="hidden" name="act" value="<?php echo $_GET['act']; ?>" />
        供应商:
        <input name="seller_name" type="text" class="queryInput" id="seller_name" value="<?php echo htmlspecialchars($this->_var['query']['seller_name']); ?>" />
        月份:
        <select class="querySelect" name="month">
        <?php echo $this->html_options(array('options'=>$this->_var['m'],'selected'=>$this->_var['month'])); ?>
        </select>
        <input type="submit" class="formbtn" value="查询" />
      <?php if ($this->_var['filtered']): ?>
	  <a class="formbtn1" href="index.php?app=report&amp;act=money">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['data_list']): ?>
    <tr class="tatr1">
      <td width="20%" class="firstCell">供应商</td>
      <td width="12%">上期未付款</td>
      <td width="12%">本期应付款</td>
      <td width="12%">本期已付款</td>
      <td>期末未付款</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['data']):
?>
    <tr class="tatr2">
      <td class="firstCell"><a href="index.php?app=purchase&field=store_name&search_name=<?php echo $this->_var['data']['store_name']; ?>&add_time_from=<?php echo $this->_var['day']['firstday']; ?>&add_time_to=<?php echo $this->_var['day']['lastday']; ?>"><?php echo (htmlspecialchars($this->_var['data']['store_name']) == '') ? '-' : htmlspecialchars($this->_var['data']['store_name']); ?></a></td>
      <td><?php echo price_format($this->_var['data']['period_unpaid'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['current_payables'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['issue_paid'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['data']['non_payment_period'], '%s'); ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="5">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['data_list']): ?>
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1">
            <td width="18%" class="firstCell">上期未付款</td>
            <td width="16%">本期应付款</td>
            <td width="16%">本期已付款</td>
            <td>期末未付款</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2">
            <td class="firstCell"><span class="total_text"><?php echo price_format($this->_var['total']['period_unpaid'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['current_payables'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['issue_paid'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['non_payment_period'], '%s'); ?></span></td>
        </tr>
        </tbody>
    </table>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
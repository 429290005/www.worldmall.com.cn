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

$(function(){
	$('#refund_time_from').datepicker({dateFormat: 'yy-mm-dd'});
	$('#refund_time_to').datepicker({dateFormat: 'yy-mm-dd'});
	
	$("tbody tr").hover(
		function() {
			$(this).css({background:"#EAF8DB"});
		},
		function(){
			$(this).css({background:"#FBFDFF"});
		}
	);
});

function collection(id){
	$('#received_'+id).slideDown('slow');
}
function slideUp_fn(id){
	$('#received_'+id).slideUp('slow');
}

</script>
<div id="rightTop">
  <p>退货管理</p>
  <ul class="subnav">
    <li><span>退货列表</span></li>
    <!-- <li><a class="btn1" href="index.php?app=returned&amp;act=add">销售退货</a></li> -->
  </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
             <div class="left">
                <input type="hidden" name="app" value="returned" />
                <select class="querySelect" name="field">
                <?php echo $this->html_options(array('options'=>$this->_var['search_options'],'selected'=>$_GET['field'])); ?>
                </select>
                <input class="queryInput" type="text" name="search_name" value="<?php echo htmlspecialchars($this->_var['query']['search_name']); ?>" />
                退货日期从:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['refund_time_from']; ?>" id="refund_time_from" name="refund_time_from" />
                至:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['refund_time_to']; ?>" id="refund_time_to" name="refund_time_to" />
                退货渠道:
                <select class="querySelect" name="returned_type">
                <option value="">所有</option>
                <?php echo $this->html_options(array('options'=>$this->_var['returned_type'],'selected'=>$_GET['returned_type'])); ?>
                </select>
                <input type="submit" class="formbtn" value="查询" />
                <input type="submit" class="formbtn" name="export_all" value="导出" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=sell">撤销检索</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="fontr">
        <?php if ($this->_var['data_list']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <?php if ($this->_var['data_list']): ?>
        <tr class="tatr1">
            <td class="firstCell">原销售单号</td>
            <td class="table-center">退货时间</td>
            <td class="table-center">退货渠道</td>
        	<td>订单编号</td>
            <td>客户用户名</td>
            <td>应退总额</td>
            <td>已退金额</td>
            <td class="table-center">添加时间</td>
            <td class="table-center">操作</td>
        </tr>
        <?php endif; ?>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
        <tr class="tatr2"<?php if ($this->_var['order']['is_void'] == '1'): ?> style="color:#F00;"<?php endif; ?>>
            <td class="firstCell"><?php echo htmlspecialchars($this->_var['order']['sell_sn']); ?></td>
            <td class="table-center"><?php echo htmlspecialchars($this->_var['order']['refund_time']); ?></td>
            <td class="table-center"><?php if ($this->_var['order']['refund_type'] == '0'): ?>其他<?php elseif ($this->_var['order']['refund_type'] == '1'): ?>世界窗<?php elseif ($this->_var['order']['refund_type'] == '2'): ?>淘宝<?php elseif ($this->_var['order']['refund_type'] == '3'): ?>网络<?php endif; ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['order_sn']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['order']['buyer_name']) == '') ? '-' : htmlspecialchars($this->_var['order']['buyer_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['order']['total_money']) == '') ? '-' : htmlspecialchars($this->_var['order']['total_money']); ?></td>
            <td><?php if ($this->_var['order']['gt']): ?><span style="color:#090; font-weight:bold;"><?php echo (htmlspecialchars($this->_var['order']['refund_amount']) == '') ? '-' : htmlspecialchars($this->_var['order']['refund_amount']); ?></span><?php else: ?><?php echo (htmlspecialchars($this->_var['order']['refund_amount']) == '') ? '-' : htmlspecialchars($this->_var['order']['refund_amount']); ?><?php endif; ?></td>
            <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?></td>
            <td class="table-center" style="width:100px;position:relative;">
              <a href="index.php?app=returned&amp;act=view&amp;id=<?php echo $this->_var['order']['refund_id']; ?>">查看</a>
              <!--<a href="index.php?app=refund&amp;act=add&amp;id=<?php echo $this->_var['order']['refund_id']; ?>">退款</a>
            --></td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="16">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
    <div id="dataFuncs">
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
    </div>
    <div class="clear"></div>
</div>

<?php echo $this->fetch('footer.html'); ?>
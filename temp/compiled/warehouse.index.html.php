<?php echo $this->fetch('header.html'); ?>
<script language="javascript" type="text/javascript"> 
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

function collection(id){
	$('#received_'+id).slideDown('slow');
}
function slideUp_fn(id){
	$('#received_'+id).slideUp('slow');
}

//收款
function sub_collection(o, id){
	var warning = $('#received_'+id+' .warning');
	var obj = $('#money_'+id);
	var money = parseFloat(obj.val());
	var amount_uncollected = parseFloat(obj.attr('amount_uncollected'));
	
	money = isNaN(money) ? 0 : money;
	amount_uncollected = isNaN(amount_uncollected) ? 0 : amount_uncollected;
	
	if(money <= 0){
		return;
	}
	
	//已收金额大于应收金额
	if (money > amount_uncollected) {
		if(!confirm('amount_uncollected_lt')) {
			return;
		}
	}
	
	$(o).attr('disabled', true);
	obj.attr('disabled', true);
	warning.html('submit_warning');
	$.getJSON("index.php?app=sell&act=collection", {id: id, money: money}, function(data){
		if (data.done){
			warning.html('ok_warning');
			location.reload();
		}
	});
}

//作废
function subInvalid(id) {
	if(!confirm('确认作废该出仓与销售单吗,确认库存将会增加？')){
		return false;
    }
	$.getJSON("index.php?app=sell&act=invalid", {id: id,is_stock:1}, function(data){
		if (data.done){
			location.reload();
		}
	});
}
</script>
<div id="rightTop">
    <p>出仓列表</p>
    <ul class="subnav">
        <li><span>管理</span></li>
        
        
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
        <form method="get">
             <div class="left">
                <input type="hidden" name="app" value="warehouse" />
                <select class="querySelect" name="field">
                <?php echo $this->html_options(array('options'=>$this->_var['search_options'],'selected'=>$_GET['field'])); ?>
                </select>
                <input class="queryInput" type="text" name="search_name" value="<?php echo htmlspecialchars($this->_var['query']['search_name']); ?>" />
                出仓日期从:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['add_time_from']; ?>" id="add_time_from" name="add_time_from" />
                至:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['add_time_to']; ?>" id="add_time_to" name="add_time_to" />
                销售渠道:
                <select class="querySelect" name="sell_type">
                <option value="">所有</option>
                <?php echo $this->html_options(array('options'=>$this->_var['sell_type'],'selected'=>$_GET['sell_type'])); ?>
                </select>
                出仓状态:
                <select class="querySelect" name="status">
                <option value="">所有</option>
                <?php echo $this->html_options(array('options'=>$this->_var['status'],'selected'=>$_GET['status'])); ?>
                </select>
                <input type="submit" class="formbtn" value="查询" />
                <input type="submit" class="formbtn" name="export_all" value="导出" />
            </div>
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
            <td width="11%" class="firstCell">原销售单号</td>
            <td width="6%" class="table-center">销售日期</td>
            <td width="6%" class="table-center">销售渠道</td>
        	<td width="10%">订单编号</td>
            <td>客户用户名</td>
            <td width="4%">运费</td>
           
            <td width="6%">折扣率(%)</td>
     

            <td width="4%" class="table-center">状态</td>
            <td width="6%" class="table-center">添加时间</td>
            <td width="6%" class="table-center">操作</td>
        </tr>
        <?php endif; ?>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
        <tr class="tatr2"<?php if ($this->_var['order']['is_void'] == '1'): ?> style="color:#F00;"<?php endif; ?>>
            <td class="firstCell"><?php echo htmlspecialchars($this->_var['order']['sell_sn']); ?></td>
            <td class="table-center"><?php echo htmlspecialchars($this->_var['order']['sell_time']); ?></td>
            <td class="table-center"><?php if ($this->_var['order']['sell_type'] == '0'): ?>其他<?php elseif ($this->_var['order']['sell_type'] == '1'): ?>世界窗<?php elseif ($this->_var['order']['sell_type'] == '2'): ?>淘宝商城<?php elseif ($this->_var['order']['sell_type'] == '3'): ?>渠道<?php endif; ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['order_sn']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['order']['buyer_name']) == '') ? '-' : htmlspecialchars($this->_var['order']['buyer_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['order']['shipping_fee']) == '') ? '-' : htmlspecialchars($this->_var['order']['shipping_fee']); ?></td>
            
            <td><?php echo (htmlspecialchars($this->_var['order']['discount']) == '') ? '-' : htmlspecialchars($this->_var['order']['discount']); ?></td>
        
            <td class="table-center"><?php if ($this->_var['order']['is_void'] == '1'): ?>作废<?php else: ?>正常<?php endif; ?></td>
            <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?></td>
            <td class="table-center" style="width:100px;position:relative;">
              <a href="index.php?app=warehouse&amp;act=view&amp;id=<?php echo $this->_var['order']['sell_id']; ?>">查看</a>
             <?php if ($this->_var['order']['invalid'] == '1'): ?>
              <a href="javascript:void(0);" onclick="subInvalid(<?php echo $this->_var['order']['sell_id']; ?>);">作废</a>
              <?php endif; ?>
              <a href="index.php?app=returned&amp;act=add&amp;sid=<?php echo $this->_var['order']['sell_id']; ?>">退货</a>
              <?php if ($this->_var['order']['status'] == 1): ?><?php endif; ?>
             
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="16">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
    <?php if ($this->_var['data_list']): ?>
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1">
            <td width="18%" class="firstCell">销售总计</td>
            <td width="16%">折后金额</td>
            <td width="16%">应收总额</td>
            <td width="16%">已收金额</td>
            <td>未收金额</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2">
            <td class="firstCell"><span class="total_text"><?php echo price_format($this->_var['total']['sell_amount'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['sell_money'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['total_money'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['amount_received'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['amount_uncollected'], '%s'); ?></span></td>
        </tr>
        </tbody>
    </table>
    <div id="dataFuncs">
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
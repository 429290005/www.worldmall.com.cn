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

function payment(id){
	$('#received_'+id).slideDown('slow');
}
function slideUp_fn(id){
	$('#received_'+id).slideUp('slow');
}

//付款
function sub_payment(o, id){
	var warning = $('#received_'+id+' .warning');
	var obj = $('#money_'+id);
	var money = parseFloat(obj.val());
	var total_price = parseFloat(obj.attr('total_price'));
	var settlement_amount = parseFloat(obj.attr('settlement_amount'));
	
	money = isNaN(money) ? 0 : money;
	total_price = isNaN(total_price) ? 0 : total_price;
	settlement_amount = isNaN(settlement_amount) ? 0 : settlement_amount;
	
	if(money <= 0){
		return;
	}
	
	//已结算金额大于采购金额
	if ((settlement_amount + money) > total_price) {
		if(!confirm('已结算金额大于采购金额，是否继续？')) {
			return;
		}
	}
	
	$(o).attr('disabled', true);
	obj.attr('disabled', true);
	warning.html('正在提交...');
	$.getJSON("index.php?app=purchase&act=payment", {id: id, money: money}, function(data){
		if (data.done){
			warning.html('修改成功');
			location.reload();
		}
	});
}

//作废
function subInvalid(id) {
	if(!confirm('确认作废该采购单吗？')){
		return false;
    }
	$.getJSON("index.php?app=purchase&act=invalid", {id: id}, function(data){
		if (data.done){
			location.reload();
		}
	});
}

//导出数据
function confirm_submit() {
	if(!confirm('确定要导出吗？')){
		return false;
  }
	var field = $(":input[name='field']").val();
	var search_name = $(":input[name='search_name']").val();
	var add_time_from = $(":input[name='add_time_from']").val();
	var add_time_to = $(":input[name='add_time_to']").val();
	var purchase_type = $(":input[name='purchase_type']").val();
	var status = $(":input[name='status']").val();
	var is_void = $(":input[name='is_void']").val();
	$.get("index.php?app=purchase&act=export_all",{field:field, search_name:search_name, add_time_from:add_time_from, add_time_to:add_time_to, purchase_type:purchase_type, status:status, is_void:is_void});
}
</script>
<div id="rightTop">
    <p>采购入库</p>
    <ul class="subnav">
        <li><span>管理</span></li>
        <li><a class="btn1" href="index.php?app=purchase&amp;act=add">采购入库</a></li>
        <li><a class="btn4" href="index.php?app=purchase&amp;act=import">批量导入采购单</a></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
             <div class="left">
                <input type="hidden" name="app" value="purchase" />
                <select class="querySelect" name="field">
                <?php echo $this->html_options(array('options'=>$this->_var['search_options'],'selected'=>$_GET['field'])); ?>
                </select>
                <input class="queryInput" type="text" name="search_name" value="<?php echo htmlspecialchars($this->_var['query']['search_name']); ?>" />
                采购日期从:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['add_time_from']; ?>" id="add_time_from" name="add_time_from" />
                至:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['add_time_to']; ?>" id="add_time_to" name="add_time_to" />
                入库类型:
                <select class="querySelect" name="purchase_type">
                <option value="">所有</option>
                <?php echo $this->html_options(array('options'=>$this->_var['purchase_type'],'selected'=>$_GET['purchase_type'])); ?>
                </select>
                结算状态:
                <select class="querySelect" name="status">
                <option value="">所有</option>
                <?php echo $this->html_options(array('options'=>$this->_var['status'],'selected'=>$_GET['status'])); ?>
                </select>
                是否作废:
                <select class="querySelect" name="is_void">
                <option value="">所有</option>
                <?php echo $this->html_options(array('options'=>$this->_var['status_invalid'],'selected'=>$_GET['is_void'])); ?>
                </select>
                <input type="submit" class="formbtn" value="查询" />
                <input type="submit" class="formbtn" name="export_all" value="导出" />
               <!-- onclick="confirm_submit();" />-->
            </div>
            <?php if ($this->_var['filtered']): ?>
            <!-- <a class="left formbtn1" href="index.php?app=purchase">撤销检索</a>-->
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
            <td width="11%" class="firstCell">采购单号</td>
            <td width="8%" class="table-center">采购日期</td>
            <td>供应商</td>
        	<td width="10%">供应商单号</td>
            <td width="6%" class="table-center">入库类型</td>
            <td width="6%">数量</td>
            <td width="7%">金额</td>
            <td width="7%">已结算金额</td>
            <td width="7%" class="table-center">是否已结算</td>
            <td class="table-center">是否作废</td>
            <td width="4%">采购员</td>
            <td width="12%" class="table-center">添加时间</td>
            <td width="8%" class="table-center">操作</td>
        </tr>
        <?php endif; ?>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
        <tr class="tatr2"<?php if ($this->_var['order']['is_void'] == '1'): ?> style="color:#F00;"<?php endif; ?>>
            <td class="firstCell"><?php echo htmlspecialchars($this->_var['order']['purchase_sn']); ?></td>
            <td class="table-center"><?php echo htmlspecialchars($this->_var['order']['purchase_time']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['store_name']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['order']['seller_sn']) == '') ? '-' : htmlspecialchars($this->_var['order']['seller_sn']); ?></td>
            <td class="table-center"><?php if ($this->_var['order']['purchase_type'] == 0): ?>采购入库<?php elseif ($this->_var['order']['purchase_type'] == 2): ?><span style="color:red;">采购退货</span><?php else: ?>其他<?php endif; ?></td>
            <td><?php echo $this->_var['order']['total_quantity']; ?></td>
            <td><?php echo price_format($this->_var['order']['total_price'], '%s'); ?></td>
            <td><?php if ($this->_var['order']['gt']): ?><span style="color:#090; font-weight:bold;"><?php echo price_format($this->_var['order']['settlement_amount'], '%s'); ?></span><?php else: ?><?php echo price_format($this->_var['order']['settlement_amount'], '%s'); ?><?php endif; ?></td>
            <td class="table-center"><?php if ($this->_var['order']['status'] == '1'): ?>已结算<?php elseif ($this->_var['order']['status'] == '2'): ?>未结清<?php elseif ($this->_var['order']['status'] == '3'): ?>对冲<?php else: ?>未结算<?php endif; ?></td>
            <td class="table-center"><?php if ($this->_var['order']['is_void'] == '1'): ?>作废<?php else: ?>正常<?php endif; ?></td>
            <td><?php echo (htmlspecialchars($this->_var['order']['buyer']) == '') ? '-' : htmlspecialchars($this->_var['order']['buyer']); ?></td>
            <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?></td>
            <td class="table-center">
              <a href="index.php?app=purchase&amp;act=view&amp;id=<?php echo $this->_var['order']['purchase_id']; ?>">查看</a>
              <?php if ($this->_var['order']['invalid'] == '1'): ?>
              <a href="javascript:void(0);" onclick="subInvalid(<?php echo $this->_var['order']['purchase_id']; ?>);">作废</a>
              <?php endif; ?>
              <?php if (( $this->_var['order']['status'] == '0' || $this->_var['order']['status'] == '2' ) && $this->_var['order']['is_void'] == '0'): ?>
              <a href="javascript:payment(<?php echo $this->_var['order']['purchase_id']; ?>);">结款</a>
                <div class="sell_received_money" id="received_<?php echo $this->_var['order']['purchase_id']; ?>">
                    <a href="javascript:slideUp_fn(<?php echo $this->_var['order']['purchase_id']; ?>);" class="close"></a>
                    <p><span>已付货款金额:</span><input name="money" id="money_<?php echo $this->_var['order']['purchase_id']; ?>" type="text" value="" total_price="<?php echo $this->_var['order']['total_price']; ?>" settlement_amount="<?php echo $this->_var['order']['settlement_amount']; ?>" />元</p>
                    <p><input type="button" class="submit" value="提交" onclick="sub_payment(this,<?php echo $this->_var['order']['purchase_id']; ?>);" /></p>
                    <p class="warning"></p>
                </div>
              <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="13">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
    <?php if ($this->_var['data_list']): ?>
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1">
            <td width="70" class="firstCell">数量</td>
            <td width="150">金额</td>
            <td width="150">已结算金额</td>
            <td>未结算金额</td>
            <td width="100" class="firstCell">采购退货数量</td>
            <td width="150">采购退货金额</td>
            <td width="150">已结算退货金额</td>
            <td>未结算退货金额</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2">
            <td class="firstCell"><span class="total_text"><?php echo ($this->_var['total']['total_quantity'] == '') ? '0' : $this->_var['total']['total_quantity']; ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['total_price'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['settlement_amount'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['not_settlement_amount'], '%s'); ?></span></td>
            <td class="firstCell"><span class="total_text"><?php echo ($this->_var['total']['total_returns_quantity'] == '') ? '0' : $this->_var['total']['total_returns_quantity']; ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['total_returns_price'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['settlement_returns_amount'], '%s'); ?></span></td>
            <td><span class="total_text"><?php echo price_format($this->_var['total']['not_settlement_returns_amount'], '%s'); ?></span></td>
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
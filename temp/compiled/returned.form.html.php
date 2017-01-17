<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.AddIncSearch-min.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
$(function(){
	$('#refund_time').datepicker({dateFormat: 'yy-mm-dd'});
	
	//退货物品
	$(".checkitem").click(function(){
		if($(this).attr('checked')) {
			$(this).parents('tr').find('td input[class="infoTableInput10"]').attr('disabled',false);
		}else {
			$(this).parents('tr').find('td input[class="infoTableInput10"]').attr('disabled',true);
		}
	});
	
	countMoney();
});

//计算
function countMoney(){
	$('input[name="price[]"], input[name="quantity[]"], input[name="money[]"]').unbind().keyup(function(){
		var obj_p = $(this).parents('tr').find('td input[name="price[]"]');		    //销售单价对象
		var obj_ps = $(this).parents('tr').find('td input[name="prices[]"]');		    //销售单价对象
		var obj_q = $(this).parents('tr').find('td input[name="quantity[]"]');		//销售数量对象
		var obj_m = $(this).parents('tr').find('td input[name="money[]"]');		    //销售金额对象
		var obj_ms = $(this).parents('tr').find('td input[name="moneys[]"]');		    //销售金额对象
		var obj_num = $(this).parents('tr').find('td input[name="num[]"]');		    //销售金额对象
		
		
		//当在输入销售数量时进行检查是否合法
		if ($(this).attr('name') == 'quantity[]'){
			var re = /^[1-9]\d*$/;
			if (!re.test($(this).val())){
				$(this).val('');
			}
		}
		
		var price = isNaN(parseFloat(obj_p.val())) ? 0 : parseFloat(obj_p.val());    //销售单价
		var prices = isNaN(parseFloat(obj_ps.val())) ? 0 : parseFloat(obj_ps.val());    //销售单价
		var quantity = isNaN(parseInt(obj_q.val())) ? 0 : parseInt(obj_q.val());	 //销售数量
		var money = isNaN(parseFloat(obj_m.val())) ? 0 : parseFloat(obj_m.val());	 //销售金额
		var num = isNaN(parseInt(obj_num.val())) ? 0 : parseInt(obj_num.val());	 //销售数量
		
		//当输入销售金额时计算销售单价
		if ($(this).attr('name') == 'money[]'){
			if(quantity>num){
				alert(lang.refund_num_min);
				obj_q.val(num);
				quantity.focus();
				}
			if (quantity > 0) {
				price = Math.round(money / quantity * 100) / 100;
				obj_p.val(price);
			} else {
				obj_p.val(0);
			}
		} else {
			
			if(quantity>num){					
				alert(lang.refund_num_min);
				obj_q.val(num);
				quantity.focus();
				}
			//金额
			obj_m.val(Math.round(price * quantity * 100) / 100);			
		}
		obj_ms.val(Math.round(prices * quantity * 100) / 100);
	});
}

//提交
function confirm_submit() {
	
	
	if(!confirm('是否确认无误？')){
		return false;
    }
	$('#returned_form').submit();
}
</script>
<div id="rightTop">
  <p>退货管理</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=returned">退货列表</a></li>
  </ul>
</div>
<form method="post" enctype="multipart/form-data" name="returned_form" id="returned_form">
<input type="hidden" name="app" value="<?php echo $_GET['app']; ?>" />
<input type="hidden" name="act" value="<?php echo $_GET['act']; ?>" />
<input type="hidden" name="total_money" value="<?php echo $this->_var['sell_info']['total_money']; ?>" />
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color:#B9FFFF;">
        	<td class="firstCell">原销售单号</td>
            <td>退货时间</td>
            <td>退货渠道</td>
        	<td>订单编号</td>
            <td>客户用户名</td>
            <td>支付方式</td>
            <td>物流方式</td>
            <td>快递单号</td>
            <td>运费</td>
            <td>客户备注</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><input name="sell_sn" type="text" class="infoTableInput4" id="sell_sn" value="<?php echo htmlspecialchars($this->_var['sell_info']['sell_sn']); ?>" readonly="readonly" /></td>
            <td><input class="infoTableInput3 pick_date" id="refund_time" type="text" name="refund_time" value="<?php echo htmlspecialchars($this->_var['refund']['refund_time']); ?>" readonly="readonly" /></td>
            <td>
                <select class="querySelect" name="returned_type" id="returned_type" style="width:62px;">
                	<?php echo $this->html_options(array('options'=>$this->_var['returned_type'],'selected'=>$this->_var['sell_info']['order_type'])); ?>
                </select>
            </td>
            <td><input class="infoTableInput3" id="order_sn" type="text" name="order_sn" value="<?php echo $this->_var['sell_info']['order_sn']; ?>" readonly="readonly" /></td>
            <td>
                <select class="infoTableInput4 querySelect" name="buyer_id" id="buyer_id" >
                	<?php echo $this->html_options(array('options'=>$this->_var['buyers'],'selected'=>$this->_var['sell_info']['buyer_id'])); ?>
                </select>
            </td>
            <td><input class="infoTableInput3" id="payment" type="text" name="payment" value="<?php echo $this->_var['sell_info']['payment']; ?>" readonly="readonly" /></td>
            <td><input class="infoTableInput3" id="shipping_name" type="text" name="shipping_name" value="<?php echo $this->_var['sell_info']['shipping_name']; ?>" readonly="readonly" /></td>
            <td><input class="infoTableInput3" id="shipping_sn" type="text" name="shipping_sn" value="<?php echo $this->_var['sell_info']['shipping_sn']; ?>" readonly="readonly" /></td>
            <td><input class="infoTableInput3" id="shipping_fee" type="text" name="shipping_fee" value="<?php echo $this->_var['sell_info']['shipping_fee']; ?>" readonly="readonly" /></td>
            <td><input class="infoTableInput3" id="buyer_remark" type="text" name="buyer_remark" value="<?php echo $this->_var['sell_info']['remark']; ?>" /></td>
        </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color: #BDF;">
            <td width="5%" class="firstCell"></td>
            <td>世界窗货号</td>
            <td>商品名称</td>
            <td>品牌</td>
        	<td>供应商货号</td>
            <td>颜色</td>
            <td class="table-center">单位</td>
            <td>规格</td>
            <td>销售单价</td>
            <td>成本价</td>
            <td>出仓数量</td>
            <td>己退数量</td>
            <td>退货数量</td>
            <td>退货价格</td>
             
            <td>退货金额</td>
            <td>成本总金额</td>
            <td>是否次品</td>
            <td>备注</td>
        </tr>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data']['sd']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
        <tr class="tatr2" style="background-color:#E1FFF0;">
        	<td class="firstCell"><?php if ($this->_var['goods']['refund_num'] != $this->_var['goods']['watehouse_num']): ?><input type="checkbox" class="checkitem" name="sell_detailed_id[]" value="<?php echo $this->_var['key']; ?>" /><?php else: ?><?php endif; ?></td>
            <td><input class="infoTableInput10" type="text" name="goods_sn[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['goods_sn']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_sn']); ?>" style="width:85px;" readonly="readonly" /></td>
            <td><input class="infoTableInput10" type="text" name="goods_name[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['goods_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_name']); ?>" style="width:85px;" readonly="readonly" /></td>
            <td><input class="infoTableInput10" type="text" name="brand_name[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['brand_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['brand_name']); ?>" readonly="readonly" style="width:45px;" /></td>
            <td><input class="infoTableInput10" type="text" name="store_goods_code[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['store_goods_code']) == '') ? '-' : htmlspecialchars($this->_var['goods']['store_goods_code']); ?>" readonly="readonly" style="width:45px;" /></td>
            <td><input class="infoTableInput10" type="text" name="goods_colour[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['goods_colour']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_colour']); ?>" style="width:45px;" readonly="readonly" /></td>
            <td class="table-center"><input class="infoTableInput10" type="text" name="unit[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['unit']) == '') ? '-' : htmlspecialchars($this->_var['goods']['unit']); ?>" style="width:30px;" readonly="readonly" /></td>
            <td><input class="infoTableInput10" type="text" name="goods_specification[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_specification']); ?>" style="width:50px;" readonly="readonly" /></td>
            <td><?php echo price_format($this->_var['goods']['price'], '%s'); ?></td>
            <td><?php echo price_format($this->_var['goods']['price_cost'], '%s'); ?><input class="" type="hidden" name="prices[]" value="<?php echo price_format($this->_var['goods']['price_cost'], '%s'); ?>" /></td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['watehouse_num']) == '') ? '-' : htmlspecialchars($this->_var['goods']['watehouse_num']); ?>
            
            <input class="infoTableInput10" type="hidden" name="num[]" value="<?php echo $this->_var['goods']['min_num']; ?>" style="width:45px;" />
            
            </td>            
          <td><?php echo (htmlspecialchars($this->_var['goods']['refund_num']) == '') ? '-' : htmlspecialchars($this->_var['goods']['refund_num']); ?></td>
            <td><input class="infoTableInput10" type="text" name="quantity[]" value="" style="width:45px;" disabled="disabled" /></td>
            <td><input class="infoTableInput10" type="text" name="price[]" value="<?php echo price_format($this->_var['goods']['price'], '%s'); ?>" style="width:50px;" disabled="disabled" /></td>
            <td><input class="infoTableInput10" type="text" name="money[]" disabled="disabled" value="" style="width:60px;" readonly="readonly" /></td>
            
            <td><input class="infoTableInput10" type="text" name="moneys[]" disabled="disabled" value="" style="width:60px;" readonly="readonly" /></td>
            
            <td><input class="infoTableInput10" type="checkbox" name="defective[]"  disabled="disabled"value="<?php echo $this->_var['goods']['sell_detailed_id']; ?>" /></td>
            <td><input class="infoTableInput10" type="text" name="remark[]" disabled="disabled" value="" style="width:50px;" /></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
    
    <div id="dataFuncs">
    	<div class="printLinks">
        </div>
        <div class="submit-center">
        	<input class="formbtn" type="button" name="Submit" value="提交" onclick="confirm_submit();" />
            <input class="formbtn" type="reset" name="Reset" value="重置" />
        </div>
    </div>
    <div class="clear"></div>
</div>
</form>
<?php echo $this->fetch('footer.html'); ?>
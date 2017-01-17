<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.AddIncSearch-min.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">


$(function(){
	$('#refund_time').datepicker({dateFormat: 'yy-mm-dd'});
		
	//退货物品
	$(".checkitem").click(function(){
		if($(this).attr('checked')) {
			$(this).parents('tr').find('td input[class="infoTableInput10"]').attr('disabled',false);
			$('input[name="quantity[]"]').keyup();
		}else {
			$(this).parents('tr').find('td input[class="infoTableInput10"]').attr('disabled',true);			
		}
	});
	
	//备注放大
	$('#buyer_remark').click(function(){var $THIS=$(this);$THIS.animate({width:'300px',height:'200px'});$THIS.keyup(function(){});$THIS.blur(function(){$THIS.animate({width:'160px',height:'18px'})})});
	
	countMoney();
	
	$('#returned_form').validate({
    errorPlacement: function(error, element) {
        $(element).next('.field_notice').hide();
        $(element).after(error)
    },
    success: function(label) {
        label.addClass('right').text('OK!')
    },
    onkeyup: false,
    rules: {
        refund_time: {
            required: true
        },
    },
    messages: {
        refund_time: {
            required: '出仓时间不能为空...'
        },
    }
});
	
	
});

//计算
function countMoney() {
    $('input[name="price[]"], input[name="quantity[]"], input[name="money[]"]').unbind().keyup(function() {
        var obj_p = $(this).parents('tr').find('td input[name="price[]"]');
        var obj_q = $(this).parents('tr').find('td input[name="quantity[]"]');
        var obj_m = $(this).parents('tr').find('td input[name="money[]"]');
        var obj_qOld = $(this).parents('tr').find('td input[name="quantitys[]"]');
        quantitys = parseInt(obj_qOld.val());
        if ($(this).attr('name') == 'quantity[]') {
            var re = /^[1-9]\d*$/;
            if (!re.test($(this).val())) {
                obj_q.val(quantitys);
                $('input[name="price[]"], input[name="quantity[]"], input[name="money[]"]').keyup()
            }
        }
        var price = isNaN(parseFloat(obj_p.val())) ? 0 : parseFloat(obj_p.val());
        var quantity = isNaN(parseInt(obj_q.val())) ? 0 : parseInt(obj_q.val());
        var money = isNaN(parseFloat(obj_m.val())) ? 0 : parseFloat(obj_m.val());
        if ($(this).attr('name') == 'money[]') {
            if (quantity > quantitys) {
                obj_q.val(quantitys);
                $('input[name="price[]"], input[name="quantity[]"], input[name="money[]"]').keyup();
                return
            } else if (quantity > 0) {
                price = Math.round(money / quantity * 100) / 100;
                obj_p.val(price)
            } else {
                obj_p.val(0)
            }
        } else {
            if (quantity > quantitys) {
                obj_q.val(quantitys);
                $('input[name="price[]"], input[name="quantity[]"], input[name="money[]"]').keyup();
                return
            }
            obj_m.val(Math.round(price * quantity * 100) / 100)
        }
    })
}





//提交
function confirm_submit() {
	var url="index.php?app=warehouse&act=is_stock";	
	var num = $('input[name="quantity[]"]:not(:disabled)').size();	
	var s = 0,msg='';	
	$('input[name="quantity[]"]:not(:disabled)').each(function(i){		
		var $THIS = $(this);
		var sell_obj = $(this).parents('tr').find('td input[name="goods_sn[]"]');		//销售数量对象
		var sell_id = sell_obj.val();
		var quantity = parseInt($(this).val());				
		$.getJSON(url + "&sid=" + sell_id + '&quantity=' + quantity,
		function(retdata) {
			if (retdata.done) {
				$THIS.css('border-color', ''); ++s
			} else {
				msg = msg + '\n' + retdata.msg;
				$THIS.css('border-color', 'red')
			}
			if (num == i + 1) {
				if(msg)
				alert(msg);
				if (s == num) {
					if (!confirm('是否确认无误？')) {
						return false
					}
					$('#returned_form').submit()
				}
			}
		});	
	});
	
	
	
}
</script>
<div id="rightTop">
  <p>出仓列表</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=returned">出仓列表</a></li>
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
            <td>出仓时间</td>
            <td>出仓渠道</td>
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
            <td><input name="order_sn" type="text" class="infoTableInput3" id="order_sn" value="<?php echo $this->_var['sell_info']['order_sn']; ?>" readonly="readonly" /></td>
            <td>
                <select class="infoTableInput4 querySelect" name="buyer_id" id="buyer_id" >
                	<?php echo $this->html_options(array('options'=>$this->_var['buyers'],'selected'=>$this->_var['sell_info']['buyer_id'])); ?>
                </select>
            </td>
            <td><input name="payment" type="text" disabled="disabled" class="infoTableInput3" id="payment" value="<?php echo $this->_var['sell_info']['payment']; ?>"  /></td>
            <td><input name="shipping_name" type="text" class="infoTableInput3" id="shipping_name" value="<?php echo $this->_var['sell_info']['shipping_name']; ?>" /></td>
            <td><input class="infoTableInput3" id="shipping_sn" type="text" name="shipping_sn" value="<?php echo $this->_var['sell_info']['shipping_sn']; ?>" /></td>
            <td><input class="infoTableInput3" id="shipping_fee" type="text" name="shipping_fee" value="<?php echo $this->_var['sell_info']['shipping_fee']; ?>" /></td>
            <td style="width:280px;position:relative;top:10px;">          
            
            <textarea name="buyer_remark" class="infoTableInput3" id="buyer_remark" style="position:absolute;left:0px;top:0px;"></textarea>
            <input class="infoTableInput3" id="buyer_remark_old" type="hidden" name="buyer_remark_old" value="<?php echo $this->_var['sell_info']['buyer_remark']; ?>" />
            
            </td>
        </tr>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td colspan="10" class="firstCell">备注<?php echo $this->_var['sell_info']['buyer_remark']; ?></td>
          </tr>
          
          
          <tr class="tatr2" style="background-color:#E1FFF0;">
          <td class="firstCell">收件人姓名：</td>
          <td><?php echo $this->_var['client_p']['name']; ?></td>
          <td>&nbsp;</td>
          <td colspan="2">收件人电话：<?php echo $this->_var['client_p']['phone']; ?></td>
          <td colspan="5">收件人地址:<?php echo $this->_var['client_p']['address']; ?></td>
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
            <td>成本价
          </td>
            <td>数量</td>
            <td>出仓数量</td>
           
            <td>出仓金额</td>
            
          <td>备注</td>
        </tr>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data']['sd']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
        <tr class="tatr2" style="background-color:#E1FFF0;">
        	<td class="firstCell"><input type="checkbox" class="checkitem" name="sell_detailed_id[]" value="<?php echo $this->_var['key']; ?>" /></td>
            <td><input class="infoTableInput10" type="text" name="goods_sn[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['goods_sn']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_sn']); ?>" style="width:85px;" readonly="readonly" /></td>
            <td><input class="infoTableInput10" type="text" name="goods_name[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['goods_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_name']); ?>" style="width:185px;" readonly="readonly" /></td>
            <td><input class="infoTableInput10" type="text" name="brand_name[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['brand_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['brand_name']); ?>" readonly="readonly" /></td>
            <td><input class="infoTableInput10" type="text" name="store_goods_code[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['store_goods_code']) == '') ? '-' : htmlspecialchars($this->_var['goods']['store_goods_code']); ?>" readonly="readonly" /></td>
            <td><input class="infoTableInput10" type="text" name="goods_colour[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['goods_colour']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_colour']); ?>" style="width:45px;" readonly="readonly" /></td>
            <td class="table-center"><input class="infoTableInput10" type="text" name="unit[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['unit']) == '') ? '-' : htmlspecialchars($this->_var['goods']['unit']); ?>" style="width:30px;" readonly="readonly" /></td>
            <td><input class="infoTableInput10" type="text" name="goods_specification[]" disabled="disabled" value="<?php echo (htmlspecialchars($this->_var['goods']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_specification']); ?>" style="width:50px;" readonly="readonly" /></td>
            <td><?php echo price_format($this->_var['goods']['price'], '%s'); ?></td>
            <td><?php echo price_format($this->_var['goods']['price_cost'], '%s'); ?>
            <input class="infoTableInput10" type="hidden" name="price[]" value="<?php echo price_format($this->_var['goods']['price_cost'], '%s'); ?>" style="width:50px;" disabled="disabled" />
            </td>
            <td><?php echo (htmlspecialchars($this->_var['goods']['quantity']) == '') ? '-' : htmlspecialchars($this->_var['goods']['quantity']); ?></td>
            <td>
            
            <input class="infoTableInput10" type="hidden" name="quantitys[]" value="<?php echo (htmlspecialchars($this->_var['goods']['quantity']) == '') ? '-' : htmlspecialchars($this->_var['goods']['quantity']); ?>" />
            <input class="infoTableInput10" type="text" name="quantity[]" value="<?php echo (htmlspecialchars($this->_var['goods']['quantity']) == '') ? '-' : htmlspecialchars($this->_var['goods']['quantity']); ?>" style="width:45px;" disabled="disabled" /></td>
          
            <td><input class="infoTableInput10" type="text" name="money[]" disabled="disabled" value="" style="width:60px;" readonly="readonly" /></td>
            
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
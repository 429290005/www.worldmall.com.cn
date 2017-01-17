<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.AddIncSearch.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">

$(function(){
	$('#purchase_time').datepicker({dateFormat: 'yy-mm-dd'});
	
    $('#purchase_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            //$(element).after('');
        },
        success       : function(label){
            //label.addClass('right').text('OK!');
        },
        onkeyup    : false,
        rules : {
            'quantity[]' : {
                required : true
            },
            'goods_sn[]' : {
                required : true
            }
        },
        messages : {
            'quantity[]' : {
                required : ''
            },
            'goods_sn[]' : {
                required : ''
            }
        }
    });
	
	//回车添加一行
	$('#purchase_form').keydown(function(event){
		switch(event.keyCode) {
			case 13:
				add_tr();
				break;
			default:
				return true;
		}
	});
	
	countMoney();
	addIS();
});

//是否已结算
function select_status(o) {
	var v = $(o).val();
	var s_c = parseFloat($('#total_price').text());
	s_c = isNaN(s_c) ? 0 : s_c;
	
	$('#html_settlement_amount').html(0);
	$('#html_not_settlement_amount').html(s_c);
	
	if (v == 2){
		$('#settlement_amount').val(0);
		$('#select_status').show();
		
		//已结算金额
		$('#settlement_amount').unbind().keyup(function(){
			var s_c = parseFloat($('#total_price').text());
			s_c = isNaN(s_c) ? 0 : s_c;
			var settlement_amount = parseFloat($(this).val());
			settlement_amount = isNaN(settlement_amount) ? 0 : settlement_amount;
			var not_settlement_amount = s_c - settlement_amount;
			
			if (s_c <= 0) {
				settlement_amount = 0;
				not_settlement_amount = 0;
			}
			
			$('#html_settlement_amount').html(settlement_amount);
			$('#html_not_settlement_amount').html(not_settlement_amount);
		});
	} else if (v == 1) {
		$('#html_settlement_amount').html(s_c);
		$('#html_not_settlement_amount').html(0);
	} else {
		$('#select_status').hide();
	}
}

//计算
function countMoney(){
	$('input[name="price_purchase[]"], input[name="discount[]"], input[name="quantity[]"], input[name="money[]"]').unbind().keyup(function(){
		var obj_p = $(this).parents('tr').find('td input[name="price_purchase[]"]');	//采购价对象
		var obj_d = $(this).parents('tr').find('td input[name="discount[]"]');		//折扣率对象
		var obj_q = $(this).parents('tr').find('td input[name="quantity[]"]');			//数量对象
		var obj_m = $(this).parents('tr').find('td input[name="money[]"]');				//金额对象
		
		//当在输入数量时进行检查是否合法
		if ($(this).attr('name') == 'quantity[]'){
			var re = /^[1-9]\d*$/;
			if (!re.test($(this).val())){
				$(this).val('');
			}
		}
		
		var price = isNaN(parseFloat(obj_p.val())) ? 0 : parseFloat(obj_p.val());    //采购价
		var discount = isNaN(parseFloat(obj_d.val())) ? 0 : parseFloat(obj_d.val()); //折扣率
		var quantity = isNaN(parseInt(obj_q.val())) ? 0 : parseInt(obj_q.val());	 //数量
		var money = isNaN(parseFloat(obj_m.val())) ? 0 : parseFloat(obj_m.val());	 //金额
		
		//当输入采购金额时计算采购价
		if ($(this).attr('name') == 'money[]'){
			if (quantity > 0) {
				price = Math.round(money / quantity * 100) / 100;
				obj_p.val(price);
			} else {
				obj_p.val(0);
			}
		} else {
			//金额
			obj_m.val(Math.round(price * quantity * 100) / 100);
		}
		
		//折扣率
		var pr = $(this).parents('tr').find('td input[name="price_retail[]"]').val();  //零售价
		var pr = isNaN(parseFloat(pr)) ? 0 : parseFloat(pr);
		if ($(this).attr('name') == 'discount[]'){
			price = Math.round(pr * discount / 100 * 100) / 100;
			obj_p.val(price);
		} else {
			if (pr > 0) {
				$(this).parents('tr').find('td input[name="discount[]"]').val(Math.round(price / pr * 100 * 100) / 100);
			} else {
				$(this).parents('tr').find('td input[name="discount[]"]').val(100);
			}
		}
		
		//当输入采购单价时，判断价格浮动
		if ($(this).attr('name') == 'price_purchase[]'){
			var price_average = $(this).parents('tr').find('td input[name="price_average"]').val();
			var price_average = isNaN(parseFloat(price_average)) ? 0 : parseFloat(price_average);
			//延迟检查
			if ($(this).data('timeout')) {
				clearTimeout($(this).data('timeout'));
			}
			$(this).data('timeout', setTimeout(function(){
				var pa = 0;
				if (price_average != 0) {
					pa = (price - price_average) / price_average;
				}
				if (pa < -0.15 || pa > 0.15) {
					var msg = '您输入的采购单价已经超过历史均价(%s)的15%浮动价格，请注意！';
					alert(msg.replace('%s', price_average));
				}
			}, 500));
		}
		
		//计算采购总额
		var s_c = 0;
		$('input[name="money[]"]').each(function(i, n){
			var v = parseFloat($(this).val());
			if (isNaN(v)){
				v = 0;
			}
			s_c += v;
		});
		s_c = Math.round(s_c * 100) / 100;
		
		//计算采购数量
		var s_q = 0;
		$('input[name="quantity[]"]').each(function(i, n){
			var q = parseInt($(this).val());
			if (isNaN(q)){
				q = 0;
			}
			s_q += q;
		});
		
		$('#total_quantity').html(s_q);
		$('#total_price').html(s_c);
		
		//已结算金额
		var settlement_amount = parseFloat($('#settlement_amount').val());
		if (isNaN(settlement_amount)) {
			settlement_amount = 0;
		}
		var not_settlement_amount = s_c - settlement_amount;
		if (s_c <= 0) {
			settlement_amount = 0;
			not_settlement_amount = 0;
		}
		$('#html_settlement_amount').html(settlement_amount);
		$('#html_not_settlement_amount').html(not_settlement_amount);
	});
}

function addIS(){
	$('.select_search').AddIncSearch({
        maxListSize   : 20,
        maxMultiMatch : 50,
		maxListWidth  : '600px',
		searchName	  : 'goods_name[]',
		warnMultiMatch: '显示前{0}条匹配...',
		warnNoMatch   : '没有可匹配的商品...',
		onSelect: function(list_item,t) {				
			var obj = $(list_item);			
			var v = parseInt(obj.val());
			//alert(v);
			obj = $(t);
			if (v > 0){
				$.getJSON("index.php?app=purchase&act=get_goods", {id: v}, function(data){
					if (data.done){
						
						
						obj.parents('tr').find('td input[name="goods_id[]"]').val(data.retval.goods_id);
						obj.parents('tr').find('td input[name="goods_sn[]"]').val(data.retval.goods_code);
						obj.parents('tr').find('td input[name="goods_category[]"]').val(data.retval.goods_category);
						obj.parents('tr').find('td input[name="brand_name[]"]').val(data.retval.goods_brand);
						obj.parents('tr').find('td input[name="store_goods_code[]"]').val(data.retval.store_goods_code);
						obj.parents('tr').find('td input[name="goods_colour[]"]').val(data.retval.goods_colour);
						obj.parents('tr').find('td input[name="unit[]"]').val(data.retval.unit);
						obj.parents('tr').find('td input[name="goods_specification[]"]').val(data.retval.goods_specification);
						obj.parents('tr').find('td input[name="price_crane[]"]').val(data.retval.price_crane);
						obj.parents('tr').find('td input[name="price_retail[]"]').val(data.retval.price_retail);
						obj.parents('tr').find('td input[name="price_average"]').val(data.retval.price_average);
						
						obj.parents('tr').find('td input[name="price_purchase[]"]').focus();
						
						var quantity = parseInt(obj.parents('tr').find('td input[name="quantity[]"]').val());
						var price = parseFloat(obj.parents('tr').find('td input[name="price_purchase[]"]').val());
						quantity = isNaN(quantity) ? 0 : quantity;
						price = isNaN(price) ? 0 : price;
						
						//折扣率
						if (data.retval.price_retail > 0) {
							obj.parents('tr').find('td input[name="discount[]"]').val(Math.round(price / data.retval.price_retail * 100 * 100) / 100);
						} else {
							obj.parents('tr').find('td input[name="discount[]"]').val(100);
						}
						
						//金额
						obj.parents('tr').find('td input[name="money[]"]').val(Math.round(price * quantity * 100) / 100);
					}
				});
			} else {
				obj.parents('tr').find('td input[name="goods_sn[]"]').val('');
				obj.parents('tr').find('td input[name="goods_category[]"]').val('');
				obj.parents('tr').find('td input[name="brand_name[]"]').val('');
				obj.parents('tr').find('td input[name="store_goods_code[]"]').val('');
				obj.parents('tr').find('td input[name="goods_colour[]"]').val('');
				obj.parents('tr').find('td input[name="unit[]"]').val('');
				obj.parents('tr').find('td input[name="goods_specification[]"]').val('');
				obj.parents('tr').find('td input[name="price_crane[]"]').val('');
				obj.parents('tr').find('td input[name="price_retail[]"]').val('');
				obj.parents('tr').find('td input[name="price_purchase[]"]').val('');
				obj.parents('tr').find('td input[name="discount[]"]').val('');
				obj.parents('tr').find('td input[name="quantity[]"]').val('');
				obj.parents('tr').find('td input[name="money[]"]').val('');
				obj.parents('tr').find('td input[name="price_average"]').val(0);
			}
		}
	});
}


//增加一行
function add_tr(){
	var html = '<tr class="tatr2" style="background-color:#E1FFF0;">'+
			   '<td class="firstCell"><input class="infoTableInput3" type="text" name="goods_sn[]" value="" style="width:85px;" readonly="readonly" /></td>'+
			   '<td><select class="infoTableInput2 select_search" name=""><input class="infoTableInput2" type="hidden" name="goods_id[]" value="" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="goods_category[]" value="" readonly="readonly" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="brand_name[]" value="" readonly="readonly" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="store_goods_code[]" value="" readonly="readonly" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="goods_colour[]" value="" style="width:45px;" readonly="readonly" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="unit[]" value="" style="width:30px;" readonly="readonly" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="goods_specification[]" value="" readonly="readonly" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="price_crane[]" value="" style="width:55px;" readonly="readonly" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="price_retail[]" value="" style="width:55px;" readonly="readonly" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="price_purchase[]" value="" style="width:55px;" /><input name="price_average" type="hidden" value="0" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="discount[]" value="" style="width:45px;" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="quantity[]" value="" style="width:45px;" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="money[]" value="" /></td>'+
			   '<td><input class="infoTableInput3" type="text" name="remark[]" value="" /></td>'+
			   '</tr>';		
    
	$('#input_tr tbody').append(html);
	countMoney();
	addIS();
}

//删除一行
function delete_tr(){
	if ($('#input_tr tbody tr').length <= 1){
		return;
	}
	$('#input_tr tbody tr:last').remove();
	countMoney();
	addIS();
}

//提交
function confirm_submit() {
	if(!confirm('是否确认无误？')){
		return false;
    }
	$('#purchase_form').submit();
}
</script>
<div id="rightTop">
  <p>采购入库</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=purchase">管理</a></li>
    <li><span>采购入库</span></li>
  </ul>
</div>
<form method="post" enctype="multipart/form-data" name="purchase_form" id="purchase_form">

<input type="hidden" name="app" value="<?php echo $_GET['app']; ?>" />
<input type="hidden" name="act" value="<?php echo $_GET['act']; ?>" />
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color:#B9FFFF;">
            <td width="15%" class="firstCell">采购单号</td>
            <td width="13%">采购日期</td>
            <td width="13%">供应商</td>
        	<td width="13%">供应商单号</td>
            <td width="6%">入库类型</td>
            <td width="9%">采购员</td>
            <td>是否已结算</td><td>是否已结算</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><input name="purchase_sn" type="text" class="infoTableInput2" id="purchase_sn" value="<?php echo htmlspecialchars($this->_var['store']['purchase_sn']); ?>" readonly="readonly" /></td>
            <td><input class="infoTableInput2 pick_date" id="purchase_time" type="text" name="purchase_time" value="<?php echo htmlspecialchars($this->_var['store']['purchase_time']); ?>" readonly="readonly" /></td>
            <td>
                <select class="querySelect infoTableInput2" name="seller_id" id="seller_id">
                <?php echo $this->html_options(array('options'=>$this->_var['sellers'])); ?>
                </select>
            </td>
            <td><input class="infoTableInput2" id="store_name_sn" type="text" name="store_name_sn" value="" /></td>
            <td>
                <select class="querySelect" name="purchase_type" id="purchase_type">
                <?php echo $this->html_options(array('options'=>$this->_var['purchase_type'])); ?>
                </select>
            </td>
            <td><input class="infoTableInput3" id="buyer" type="text" name="buyer" value="" /></td>
            <td>
                <select class="querySelect" name="status" id="status" onchange="select_status(this);">
                <?php echo $this->html_options(array('options'=>$this->_var['status'])); ?>
                </select>
                <span id="select_status" style="display:none;">
                已结算金额:<input class="infoTableInput3" id="settlement_amount" type="text" name="settlement_amount" value="" />
                </span>
            </td>
            <td><select class="infoTableInput2 select_search" name="">
                <?php echo $this->html_options(array('options'=>$this->_var['goods'])); ?>
                </select></td>
        </tr>
        </tbody>
    </table>
    
    <table width="100%" cellspacing="0" class="dataTable" id="input_tr">
    	<thead>
        <tr class="tatr1" style="background-color: #BDF;">
            <td class="firstCell">世界窗货号</td>
            <td>商品名称</td>
            <td>商品类别</td>
            <td>品牌</td>
        	<td>供应商货号</td>
            <td>颜色</td>
            <td>单位</td>
            <td>规格</td>
            <td>吊牌价</td>
            <td>零售价</td>
            <td>采购价</td>
            <td>折扣率(%)</td>
            <td>数量</td>
            <td>金额</td>
            <td>备注</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><input class="infoTableInput3" type="text" name="goods_sn[]" value="" style="width:85px;" readonly="readonly" /></td>
            <td>
                <select class="infoTableInput2 select_search" name="">
               
                </select>
                <input class="infoTableInput2" type="hidden" name="goods_id[]" value="" />
            </td>
            <td><input class="infoTableInput3" type="text" name="goods_category[]" value="" readonly="readonly" /></td>
            <td><input class="infoTableInput3" type="text" name="brand_name[]" value="" readonly="readonly" /></td>
            <td><input class="infoTableInput3" type="text" name="store_goods_code[]" value="" readonly="readonly" /></td>
            <td><input class="infoTableInput3" type="text" name="goods_colour[]" value="" style="width:45px;" readonly="readonly" /></td>
            <td><input class="infoTableInput3" type="text" name="unit[]" value="" style="width:30px;" readonly="readonly" /></td>
            <td><input class="infoTableInput3" type="text" name="goods_specification[]" value="" readonly="readonly" /></td>
            <td><input class="infoTableInput3" type="text" name="price_crane[]" value="" style="width:55px;" readonly="readonly" /></td>
            <td><input class="infoTableInput3" type="text" name="price_retail[]" value="" style="width:55px;" readonly="readonly" /></td>
            <td><input class="infoTableInput3" type="text" name="price_purchase[]" value="" style="width:55px;" /><input name="price_average" type="hidden" value="0" /></td>
            <td><input class="infoTableInput3" type="text" name="discount[]" value="" style="width:45px;" /></td>
            <td><input class="infoTableInput3" type="text" name="quantity[]" value="" style="width:45px;" /></td>
            <td><input class="infoTableInput3" type="text" name="money[]" value="" /></td>
            <td><input class="infoTableInput3" type="text" name="remark[]" value="" /></td>
        </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" class="dataTable">
    	<thead>
        <tr class="tatr1" style="background-color: #B9FFFF;">
            <td width="12%" class="firstCell">数量</td>
            <td width="12%">金额</td>
            <td width="12%">已结算金额</td>
            <td>未结算金额</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tatr2" style="background-color:#E1FFF0;">
            <td class="firstCell"><span class="total_text" id="total_quantity">0</span></td>
            <td><span class="total_text" id="total_price">0.00</span></td>
            <td><span class="total_text" id="html_settlement_amount">0.00</span></td>
            <td><span class="total_text" id="html_not_settlement_amount">0.00</span></td>
        </tr>
        </tbody>
    </table>
    <div id="dataFuncs">
    	<div class="printLinks">
        	<?php if (! $this->_var['data_goods']): ?>
            <a class="btn3" href="javascript:add_tr();">新增一行</a>
            <a class="btn3" href="javascript:delete_tr();">删除一行</a>
            <?php endif; ?>
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
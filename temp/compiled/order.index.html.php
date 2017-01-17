<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->_var['site_url']; ?>/includes/libraries/Lodop/LodopFuncs.js"></script>
<object id="LODOP" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=0 height=0> 
	<embed id="LODOP_EM" TYPE="application/x-print-lodop" width=0 height=0 PLUGINSPAGE="<?php echo $this->_var['site_url']; ?>/includes/libraries/Lodop/install_lodop.exe"></embed>
</object> 
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
	
	$('#print_type').change(function(){
		var v = $(this).val();
		if (v == 1) {
			$('#show_create').show();
			$('#show_time').hide();
		} else {
			$('#show_create').hide();
			$('#show_time').show();
		}
	});
});
</script>
<script language="javascript" type="text/javascript"> 
	var LODOP;
	function PrintMytable(){
		var params = location.search.substr(1).split('&');
		var v = $('#print_type').val();
		params.push('print=1');
		params.push('type='+v);
		if (v == 2) {
			params.push('add_time_from='+$('#add_time_from').val());
			params.push('add_time_to='+$('#add_time_to').val());
		}
		
		$.get(SITE_URL + '<?php echo $_SERVER['SCRIPT_NAME']; ?>?' + params.join('&'), function(data){
			if (data) {
				LODOP=getLodop(document.getElementById('LODOP'),document.getElementById('LODOP_EM'));
				var strBodyStyle="<style>body{background:#fff;color:#000;}.printTitle1{font-size:24px;font-weight:700;}.printTitle2{font-weight:400;padding:5px 0 10px;}.dataTable td{border:1px solid #000;padding-left:5px;}.tdare{padding-bottom:30px;background:none;}.tatr1{color:#000;background-color:#C8C8C8;height:20px;line-height:20px;}.tatr2 a{text-decoration:none;}.tdare td a,.tatr2{color:#000;}</style>";
				var strStyleCSS="<link href='templates/style/admin.css' type='text/css' rel='stylesheet'>";
				var strFormHtml=strStyleCSS+strBodyStyle+"<body>"+data+"</body>";
				LODOP.PRINT_INIT("采购单");
				LODOP.ADD_PRINT_TABLE(25,15,740,990,strFormHtml);
				retPurchase(LODOP.PREVIEW());
			}
		});
	};
	
	//打印后返回操作
	function retPurchase(ret){
		if (ret <= 0) {
			return false;
		}
		
		var v = $('#print_type').val();
		var params = location.search.substr(1).split('&');
		var found1 = found2 = found3 = found4 = false;
		for (var i = 0; i < params.length; i++){
			param = params[i];
			arr   = param.split('=');
			pKey  = arr[0];
			if (pKey == 'act') {
				params[i] = 'act=ret_purchase';
				found1 = true;
			}
			if (pKey == 'type') {
				params[i] = 'type='+v;
				found2 = true;
			}
			if (v == 2) {
				if (pKey == 'add_time_from') {
					params[i] = 'add_time_from='+$('#add_time_from').val();
					found3 = true;
				}
				if (pKey == 'add_time_to') {
					params[i] = 'add_time_to='+$('#add_time_to').val();
					found4 = true;
				}
			}
		}
		
		if (!found1) {
			params.push('act=ret_purchase');
		}
		if (!found2) {
			params.push('type='+v);
		}
		if (!found3 && v == 2) {
			params.push('add_time_from='+$('#add_time_from').val());
		}
		if (!found4 && v == 2) {
			params.push('add_time_to='+$('#add_time_to').val());
		}
		
		$.get(SITE_URL + '<?php echo $_SERVER['SCRIPT_NAME']; ?>?' + params.join('&'));
		
		return true;
	}
</script>
<div id="rightTop">
    <p>订单管理</p>
    <ul class="subnav">
        <li><span>管理</span></li>
        <li><a class="btn1" href="index.php?app=order&amp;act=get_order">获取新订单</a></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
             <div class="left">
                <input type="hidden" name="app" value="order" />
                <select class="querySelect" name="field">
                <?php echo $this->html_options(array('options'=>$this->_var['search_options'],'selected'=>$_GET['field'])); ?>
                </select>
                <input class="queryInput" type="text" name="search_name" value="<?php echo htmlspecialchars($this->_var['query']['search_name']); ?>" />
                订单类别:
                <select class="querySelect" name="order_type">
                <option value="">所有</option>
                <?php echo $this->html_options(array('options'=>$this->_var['order_type'],'selected'=>$_GET['order_type'])); ?>
                </select>
                <input type="submit" class="formbtn" value="查询" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=order">撤销检索</a>
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
            <td width="15%" class="firstCell">订单号</td>
            <td width="8%" class="table-center">订单类别</td>
            <td>店铺名称</td>
        	<td width="12%">供应商用户名</td>
            <td width="12%">买家用户名</td>
            <td width="8%" class="table-center">采购生成</td>
            <td width="12%" class="table-center"><span ectype="order_by" fieldname="create_time">下单时间</span></td>
            <td width="12%" class="table-center"><span ectype="order_by" fieldname="add_time">获取时间</span></td>
            <td width="6%" class="table-center">操作</td>
        </tr>
        <?php endif; ?>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
        <tr class="tatr2"<?php if (! $this->_var['order']['purchase_status']): ?> style="color:#30F;"<?php endif; ?>>
            <td class="firstCell">
            <?php if ($this->_var['order']['order_type'] == '1'): ?>
            <a href="http://www.worldmall.cn/admin/index.php?app=order&act=view&code=<?php echo htmlspecialchars($this->_var['order']['order_sn']); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['order']['order_sn']); ?></a>
            <?php elseif ($this->_var['order']['order_type'] == '2'): ?>
            <a href="http://trade.taobao.com/trade/detail/trade_item_detail.htm?bizOrderId=<?php echo htmlspecialchars($this->_var['order']['order_sn']); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['order']['order_sn']); ?></a>
            <?php else: ?>
            <?php echo htmlspecialchars($this->_var['order']['order_sn']); ?>
            <?php endif; ?>
            </td>
            <td class="table-center"><?php if ($this->_var['order']['order_type'] == '1'): ?>世界窗<?php elseif ($this->_var['order']['order_type'] == '2'): ?>淘宝<?php elseif ($this->_var['order']['order_type'] == '0'): ?>其他<?php endif; ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['store_name']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['seller_name']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['buyer_name']); ?></td>
            <td class="table-center"><?php if ($this->_var['order']['purchase_status']): ?>已生成<?php else: ?>未生成<?php endif; ?></td>
            <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['create_time']); ?></td>
            <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?></td>
            <td class="table-center">
              <a href="index.php?app=order&amp;act=view&amp;id=<?php echo $this->_var['order']['order_id']; ?>">查看</a>
              <a href="index.php?app=sell&amp;act=add&amp;order_id=<?php echo $this->_var['order']['order_id']; ?>">销售</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="9">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
    <?php if ($this->_var['data_list']): ?>
    <div id="dataFuncs">
    	<div class="printLinks">
            <select class="querySelect" name="print_type" id="print_type">
            <?php echo $this->html_options(array('options'=>$this->_var['print_type'],'selected'=>$_GET['print_type'])); ?>
            </select>
            <span id="show_time" style="display:none;">
            下单时间从:<input class="queryInput2 pick_date" type="text" value="<?php echo $this->_var['query']['add_time_from']; ?>" id="add_time_from" name="add_time_from" />
            至:<input class="queryInput2 pick_date" type="text" value="<?php echo $this->_var['query']['add_time_to']; ?>" id="add_time_to" name="add_time_to" />
            </span>
            <span id="show_create">
            <select class="querySelect">
            	<option value="">未生成</option>
            </select>
            </span>
            <a class="btn3" href="javascript:PrintMytable();">生成采购单</a>
        </div>
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
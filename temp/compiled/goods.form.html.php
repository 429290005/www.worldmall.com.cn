<?php echo $this->fetch('header.html'); ?>
<style type="text/css">
#select_color span{}
#select_color span a{color:#666; text-decoration:none;}
#select_color span a:hover{color:#333; text-decoration:blink;}
</style>
<script type="text/javascript">
$(function(){
    $('#goods_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        onkeyup    : false,
        rules : {
            goods_name : {
                required : true
            },
            store_goods_code: {
                required : true
            },
			goods_colour: {
                required : true
            },
			price_purchase: {
                required : true
            },
        },
        messages : {
            goods_name : {
                required : '商品名称不能为空'
            },
            store_goods_code : {
                required : '供应商商品编码不能为空'
            },
			goods_colour: {
                required : '供应商商品颜色不能为空'
            },
			price_purchase: {
               required : '供应商商品进货价不能为空'
            },
        }
    });
	
	//折扣率计算
	$('#price_crane, #price_purchase').keyup(function(){
		var pc = parseFloat($('#price_crane').val());
		var pp = parseFloat($('#price_purchase').val());
		pc = isNaN(pc) ? 0 : pc;
		pp = isNaN(pp) ? 0 : pp;		
		if (pc != 0) {
			$('#purchase_discount').val(Math.round(pp / pc * 100 * 100) / 100);
		}
	});
	
	var goods_colour = $("#goods_colour");	
	$('#select_color>span>a').click(function(){
		var thisText = $(this).text();
		goods_colour.val(thisText);
		});
});
</script>
<div id="rightTop">
  <p>商品管理</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=goods">管理</a></li>
    <li><span>新增</span></li>
   <!-- <li><a class="btn1" href="index.php?app=goods&amp;act=import">导入</a></li> -->
  </ul>
</div>
<div class="info">
  <form method="post" enctype="multipart/form-data" id="goods_form">
  	<input type="hidden" name="app" value="<?php echo $_GET['app']; ?>" />
    <input type="hidden" name="act" value="<?php echo $_GET['act']; ?>" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> 商品名称:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" id="goods_name" type="text" name="goods_name" value="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 库存类型:</th>
        <td class="paddingT15 wordSpacing5">
          <select name="stock_type">
          <?php echo $this->html_options(array('options'=>$this->_var['stock_type'],'selected'=>$this->_var['goods']['stock_type'])); ?>
          </select>
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> 供应商货号:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="store_goods_code" type="text" id="store_goods_code" value="<?php echo htmlspecialchars($this->_var['goods']['store_goods_code']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 条形码:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="barcode" type="text" id="barcode" value="<?php echo htmlspecialchars($this->_var['goods']['barcode']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 世界窗货号:</th>
        <td class="paddingT15 wordSpacing5"><input name="goods_code" type="text" class="infoTableInput2" id="goods_code" value="<?php echo htmlspecialchars($this->_var['goods']['goods_code']); ?>" readonly="readonly" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 类别:</th>
        <td class="paddingT15 wordSpacing5">
          <select name="goods_category">
          <?php echo $this->html_options(array('options'=>$this->_var['goods_category'],'selected'=>$this->_var['goods']['goods_category'])); ?>
          </select>
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> 品牌:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="goods_brand" type="text" id="goods_brand" value="<?php echo htmlspecialchars($this->_var['goods']['goods_brand']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 颜色:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="goods_colour" type="text" id="goods_colour" value="<?php echo htmlspecialchars($this->_var['goods']['goods_colour']); ?>" />
        <div id="select_color" style="margin-top:10px;">
        	<span><a href="javascript:;">红色</a></span>
            <span><a href="javascript:;">黑色</a></span>
            <span><a href="javascript:;">橙色</a></span>
            <span><a href="javascript:;">克色</a></span>
            <span><a href="javascript:;">啡色</a></span>            
            <span><a href="javascript:;">粉色</a></span>
            <span><a href="javascript:;">紫色</a></span>
            <span><a href="javascript:;">杏色</a></span>
            <span><a href="javascript:;">梅色</a></span>
            <span><a href="javascript:;">粉色</a></span>
            <span><a href="javascript:;">蓝色</a></span>
            <span><a href="javascript:;">棕色</a></span>            
            <span><a href="javascript:;">玫红色</a></span>
            <span><a href="javascript:;">芒果黄</a></span>
            <span><a href="javascript:;">深上黄</a></span>
            <span><a href="javascript:;">双色橙</a></span>
            <span><a href="javascript:;">双色紫</a></span> 
            <span><a href="javascript:;">双色杏</a></span>           
            <span><a href="javascript:;">咖啡色</a></span>
            <span><a href="javascript:;">军绿色</a></span>            
            <span><a href="javascript:;">卡其色</a></span>
            <span><a href="javascript:;">土黄色</a></span>
            <span><a href="javascript:;">米白色</a></span>
            
        </div>
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> 重量:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="goods_weight" type="text" id="goods_weight" value="<?php echo $this->_var['goods']['goods_weight']; ?>" />(KG)</td>
      </tr>
      <tr>
        <th class="paddingT15"> 规格:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="goods_specification" type="text" id="goods_specification" value="<?php echo htmlspecialchars($this->_var['goods']['goods_specification']); ?>" />(CM)</td>
      </tr>
      <tr>
        <th class="paddingT15"> 单位:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="unit" type="text" id="unit" value="<?php echo htmlspecialchars($this->_var['goods']['unit']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 吊牌价:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="price_crane" type="text" id="price_crane" value="<?php echo $this->_var['goods']['price_crane']; ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 零售价:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="price_retail" type="text" id="price_retail" value="<?php echo $this->_var['goods']['price_retail']; ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 批发价:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="price_wholesale" type="text" id="price_wholesale" value="<?php echo $this->_var['goods']['price_wholesale']; ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 进货价:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="price_purchase" type="text" id="price_purchase" value="<?php echo $this->_var['goods']['price_purchase']; ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 进货折扣:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="purchase_discount" type="text" id="purchase_discount" value="<?php echo $this->_var['goods']['purchase_discount']; ?>" />(%)</td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
        	<input class="formbtn" type="submit" name="Submit" value="提交" />
            <input class="formbtn" type="reset" name="Reset" value="重置" />
        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
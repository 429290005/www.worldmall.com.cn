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
<div id="rightTop">
  <p>商品管理</p>
  <ul class="subnav">
    <li><span>管理</span></li>
    <li><a class="btn1" href="index.php?app=goods&amp;act=add">新增</a></li>
    <!--<li><a class="btn1" href="index.php?app=goods&amp;act=import">导入</a></li>-->
  </ul>
</div>
<div class="mrightTop info">
  <div class="fontl">
    <form method="get">
      <input type="hidden" name="app" value="goods" />
      <select class="querySelect" name="field_name">
      <?php echo $this->html_options(array('options'=>$this->_var['query_fields'],'selected'=>$_GET['field_name'])); ?>
      </select>
      <input class="queryInput" type="text" name="field_value" value="<?php echo htmlspecialchars($_GET['field_value']); ?>" />
      <input type="submit" class="formbtn" value="查询" />
      <?php if ($_GET['field_value']): ?>
	  <a class="formbtn1" href="index.php?app=goods">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['goods_list']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td>商品名称</td>
      <td width="6%" class="table-center">库存类型</td>
      <td width="7%">供应商货号</td>
      <td width="9%">条形码</td>
      <td width="9%">世界窗货号</td>
      <td width="4%" class="table-center">类别</td>
      <td width="6%">品牌</td>
      <td width="4%">颜色</td>
      <td width="5%">重量(KG)</td>
      <td width="5%">规格(CM)</td>
      <td width="3%" class="table-center">单位</td>
      <td width="5%">吊牌价</td>
      <td width="5%">零售价</td>
      <td width="5%">批发价</td>
      <td width="5%">进货价</td>
      <td width="7%">进货折扣(%)</td>
      <td width="3%" class="table-center">操作</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['goods']['goods_id']; ?>"/></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_name']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_name']); ?></td>
      <td class="table-center"><?php if ($this->_var['goods']['stock_type'] == '1'): ?>供应商<?php elseif ($this->_var['goods']['stock_type'] == '2'): ?>自有<?php endif; ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['store_goods_code']) == '') ? '-' : htmlspecialchars($this->_var['goods']['store_goods_code']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['barcode']) == '') ? '-' : htmlspecialchars($this->_var['goods']['barcode']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_code']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_code']); ?></td>
      <td class="table-center"><?php echo (call_user_func("goods_category",$this->_var['goods']['goods_category']) == '') ? '-' : call_user_func("goods_category",$this->_var['goods']['goods_category']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_brand']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_brand']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_colour']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_colour']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_weight']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_weight']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['goods']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['goods']['goods_specification']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['goods']['unit']) == '') ? '-' : htmlspecialchars($this->_var['goods']['unit']); ?></td>
      <td><?php echo price_format($this->_var['goods']['price_crane'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['goods']['price_retail'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['goods']['price_wholesale'], '%s'); ?></td>
      <td><?php echo price_format($this->_var['goods']['price_purchase'], '%s'); ?></td>
      <td><?php echo $this->_var['goods']['purchase_discount']; ?></td>
      <td class="table-center">
        <a href="index.php?app=goods&amp;act=edit&amp;id=<?php echo $this->_var['goods']['goods_id']; ?>">编辑</a>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="18">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['goods_list']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15" style="padding-left:25px;">
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?app=goods&act=drop" presubmit="confirm('您确定要删除该商品吗（不可恢复）？')" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
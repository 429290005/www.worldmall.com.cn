<?php echo $this->fetch('header.html'); ?>
<script language="javascript" type="text/javascript"> 
$(function(){
	$('#pandian_date').datepicker({dateFormat: 'yy-mm'});
	
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
    <p>盘点管理</p>
    <ul class="subnav">
        <li><a class="btn4" href="index.php?app=pandian&amp;act=import">导入盘点数据</a></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
             <div class="left">
                <input type="hidden" name="app" value="pandian" />
                <select class="querySelect" name="field">
                <?php echo $this->html_options(array('options'=>$this->_var['search_options'],'selected'=>$_GET['field'])); ?>
                </select>
                <input class="queryInput" type="text" name="search_name" value="<?php echo htmlspecialchars($this->_var['query']['search_name']); ?>" />
                盘点日期:<input class="queryInput pick_date" type="text" value="<?php echo $this->_var['query']['pandian_date']; ?>" id="pandian_date" name="pandian_date" />
                <input type="submit" class="formbtn" value="查询" />
                <!--<input type="submit" class="formbtn" name="export_all" value="导出" />
                onclick="confirm_submit();" />-->
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
            <td class="firstCell">盘点日期</td>
            <td class="table-center">商品名称</td>
            <td>世界窗货号</td>
        	<td>类别</td>
            <td>规格</td>
            <td>颜色</td>
            <td>单位</td>
            <td>采购价</td>
            <td>库存数量</td>
            <td>实盘数量</td>
            <td>盘点差</td>
            <td>备注</td>
            <td class="table-center">操作</td>
        </tr>
        <?php endif; ?>
        </thead>
        <tbody>
        <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
        <tr class="tatr2">
            <td width="60px;" class="firstCell"><?php echo htmlspecialchars($this->_var['order']['pd_date']); ?></td>
            <td width="150px;" class="table-center"><?php echo htmlspecialchars($this->_var['order']['goods_name']); ?></td>
            <td width="100px;"><?php echo htmlspecialchars($this->_var['order']['goods_sn']); ?></td>
            <td width="100px;"><?php echo (htmlspecialchars($this->_var['order']['goods_category']) == '') ? '-' : htmlspecialchars($this->_var['order']['goods_category']); ?></td>
            <td width="50px;"><?php echo (htmlspecialchars($this->_var['order']['goods_specification']) == '') ? '-' : htmlspecialchars($this->_var['order']['goods_specification']); ?></td>
            <td width="50px;"><?php echo $this->_var['order']['goods_colour']; ?></td>
            <td width="50px;"><?php echo $this->_var['order']['unit']; ?></td>
            <td width="50px;"><?php echo $this->_var['order']['price_purchase']; ?></td>
            <td width="80px;"><?php echo $this->_var['order']['stock_num']; ?></td>
            <td width="80px;"><?php echo $this->_var['order']['pd_num']; ?></td>
            <td width="80px;"><?php echo $this->_var['order']['pandiancha']; ?></td>
            <td><?php echo $this->_var['order']['remark']; ?></td>
            <td class="table-center">
              <?php if ($this->_var['is_admin']): ?><a href="index.php?app=pandian&amp;act=edit&amp;id=<?php echo $this->_var['order']['pd_id']; ?>">编辑</a><?php else: ?>-<?php endif; ?>
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
    <div id="dataFuncs">
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
        
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
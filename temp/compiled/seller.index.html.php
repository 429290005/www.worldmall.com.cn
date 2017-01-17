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
  <p>供应商管理</p>
  <ul class="subnav">
    <li><span>管理</span></li>
    <li><a class="btn1" href="index.php?app=seller&amp;act=add">新增</a></li>
  </ul>
</div>
<div class="mrightTop info">
  <div class="fontl">
    <form method="get">
      <input type="hidden" name="app" value="seller" />
      <select class="querySelect" name="field_name">
      <?php echo $this->html_options(array('options'=>$this->_var['query_fields'],'selected'=>$_GET['field_name'])); ?>
      </select>
      <input class="queryInput" type="text" name="field_value" value="<?php echo htmlspecialchars($_GET['field_value']); ?>" />
      <input type="submit" class="formbtn" value="查询" />
      <?php if ($_GET['field_value']): ?>
	  <a class="formbtn1" href="index.php?app=seller">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['data_list']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td>供应商ID</td>
      <td width="9%">供应商用户名</td>
      <td width="9%">真实姓名</td>
      <td>店铺名称</td>
      <td width="10%">旗下品牌</td>
      <td width="7%" class="table-center">供应商类型</td>
      <td width="4%" class="table-center">性别</td>
      <td width="10%">所在地区</td>
      <td width="16%">电子邮件</td>
      <td width="10%">手机</td>
      <td width="9%" class="table-center">操作</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'seller');if (count($_from)):
    foreach ($_from AS $this->_var['seller']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['seller']['seller_id']; ?>"/></td>
      <td><?php echo (htmlspecialchars($this->_var['seller']['seller_id']) == '') ? '-' : htmlspecialchars($this->_var['seller']['seller_id']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['seller']['seller_name']) == '') ? '-' : htmlspecialchars($this->_var['seller']['seller_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['seller']['real_name']) == '') ? '-' : htmlspecialchars($this->_var['seller']['real_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['seller']['store_name']) == '') ? '-' : htmlspecialchars($this->_var['seller']['store_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['seller']['seller_brand']) == '') ? '-' : htmlspecialchars($this->_var['seller']['seller_brand']); ?></td>
      <td class="table-center"><?php if ($this->_var['seller']['seller_type'] == '1'): ?>世界窗<?php elseif ($this->_var['seller']['seller_type'] == '2'): ?>淘宝<?php elseif ($this->_var['seller']['seller_type'] == '0'): ?>其他<?php endif; ?></td>
      <td class="table-center"><?php if ($this->_var['seller']['gender'] == 1): ?>男<?php elseif ($this->_var['seller']['gender'] == 2): ?>女<?php else: ?>保密<?php endif; ?></td>
      <td><?php echo (htmlspecialchars($this->_var['seller']['region_name']) == '') ? '-' : htmlspecialchars($this->_var['seller']['region_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['seller']['email']) == '') ? '-' : htmlspecialchars($this->_var['seller']['email']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['seller']['phone_mob']) == '') ? '-' : htmlspecialchars($this->_var['seller']['phone_mob']); ?></td>
      <td class="table-center">
      	<a href="index.php?app=seller&amp;act=linkman&amp;id=<?php echo $this->_var['seller']['seller_id']; ?>">联系人</a>
        <a href="index.php?app=seller&amp;act=edit&amp;id=<?php echo $this->_var['seller']['seller_id']; ?>">编辑</a>
        <a href="index.php?app=seller&amp;act=view&amp;id=<?php echo $this->_var['seller']['seller_id']; ?>">查看</a>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="11">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['data_list']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15" style="padding-left:25px;">
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?app=seller&act=drop" presubmit="confirm('您确定要删除该供应商吗（不可恢复）？')" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
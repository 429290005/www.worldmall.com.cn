<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
	change_background();
});

function change_background() {
    $("tbody tr").hover(
		function() {
			$(this).css({background:"#EAF8DB"});
		},
		function(){
			$(this).css({background:"#FBFDFF"});
		}
	);
}
</script>
<div id="rightTop">
  <p>管理员管理</p>
  <ul class="subnav">
    <li><span>管理</span></li>
    <li><a class="btn1" href="index.php?app=admin&amp;act=add">添加</a></li>
  </ul>
</div>

<div class="mrightTop">
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <form method=get>
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['admins']): ?>
    <tr class="tatr1">
      <td width="5%" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td width="8%"><span ectype="order_by" fieldname="user_name">用户名</span></td>
      <td width="8%"><span ectype="order_by" fieldname="real_name">真实姓名</span></td>
      <td><span ectype="order_by" fieldname="email">电子邮件</span></td>
      <td width="5%" class="table-center"><span ectype="order_by" fieldname="gender">性别</span></td>
      <td width="15%" class="table-center"><span ectype="order_by" fieldname="last_login">上次登录</span></td>
      <td><span ectype="order_by" fieldname="last_ip">登录IP</span></td>
      <td width="8%"><span ectype="order_by" fieldname="logins">登录次数</span></td>
      <td width="12%" class="table-center">操作</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['admins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'admin');if (count($_from)):
    foreach ($_from AS $this->_var['admin']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['admin']['user_id']; ?>" /></td>
      <td><?php echo htmlspecialchars($this->_var['admin']['user_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['admin']['real_name']) == '') ? '-' : htmlspecialchars($this->_var['admin']['real_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['admin']['email']) == '') ? '-' : htmlspecialchars($this->_var['admin']['email']); ?></td>
      <td class="table-center">
      <?php if ($this->_var['admin']['gender'] == 1): ?>男
      <?php elseif ($this->_var['admin']['gender'] == 2): ?>女
      <?php else: ?>保密
      <?php endif; ?>
      </td>
      <td class="table-center"><?php echo (local_date("Y-m-d H:i:s",$this->_var['admin']['last_login']) == '') ? '-' : local_date("Y-m-d H:i:s",$this->_var['admin']['last_login']); ?></td>
      <td><?php if ($this->_var['admin']['last_ip']): ?><a href="http://www.ip138.com/ips.asp?ip=<?php echo $this->_var['admin']['last_ip']; ?>" target="_blank"><strong><?php echo $this->_var['admin']['last_ip']; ?></strong></a>(<?php echo $this->_var['admin']['ip_area']; ?>)<?php else: ?>-<?php endif; ?></td>
      <td><?php echo ($this->_var['admin']['logins'] == '') ? '-' : $this->_var['admin']['logins']; ?></td>
      <td class="table-center">
      <?php if ($this->_var['admin']['privs'] == all): ?>
      系统管理员 | 
      <a href="index.php?app=admin&amp;act=edit_user&amp;id=<?php echo $this->_var['admin']['user_id']; ?>">编辑</a>
      </td>
      <?php else: ?>
      <a href="index.php?app=admin&amp;act=edit&amp;id=<?php echo $this->_var['admin']['user_id']; ?>">权限</a> | 
      <a href="index.php?app=admin&amp;act=edit_user&amp;id=<?php echo $this->_var['admin']['user_id']; ?>">编辑</a> | 
      <a href="javascript:drop_confirm('您确定要删除它吗？', 'index.php?app=admin&amp;act=drop&amp;id=<?php echo $this->_var['admin']['user_id']; ?>');">删除</a>
      </td>
      <?php endif; ?>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="10">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tr>
  </table>
  </form>
  <?php if ($this->_var['admins']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15" style="padding-left:25px;">
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?app=admin&act=drop" presubmit="confirm('您确定要删除它吗？');" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?> 
<?php /* Smarty version Smarty-3.0.6, created on 2012-10-30 10:00:05
         compiled from "D:\freehost\zgpjzd\web/template\admin/message.html" */ ?>
<?php /*%%SmartyHeaderCode:4950508f34a5a5ee35-05607266%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52d7b49921d698a3b563c9413a1bb4d30a6a0177' => 
    array (
      0 => 'D:\\freehost\\zgpjzd\\web/template\\admin/message.html',
      1 => 1351532946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4950508f34a5a5ee35-05607266',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="list-div">
  <div style="background:#FFF; padding: 20px 50px; margin: 2px;">
    <table align="center" width="400">
      <tr>
        <td width="50" valign="top">
          <?php if ($_smarty_tpl->getVariable('msg_type')->value==0){?>
          <img src="themes/admin/images/information.gif" width="32" height="32" border="0" alt="information" />
          <?php }elseif($_smarty_tpl->getVariable('msg_type')->value==1){?>
          <img src="themes/admin/images/warning.gif" width="32" height="32" border="0" alt="warning" />
          <?php }else{ ?>
          <img src="themes/admin/images/confirm.gif" width="32" height="32" border="0" alt="confirm" />
          <?php }?>
        </td>
        <td style="font-size: 14px; font-weight: bold"><?php echo $_smarty_tpl->getVariable('msg_detail')->value;?>
</td>
      </tr>
      <tr>
        <td></td>
        <td id="redirectionMsg">
          <?php if ($_smarty_tpl->getVariable('auto_redirect')->value){?>自动跳转<span id="spanSeconds">3</span><?php }?>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <ul style="margin:0; padding:0 10px" class="msg-link">
            <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('links')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['href'];?>
" <?php if ($_smarty_tpl->tpl_vars['link']->value['target']){?>target="<?php echo $_smarty_tpl->tpl_vars['link']->value['target'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['link']->value['text'];?>
</a></li>
            <?php }} ?>
          </ul>

        </td>
      </tr>
    </table>
  </div>
</div>
<?php if ($_smarty_tpl->getVariable('auto_redirect')->value){?>
	<script language="JavaScript">
    <!--
    var seconds = 3;
    var defaultUrl = "<?php echo $_smarty_tpl->getVariable('default_url')->value;?>
";
    onload = function()
    {
      if (defaultUrl == 'javascript:history.go(-1)' && window.history.length == 0)
      {
        document.getElementById('redirectionMsg').innerHTML = '';
        return;
      }
    
      window.setInterval(redirection, 1000);
    }
    function redirection()
    {
      if (seconds <= 0)
      {
        window.clearInterval();
        return;
      }
    
      seconds --;
      document.getElementById('spanSeconds').innerHTML = seconds;
    
      if (seconds == 0)
      {
        window.clearInterval();
        location.href = defaultUrl;
      }
    }
    //-->
    </script>
<?php }?>
<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
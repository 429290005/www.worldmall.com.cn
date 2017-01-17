<?php /* Smarty version Smarty-3.0.6, created on 2012-10-29 23:33:02
         compiled from "E:\wamp\www\xinhui\www/template\index/contactus.html" */ ?>
<?php /*%%SmartyHeaderCode:2681508ea1aea43416-98559712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df23f1d13a042d548f4b62b9c7624386f6c6883d' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\index/contactus.html',
      1 => 1351041004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2681508ea1aea43416-98559712',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<style type="text/css">
.footer ul {
    padding-top: 21px;
}
</style>
<div class="top_flash1">
  <div class="menu">
    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="984" height="119">
      <param name="movie" value="menu.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="transparent" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="menu.swf" width="984" height="119">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="transparent" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
        <div>
          <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
  </div>
  <div class="t1"><img src="themes/index/images/t3.png" /></div>
</div>

<div class="m_con">

<div class="left_con">
<div class="left_list contact_list yh_font" style=" padding-bottom:150px;" >
<dl>
<dt class="contact_tit">
联系我们<br />
Contact Us
</dt>
<?php  $_smarty_tpl->tpl_vars['rows_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_list']->key => $_smarty_tpl->tpl_vars['rows_list']->value){
?>
<dd><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></dd>
<?php }} ?>
<dd><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'index'),$_smarty_tpl);?>
">留言板</a></dd>
<div class="clear"></div>
</dl>
</div>
<div class=" tel_left"><img src="themes/index/images/tel3.jpg" /></div>
</div>

<div class="right_con">
<dl>
<dt style="height:51px;"><img src="themes/index/images/contact2.jpg"  />
<div class="r_txt"><a href="#">首页</a> > <?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
</div>
</dt>
<dd>

<?php echo $_smarty_tpl->getVariable('row')->value['content'];?>


</dd>

</dl>
</div>
<div class="clear"></div>

</div>

<div class="foot_1 footer">
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>

</body>
</html>
<?php /* Smarty version Smarty-3.0.6, created on 2012-10-30 00:17:02
         compiled from "E:\wamp\www\xinhui\www/template\index/product.html" */ ?>
<?php /*%%SmartyHeaderCode:27451508eabfe565537-78072619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07231871bf523732a9a305957dc9bfc406c56670' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\index/product.html',
      1 => 1351041020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27451508eabfe565537-78072619',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />
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
  <div class="t1"><img src="themes/index/images/t4.png" /></div>
</div>

<div class="m_con">

<div class="left_con">
<div class="left_list product_list yh_font"  >
<dl>
<dt class="product_tit">
产品展示<br />
Products
</dt>
<dd><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','act'=>'new'),$_smarty_tpl);?>
" onfocus=this.blur();>新品上市</a></dd>
<?php  $_smarty_tpl->tpl_vars['rows_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('catlist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_list']->key => $_smarty_tpl->tpl_vars['rows_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['rows_list']->key;
?>
<dd><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></dd>
<?php }} ?>
<div class="clear"></div>
</dl>
</div>
<div class=" tel_left"><img src="themes/index/images/tel5.jpg" /></div>
</div>

<div class="right_con">
<dl>
<dt style="height:31px; margin-top:20px;"><img src="themes/index/images/tit3.jpg" align="absmiddle"/>&nbsp;&nbsp;<span class="yh_font"><?php echo $_smarty_tpl->getVariable('cat')->value['catename'];?>
</span>
<div class="r_txt"><a href="./">首页</a> > <?php echo $_smarty_tpl->getVariable('cat')->value['catename'];?>
</div>
</dt>
<dd>
<div class="list">
<ul>


<?php  $_smarty_tpl->tpl_vars['goods_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('goodslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['goods_list']->key => $_smarty_tpl->tpl_vars['goods_list']->value){
?>
<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['goods_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['goods_list']->value['pid']),$_smarty_tpl);?>
"><img src="uploads/sm_goods/<?php echo $_smarty_tpl->tpl_vars['goods_list']->value['upfile'];?>
"  class="left" width="110"/></a>
<p>
<em><?php echo $_smarty_tpl->tpl_vars['goods_list']->value['title'];?>
</em>
产品特点：<br />
<?php echo $_smarty_tpl->tpl_vars['goods_list']->value['short_title'];?>
<br />
<span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['goods_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['goods_list']->value['pid']),$_smarty_tpl);?>
" style="color:#006a3d">查看详细</a></span>
</p>
</li>
<?php }} ?>


</ul>
</div>
<div class="clear"></div>
<div class="page"><?php echo __template_pager(array('pager'=>$_smarty_tpl->getVariable('pager')->value,'myclass'=>"yahoo2",'c'=>"product",'a'=>"index",'id'=>$_REQUEST['id'],'offset'=>5),$_smarty_tpl);?>
		</div>
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
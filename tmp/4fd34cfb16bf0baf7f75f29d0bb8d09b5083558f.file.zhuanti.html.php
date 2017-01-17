<?php /* Smarty version Smarty-3.0.6, created on 2012-08-14 18:58:13
         compiled from "E:\wamp\www\mianmian\www/template\index/zhuanti.html" */ ?>
<?php /*%%SmartyHeaderCode:27808502a2f450b3a90-25256245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fd34cfb16bf0baf7f75f29d0bb8d09b5083558f' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/zhuanti.html',
      1 => 1341197591,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27808502a2f450b3a90-25256245',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'E:\wamp\www\mianmian\www\SpeedPHP\Drivers\Smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'E:\wamp\www\mianmian\www\SpeedPHP\Drivers\Smarty\plugins\modifier.truncate.php';
?><?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/themes/index/images/css.css" media="all" />
<style type="text/css">
#mainzuanti .RightPart .Titlelan h2{
	color:#034991;
	width:220px;
	text-align:left;
}

</style>
<div class=" holder" id="mainzuanti">
	<?php $_template = new Smarty_Internal_Template("zhuanti_left.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <div class="RightPart">
    	<div class="Titlelan" style="background:url(themes/index/images/g2.gif);">
			<h2><?php echo $_smarty_tpl->getVariable('nowcat')->value['catename'];?>
</h2>
        	<p>当前位置<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">网站首页</a>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'zhuanti','id'=>27,'pid'=>27),$_smarty_tpl);?>
">专题</a></p>
        </div>
        <div class="Contentlan">
       	  <div class="BRR">
              <div class="banner2"><?php if ($_smarty_tpl->getVariable('ztbg')->value['upfile']!=''){?><img src="uploads/sm_articlecat/<?php echo $_smarty_tpl->getVariable('ztbg')->value['upfile'];?>
" /><?php }else{ ?><img src="themes/index/images/nopic3.gif" /><?php }?></div>
<div class="ztbg">
                	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('ztbg')->value['content'];?>
...[<a href="<?php echo $_smarty_tpl->getVariable('ztbg')->value['short'];?>
">详细</a>]

                </div>
            </div>
      <div class="ddWrap">
            	<div class="Titledd"><img src="themes/index/images/10.png" /><p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'zt','id'=>29,'pid'=>$_GET['id']),$_smarty_tpl);?>
">更多</a></p></div>
                <ul class="TextList">
				<?php  $_smarty_tpl->tpl_vars['baogao_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('baogao')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['baogao_list']->key => $_smarty_tpl->tpl_vars['baogao_list']->value){
?>
                	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'ztdetail','id'=>$_smarty_tpl->tpl_vars['baogao_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['baogao_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['baogao_list']->value['title'];?>
<?php echo $_smarty_tpl->tpl_vars['baogao_list']->value['btitle'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['baogao_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
				<?php }} ?>
                </ul>
          </div>
			<?php if ($_smarty_tpl->getVariable('pingcount')->value>0){?>
            <div class="ddWrap">
            	<div class="Titledd"><img src="themes/index/images/11.png" /><p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'zt','id'=>30,'pid'=>$_GET['id']),$_smarty_tpl);?>
">更多</a></p></div>
                <ul class="TextList2">
				<?php  $_smarty_tpl->tpl_vars['pinglun_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pinglun')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pinglun_list']->key => $_smarty_tpl->tpl_vars['pinglun_list']->value){
?>
               	    <li><p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'ztdetail','id'=>$_smarty_tpl->tpl_vars['pinglun_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['pinglun_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['pinglun_list']->value['title'];?>
<?php echo $_smarty_tpl->tpl_vars['pinglun_list']->value['btitle'];?>
</a></p>
                   	  <span><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['pinglun_list']->value['short'],120);?>
[<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'ztdetail','id'=>$_smarty_tpl->tpl_vars['pinglun_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['pinglun_list']->value['pid']),$_smarty_tpl);?>
">详细</a>]</span>                    </li>
				<?php }} ?>
                </ul>
            </div>
			<?php }?>
			
			<?php if ($_smarty_tpl->getVariable('xiangcount')->value>0){?>
            <div class="ddWrap">
            	<div class="Titledd"><img src="themes/index/images/12.png" /><p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'zt','id'=>31,'pid'=>$_GET['id']),$_smarty_tpl);?>
">更多</a></p></div>
                <ul class="TextList">
					<?php  $_smarty_tpl->tpl_vars['xiangguan_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('xiangguan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['xiangguan_list']->key => $_smarty_tpl->tpl_vars['xiangguan_list']->value){
?>
                	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'ztdetail','id'=>$_smarty_tpl->tpl_vars['xiangguan_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['xiangguan_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['xiangguan_list']->value['title'];?>
<?php echo $_smarty_tpl->tpl_vars['xiangguan_list']->value['btitle'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['xiangguan_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
					<?php }} ?>
                </ul>
            </div>
			<?php }?>
        </div>
    </div>
    <div class="break"></div>
</div><?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

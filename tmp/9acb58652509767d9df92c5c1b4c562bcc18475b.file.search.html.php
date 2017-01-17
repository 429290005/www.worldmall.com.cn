<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 09:36:05
         compiled from "E:\wamp\www\mianmian\www/template\index/search.html" */ ?>
<?php /*%%SmartyHeaderCode:3892502afd0551c9b7-70920883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9acb58652509767d9df92c5c1b4c562bcc18475b' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/search.html',
      1 => 1341196942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3892502afd0551c9b7-70920883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'E:\wamp\www\mianmian\www\SpeedPHP\Drivers\Smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />

<style type="text/css">
#mainzuanti .RightPart .Titlelan {
    background: url("themes/index/images/ny_100.gif") no-repeat scroll 0 0 transparent;
    float: right;
    height: 31px;
    width: 1000px;
}
#mainzuanti .RightPart .Contentlan .ddWrap {
    float: left;
    height: auto;
    margin-bottom: 10px;
    padding-left: 10px;
    width: 978px;
}
#mainzuanti .RightPart .Contentlan {
    border-bottom: 1px solid #CDD9E7;
    border-left: 1px solid #CDD9E7;
    border-right: 1px solid #CDD9E7;
    float: left;
    height: auto !important;
    min-height: 622px;
    overflow: visible;
    width: 998px;
}
#mainzuanti .RightPart {
    float: right;
    width: 1000px;
}
#mainzuanti .RightPart .Contentlan .ddWrap .TextList li {
    border-bottom: 1px dotted #004EA2;
    display: block;
    height: 34px;
    line-height: 34px;
    width: 980px;
}
</style>

<script type="text/javascript">
var current_content;
function switchs(name,n){
  if(current_content){
     $('#' + current_content).slideToggle();

  }
  $('#' + name + n).slideToggle();
  current_content = name + n;

	}

</script>
<script type="text/javascript" src="themes/index/js/guestbook.js"></script>
<div class=" holder" id="mainzuanti">

	 
	 
    <div class="RightPart">
    	<div class="Titlelan">
        	<h2>站内搜索</h2>
        	<p>当前位置<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">网站首页</a>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'search','keyword'=>$_smarty_tpl->getVariable('smary')->value['request']['keyword']),$_smarty_tpl);?>
">站内搜索</a></p>
        </div>
        <div class="Contentlan">
          <div class="ddWrap">
            <ul class="TextList">
				<?php  $_smarty_tpl->tpl_vars['news_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_list']->key => $_smarty_tpl->tpl_vars['news_list']->value){
?>
					<?php if ($_smarty_tpl->tpl_vars['news_list']->value['pid']==2){?>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'shepingdetail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
					<?php }elseif($_smarty_tpl->tpl_vars['news_list']->value['pid']==3){?>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'dongtaidetail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
					<?php }elseif($_smarty_tpl->tpl_vars['news_list']->value['pid']==23){?>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'huicuidetail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
					<?php }elseif($_smarty_tpl->tpl_vars['news_list']->value['pid']==33){?>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'shujudetail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
					<?php }elseif($_smarty_tpl->tpl_vars['news_list']->value['pid']==40||$_smarty_tpl->tpl_vars['news_list']->value['pid']==41||$_smarty_tpl->tpl_vars['news_list']->value['pid']==42||$_smarty_tpl->tpl_vars['news_list']->value['pid']==43||$_smarty_tpl->tpl_vars['news_list']->value['pid']==44||$_smarty_tpl->tpl_vars['news_list']->value['pid']==21||$_smarty_tpl->tpl_vars['news_list']->value['pid']==22){?>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
					<?php }elseif($_smarty_tpl->tpl_vars['news_list']->value['pid']==5||$_smarty_tpl->tpl_vars['news_list']->value['pid']==6||$_smarty_tpl->tpl_vars['news_list']->value['pid']==7||$_smarty_tpl->tpl_vars['news_list']->value['pid']==8||$_smarty_tpl->tpl_vars['news_list']->value['pid']==9||$_smarty_tpl->tpl_vars['news_list']->value['pid']==10){?>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'baogaodetail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
					<?php }else{ ?>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'ztdetail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
					<?php }?>
				<?php }} ?>
            </ul>

          </div>
		  	
          
            </div>
    </div>

    <div class="break"></div>
</div>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

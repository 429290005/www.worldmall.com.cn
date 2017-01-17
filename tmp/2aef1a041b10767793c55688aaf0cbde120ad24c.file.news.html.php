<?php /* Smarty version Smarty-3.0.6, created on 2012-10-29 23:26:36
         compiled from "E:\wamp\www\xinhui\www/template\index/news.html" */ ?>
<?php /*%%SmartyHeaderCode:12914508ea02c9c9c84-85950566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2aef1a041b10767793c55688aaf0cbde120ad24c' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\index/news.html',
      1 => 1351524395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12914508ea02c9c9c84-85950566',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />
</script> 
        <script type="text/javascript">
	$(document).ready(function(){
			$("#nav>ul>li:not(.clear)").click(function(){
					alert(li[0]);
				})
		});
</script> 
<div class="B_big"> 
  <!--content-->
  <div class="white">
    <div class="content_full">
      <div class="content">
        <div class="clear1"></div>
        <div class="banr1"><img src="themes/index/images/index22_18.jpg" /></div>
        <div class="clear1"></div>
        <div class="content_left">
          <div class="contentL_box mark">
            <div class="ibox_1">
              <div class="box_T">
                <p><?php echo $_smarty_tpl->getVariable('nowcat')->value['catename'];?>
</p>
                <!-- <a href="#" class="aimg"></a> --> </div>
              <div class="box_C">
                <ul class="togglebg">
				
				<?php  $_smarty_tpl->tpl_vars['news_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_list']->key => $_smarty_tpl->tpl_vars['news_list']->value){
?>
                  <li>
                    <div class="iw">
                      <div class="aimg"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
"><?php if ($_smarty_tpl->tpl_vars['news_list']->value['upfile']!=''){?><img src="uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['news_list']->value['upfile'];?>
"  width="118" height="119"/><?php }else{ ?><img src="themes/index/images/nopic.gif"  width="118" height="119" align="left"/><?php }?></a> </div>
                      <div class="p1"> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" style="color:#000000"><b><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</b></a><br />
                        <span><?php echo $_smarty_tpl->tpl_vars['news_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
" class="red">【详细内容】</a></span> </div>
                    </div>
                  </li>
				<?php }} ?> 
				  
				  
                </ul>
                <div class="clear1"></div>
                <div class="page"> <?php echo __template_pager(array('pager'=>$_smarty_tpl->getVariable('pager')->value,'myclass'=>"yahoo2",'c'=>"news",'a'=>"index",'id'=>$_REQUEST['id'],'pid'=>$_REQUEST['pid'],'offset'=>5),$_smarty_tpl);?>
 </div>
              </div>
            </div>
          </div>
        </div>
        <?php $_template = new Smarty_Internal_Template("right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <?php $_template = new Smarty_Internal_Template("link.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
      </div>
    </div>
  </div>
  <!--6--> 
 <script type="text/javascript">
	$(".togglebg li:even").css("background","#f7f7f7");
</script> 
  <!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

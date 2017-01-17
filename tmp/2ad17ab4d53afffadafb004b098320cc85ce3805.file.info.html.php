<?php /* Smarty version Smarty-3.0.6, created on 2012-10-29 23:45:48
         compiled from "E:\wamp\www\xinhui\www/template\index/info.html" */ ?>
<?php /*%%SmartyHeaderCode:13332508ea4ace06d59-13944402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ad17ab4d53afffadafb004b098320cc85ce3805' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\index/info.html',
      1 => 1351525547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13332508ea4ace06d59-13944402',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
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
          <div class="contentL_box mark news">
            <div class="ibox_1">
              <div class="box_T gai">
                <p><?php echo $_smarty_tpl->getVariable('catb')->value['catename'];?>
</p>
                <div class="postion"> 首页 > <?php echo $_smarty_tpl->getVariable('catb')->value['catename'];?>
 </div>
              </div>
              <div class="box_C">
                <div class="p1"><b><?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
</b><br/>
                  <span></span></div>
                <!-- <div class="aimg"><img src="themes/index/images/news_07.jpg" /></div> -->
                <div class="p2" style="padding:20px;">
                  <?php echo $_smarty_tpl->getVariable('row')->value['content'];?>

                </div>
                <div class="clear1"></div>
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
  
  <!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

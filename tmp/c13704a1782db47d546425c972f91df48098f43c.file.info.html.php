<?php /* Smarty version Smarty-3.0.6, created on 2012-10-30 08:54:08
         compiled from "D:\freehost\zgpjzd\web/template\index/info.html" */ ?>
<?php /*%%SmartyHeaderCode:354508f253086e0a7-60970183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c13704a1782db47d546425c972f91df48098f43c' => 
    array (
      0 => 'D:\\freehost\\zgpjzd\\web/template\\index/info.html',
      1 => 1351532988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '354508f253086e0a7-60970183',
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

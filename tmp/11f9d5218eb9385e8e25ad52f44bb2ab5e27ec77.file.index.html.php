<?php /* Smarty version Smarty-3.0.6, created on 2012-10-30 00:38:12
         compiled from "E:\wamp\www\xinhui\www/template\index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:4017508eb0f4917df4-24633834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11f9d5218eb9385e8e25ad52f44bb2ab5e27ec77' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\index/index.html',
      1 => 1351528689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4017508eb0f4917df4-24633834',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="B_big"> 
  <!--content-->
  <div class="white">
    <div class="ibox">
      <div class="ibanr">
       <!--<a><img src="themes/index/images/index22_14.png" /></a>--> 
      
      <div class="focal_P">
    
 <div id=frame2 style="width:989px; height:259px;">
<div id=img2>
<?php  $_smarty_tpl->tpl_vars['banners_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banners')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banners_list']->key => $_smarty_tpl->tpl_vars['banners_list']->value){
?>
<A href="<?php echo $_smarty_tpl->tpl_vars['banners_list']->value['link'];?>
" target=_blank><IMG src="uploads/banner/<?php echo $_smarty_tpl->tpl_vars['banners_list']->value['upfile'];?>
" width="989" height="259"></A>
<?php }} ?>
</div>
<!--<div  id=btn2  style="background:#333333; width:340px;">
<div style=" width:120px; float:left; height:1px;"></div><SPAN>1</SPAN><SPAN>2</SPAN> <SPAN>3</SPAN> <SPAN>4</SPAN> <SPAN>5</SPAN><SPAN>6</SPAN> <SPAN>7</SPAN><SPAN>8</SPAN>
</div>-->
 
</div>

<script>

//关键函数：通过控制i ，来显示不通的幻灯片
function showImg(i) {
    $("#img2 a")
		.eq(i).stop(true, true).fadeIn(1200)
		.siblings("li,a").fadeOut(800);
	$("#btn2 p")
		.eq((i)).css("display","block").siblings().css("display","none").siblings("span").css("display","block");
    $("#btn2 span")
		.eq(i).addClass("hov")
		.siblings().removeClass("hov");
	}
$(document).ready(function () {

	
	
    $("#img2 a").eq(0).show();
    $("#btn2 span").eq(0).addClass('hov');
	
	

    var index = 0;
    $("#btn2 span").mouseover(function () {
        index = $("#btn2 span").index(this);
        showImg(index);
    });
		
    var lenght = $("#img2 a").length;
    var time = 3000;

    //滑入 停止动画，滑出开始动画.
    $('#frame2').hover(
	 	function () {
	 	    if (MyTime) {
	 	        clearInterval(MyTime);
	 	    }
	 	}, function () {
	 	    MyTime = setInterval(function () {
	 	        showImg(index)
	 	        index++;
	 	        if (index == lenght) { index = 0; }
	 	    }, time);
	 	});
    //自动开始
    var MyTime = setInterval(function () {
        showImg(index)
        index++;
        if (index == lenght) { index = 0; }
    }, time);
})

</script>
    </div>
      
      </div>
<div class="clear1"></div>
      <!--1-->
      <div class="ibox_L">
        <div class="ibox_1">
          <div class="box_T">
            <p>市场动态</p>
            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>8,'pid'=>4),$_smarty_tpl);?>
" class="aimg"></a> </div>
          <div class="box_C">
		  <?php  $_smarty_tpl->tpl_vars['shichang_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shichang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['shi']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['shichang_list']->key => $_smarty_tpl->tpl_vars['shichang_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['shi']['iteration']++;
?>
		  <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['shi']['iteration']==1){?>
            <div class="ibox_1_L"> <b><?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['title'];?>
</b>
              <div class="iw">
                <div class="aimg"><img src="themes/index/images/index22_09.jpg" /></div>
                <div class="p1"> <?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['shichang_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['shichang_list']->value['pid']),$_smarty_tpl);?>
" class="red">【详细内容】</a> </div>
              </div>
            </div>
            <div class="ibox_1_R">
              <ul class="ul1">
			  <?php }else{ ?>
                <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['shichang_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['shichang_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['title'];?>
</a></li>
				<?php }?>
			<?php }} ?>
			</ul>
            </div>
          </div>
        </div>
      </div>
      <div class="ibox_R"> <a href="#"><img src="themes/index/images/index22_06.jpg" /></a> </div>
      <!--2-->
      <div class="clear1"></div>
      <div class="banr1"><img src="themes/index/images/index22_18.jpg" /></div>
      <!--3-->
      <div class="clear1"></div>
      <div class="ibox_L">
        <div class="ibox_1">
          <div class="box_T">
            <p>展会活动</p>
            <a href="index.php?c=news&a=index&id=62&pid=4" class="aimg"></a> </div>
          <div class="clear"></div>
          <div class="box_C">
		  
		  
		  <?php  $_smarty_tpl->tpl_vars['huodong_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('huodong')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['huo']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['huodong_list']->key => $_smarty_tpl->tpl_vars['huodong_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['huo']['iteration']++;
?>
		  <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['huo']['iteration']==1){?>
            <div class="ibox_1_L">
              <div> <img src="themes/index/images/index23_10.jpg" /><br/>
                <span> <?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['huodong_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['huodong_list']->value['pid']),$_smarty_tpl);?>
" class="red">【详细内容】</a> </span> </div>
            </div>
			
			
            <div class="ibox_1_R">
              <ul class="ul1">
			  <?php }else{ ?>
                <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['huodong_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['huodong_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['title'];?>
</a></li>
			  <?php }?>
              
		<?php }} ?>
			
			</ul>
            </div>
          </div>
        </div>
      </div>
      <div class="ibox_R">
        <div class="lidao">
          <div class="box_T">
            <p>领导风采</p>
            <a href="#" class="aimg"></a> </div>
          <div class="box_C">
		  <?php  $_smarty_tpl->tpl_vars['lingdao_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('lingdao')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['lingdao_list']->key => $_smarty_tpl->tpl_vars['lingdao_list']->value){
?>
            <div class="iw">
              <div class="aimg"> <?php if ($_smarty_tpl->tpl_vars['lingdao_list']->value['upfile']!=''){?><img src="uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['upfile'];?>
"  width="94" height="68"/><?php }else{ ?><img src="themes/index/images/nopic3.gif"  width="94" height="68" align="left"/><?php }?> </div>
              <div class="p1"> <b><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['title'];?>
</b><br />
                <span><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['lingdao_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['lingdao_list']->value['pid']),$_smarty_tpl);?>
" class="red">【详细内容】</a></span></div>
            </div>
            <div class="clear"></div>
			<?php }} ?>
          </div>
        </div>
      </div>
      <!--4-->
      <div class="clear1"></div>
      <div class="ibox_L">
        <div class="ibox_1">
          <div class="box_T">
            <p>商都通道</p>
            <a href="#" class="aimg"></a> </div>
          <div class="clear"></div>
          <div class="box_C">
            <div class="ibox_1_L ibox_l_2L">
              <ul class="ul1">
                <li><a href="#">深圳打砸防暴车者：参加反才学会唱国歌</a></li>
                <li><a href="#">男子举报村霸后被绑石抛海</a></li>
              </ul>
            </div>
            <div class="ibox_1_R ibox_1_2R">
              <ul class="ul2">
                <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
                <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
                <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
                <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
                <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
                <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="ibox_R"> <a href="#"><img src="themes/index/images/index24_03.jpg" /></a> </div>
      <!--5-->
      <div class="clear1" style="height:24px;"></div>
      <div class="ibox_2" >
        <div class="ibox_21" style="margin-right: 11px;">
          <div class="box_T">
            <p>行业资讯</p>
            <a href="index.php?c=news&a=index&id=61&pid=4"></a> </div>
          <div class="box_C">
		  
			<?php  $_smarty_tpl->tpl_vars['hangye_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hangye')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['han']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['hangye_list']->key => $_smarty_tpl->tpl_vars['hangye_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['han']['iteration']++;
?>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['han']['iteration']==1){?>
            <div class="iw">
              <div class="aimg"> <?php if ($_smarty_tpl->tpl_vars['hangye_list']->value['upfile']!=''){?><img src="uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['upfile'];?>
"  width="120" height="90"/><?php }else{ ?><img src="themes/index/images/nopic2.gif"  width="120" height="90" align="left"/><?php }?> </div>
              <div class="p1"> <b><?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['title'];?>
</b><br />
                <span><?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['short'];?>
...<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['hangye_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['hangye_list']->value['pid']),$_smarty_tpl);?>
" class="red">[详细]</a></span> </div>
            </div>
            <div class="clear"></div>
            <ul>
			<?php }else{ ?>
              <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['hangye_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['hangye_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['title'];?>
</a></li>
            <?php }?>
			<?php }} ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="ibox_2">
        <div class="ibox_21">
          <div class="box_T">
            <p>新闻中心</p>
            <a href="index.php?c=news&a=index&id=5&pid=4"></a> </div>
          <div class="box_C">
           <?php  $_smarty_tpl->tpl_vars['xinwen_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('xinwen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['xin']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['xinwen_list']->key => $_smarty_tpl->tpl_vars['xinwen_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['xin']['iteration']++;
?>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['xin']['iteration']==1){?>
            <div class="iw">
              <div class="aimg"> <?php if ($_smarty_tpl->tpl_vars['xinwen_list']->value['upfile']!=''){?><img src="uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['upfile'];?>
"  width="120" height="90"/><?php }else{ ?><img src="themes/index/images/nopic2.gif"  width="120" height="90" align="left"/><?php }?> </div>
              <div class="p1"> <b><?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['title'];?>
</b><br />
                <span><?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['short'];?>
...<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['xinwen_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['xinwen_list']->value['pid']),$_smarty_tpl);?>
" class="red">[详细]</a></span> </div>
            </div>
            <div class="clear"></div>
            <ul>
			<?php }else{ ?>
              <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['xinwen_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['xinwen_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['title'];?>
</a></li>
            <?php }?>
			<?php }} ?>
          </div>
        </div>
      </div>
      <div class="clear1"></div>
      <div class="js" style=" ">
        <div class="roll">
          <dl>
            <dt></dt>
            <dd>
              <ul class="roll_js">
                <li><a href="#"><img src="themes/index/images/pic.jpg" /></a>家具采用传统</li>
                <li><a href="#"><img src="themes/index/images/pic.jpg" /></a>家具采用传统</li>
                <li><a href="#"><img src="themes/index/images/pic.jpg" /></a>家具采用传统</li>
                <li><a href="#"><img src="themes/index/images/pic.jpg" /></a>家具采用传统</li>
                <li><a href="#"><img src="themes/index/images/pic.jpg" /></a>家具采用传统</li>
              </ul>
            </dd>
            <script>
jMarquee('roll_js', 3, 951, 30)
</script>
          </dl>
        </div>
      </div>
      <!--7-->
      <?php $_template = new Smarty_Internal_Template("link.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
  </div>
  <!--6--> 
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

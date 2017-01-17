$(document).ready(function(){

   $("#tabnav_btn_2").mouseenter(function(){
       $(".qixiahide").stop().slideDown();
   });

   $("#tabnav_btn_2").mouseleave(function(){
        $(".qixiahide").stop().slideUp();
   });

	$(".top_search_key").focus(function(){
	     var info = $.trim($(this).val());
		 if(info=="输入你要找的内容"){
		      $(this).val("");
		 }
	});
	
	$(".top_search_key").blur(function(){
	    var info = $.trim($(this).val());
		if(info==""){
		    $(this).val("输入你要找的内容");
		}
	});
	
	$(".top_search_click").click(function(){
	    var info = $.trim($(".top_search_key").val());
		if(info=="输入你要找的内容"){
		      return false;
		 }
	});
        

	function tabit(btn){
		var idname = new String(btn.id);
		var s = idname.indexOf("_");
		var e = idname.lastIndexOf("_")+1;
		var tabName = idname.substr(0, s);
		var id = parseInt(idname.substr(e, 1));
		var tabNumber = btn.parentNode.childNodes.length;
		for(i=0;i<tabNumber;i++){
				//document.getElementById(tabName+"_div_"+i).style.display = "none";
				document.getElementById(tabName+"_btn_"+i).className = "";
		};
			//document.getElementById(tabName+"_div_"+id).style.display = "block";
		btn.className = "curr";
	};

	function etabit(btn){
		var idname = new String(btn.id);
		var s = idname.indexOf("_");
		var e = idname.lastIndexOf("_")+1;
		var tabName = idname.substr(0, s);
		var id = parseInt(idname.substr(e, 1));
		var tabNumber = btn.parentNode.childNodes.length;
		for(i=0;i<tabNumber;i++){
				document.getElementById(tabName+"_div_"+i).style.display = "none";
				document.getElementById(tabName+"_btn_"+i).className = "";
		};
		document.getElementById(tabName+"_div_"+id).style.display = "block";
		btn.className = "curr";
	};


});

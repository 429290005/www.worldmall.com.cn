/*这里有两个函数，一个TAB用一个，需要修改有*/

$(document).ready(function() {

	$(".news_conn").hide(); 
	//$("ul.tabs li:first").addClass("hover").show();
		$(".news_conn:first").show();
		
		/*用CALSS方法修改样式*/
      	$(".tabs1 li") .click(function() {
	   //$("ul.tabs li").removeClass("hover"); 
		//$(this).addClass("hover");
		$(".tabs1 li").removeClass("hover"); 
		$(this).addClass("hover"); 
		
		/*加FADEIN的特效*/
		$(".news_conn").hide(); 
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});
	
	
	
	
	$(".news_conn2").hide(); 
	//$("ul.tabs li:first").addClass("hover").show();
		$(".news_conn2:first").show();
		
		/*用CALSS方法修改样式*/
      	$(".tabs2 li") .click(function() {
	   //$("ul.tabs li").removeClass("hover"); 
		//$(this).addClass("hover");
		$(".tabs2 li").removeClass("hover"); 
		$(this).addClass("hover"); 
		
		/*加FADEIN的特效*/
		$(".news_conn2").hide(); 
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});
	
	
	
	$(".news_conn3").hide(); 
	//$("ul.tabs li:first").addClass("hover").show();
		$(".news_conn3:first").show();
		
		/*用CALSS方法修改样式*/
      	$(".tabs3 li") .click(function() {
	   //$("ul.tabs li").removeClass("hover"); 
		//$(this).addClass("hover");
		$(".tabs3 li").removeClass("hover"); 
		$(this).addClass("hover"); 
		
		/*加FADEIN的特效*/
		$(".news_conn3").hide(); 
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});
	
	
	$(".news_conn4").hide(); 
	//$("ul.tabs li:first").addClass("hover").show();
		$(".news_conn4:first").show();
		
		/*用CALSS方法修改样式*/
      	$(".tabs4 li") .click(function() {
	   //$("ul.tabs li").removeClass("hover"); 
		//$(this).addClass("hover");
		$(".tabs4 li").removeClass("hover"); 
		$(this).addClass("hover"); 
		
		/*加FADEIN的特效*/
		$(".news_conn4").hide(); 
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});
	
	$(".news_conn5").hide(); 
	//$("ul.tabs li:first").addClass("hover").show();
		$(".news_conn5:first").show();
		
		/*用CALSS方法修改样式*/
      	$(".tabs5 li") .click(function() {
	   //$("ul.tabs li").removeClass("hover"); 
		//$(this).addClass("hover");
		$(".tabs5 li").removeClass("hover"); 
		$(this).addClass("hover"); 
		
		/*加FADEIN的特效*/
		$(".news_conn5").hide(); 
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});


});


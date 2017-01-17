$(document).ready(function(){
	$(".latest_tab li a").click(function(){
		var size = $(this).parent().prevAll().size();
		$(this).addClass("current");
		$(".latest_tab li a").not($(this)).removeClass("current");
		$(".latest_list ul:eq("+size+")").removeClass("hide");
		$(".latest_list ul").not($(".latest_list ul:eq("+size+")")).addClass("hide");
	});
});
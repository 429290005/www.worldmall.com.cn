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

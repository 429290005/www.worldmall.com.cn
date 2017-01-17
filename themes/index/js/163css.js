// JavaScript Document

var showphoto = 3;
var clicknow = 0;
var maxphoto = 3; //显示的数量
var indexNow; //当前需要显示第几个
var photonum; //一共数量

//图片总数量
function initPhoto(n) {
    indexNow = n;
    if (photonum == 1) {
        $(".right_img1 .le").fadeOut(0);
        $(".right_img1 .ri").fadeOut(0);
    }
	
    $("#m_area>ul>li>a>span").removeClass("nomask");
    if (n <= showphoto) { //当前图片索引小于等于最大显示数量
        for (i = 1; i <= showphoto; i++) {
            $('#l_' + i).fadeIn(500);
            $('#l_' + i + " apsn").addClass("nomask");
        }
    } else {
        var page = Math.round(n % showphoto) == 0 ? parseInt(n / showphoto) : parseInt(n / showphoto) + 1
        var num = ((page - 1) * showphoto);
        for (var i = 1; i <= num; i++) {
            $("#l_" + i).fadeOut(500);
        }
    }
    $("#_" + indexNow + ">span").addClass("nomask");
    pageCtrl();
}

$(document).ready(function () {

    $('.photo_ctrl ul li a').each(function () {
        $(this).click(
                    function () {
                        indexNow = parseInt($(this).attr('name'))
                        go();
                    });
    });

    //向前
	
	
    $("#go_per").click(function (e) {
				

        indexNow = parseInt($("#go_per").attr('title'));
	
        go();
    });

    //向后
    $("#go_nex").click(function (e) {

        //需要显示第几张图片
        indexNow = parseInt($("#go_nex").attr('title'));
        go();
    });



    $('.photo_ctrl.clear ul li a').each(function () {
        $(this).mouseover(function () {
            var idname = $(this).attr('id');
            for (i = 1; i <= photonum; i++) {
                $("#_" + i + " " + "span").removeClass("nomask");
                $("#l_" + i).removeClass("photo_border2");
            }
            $("#" + idname + " " + "span").addClass("nomask");
            $("#l" + idname).addClass("photo_border2");

        }
			 )
    })

    $('.photo_ctrl.clear ul li a').each(function () {
        $(this).mouseout(function () {
            var idname = $(this).attr('id');
            for (i = 1; i <= photonum; i++) {
                $("#_" + i + " " + "span").removeClass("nomask");
                $("#l_" + i).removeClass("photo_border2");
            }

            $("#" + clicknow + " " + "span").addClass("nomask");
            $("#l" + clicknow).addClass("photo_border2");
            
        }
			 )
    })


});

/*控制翻页按扭是否显示*/
function pageCtrl() {

    if (indexNow == 1) {
        if (indexNow <= photonum) {
            $(".le").hide(); //不显示上一页
            $(".ri").show(); //显示下一页
        }
    }
    else if (indexNow == photonum) {
        $(".le").show(); //显示上一页
        $(".ri").hide(); //不显示下一页
    } else {
        $(".le").show(); //都显示
        $(".ri").show();
    }
}


/*切换图片*/
function go() {
    //显示大图
    var src = $("#_" + indexNow).attr("rel"); //需要显示的大图
    var tex = $("#_" + indexNow).attr("rev"); //需要显示的简介
    var alltex = $("#_" + indexNow).attr("title"); //需要显示的全文介绍
    showMainImage(src, tex, alltex);
    clicknow = "_" + indexNow;
}
//显示中间的大图
var image;
var context;
var alltext;
function showMainImage(src, tex, alltex) {//图片

    //箭头
    $(".le").fadeOut(500);
    $(".ri").fadeOut(500);
    image = src;
    context = tex;
    alltext = alltex;
    //淡出效果fadeOut
    $(".mainPic").fadeOut(500, fadeInpic);
    $("#txtContent").fadeOut(500, fadeInpic);
    $("#showa").fadeIn(500, fadeInpic);


}
//显示大图并重置箭头的索引
function fadeInpic() {

    //主图片
    $(".mainPic").attr("src", image);
    $(".mainPic").fadeIn(1000);

    //内页
    $("#txtContent").html(context);
    $("#txtContent").fadeIn(1000);

    //全文介绍
    $("#showa").html(alltext);




    //左右控制箭头
    var idl = parseInt(indexNow) - 1;         //给左箭头赋值

	
    $("#go_per").attr('title', idl);
    var idr = parseInt(indexNow) + 1;         //给右箭头赋值
    $("#go_nex").attr('title', idr);

    initPhoto(indexNow);


}


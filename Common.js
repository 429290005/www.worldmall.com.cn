// JavaScript Document


// Description: sInputString 为输入字符串，iType为类型，分别为  
// 0 - 去除前后空格; 1 - 去前导空格; 2 - 去尾部空格
function trim(sInputString) {
    iType = 0;
    var sTmpStr = ' '
    var i = -1
    if (iType == 0 || iType == 1) {
        while (sTmpStr == ' ') {
            ++i
            sTmpStr = sInputString.substr(i, 1)
        }
        sInputString = sInputString.substring(i)
    }
    if (iType == 0 || iType == 2) {
        sTmpStr = ' '
        i = sInputString.length
        while (sTmpStr == ' ') {
            --i
            sTmpStr = sInputString.substr(i, 1)
        }
        sInputString = sInputString.substring(0, i + 1)
    }
    return sInputString
}

//格式化价钱
function formatPrice(price) {
    //debugger;
    price = price + "";
    var l = price.indexOf(".");
    if (l >= 0) {
        if (price.substring(l + 1, 1) == "0") {
            return price.substring(0, l);
        }
        else {
            return Math.round(price * 10) / 10;
        }
    }
    return price;
}

function setMarginTop() {

    mainID = "div.MainPanel"

    var h = $(window).height();
    var ph = $(mainID).height() / 2;
    var pt = h / 2 - ph;
    if (pt >= 0) {
        $(mainID).css("margin-top", pt);
    }
    else {
        $(mainID).css("margin-top", "0px");
    }
}


function $get(id) {
    return document.getElementById(id);
}


//自动根据指定比例到指定容器控制图片的显示
function resetImgSize(divClass, wth, hgh) {
    var divColection = document.getElementsByTagName("div"); //获取div数组	
    //var divs=$get(divid);
    //debugger;
    for (j = 0; j < divColection.length; j++) {
        var cssList = divColection[j].className.split(" ");
        var findFlag = false;
        for (k = 0; k < cssList.length; k++) {
            if (cssList[k] == divClass) {
                findFlag = true;
                break;
            }
        }

        if (findFlag)  //检查是否是有divClass这个类名
        {
            var imgs = divColection[j].getElementsByTagName("img");
            setHeight = hgh;
            setWidth = wth;
            //document.getElementById("sdf").style.paddingRight.paddingLeft.paddingBottom.paddingTop
            for (i = 0; i < imgs.length; i++) {
                height = imgs[i].height;
                width = imgs[i].width;
                //alert(height+","+width+","+width/height+","+setWidth/setHeight)
                if (height > setHeight || width > setWidth) {
                    if (width / height > setWidth / setHeight) {
                        height = setWidth * height / width
                        width = setWidth;
                    }
                    else {
                        width = setHeight * width / height
                        height = setHeight;
                    }
                }

                imgs[i].height = height;
                if (height < setHeight) {

                    //imgs[i].style.marginTop=(setHeight-height)/2;
                    imgs[i].style.paddingBottom = (setHeight - height);
                    //alert(width+","+height)
                }
                imgs[i].width = width;
                if (width < setWidth) {
                    imgs[i].style.paddingLeft = (setWidth - width) / 2;
                    imgs[i].style.paddingRight = (setWidth - width) / 2;
                    //alert(width+","+height)
                }
            }
        }
    }
}

//全部选择
function doSelectAll() {
    var i = 0;
    var idstr = "";
    var obj = document.getElementById("selectAll");

    for (i = 0; i < document.getElementsByName("selectone").length; i++) {
        if (obj.checked) {
            document.getElementsByName("selectone")[i].checked = true;
            idstr += document.getElementsByName("selectone")[i].value + ",";
        }
        else {
            document.getElementsByName("selectone")[i].checked = false;
            idstr = "";
        }
    }
    if (idstr != "") {//去掉后面一个","
        document.getElementById("hidSelect").value = idstr.substring(0, idstr.length - 1);
    }
    else {
        document.getElementById("hidSelect").value = idstr;
    }
}
function doSelect() {
    var i = 0;
    var idstr = "";

    for (i = 0; i < document.getElementsByName("selectone").length; i++) {
        if (document.getElementsByName("selectone")[i].checked) {
            idstr += document.getElementsByName("selectone")[i].value + ",";
        }
    }
    if (idstr != "") {//去掉后面一个","
        document.getElementById("hidSelect").value = idstr.substring(0, idstr.length - 1);
    }
    else {
        document.getElementById("hidSelect").value = idstr;
    }
}
//自动调整指定区域的图片大小
//id,图片ID
//size,尺寸
//type,类型,1为调整宽,2为调整高
function autoResizeImg(id, size, type) {

    $("#" + id + " img").each(function () {
        switch (type) {
            case 1:
                if ($(this).width() > size) {
                    $(this).width(size);
                    //alert($(this))
                    $(this).attr("rel", "lytebox");
                    $(this).removeAttr("height");

                }
                break;
            case 2:
                if ($(this).height() > size) {
                    $(this).height(size);
                    //alert($(this))
                    $(this).attr("rel", "lytebox");
                    $(this).removeAttr("width");

                }

                break;
        }

    }
								   );
}


//获取随机数
function GetRandomNum(minNum, maxNum) {
    var Rand = Math.random();
    return Rand * (maxNum - minNum) + minNum
}

//添加Flash轮播广告 width长,height高,pics图片,links链接,texts文字
function addFlash1(width, height, pics, links, texts) {

    var pic_width = width; //图片宽度//this param387
    var pic_height = height; //图片高度//this param244

    var button_pos = 4; //按扭位置 1左 2右 3上 4下//this param
    var stop_time = 15000; //图片停留时间(1000为1秒钟)//this param
    var show_text = 0; //是否显示文字标签 1显示 0不显示//this param
    var txtcolor = "000000"; //文字色

    var bgcolor = "#E6F2CA"; //背景色


    var imag = new Array();
    var link = new Array(); //this param
    var text = new Array(); //this param

    //可编辑内容结束
    var swf_height = show_text == 0 ? pic_height : pic_height; //this param

    var pics = pics;
    var links = links;
    var texts = texts;

    var wmode = 'movie';
    var flashurl = 'focus.swf';
    var htmlstr = '<embed wmode="transparent" style="position:relative;top:0px;" src="' + flashurl + '" wmode=' + wmode +
                    ' quality="high" FlashVars="pics=' + pics
	                    + '&links=' + links
	                    + '&texts=' + texts +
	                    '&pic_width=' + pic_width +
	                    '&pic_height=' + pic_height +
	                    '&show_text=' + show_text +
	                    '&txtcolor=' + txtcolor +
	                    '&bgcolor=' + bgcolor +
	                    '&button_pos=' + button_pos +
	                    '&stop_time=' + stop_time +
	                    '" quality="high" width="' + pic_width +
	                    '" height="' + swf_height + '" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>';
    document.write(htmlstr);

}
function addFlash2(width, height, pics, links, texts) {
    var focus_width63 = width
    var focus_height63 = height
    var text_height63 = 0
    var swf_height63 = focus_height63 + text_height63
    //var pics63='images/banner.jpg|images/banner2.jpg|images/banner3.jpg|images/banner4.jpg|images/banner5.jpg'
    var pics63 = pics
    var links63 = links
    var texts63 = texts
    document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="' + focus_width63 + '" height="' + swf_height63 + '">');
    document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="Flash.swf"><param name="quality" value="high"><param name="bgcolor" value="#C9C9C9">');
    document.write('<param name="menu" value="false"><param name=wmode value="transparent">');
    document.write('<param name="FlashVars" value="pics=' + pics63 + '&links=' + links63 + '&texts=' + texts63 + '&borderwidth=' + focus_width63 + '&borderheight=' + focus_height63 + '&textheight=' + text_height63 + '">');
    document.write('<embed src="Flash.swf" wmode="transparent" FlashVars="pics=' + pics63 + '&links=' + links63 + '&texts=' + texts63 + '&borderwidth=' + focus_width63 + '&borderheight=' + focus_height63 + '&textheight=' + text_height63 + '" menu="false" bgcolor="#C9C9C9" quality="high" width="' + focus_width63 + '" height="' + swf_height63 + '" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
    document.write('</object>');
}
//添加普通FLASH
function addFlash(width, height, src) {
    var htmlstr = '<embed wmode="transparent" style="position:relative;top:0px;" src="' + src + '"' +
                    ' quality="high" width="' + width + '" height="' + height
                    + '" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>';

    document.write(htmlstr);
} // JavaScript Document

function addFlash3(width, height, pics, links, texts) {
    var focus_width = width
    var focus_height = height
    var text_height = 0
    var swf_height = focus_height + text_height

    var pics = pics
    var links = links
    var texts = texts

    document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="' + focus_width + '" height="' + swf_height + '">');
    document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="focus.swf"> <param name="quality" value="high"><param name="bgcolor" value="#fffff">');
    document.write('<param name="menu" value="false"><param name=wmode value="transparent">');
    document.write('<param name="FlashVars" value="pics=' + pics + '&links=' + links + '&texts=' + texts + '&borderwidth=' + focus_width + '&borderheight=' + focus_height + '&textheight=' + text_height + '">');
    document.write('<embed src="focus.swf" wmode="opaque" FlashVars="texts=' + texts + '&pics=' + pics + '&links=' + links + '&borderwidth=' + focus_width + '&borderheight=' + focus_height + '&textheight=' + text_height + '" menu="false" bgcolor="#ffffff" quality="high" width="' + focus_width + '" height="' + swf_height + '" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>');
}
//播放视频
function writeVideo(src, w, h) {
    var vtype = src.split(".");
    videotype = vtype[1];
    var videcode = '';
    switch (videotype) {
        case "flv":

            videcode += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="' + w + '" height="' + h + '">';
            videcode += '<param name="movie" value="vcastr.swf">';
            videcode += '<param name="quality" value="high">';
            videcode += '<param name="allowFullScreen" value="true" />';
            videcode += '<param name="FlashVars" value="vcastr_file=' + src + '&LogoUrl=&LogoText=" />';
            videcode += '<embed src="vcastr.swf" allowFullScreen="true" FlashVars="vcastr_file=' + src + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="' + w + '" height="' + w + '" ></embed>';
            videcode += '</object>';
            break;
    }
    document.writeln(videcode);
}


function doSelectAll() {
    var i = 0;
    var idstr = "";
    var obj = document.getElementById("selectAll");

    for (i = 0; i < document.getElementsByName("selectone").length; i++) {
        if (obj.checked) {
            document.getElementsByName("selectone")[i].checked = true;
            idstr += document.getElementsByName("selectone")[i].value + ",";
        }
        else {
            document.getElementsByName("selectone")[i].checked = false;
            idstr = "";
        }
    }
    if (idstr != "") {
        document.getElementById("hidSelect").value = idstr.substring(0, idstr.length - 1);
    }
    else {
        document.getElementById("hidSelect").value = idstr;
    }
}
function doSelect() {
    var i = 0;
    var idstr = "";

    for (i = 0; i < document.getElementsByName("selectone").length; i++) {
        if (document.getElementsByName("selectone")[i].checked) {
            idstr += document.getElementsByName("selectone")[i].value + ",";
        }
    }
    if (idstr != "") {
        document.getElementById("hidSelect").value = idstr.substring(0, idstr.length - 1);
    }
    else {
        document.getElementById("hidSelect").value = idstr;
    }
}

//设为首页
function setHomePage(obj) {
    var aUrls = document.URL.split("/");
    var vDomainName = "http://" + aUrls[2] + "/";
    try {//IE
        obj.style.behavior = "url(#default#homepage)";
        obj.setHomePage(vDomainName);
    } catch (e) {//other
        if (window.netscape) {//ff
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch (e) {
                alert(" 此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]设置为'true'");
            }
            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
            prefs.setCharPref('browser.startup.homepage', vDomainName);
        }
    }
}
function AddToFavorite() {
    if (document.all) {
        window.external.addFavorite(document.URL, document.title);
    } else if (window.sidebar) {
        window.sidebar.addPanel(document.title, document.URL, "");
    }
}

//取当前时间，格式为,yyyy-mm-dd hh:mm:ss
function getNowFormatDate() {
    var day = new Date();

    var Year = 0;
    var Month = 0;
    var Day = 0;
    var CurrentDate = "";
    //初始化时间
    //Year= day.getYear();//有火狐下2008年显示108的bug
    Year = day.getFullYear(); //ie火狐下都可以
    Month = day.getMonth() + 1;
    Day = day.getDate();
    Hour = day.getHours();
    Minute = day.getMinutes();
    Second = day.getSeconds();
    CurrentDate += Year + "-";
    if (Month >= 10) {
        CurrentDate += Month + "-";
    }
    else {
        CurrentDate += "0" + Month + "-";
    }
    if (Day >= 10) {
        CurrentDate += Day;
    }
    else {
        CurrentDate += "0" + Day;
    }
    if (Hour >= 10) {
        CurrentDate += " " + Hour;
    } else {
        CurrentDate += " 0" + Hour;
    }
    if (Minute >= 10) {
        CurrentDate += ":" + Minute;
    } else {
        CurrentDate += ":0" + Minute;
    }
    if (Second >= 10) {
        CurrentDate += ":" + Second;
    }
    else {
        CurrentDate += ":0" + Second;
    }
    return CurrentDate;

}
//改变字体大小
function changeFontSize(id, size) {
    $('#' + id).css("font-size", size + 'px');
    $('#' + id + " *").css("font-size", size + 'px');
}
//获取当前时段
function GetHello() {
    now = new Date();
    hour = now.getHours();
    if (hour < 6) { document.write("凌晨好") }
    else if (hour < 9) { document.write("早上好") }
    else if (hour < 12) { document.write("上午好") }
    else if (hour < 14) { document.write("中午好") }
    else if (hour < 17) { document.write("下午好") }
    else if (hour < 19) { document.write("傍晚好") }
    else if (hour < 22) { document.write("晚上好") }
    else { document.write("夜里好") }
}

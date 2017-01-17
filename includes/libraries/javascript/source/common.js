/* 弹出确认 */
function drop_confirm(msg, url){
    if(confirm(msg)){
        window.location = url;
    }
}

/* 显示Ajax表单 */
function ajax_form(id, title, url, width) {
    if (!width) {
        width = 400;
    }
    var d = DialogManager.create(id);
    d.setTitle(title);
    d.setContents('ajax', url);
    d.setWidth(width);
    d.show('center');
	
    return d;
}

/* 跳转 */
function go(url){
    window.location = url;
}

/* 刷新验证码 */
function change_captcha(jqObj){
    jqObj.attr('src', 'index.php?app=captcha&' + Math.round(Math.random()*10000));
}

/* 格式化金额 */
function price_format(price){
    if(typeof(PRICE_FORMAT) == 'undefined'){
        PRICE_FORMAT = '&yen;%s';
    }
    price = number_format(price, 2);
    return PRICE_FORMAT.replace('%s', price);
}

/* 格式化数字 */
function number_format(num, ext){
    if(ext < 0){
        return num;
    }
    num = Number(num);
    if(isNaN(num)){
        num = 0;
    }
    var _str = num.toString();
    var _arr = _str.split('.');
    var _int = _arr[0];
    var _flt = _arr[1];
    if(_str.indexOf('.') == -1){
        /* 找不到小数点，则添加 */
        if(ext == 0){
            return _str;
        }
        var _tmp = '';
        for(var i = 0; i < ext; i++){
            _tmp += '0';
        }
        _str = _str + '.' + _tmp;
    }else{
        if(_flt.length == ext){
            return _str;
        }
        /* 找得到小数点，则截取 */
        if(_flt.length > ext){
            _str = _str.substr(0, _str.length - (_flt.length - ext));
            if(ext == 0){
                _str = _int;
            }
        }else{
            for(var i = 0; i < ext - _flt.length; i++){
                _str += '0';
            }
        }
    }

    return _str;
}

/* 收藏商品 */
function collect_goods(id)
{
    var url = SITE_URL + '/index.php?app=my_favorite&act=add&type=goods&ajax=1';
    $.getJSON(url, {'item_id':id}, function(data){
        alert(data.msg);
    });
}

/* 收藏店铺 */
function collect_store(id)
{
    var url = SITE_URL + '/index.php?app=my_favorite&act=add&type=store&jsoncallback=?&ajax=1';
    $.getJSON(url, {'item_id':id}, function(data){
        alert(data.msg);
    });
}

/* 火狐下取本地全路径 */
function getFullPath(obj)
{
    if(obj) {
        //ie
        if (window.navigator.userAgent.indexOf("MSIE")>=1){
            obj.select();
            return document.selection.createRange().text;
        }
        //firefox
        else if(window.navigator.userAgent.indexOf("Firefox")>=1){
            if(obj.files){
                return obj.files.item(0).getAsDataURL();
            }
            return obj.value;
        }
        return obj.value;
    }
}

/**
 *    启动邮件队列
 *
 *    @author    Garbin
 *    @param     string req_url
 *    @return    void
 */
function sendmail(req_url)
{
    $(function(){
        var _script = document.createElement('script');
        _script.type = 'text/javascript';
        _script.src  = req_url;
        document.getElementsByTagName('head')[0].appendChild(_script);
    });
}

/* 转化JS跳转中的 ＆ */
function transform_char(str)
{
    if(str.indexOf('&')) {
        str = str.replace(/&/g, "%26");
    }
    return str;
}

/* 缩小大图片 */
function makesmall(obj,w,h){
    srcImage = obj;
    var srcW = srcImage.width;
    var srcH = srcImage.height;
    if (srcW == 0) {
        obj.src = srcImage.src;
        srcImage.src = obj.src;
        var srcW = srcImage.width;
        var srcH = srcImage.height;
    }
    if (srcH == 0) {
        obj.src = srcImage.src;
        srcImage.src = obj.src;
        var srcW = srcImage.width;
        var srcH = srcImage.height;
    }

    if(srcW > srcH) {
        if(srcW > w){
            obj.width = newW = w;
            obj.height = newH = (w/srcW)*srcH;
        } else {
            obj.width = newW = srcW;
            obj.height = newH = srcH;
        }
    } else {
        if(srcH > h) {
            obj.height = newH = h;
            obj.width = newW = (h/srcH)*srcW;
        } else {
            obj.width = newW = srcW;
            obj.height = newH = srcH;
        }
    }
    if(newW > w) {
        obj.width = w;
        obj.height = newH*(w/newW);
    } else if(newH > h){
        obj.height = h;
        obj.width = newW*(h/newH);
    }
}

/* 自定义分页页数跳转 */
function turn_page(s) {
	var num = $('#page_num').val();
	if (!num){
		return false;
	}
	num = Number(num);
	if(isNaN(num)){
		num = 1;
	}
	var re = /^[1-9]\d*$/;
	if (!re.test(num)){
		num = 1;
	}
	if (num > s){
		num = s;
	}
	var params = location.search.substr(1).split('&');
    for (var i = 0; i < params.length; i++){
        param = params[i];
        arr   = param.split('=');
        pKey  = arr[0];
        if (pKey == 'page'){
            params.splice(i, 1);
        }
    }
	params.push('page=' + num);
	location.assign(SITE_URL + '/index.php?' + params.join('&'));
}

/* 清空浏览历史商品 */
function emptyHistory(){
	$.setCookie('goodsBrowseHistory', null);
	location.reload();
}
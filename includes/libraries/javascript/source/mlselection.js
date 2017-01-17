/* 多级选择相关函数，如地区选择，分类选择
 * multi-level selection
 */

/* 地区选择函数 */
function regionInit(divId, num, callback, type)
{
    $("#" + divId + " > select").change(function(){
		regionChange(this, num, callback, type);
	}); // select的onchange事件
	
    $("#" + divId + " > input:button[class='edit_region']").click(regionEdit); // 编辑按钮的onclick事件
}

function regionChange(o, num, callback, type)
{
    // 删除后面的select
    $(o).nextAll("select").remove();

    // 计算当前选中到id和拼起来的name
    var selects = $(o).siblings("select").andSelf();
    var id = 0;
	var ids = new Array();
    var names = new Array();
    for (i = 0; i < selects.length; i++)
    {
        sel = selects[i];
        if (sel.value > 0)
        {
            id = sel.value;
			ids.push(id);
            name = sel.options[sel.selectedIndex].text;
            names.push(name);
        }
    }
	
    $(o).siblings(".mls_id").val(id);
	$(o).siblings('.mls_ids').val(ids.join(","));
    $(o).siblings(".mls_name").val(name);
    $(o).siblings('.mls_names').val(names.join("\t"));
	
	// 显示级别
	var s = true;
	if (num && selects.length >= parseInt(num)) {
		s = false;
	}
	
    // ajax请求下级地区
    if (o.value > 0 && s)
    {
		type = type ? type : 'region';
		
        var _self = o;
        var url = SITE_URL + '/index.php?app=mlselection&type='+type;
        $.getJSON(url, {'pid':o.value}, function(data){
            if (data.done)
            {
                if (data.retval.length > 0)
                {
                    $("<select><option>" + lang.select_pls + "</option></select>").change(function(){
						regionChange(this, num, callback, type);
					}).insertAfter(_self);
                    var data  = data.retval;
                    for (i = 0; i < data.length; i++)
                    {
                        $(_self).next("select").append("<option value='" + data[i].region_id + "'>" + data[i].region_name + "</option>");
                    }
                }
            }
            else
            {
                alert(data.msg);
            }
        });
    }
	
	// 回调函数
	if (callback) {
		callback();
	}
}

function regionEdit()
{
    $(this).siblings("select").show();
    $(this).siblings("span").andSelf().hide();
}

/* 商品分类选择函数 */
function gcategoryInit(divId)
{
    $("#" + divId + " > select").change(function(){
		gcategoryChange(this);
	}); // select的onchange事件
    window.onerror = function(){return true;}; //屏蔽jquery报错
    $("#" + divId + " .edit_gcategory").click(gcategoryEdit); // 编辑按钮的onclick事件
}

function gcategoryChange(o)
{
    // 删除后面的select
    $(o).nextAll("select").remove();

    // 计算当前选中到id和拼起来的name
    var selects = $(o).siblings("select").andSelf();
    var id = 0;
    var names = new Array();
    for (i = 0; i < selects.length; i++)
    {
        sel = selects[i];
        if (sel.value > 0)
        {
            id = sel.value;
            name = sel.options[sel.selectedIndex].text;
            names.push(name);
        }
    }
	
    $(o).siblings(".mls_id").val(id);
    $(o).siblings(".mls_name").val(name);
    $(o).siblings('.mls_names').val(names.join("\t"));

    // ajax请求下级分类
    if (o.value > 0)
    {
        var _self = o;
        var url = SITE_URL + '/index.php?app=mlselection&type=gcategory';
        $.getJSON(url, {'pid':o.value}, function(data){
            if (data.done)
            {
                if (data.retval.length > 0)
                {
                    $("<select><option>" + lang.select_pls + "</option></select>").change(function(){
						gcategoryChange(this);
					}).insertAfter(_self);
                    var data  = data.retval;
                    for (i = 0; i < data.length; i++)
                    {
                        $(_self).next("select").append("<option value='" + data[i].cate_id + "'>" + data[i].cate_name + "</option>");
                    }
                }
            }
            else
            {
                alert(data.msg);
            }
        });
    }
}

function gcategoryEdit()
{
    $(this).siblings("select").show();
    $(this).siblings("span").andSelf().remove();
}
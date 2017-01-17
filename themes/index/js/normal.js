// JavaScript Document
function ajax(url,data){
	  var urls=url;
	  var datas=data;;
	  $.ajax({
		 url: urls,
		 type:'POST',
		 dataType:'html',
		 data:datas,
		 success:function(msg){
		   	$(classname).html(msg);
		 }
	  });	
}
function checkid(id,html,root){
     var f_id=id;
	 var f_html=html;
     if($.trim($('#'+f_id).val()).length==0)$('.'+f_id).html('<font color="red">'+f_html+'</font>');
	 else $('.'+f_id).html('<img src="'+root+'lib/images/ok.gif" />');
}

function checkclass(str){
   var strs=str;
   var arr=$.trim(strs).split(',');
   for(var i=0;i<arr.length;i++){
       if($('.'+arr[i]).html().match('color'))return false;
   }
   return true;
}
function size(name,dsize,danwei,dongzuo){
var defsize=dsize;
var size=parseInt(document.getElementById(name).style.fontSize);
if(isNaN(size)){size=defsize;}
if(dongzuo=='b')
document.getElementById(name).style.fontSize=(size+1)+danwei;
else
document.getElementById(name).style.fontSize=(size-1)+danwei;
}

function oclick(form,name){
eval('document.'+form+'.'+name).value='';
}

function addfavorite1()
{
    var name = "柯帝服饰";
    var url = location.href;
    if ((navigator.appName == "Microsoft Internet Explorer") && (parseInt
        (navigator.appVersion) >= 4))
        window.external.AddFavorite(url, name);
    else if (navigator.appName == "Netscape")
        window.sidebar.addPanel(name, url, '');
    else
        alert("对不起,你的浏览器不支持本操作!");
}


function show(name,id,total){
  for(var i=0;i<total;i++){
    if(i+1!=id)eval(document.getElementById(name+(i+1))).style.display='none';
  }
  eval(document.getElementById(name+id)).style.display='block';
}
function rshow(name,id,total){
  for(var i=0;i<total;i++){
    if(i+1!=id)eval(document.getElementById(name+(i+1))).style.display='block';
  }
  eval(document.getElementById(name+id)).style.display='none';
}
function allshow(name,total){
  for(var i=0;i<total;i++){
    eval(document.getElementById(name+(i+1))).style.display='block';
  }
}
function allnotshow(name,total){
  for(var i=0;i<total;i++){
    eval(document.getElementById(name+(i+1))).style.display='none';
  }
}



function AddFavorite(sURL, sTitle) {
    try {
        window.external.addFavorite(sURL, sTitle);
    } catch (e) {
        try {
            window.sidebar.addPanel(sTitle, sURL, "");
        } catch (e) {
            alert("加入收藏失败,请手动添加.");
        }
    }
}
function setHomepage(pageURL) {
    if (document.all) {
        document.body.style.behavior='url(#default#homepage)';
        document.body.setHomePage(pageURL);
    }
    else if (window.sidebar) {
        if(window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch (e) {
                alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项signed.applets.codebase_principal_support 值该为true" );
            }
        }
        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
        prefs.setCharPref('browser.startup.homepage',pageURL);
    }
}

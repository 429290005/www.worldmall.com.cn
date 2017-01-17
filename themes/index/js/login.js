// JavaScript Document

function resetform(form){
   　　 form.reset();
    　　return false;
}
function ajaxlogin(){
	var username=$('#username').val();
	var password=$('#password').val();
	var seccode=$('#seccode').val();
	var str='';
    if(!username){str+='请填写您的用户名\r\n';}
    if(!password){str+='请填写您的密码\r\n';}
	if(!seccode){str+='请填写验证码\r\n';}
	//if(!imgcode)str+='Code is Null!\r\n';
	// alert(username+'+++++++'+password+'-----------'+seccode);
	if(str!="")alert(str);
    else{
      $('#username').html('');
      $('#pas').html('');
      $('#loading').html('<font style="font-size:15pt;">Loading...</font>');
	  $.ajax({
		 // url:'index.php?c=member&a=fuckgongbing',
		 url:'index.php?c=member&a=userlogin',
		 type:'post',
		 //dataType:'html',
		 data:'username='+username+'&password='+password+'&onepage=1',
		 
		 success:function(msg){
			// alert(msg);
		 	$('#loading').html('');
			document.write(msg);
		 }
	  });
    }
	
}

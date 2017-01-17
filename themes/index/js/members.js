function checkname(){
   if($('#uname').val().length<5)$('.uname').html('<font color="red">帐号不能小于5位!</font>');
   else{
     classname='.uname';
	 $(classname).html('<img src="themes/index/images/ok.gif" />');
   }
}
function checkpword1(){
   if($.trim($('#pword').val()).length<5)$('.pword').html('<font color="red">密码必须大于5个字符</font>');
   else {
     $('.pword').html('<img src="themes/index/images/ok.gif" />');
     if($('#pword').val()!=$('#checkpword').val())
	     $('.checkpword').html('<font color="red">两次输入密码不一致</font>');
     else $('.checkpword').html('<img src="themes/index/images/ok.gif" />');
   }
}

// function checkcode(){
   // if($.trim($('#seccode').val()).length<5)$('.pword').html('<font color="red">Password needs to be more than 5 digits/letters</font>');
   // else {
     // $('.pword').html('<img src="themes/index/images/ok.gif" />');
     // if($('#pword').val()!=$('#checkpword').val())
	     // $('.checkpword').html('<font color="red">Confirmed password does not match original </font>');
     // else $('.checkpword').html('<img src="themes/index/images/ok.gif" />');
   // }
//}

function checkemail(){
    if($('#email').val()=='')$('.email').html('<font color="red">电子邮箱不能为空</font>');
	else{
	  classname='.email';
	  $(classname).html('<img src="themes/index/images/loading1.gif" />Loading...');
	  $.ajax({
		  type:"get",
		  contentType: "application/x-www-form-urlencoded; charset=utf-8",
		  url: "index.php?c=member&a=checkemail",
		  data: {
			  "email": $("#email").val()
		  },
		  success: function (data) {
                $(classname).html(data);
      	  }
	})
}
}

/*
function checkphone(){
   if($('#phone').val()!=''){
	 rule=/^[0-9-]+$/i; 
	 if(rule.test($('#phone').val())){
		  $('.phone').html('<img src="themes/index/images/ok.gif" />');
	  }
	  else $('.phone').html('<font color="red">电话格式错误!</font>');
	}else $('.phone').html('');
}
function checktelphone(){
   if($('#telphone').val()!=''){
	 rule=/^[0-9-]+$/i; 
	 if(rule.test($('#telphone').val())){
		  $('.telphone').html('<img src="themes/index/images/ok.gif" />');
	  }
	  else $('.telphone').html('<font color="red">电话格式错误!</font>');
	}else $('.telphone').html('');
}
function checkpostal_code(){
   if($('#postal_code').val()!=''){
	 rule=/^[0-9]+$/i; 
	 if(rule.test($('#postal_code').val())){
		  $('.postal_code').html('<img src="themes/index/images/ok.gif" />');
	  }
	  else $('.postal_code').html('<font color="red">邮编格式错误!</font>');
	}else $('.postal_code').html('');
}*/


function register(){
   checkemail();
   checkpword1();
   imgcode1();
 
   if(checkclass('pword,email,seccode')){
	   $('.buttonstyle').attr('disabled','disabled');
	   $('#loading').css('display','block');
       return true;
   }
   return false;
}



//公司名称
function checkcompany(){
	if($('#companyname').val()==''){
		$('.companyname').html('<font color="red">Company Name Can not Be Null</font>');
		return false;
	}else{
		$('.companyname').html('<img src="themes/index/images/ok.gif" />');	
		return true;
	}
}
function  imgcode1(){
//return false;
	//alert("11111");
    if($('#seccode').val()==''){
		$('.seccode').html('<font color="red">验证码不能为空</font>');
		//return false;
	}else{
		classname='.seccode';
		$.ajax({
		  type:"post",
		  contentType: "application/x-www-form-urlencoded; charset=utf-8",
		  url: "index.php?c=member&a=checkimgcode",
		  data: {
			  "seccode": $("#seccode").val()
		  },
		  success: function (data) {
				//alert(data);
				if(data==0){
					$(classname).html('<font color="red">验证码错误</font>');
					return false;
				}else{
					$(classname).html('<img src="themes/index/images/ok.gif" />');
					return true;
				}
      	  }
		})
	  
	}
}
	
//联系人
function checkcontactp(){
	if($('#contactperson').val()==''){
		$('.contactperson').html('<font color="red">Contact Person Can not Be Null</font>');
		return false;
	}else{
		$('.contactperson').html('<img src="themes/index/images/ok.gif" />');	
		return true;
	}
}

//电话
function checkphone(){
	rule=/^(\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$/i
	if($('#country').val()==''){
		$('.phone').html('<font color="red">County Code Is Null</font>');
		return false;
	}else if($('#city').val()==''){
		$('.phone').html('<font color="red">City Code Is Be Null</font>');
		return false;
	}else if($('#phone').val()==''){
		$('.phone').html('<font color="red">Tel No. Can not Be Null</font>');
		return false;
	}else if(!rule.test($('#phone').val())){
		$('.phone').html('<font color="red">Error Tel No. Format </font>');
		return false;
	}else{
		$('.phone').html('<img src="themes/index/images/ok.gif" />');	
		return true;
	}
}

	
//地址
function checkaddress(){
	if($('#address').val()==''){
		$('.address').html('<font color="red">Address Can not Be Null</font>');
		return false;
   	}else{
		$('.address').html('<img src="themes/index/images/ok.gif" />');		
		return true;
	}
}
				
	
//邮编
function checkpostcode(){
	if($('#postcode').val()==''){
		$('.postcode').html('<font color="red">Post Code Can not Be Null</font>');
		return false;
   	}else{
		$('.postcode').html('<img src="themes/index/images/ok.gif" />');		
		return true;
	}
}
	
//网址
function checkwebsite(){
	if($('#website').val()==''){
		$('.website').html('<font color="red">Website Can not Be Null</font>');
		return false;
   	}else{
		$('.website').html('<img src="themes/index/images/ok.gif" />');		
		return true;		
	}	
}	
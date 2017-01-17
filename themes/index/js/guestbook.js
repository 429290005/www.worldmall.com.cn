function chk_username(){
	if($('#username').val()==""){
		$('#usernametips').html('请填入您的姓名！');
	}else{
		$('#usernametips').html('');
		return 1;
	}
}
function chk_email(){
	var regex=/^([a-zA-Z0-9]+[_|-|.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|-|.]?)*[a-zA-Z0-9]+.[a-zA-Z]{2,3}$/;
	if($('#email').val()==''){
		$('#emailtips').html('邮箱地址不能为空！');
	}else if(!regex.exec($('#email').val())){
		$('#emailtips').html('邮箱地址错误！');
	}else{
		$('#emailtips').html('');
		return 1;
	}
	
}


function chk_phone(){
	var patterns=/^(\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$/;
	if($('#phone').val()==''){
		$('#phonetips').html('手机号码不能为空！');
	}else if(!patterns.exec($('#phone').val())){
		$('#phonetips').html('手机号码格式错误！');
	}else{
		$('#phonetips').html('');
		return 1;
	}
}

function chk_content(){
	if($("#content2").val()==''){
		$("#contenttips").html('内容不能为空！');
	}else{
		$("#contenttips").html('');
		return 1;
	}
}


function chk_guestbook(){
	if(chk_username()+chk_email()=="2"){
		return true;
	}else{
		return false;
	}
}
// JavaScript Document


//选择所有行
function selectAll(o,obj){
	if($(o).attr("checked")==true){
		$("[name='checkboxs[]']").attr("checked","true");
	}else{
		$("[name='checkboxs[]']").removeAttr("checked","true");
	}
	
}

<?php
class question extends spController
{
	function __construct(){ 
		parent::__construct(); 
	}
	//调查列表
	function index(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->concept = spClass("site_config")->find("id=105");  
		$this->design  = spClass("site_config")->find("id=106"); 
		
		$this->type     = "市场调查";  
		$this->menuIndex= 4;
		$this->rows     = spClass('question_list')->spPager($this->spArgs('page', 1), 10)->findAll("pid=0","sort_id asc");
		$this->pager = spClass('question_list')->spPager()->getPager(); 
		$this->bottom   = spClass("question_list")->find("id=26");
		$this->display("index/question.html");
	}
	
	//调查列表详细
	function show(){ 
		$this->menuIndex= 4;
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103"); 
		$this->concept = spClass("site_config")->find("id=105");  
		$this->design  = spClass("site_config")->find("id=106"); 
		
		$id=empty($_GET['id'])?$this->error("参数错误！"):$_GET['id'];
		$this->colors = spClass('goods_color')->findAll("pid=22","sort_id asc");
		$this->industrys = spClass('goods_color')->findAll("pid=23","sort_id asc");
		$this->categories = spClass('goods_cat')->findAll("id>0","sort_id asc");
		
		$this->detail=spClass('question_list')->find("id=".$id);
		$asklist=spClass('question_list')->findAll("pid=".$id);
		foreach($asklist as $aid=>$avalue){
			if($aid+1!=count($asklist)){
				$askvalues.=$avalue['id'].",";
			}else{
				$askvalues.=$avalue['id'];
			}
			$brows=spClass("ask_list")->findAll("sid=".$avalue['id']);
			foreach($brows as $bid=>$bvalue){
				$radiovalue=explode(",",$bvalue['content']);
				$brows[$bid]['smalllist']=$radiovalue;
			}
			
			$asklist[$aid]['lists']=$brows;
		}
		$sql="SELECT id,sid,asktype FROM sp_ask WHERE sid IN(".$askvalues.")";
		$drows=spClass("ask_list")->findSql($sql);
		foreach($drows as $did=>$dvalue){
			if($did+1!=count($drows)){
				$evalue.=$dvalue['id'].",".$dvalue['asktype']."|";
			}else{
				$evalue.=$dvalue['id'].",".$dvalue['asktype'];
			}
		}
		$this->asktypes=$asktypes;
		$this->evalue=$evalue;
		
		$this->asklist=$asklist;
		
		$this->catename="市场调查";
		$this->type=$detail['catename'];
		
		$this->display("index/question_detail.html");
	}
	//获取值
	function getvalue(){
		$evalue=empty($_POST['evalue'])?$this->error("参数错误！"):$_POST['evalue'];
		$id=empty($_POST['id'])?$this->error("参数错误！"):$_POST['id'];
		// print_r($_POST);
		// exit();
		$row=spClass("question_list")->find("id=".$id);
		if(!empty($row["askvalue"])){
			$evalue.="@".$evalue;
		}
		// print_r($evalue);
		// exit();
		$updaterow = array(
				'askvalue'      => $evalue,
		);
		//运行添加的动作
		$condition="id=".$id;
		if(spClass('question_list')->update($condition,$updaterow)){
			$this->error("提交调查表成功！",spUrl("question","index"));	
		}else{
			$this->error("提交调查表失败！",spUrl("question","index"));	
		}
		//dump(spClass('ask_value'));
		
	}
	
	
	
}	
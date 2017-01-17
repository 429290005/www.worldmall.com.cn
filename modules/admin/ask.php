<?php  
 class ask extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$pid 		= empty($_GET['pid'])?0:$_GET['pid'];
		
		if($pid==0){
			$this->error("程序错误！",spUrl("goods","index"));	
		}
		
		$this->pid=$pid;
		$sql="SELECT a.*,b.catename as catename FROM sp_ask a LEFT JOIN sp_question_list b ON a.sid=b.id WHERE pid=$pid ORDER BY sort_id ASC";
		$this->rows = spClass('ask_list')->findSql($sql);
		//print_r($sql);
		// exit();
		$this->display('admin/ask_list.html');
	}
	//添加页面
	function addpage(){
		$this->pid 		= empty($_GET['pid'])?0:$_GET['pid'];
		$this->cat_select = $this->getCate(0);
		$this->display('admin/ask_add.html');
	}
	//添加动作
	function insert(){
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$title 		    = empty($_POST['title'])?"":$_POST['title'];
		$pid 		    = empty($_POST['pid'])?0:$_POST['pid'];
		$sid 		    = empty($_POST['sid'])?0:$_POST['sid'];
		$content 	    = empty($_POST['content'])?"":$_POST['content'];
		$asktype 	    = empty($_POST['asktype'])?"":$_POST['asktype'];
		$this->pid=$pid;
		if($sid==0){
			$this->error("请选择分类！",spUrl("ask","addpage"));	
		}
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'content'    => $content,
			'asktype'    => $asktype,
			'title'      => $title,
			'sid'		 => $sid,
			'sort_id'    => $sort_id,
		);
		
		//运行添加的动作
		if(spClass('ask_list')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("ask","addpage",array("pid"=>$pid));
			$link[1]['text'] = '返回调查项列表';
			$link[1]['href'] = spUrl("ask","index",array("pid"=>$pid));
			$this->sys_msg("调查项添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->cat_select = $this->getCate(0);
		$this->cat = spClass('ask_list')->find($condition,'id asc');
		$this->display('admin/ask_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$title 		    = empty($_POST['title'])?"":$_POST['title'];
		$sid 		    = empty($_POST['sid'])?0:$_POST['sid'];
		$pid 		    = empty($_POST['pid'])?0:$_POST['pid'];
		$content 	    = empty($_POST['content'])?"":$_POST['content'];
		$asktype 	    = empty($_POST['asktype'])?"":$_POST['asktype'];
		
		if($sid==0){
			$this->error("请选择分类！",spUrl("ask","editpage",array("pid"=>$pid)));	
		}
		
		
		$condition = array('id'=>$id);	
		$updaterow = array(
			'content'    => $content,
			'asktype'    => $asktype,
			'title'      => $title,
			'sid'		 => $sid,
			'sort_id'    => $sort_id,
		);
		
		//运行更新的动作
		if(spClass('ask_list')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("ask","editpage",array("id"=>$id,"pid"=>$pid));
			$link[1]['text'] = '返回调查项列表';
			$link[1]['href'] = spUrl("ask","index",array("pid"=>$pid));
			$this->sys_msg("调查项修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("ask","index"));	
		}
	}
	
	//显示调查结果
	function show(){
		$pid  = empty($_REQUEST['pid'])?$this->error('程序出现错误！'):$_REQUEST['pid'];
		$arows=spClass("question_list")->find("id=".$pid);
		$hrows=spClass("question_list")->findAll("pid=".$pid);
		$asklist=spClass('question_list')->findAll("pid=".$pid);
		
		
		$askvalue=$arows['askvalue'];
		$brows=explode("@",$askvalue);
		foreach($brows as $bid=>$bvalue){
			$bvalue=rtrim($bvalue,'|');
			$asks[$bid]=$crows=explode("|",$bvalue);
			foreach($crows as $cid=>$cvalue){
				$zrows[]=$drows=explode(",",$cvalue);
				// foreach($drows as $did=>$dvalue){
					// $zrows[]=$erows=explode(",",$dvalue);
				// }
			}
		}
		
		foreach($asklist as $aid=>$avalue){
			// if($aid+1!=count($asklist)){
				// $askvalues.=$avalue['id'].",";
			// }else{
				// $askvalues.=$avalue['id'];
			// }
			$brows=spClass("ask_list")->findAll("sid=".$avalue['id']);
			foreach($brows as $bid=>$bvalue){
				$radiovalue=explode(",",$bvalue['content']);
				$brows[$bid]['smalllist']=$radiovalue;
				// $brows[$bid]['svalue'][]=$zrows[$bid][1];
			}
			// $asklist[$aid]['lists']=$brows;
		}
		
		
		
		// print_r($brows);
		// exit();
		$this->asks=$asks;
		
		$this->display('admin/ask_detail.html');
	}
	
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$pid  = empty($_REQUEST['pid'])?$this->error('程序出现错误！'):$_REQUEST['pid'];
		$condition = array('id' => $id);
		$row=spClass('ask_list')->find($condition);
		unlink("uploads/ask/".$row['upfile']);
		unlink("uploads/sm_ask/".$row['upfile']);
		if($row=spClass('ask_list')->delete($condition)){
			//删除图片
			$this->error("调查项删除成功！",spUrl("ask","index",array("pid"=>$pid,"id"=>$pid)));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("ask","index",array("pid"=>$pid,"id"=>$pid)));		
		}
	}
	
	
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("goods","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("goods","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_ask WHERE id IN(".$id.")";
				$sqlDel="SELECT * FROM sp_ask WHERE id IN(".$id.")";
				$rows=spClass('goods_type')->findSql($sql);
				foreach($rows as $rowsid=>$value){
					unlink("uploads/ask/".$value['upfile']);
					unlink("uploads/sm_ask/".$value['upfile']);	
				}
				if(spClass("goods_list")->query($sql)){
					$this->error("批量删除成功!",spUrl("ask","index",array("pid"=>$pid)));	
				}
			break;
		}
	}
	
	
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('question_list')->findAll('pid='.$pid,'sort_id asc'); 
		if($data)
		{
			foreach($data as $v)
			{
				$v['level'] = $level+1;
				$v['catename'] = str_repeat('&nbsp;', $v['level'] * 4).$v['catename'];
				$this->allCate[] = $v;
				self::getCate($v['id'], $v['level']);
			}
		}
		return $this->allCate;
	}
	/**
	 * 系统提示信息
	 */
	function sys_msg($msg_detail, $msg_type = 0, $links = array(), $auto_redirect = true)
	{
		if (count($links) == 0)
		{
			$links[0]['text'] = '返回';
			$links[0]['href'] = 'javascript:history.go(-1)';
		}
		$this->msg_detail=$msg_detail;
		$this->msg_type=$msg_type;
		$this->links=$links;
		$this->default_url=$links[0]['href'];
		$this->auto_redirect=$auto_redirect;
		$this->display('admin/message.html');
	}


}      

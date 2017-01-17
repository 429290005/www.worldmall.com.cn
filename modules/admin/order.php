<?php  
 class order extends spController  {  
 
    function __construct(){  
	 // 一些操作  
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$keyword=$_REQUEST['keyword'];
		$cat_id=$_REQUEST['cat_id'];
		$sid=$cat_id;
		// print_r($cat_id);
		// exit();
		$flag  =$_REQUEST['flag'];
		$cond="";
		
			if($_REQUEST['statue']==7){
				$cond.=" AND statue>0";
			}else if($_REQUEST['statue']>-1){
				$statue=$_REQUEST['statue'];
				$cond.=" AND statue=".$statue;
			}
			if($_REQUEST['flag']==1){
				$cond.=" AND sid=".$cat_id;
			}else{
				$cond.=" AND gid=".$cat_id;
			}
			// print_r($cond);
			// exit();
			$sql="SELECT a.*,sum(a.cost) as costs,sum(a.count) as counts FROM sp_orderlist a WHERE sid>0 ".$cond." group by addtime order by addtime desc";
			// print_r($flag);
			// exit();
			// print_r($_REQUEST);
			// exit();
			//$rows=spClass("member_order")->findSql($sql);
			$rows=spClass('member_order')->spPager($this->spArgs('page', 1), 20)->findSql($sql);
			$this->pager    = spClass('feedback')->spPager()->getPager(); 
			$phone="";
			$uname="";
			foreach($rows as $rid=>$rvalue){
				$sql2="SELECT a.*,b.uname FROM sp_orderlist a,sp_member b WHERE a.addtime='".$rvalue['addtime']."' AND a.sid=b.id";
				$rs=spClass("member_order")->findSql($sql2);
				$costs="";
				foreach($rs as $rrid=>$rrvalue){
					$costs+=$rrvalue['count']*$rrvalue['cost'];
				}
				$rss=spClass("member_list")->find("id=".$rvalue['gid']);
				$rows[$rid]['rs']=$rs;
				$rows[$rid]['rss']=$rss;
				$rows[$rid]['costss']=$costs;
				$countrid=count($sql2);
				$sumcost+=$rvalue['costs'];
			}
			// print_r($sumcost);
			// exit();
			$this->sumcost=$sumcost;
			$this->cat_id=$cat_id;
			$this->rows=$rows;	
		// print_r($rows);
		// exit();
		
		//未受理状态的订单数
			
			$sql1=" SELECT distinct orderid FROM sp_orderlist WHERE sid=".$sid." AND statue=1";
			$ordercount=spClass("member_order")->findSql($sql1);
			$this->statue1=count($ordercount);
			
			if(empty($ordercount[0]['orderid'])){
				$this->statue1=0;
			}else{
				$this->statue1=count($ordercount);
			}
			//已送餐状态的订单数
			$sql2=" SELECT distinct orderid FROM sp_orderlist WHERE sid=".$sid." AND statue=2";
			$ordercount2=spClass("member_order")->findSql($sql2);
			if(empty($ordercount2[0]['orderid'])){
				$this->statue2=0;
			}else{
				$this->statue2=count($ordercount2);
			}
			//已回复状态的订单数
			$ordercount=array();
			$sql3=" SELECT distinct orderid FROM sp_orderlist WHERE sid=".$sid." AND statue=3";
			$ordercount3=spClass("member_order")->findSql($sql3);
			$this->statue3=count($ordercount3);
			if(empty($ordercount3[0]['orderid'])){
				$this->statue3=0;
			}else{
				$this->statue3=count($ordercount3);
			}
		//已取消状态的订单数
			$sql4=" SELECT distinct orderid FROM sp_orderlist WHERE sid=".$sid." AND statue=4";
			$ordercount4=spClass("member_order")->findSql($sql4);
			$this->statue4=count($ordercount4);
			if(empty($ordercount4[0]['orderid'])){
				$this->statue4=0;
			}else{
				$this->statue4=count($ordercount4);
			}
			//已交易状态的订单数
			$sql5=" SELECT distinct orderid FROM sp_orderlist WHERE sid=".$sid." AND statue=5";
			$ordercount5=spClass("member_order")->findSql($sql5);
			$this->statue5=count($ordercount5);
			if(empty($ordercount5[0]['orderid'])){
				$this->statue5=0;
			}else{
				$this->statue5=count($ordercount5);
			}
			//待处理状态的订单数
			$sql6=" SELECT distinct orderid FROM sp_orderlist WHERE sid=".$sid." AND statue=6";
			$ordercount6=spClass("member_order")->findSql($sql6);
			$this->statue6=count($ordercount6);
			if(empty($ordercount6[0]['orderid'])){
				$this->statue6=0;
			}else{
				$this->statue6=count($ordercount6);
			}
			//全部状态的订单数
			$sql7=" SELECT distinct orderid FROM sp_orderlist WHERE sid=".$sid."";
			$ordercount7=spClass("member_order")->findSql($sql7);
			$this->statue7=count($ordercount7);
			if(empty($ordercount7[0]['orderid'])){
				$this->statue7=0;
			}else{
				$this->statue7=count($ordercount7);
			}
		
		$this->display('admin/order_list.html');
	}
	//添加页面
	function addpage(){
		$this->cat_select = $this->getCate(0);
		$this->display('admin/order_add.html');
	}
	//添加动作
	function insert(){
		$title    	= empty($_POST['title'])?"":$_POST['title'];
		$pid   		= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id    = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keywords   = empty($_POST['keywords'])?"":$_POST['keywords'];
		$description= empty($_POST['description'])?"":$_POST['description'];
		$content    = empty($_POST['content'])?"":$_POST['content'];
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'title'      => $title,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
			'is_open'    => $_POST['is_open'],
			'keywords'   => $keywords,
			'description'=> $description,
			'content'    => $content,
			'add_time'   => time(),
		);
		//运行添加的动作
		$row=spClass('member_order')->create($newrow);
		if($row){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("order","addpage");
			$link[1]['text'] = '返回文章列表';
			$link[1]['href'] = spUrl("order","index");
			$this->sys_msg("文章添加成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("order","index");
		}
	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->detail = spClass('member_order')->find($condition);
		$this->display('admin/order_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$flag    	= empty($_POST['flag'])?"":$_POST['flag'];
		$is_open    = empty($_POST['is_open'])?"":$_POST['is_open'];
		$updaterow = array(
			'is_open'   => $is_open,
			'flag'      => $flag,
		);
		//print_r($);
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('member_order')->update($condition,$updaterow);
		if($row){
			$link[0]['text'] = '返回修改页面';
			$link[0]['href'] = spUrl("order","editpage",array("id"=>$id));
			$link[1]['text'] = '返回会员列表';
			$link[1]['href'] = spUrl("order","index");
			$this->sys_msg("会员修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("order","index");
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('member_order')->delete($condition)){
			$this->error("删除成功!",spUrl("order","index"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("order","index"));		
		}
	}
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("order","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("order","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_orderlist WHERE id IN(".$id.")";
				if(spClass("member_order")->query($sql)){
					$this->error("批量删除成功!",spUrl("order","index"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_orderlist SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("member_order")->query($sql)){
					$this->error("批量隐藏成功!",spUrl("order","index"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_orderlist SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("member_order")->query($sql)){
					$this->error("批量显示成功!",spUrl("order","index"));	
				}
			break;
		}
	}
	
	//批量处理文章
	function orderbatch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("order","orderproduct"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择菜谱！",spUrl("order","orderproduct"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_orderlist WHERE id IN(".$id.")";
				if(spClass("order_product")->query($sql)){
					$this->error("批量删除成功!",spUrl("order","orderproduct"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_orderlist SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("order_product")->query($sql)){
					$this->error("批量取消推荐成功!",spUrl("order","orderproduct"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_orderlist SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("order_product")->query($sql)){
					$this->error("批量推荐成功!",spUrl("order","orderproduct"));	
				}
			break;
		}
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

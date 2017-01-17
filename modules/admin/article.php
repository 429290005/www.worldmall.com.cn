<?php  
 class article extends spController  {  
 
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$keyword=$_POST['keyword'];
		$cat_id=$_REQUEST['cat_id'];
		$pid = $_REQUEST['pid'];
		$zt = $_REQUEST['zt'];
		$cats=spClass("article_cat")->findAll("pid=".$pid);
			foreach($cats as $cid=>$cvalue){
				$cids[]=$cvalue['id'];
			}
			if(count($cids)>0){
				$cids=implode(",",$cids);
				$condition=" AND a.pid IN ($cids)";
				if($pid==1){
					$condition=" AND a.pid=$pid"; 
				}
			}else{
				$condition=" AND a.pid=$pid";
			}
			if(!empty($zt)){
				$condition=" AND a.zt=$zt";
			}
		if(!empty($keyword) and !empty($pid)){
			$sql="SELECT a.*,b.catename FROM sp_article a,sp_article_cat b WHERE a.pid=b.id AND a.title like '%$keyword%' $condition ORDER BY a.add_time desc,a.sort_id asc";	
		}else if(!empty($keyword)){
			$sql="SELECT a.*,b.catename FROM sp_article a,sp_article_cat b WHERE a.pid=b.id AND a.title like '%$keyword%' ORDER BY a.add_time desc,a.sort_id asc";		
		}else if(!empty($pid)){
			
				$sql="SELECT a.*,b.catename FROM sp_article a,sp_article_cat b WHERE a.pid=b.id $condition ORDER BY a.add_time desc,a.sort_id asc";
			
		}else{
			$sql="SELECT a.*,b.catename FROM sp_article a,sp_article_cat b WHERE a.pid=b.id ORDER BY a.add_time desc,a.sort_id asc";	
		}
		
		$this->pid=$pid;
		$this->cat_select = spClass("article_cat")->findAll("pid=".$pid);
		$article_list=spClass("article_list");
		
		$this->pcat = spClass('article_cat')->find('id='.$pid);
		$this->zt = spClass('goods_color')->findAll('pid=28');

		$this->rows = $article_list->spPager($this->spArgs('page', 1), 15)->findSql($sql);  
		$this->pager = $article_list->spPager()->getPager(); 
		$this->display('admin/article_list.html');
	}
	//所有文章首页
	function search(){
		$keyword=$_POST['keyword'];
		if(!empty($keyword)){
			$sql="SELECT a.*,b.catename FROM sp_article a,sp_article_cat b WHERE a.pid=b.id AND a.title like '%$keyword%' ORDER BY a.sort_id asc,a.id desc";		
		}else{
			$sql="SELECT a.*,b.catename FROM sp_article a,sp_article_cat b WHERE a.pid=b.id ORDER BY a.sort_id asc,a.id desc";	
		}
		$article_list=spClass("article_list");
		
		$this->zt = spClass('goods_color')->findAll('pid=28');

		$this->rows = $article_list->spPager($this->spArgs('page', 1), 100)->findSql($sql);  
		$this->pager = $article_list->spPager()->getPager(); 
		$this->display('admin/article_search.html');
	}
	//添加页面
	function addpage(){
		$pid = $_REQUEST['pid'];
		$this->pid=$pid;
		$this->types=spClass('goods_color')->findAll('pid=1',"sort_id asc,id desc");
		$this->year=spClass('goods_color')->findAll('pid=7',"sort_id asc,id desc");
		$this->zt=spClass('goods_color')->findAll('pid=28',"sort_id asc,id desc");
		
		$this->pcat=spClass("article_cat")->find('id='.$pid);
		
		// print_r($pcat);
		// exit();
		
		$this->attr_select = spClass("goods_attr")->findAll("id>0");
		$this->cat_select = spClass("article_cat")->findAll("pid=".$pid);
		$this->display('admin/article_add.html');
	}
	//添加动作
	function insert(){
		$title    	= empty($_POST['title'])?"":$_POST['title'];
		$btitle    	= empty($_POST['btitle'])?"":$_POST['btitle'];
		$bid   		= empty($_POST['bid'])?0:$_POST['bid'];
		$pid   		= empty($_POST['pid'])?0:$_POST['pid'];
		$tid   		= empty($_POST['tid'])?0:$_POST['tid'];
		$sid   		= empty($_POST['sid'])?0:$_POST['sid'];
		$sort_id    = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keywords   = empty($_POST['keywords'])?"":$_POST['keywords'];
		$description= empty($_POST['description'])?"":$_POST['description'];
		$content    = empty($_POST['content'])?"":$_POST['content'];
		$short      = empty($_POST['short'])?"":$_POST['short'];
		$attr       = empty($_POST['attr'])?"":$_POST['attr'];
		$is_open    = empty($_POST['is_open'])?0:$_POST['is_open'];
		$adddate    = empty($_POST['adddate'])?time():strtotime($_POST['adddate']);
		$upfile     = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		$zt         = empty($_POST['zt'])?0:$_POST['zt'];
		$promote         = empty($_POST['promote'])?0:$_POST['promote'];
		
		$links       = empty($_POST['link'])?"":$_POST['link'];
		if(!empty($upfile)){
			$pic=upload('article','jpg,gif,rar,pdf',2048000000,1,'120*120',0);
		}
		
		
		
		
		
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'title'      => $title,
			'btitle'     => $btitle,
			'pid'        => $pid,
			'tid'        => $tid,
			'sid'        => $sid,
			'sort_id'    => $sort_id,
			'is_open'    => $is_open,
			'keywords'   => $keywords,
			'description'=> $description,
			'short'      => $short,
			'attr'       => $attr,
			'link'       => $links,
			'content'    => $content,
			'zt'         => $zt,
			'add_time'   => $adddate,
			'promote'    => $promote,
			'upfile'     => $pic[0],
		);
		
		//运行添加的动作
		$row=spClass('article_list')->create($newrow);
		if($row){
	
			
			
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("article","addpage",array("pid"=>$pid));
			$link[1]['text'] = '返回文章列表';
			$link[1]['href'] = spUrl("article","index",array("pid"=>$pid));
			$this->sys_msg("文章添加成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("article","index",array("pid"=>$pid));
		}
	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$pid  = empty($_REQUEST['pid'])?$this->error('程序出现错误！'):$_REQUEST['pid'];
		$condition = array('id'=>$id);
		$this->attr_select = spClass("goods_attr")->findAll("id>0");
		$detail = spClass('article_list')->find($condition);

		$this->types=spClass('goods_color')->findAll('pid=1',"sort_id asc,id desc");
		$this->year=spClass('goods_color')->findAll('pid=7',"sort_id asc,id desc");
		$this->zt=spClass('goods_color')->findAll('pid=28',"sort_id asc,id desc");
		
		$this->pcat=spClass("article_cat")->find('id='.$pid);
		
		$this->detail=$detail;
		$this->cat_select = $this->getCate($pid);
		$this->display('admin/article_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$bid  = empty($_REQUEST['bid'])?$this->error('程序出现错误！'):$_REQUEST['bid'];
		$cat_id = $_POST['cat_id'];
		$page   = $_POST['page'];
		//要更新的字段
		$title    	= empty($_POST['title'])?"":$_POST['title'];
		$btitle    	= empty($_POST['btitle'])?"":$_POST['btitle'];
		$pid   		= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id    = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keywords   = empty($_POST['keywords'])?"":$_POST['keywords'];
		$description= empty($_POST['description'])?"":$_POST['description'];
		$content    = empty($_POST['content'])?"":$_POST['content'];
		$short      = empty($_POST['short'])?"":$_POST['short'];
		$zt   		= empty($_POST['zt'])?0:$_POST['zt'];
		$tid   		= empty($_POST['tid'])?0:$_POST['tid'];
		$sid   		= empty($_POST['sid'])?0:$_POST['sid'];
		$sid   		= empty($_POST['sid'])?0:$_POST['sid'];
		$is_open    = empty($_POST['is_open'])?0:$_POST['is_open'];
		
		$links       = empty($_POST['link'])?"":$_POST['link'];
		
		$promote         = empty($_POST['promote'])?0:$_POST['promote'];
		$adddate    = empty($_POST['adddate'])?time():strtotime($_POST['adddate']);
		$upfile     = $_FILES['upfile']['name'];   //产品封面图
		
		
		
		$updaterow = array(
			'title'      => $title,
			'btitle'     => $btitle,
			'pid'        => $pid,
			'promote'    => $promote,
			'tid'		 => $tid,
			'sid'        => $sid,
			'link'       => $links,
			'sort_id'    => $sort_id,
			'is_open'    => $is_open,
			'keywords'   => $keywords,
			'description'=> $description,
			'content'    => $content,
			'zt'         => $zt,
			'short'      => $short,
		);
		if(!empty($upfile)){
			//删除更新前的图片
			$row=spClass('article_list')->find("id=".$id);
			unlink("uploads/article/".$row['upfile']);
			unlink("uploads/sm_article/".$row['upfile']);
			$pic=upload('article','jpg,gif,rar,pdf',2048000000,1,'120*120',0);
			$updaterow['upfile']=$pic[0];
		}
		if(!empty($adddate)){
			$updaterow['add_time']=$adddate;	
		}
		
		
		
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('article_list')->update($condition,$updaterow);
		if($row){
			
			
			
			$link[0]['text'] = '返回修改页面';
			$link[0]['href'] = spUrl("article","editpage",array("id"=>$id,"pid"=>$bid));
			$link[1]['text'] = '返回文章列表';
			$link[1]['href'] = spUrl("article","index",array("cat_id"=>$cat_id,"page"=>$page,"pid"=>$bid));
			
			$this->sys_msg("文章修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("article","index");
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$bid  = empty($_REQUEST['bid'])?$this->error('程序出现错误！'):$_REQUEST['bid'];
		$cat_id = $_REQUEST['cat_id'];
		$page= $_REQUEST['page'];
		$condition = array('id' => $id);
		if($row=spClass('article_list')->delete($condition)){
			$link[0]['text'] = '返回文章列表';
			$link[0]['href'] = spUrl("article","index",array("cat_id"=>$cat_id,"page"=>$page,"pid"=>$bid));
			$this->sys_msg("文章删除成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("article","index",array("pid"=>$bid)));		
		}
	}
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("article","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("article","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$pid=$_POST['pid'];
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_article WHERE id IN(".$id.")";
				$sqlDel="SELECT * FROM sp_article WHERE id IN(".$id.")";
				$rows=spClass('article_list')->findSql($sqlDel);

				foreach($rows as $rowsid=>$value){
					unlink("uploads/article/".$value['upfile']);
					unlink("uploads/sm_article/".$value['upfile']);	
				}
				if(spClass("article_list")->query($sql)){
					$this->error("批量删除成功!",spUrl("article","index",array("pid"=>$pid)));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_article SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("article_list")->query($sql)){
					$this->error("批量隐藏成功!",spUrl("article","index"),array("pid"=>$pid));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_article SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("article_list")->query($sql)){
					$this->error("批量显示成功!",spUrl("article","index"),array("pid"=>$pid));	
				}
			break;
		}
	}
	
	
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('article_cat')->findAll('pid='.$pid,'sort_id asc'); 
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
		//生成静态
	function test_html(){ // 测试spHtml生成静态页面的方法  
         echo "开始生成新闻内容页面...<br />";  
         $urls = array();  
         $news = spClass("article_list");  
         if( $result = $news->findAll() ){ // 获取到全部的留言来进行spUrl的构造  
             foreach($result as $value){ // 循环  
                 $urls[] =  array(  
                     array('article','index',array('id'=>$value['id']))  // 这里和spUrl的参数是相同的  
                 );  
             }  
         }  
        spClass('spHtml')->makeAll($urls); // 使用makeAll来制作  
        echo "新闻内容页面生成完毕！";  
     }  

}      

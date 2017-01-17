<?php
header("Content-Type: text/html;charset=utf-8"); 
class info extends spController
{
	function __construct(){ 
		parent::__construct(); 
		$this->pageimg= spClass("page_img")->find("id=25");
		$this->links=spClass('page_img')->findAll('nid=2');
		$this->basepath=BASE_PATH;
	}
	
	function index(){ 
		$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		$this->contact  = spClass('article_list')->find("id=1101",null,'content');
		$this->huodong = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',4);
		$id=empty($_GET['id'])?$this->error("参数错误！"):intval($_GET['id']);
		$pid=empty($_GET['pid'])?$this->error("参数错误！"):intval($_GET['pid']);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->menuIndex=9;
		
		$this->cats=spClass('article_list')->findAll('pid=1',"sort_id asc,id desc");
		$bcat=spClass('article_cat')->findAll('pid=1',"sort_id asc,id desc");
		
		
		if($pid==50){
			$this->banner=spClass('page_img')->find('id=10');
		}else{
			$this->banner=spClass('page_img')->find('id=40');
		}
		
		$this->bcat=$bcat;
		
		$this->ctitle="关于我们";
		$this->news = spClass("article_list")->findAll("pid=25","sort_id asc,id desc");
		
		
		$this->catb = spClass("article_cat")->find("id=".$pid);

		$this->rows = spClass("article_list")->findAll("pid=".$pid,"sort_id asc,id asc");

		
		
		
		$this->row = spClass("article_list")->find("id=".$id);
		
			$this->display("index/info.html");
	
		
		
	}
	function webmap(){
		$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		$this->contact  = spClass('article_list')->find("id=1101",null,'content');
		$this->huodong = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',4);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->menuIndex=9;
		$this->display("index/webmap.html");
	}
	
	function contact(){ 
	$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
	$this->contact  = spClass('article_list')->find("id=1101",null,'content');
		$this->huodong = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',4);
		$id=empty($_GET['id'])?$this->error("参数错误！"):intval($_GET['id']);
		$pid=empty($_GET['pid'])?$this->error("参数错误！"):intval($_GET['pid']);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$this->menuIndex=5;

		if($pid==50){
			$this->banner=spClass('page_img')->find('id=10');
		}else{
			$this->banner=spClass('page_img')->find('id=40');
		}
		
		
		$this->cats=spClass('article_list')->findAll('pid=1',"sort_id asc,id desc");
		$bcat=spClass('article_cat')->findAll('pid=1',"sort_id asc,id desc");
		
		foreach($bcat as $bid=>$bvalue){
			$bcat[$bid]['second']=spClass('article_list')->findAll('pid='.$bcat[$bid]['id'],"sort_id asc,id desc");
		}
		
		$this->bcat=$bcat;
		
		$this->ctitle="关于我们";
		$this->news = spClass("article_list")->findAll("pid=7","sort_id asc,id desc");
		
		
		$this->catb = spClass("article_cat")->find("id=".$pid);
		// print_r($cat);
		// exit();
		$this->rows = spClass("article_list")->findAll("pid=".$pid,"sort_id asc,id desc");

		
		
		
		$this->row = spClass("article_list")->find("id=".$id);
		$this->display("index/contact.html");
	}
	
	
	function search(){ 
		$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$this->cats=spClass('article_list')->findAll('pid=1',"sort_id asc,id desc");
		
		$bcat=spClass('article_cat')->findAll('pid=1',"sort_id asc,id desc");
		
		foreach($bcat as $bid=>$bvalue){
			$bcat[$bid]['second']=spClass('article_list')->findAll('pid='.$bcat[$bid]['id'],"sort_id asc,id desc");
		}
		
		$this->bcat=$bcat;
		
		$keyword=empty($_REQUEST['keyword'])?"":htmlspecialchars($_REQUEST['keyword']);

		
		$sql="SELECT a.title,a.add_time,a.pid,a.id,g.sort_id,g.catename,IF(a.tid=0,1000,g.sort_id) as fuckid FROM sp_article a LEFT JOIN sp_goods_color g ON a.tid=g.id WHERE a.title like '%".$keyword."%' ORDER BY fuckid asc,add_time desc";
		
		// $this->news = spClass('article_list')->findAll('title like \'%'.$keyword.'%\'');
		
		$this->news = spClass('article_list')->spPager($this->spArgs('page', 1), 100)->findSql($sql);  
		$this->pager = spClass('article_list')->spPager()->getPager(); 
		
		$this->display("index/search.html");
	}
	
	
	function email(){ 
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$this->cats=spClass('article_list')->findAll('pid=1',"sort_id asc,id desc");
		
		$bcat=spClass('article_cat')->findAll('pid=1',"sort_id asc,id desc");
		
		foreach($bcat as $bid=>$bvalue){
			$bcat[$bid]['second']=spClass('article_list')->findAll('pid='.$bcat[$bid]['id'],"sort_id asc,id desc");
		}
		
		$this->bcat=$bcat;
		

		
		$this->display("index/email.html");
	}
	
	


}	
<?php
class product extends spController
{
	function __construct(){ 
		parent::__construct(); 
		header("Content-Type: text/html;charset=utf-8");
		$this->banner=spClass('page_img')->find('id=36');
		$this->links=spClass('page_img')->findAll('nid=2');
		$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		$this->basepath=BASE_PATH;
	}

	function index(){
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$this->menuIndex=3;
		
		$id=empty($_GET['id'])?33:intval($_GET['id']);
		
		
		
	
		$this->catlist=spClass('goods_cat')->findAll('id>0','sort_id asc,id desc');
		
		
		
		
		
		
		
		$this->goodscolor=spClass('goods_color')->findAll('pid=1','sort_id asc,id desc');
		
		
		
		
		$this->cat=spClass('goods_cat')->find('id='.$id);
		
		if($_GET['act']=='new'){
			$this->goodslist = spClass('goods_list')->spPager($this->spArgs('p',1),4)->findAll('promote=1','sort_id asc,id desc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/product_new.html");
			
		}else{
			$this->goodslist = spClass('goods_list')->spPager($this->spArgs('p',1),4)->findAll('pid='.$id,'sort_id asc,id desc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/product.html");
		}

		
	}
	
	function detail(){
	
		
		
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$this->menuIndex=3;
		
		$id=empty($_GET['id'])?33:intval($_GET['id']);
		
	
		$this->catlist=spClass('goods_cat')->findAll('id>0','sort_id asc,id desc');
		
		$this->goodslist=spClass('goods_list')->findAll('pid='.$id,'sort_id asc,id desc');
		
		
		
		$goods=spClass('goods_list')->find('id='.$id);
		
		$this->cat=spClass('goods_cat')->find('id='.$goods['pid']);
		
		$this->goods=$goods;
		
		$this->display("index/product_detail.html");
	}

	
	function search(){
		$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		$this->contact  = spClass('article_list')->find("id=1101",null,'content');
		$this->huodong = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',4);
		
		
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$this->menuIndex=1;
		
		$condition="id>0";
		// if(!empty($_REQUEST['color'])){
			// $condition.=" AND (FIND_IN_SET($_REQUEST[color],sid))";
		// }
		
		
		if(!empty($_REQUEST['keywords'])){
			$condition.=" AND title LIKE '%".$_REQUEST['keywords']."%'";
		}
		
	
		// $this->catlist=spClass('article_list')->findAll('id>0','sort_id asc,id desc');
		
		// $this->goodslist=spClass('goods_list')->findAll($condition,'sort_id asc,id desc');
		
		$this->goodslist = spClass('article_list')->spPager($this->spArgs('p',1),100)->findAll($condition,'sort_id asc,id desc');
		$this->pager = spClass('article_list')->spPager()->getPager();
		
		$this->color=$_REQUEST['color'];
		
		$this->goodscolor=spClass('goods_color')->findAll('pid=1','sort_id asc,id desc');
		
		// $this->cat=spClass('goods_cat')->find('id='.$id);
		

		$this->display("index/search.html");
	}
	
	
	
	
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('goods_cat')->findAll('pid='.$pid,'sort_id asc'); 
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
}	
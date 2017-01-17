<?php
class main extends spController
{
	function __construct(){ // 公用
		parent::__construct(); // 这是必须的\
		$this->basepath=BASE_PATH;
	}

	function index(){ 
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");  
		$this->contact  = spClass('article_list')->find("id=1101",null,'content');
		
		$this->menuIndex=1;
		
		//市场动态
		$this->shichang=spClass('article_list')->findAll('pid=8','sort_id asc,id desc','',8);
		//展会活动
		$this->huodong=spClass('article_list')->findAll('pid=62','sort_id asc,id desc','',8);
		//领导风采
		$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		//行业资讯
		$this->hangye = spClass('article_list')->findAll('pid=61','sort_id asc,id desc','',5);
		//新闻中心
		$this->xinwen = spClass('article_list')->findAll('pid=5','sort_id asc,id desc','',5);
		
		//最新活动
		$this->zuixin = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',10);
		
		//商都通道
		$this->shangdu = spClass('article_list')->findAll('pid=60','sort_id asc,id desc','',9);
		
		
	
		$this->banners=spClass('page_img')->findAll('nid=3');
		
		
		
		$this->banner=spClass('page_img')->find('id=25');
		
		
		
		
		
		
		
		$this->product=spClass('goods_list')->findAll('promote=1');
		
		$newscat=spClass('article_cat')->findAll('pid=4');
		$ids=array();
		foreach($newscat as $k=>$v){
			$ids[]=$v['id'];
		}
		$cats_id=implode(',',$ids);
		$this->news=spClass('article_list')->findAll('pid in ('.$cats_id.')','sort_id asc,id desc','',4);
		
		$this->links=spClass('page_img')->findAll('nid=2');
		
		$this->display("index/index.html");
	}

	

}	
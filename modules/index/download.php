<?php
class download extends spController
{
	function __construct(){ 
		parent::__construct(); 
		$this->tpl_title = "主体模块|主题部分";
	}
	
	function index(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103"); 
		$this->services = spClass("article_list")->findAll("pid=23 AND is_open=1","sort_id asc");
		$this->links    = spClass("article_list")->findAll("pid=32 AND is_open=1","sort_id asc","",5);
		$newssql = "SELECT a.*,b.id as bid,b.pid as bpid FROM sp_article a,sp_article_cat b WHERE a.pid=b.id AND b.pid=24 AND is_open=1  ORDER BY sort_id asc,id desc LIMIT 0,3";
		
		$this->scrollimg= spClass("page_img")->findAll("nid=2","id asc");
		
		$this->productcategory=spClass("goods_cat")->findAll("pid=0");
		$this->industrycategory=spClass("goods_color")->findAll("pid=23");
		$this->jiancecategory=spClass("goods_color")->findAll("pid=22");
		
		$this->type     = "下载列表";
		$this->newsrows     = spClass("article_list")->findSql($newssql);
		$this->rows=spClass('download_list')->findAll("id>0");
		$this->display("index/download.html");
	}
	
	//下载文件，以直接下载的形式
	function down(){
		$id=empty($_GET["id"])?$this->error("请选择文件",spUrl("download","index")):$_GET["id"];
		$file_dir = "uploads/files/"; //文件路径为当前目录
		 
		$downfile=spClass("download_list")->find("id=".$_GET["id"]);
		$file_name = $downfile["upfile"];
		
		//$file_name = $_GET['file']; //文件名
		//$file_dir = "upload/download/"; //文件路径为当前目录
		
		if(!file_exists($file_dir.$file_name)){
		  print_r($file_dir.$file_name);
		  echo "Can not find this file";
		  exit;
		}else{
		  $file=fopen($file_dir.$file_name,"r");//打开文件
		  //print_r($file_dir.$file_name);
		  // 输出文件标签
		  Header("Content-type: application/octet-stream");
		  Header("Accept-Ranges:bytes");
		  Header("Accept-Length:".filesize($file_dir.$file_name));
		  Header("Content-Disposition: attachment; filename=".$file_name);
		}	
	}
	
}	
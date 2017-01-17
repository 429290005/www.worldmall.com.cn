<?php
class topic extends spController
{
	function __construct(){ // 公用
		parent::__construct(); // 这是必须的
		$this->tpl_title = "后台模块|文章部分";
	}
	
	function index(){ // 这里是首页
		$this->contents = "后台模块文章部分首页内容";
		$this->display("admin/main_index.html");
	}
	
	function page(){ // 其他内容
		$this->contents = "后台模块文章部分其他内容";
		$this->display("admin/main_page.html");
	}
}	
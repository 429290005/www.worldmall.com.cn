<?php
class survey extends spController
{
	function __construct(){ // 公用
		parent::__construct(); // 这是必须的\
		$this->basepath=BASE_PATH;
	}

	function index(){
		
		$this->display("index/survey.html");
	}

	

}	
<?php

/**
 * 淘宝登录跳转页面
 */

class TaobaoApp extends ApiApp
{
    function __construct()
    {
        $this->TaobaoApp();
    }
    
    function TaobaoApp()
    {
        parent::__construct();
    }
    
    function index()
    {
        error_reporting(0);
        set_magic_quotes_runtime(0);
        
        $url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
        $sessArr = explode('&', $url);
        $sessArr1 = array();
        $sessArr2 = array();
        foreach ($sessArr as $key => $val) {
        	$sessArr1 = explode('=', $val);
        	$sessArr2[$sessArr1[0]] = $sessArr1[1];
        }
        
        $_SESSION['taobao_login'] = $sessArr2['top_session'];
        header("Location: ../index.php?app=order&act=get_order");
    }
}
?>
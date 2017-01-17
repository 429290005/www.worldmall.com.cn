<?php
// 定义当前目录
define("APP_PATH",dirname(__FILE__));
// 定义框架目录
define("SP_PATH",APP_PATH."/SpeedPHP");
// 定义后台样式目录
define("ADMIN_PATH",APP_PATH."/themes/admin");
// 默认时区设置
define("BASE_PATH","http://www.zgpjzd.com/");
@date_default_timezone_set('PRC');
// 载入用户自定义的函数文件

// 通用的全局配置
$spConfig = array(
	"db" => array(
		'host' => 'localhost',
		'login' => 'zgpjzd',
		'password' => 'zgpjzdgkl',
		'database' => 'zgpjzd',
		'prefix' => 'sp_'
	),
	'view' => array(
		'enabled' => TRUE, // 开启视图
		'config' =>array(
			'template_dir' => APP_PATH.'/template', // 模板目录
			'compile_dir' => APP_PATH.'/tmp', // 编译目录
			'cache_dir' => APP_PATH.'/tmp', // 缓存目录
			'left_delimiter' => '{#',  // smarty左限定符
			'right_delimiter' => '#}', // smarty右限定符
		),
	),
			
	'model_path' => APP_PATH.'/lib', // 定义model类的路径
);


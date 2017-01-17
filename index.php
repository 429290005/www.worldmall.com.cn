<?php
// 网站主体模块程序入口文件

// 载入配置与定义文件
require("config.php");
define("PATH_ROOT","http://localhost/yxc/www/");
define("ART_ROOT","http://localhost");

// 当前模块附加的配置
$spConfig['controller_path'] = APP_PATH.'/modules/'.basename(__FILE__,".php");

// 载入SpeedPHP框架
require(SP_PATH."/SpeedPHP.php");
require("functions.php");
spRun(); // SpeedPHP 3新特性
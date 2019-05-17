<?php

$controller = $_GET['c'] ? ucfirst($_GET['c']) : 'Index';
$action = $_GET['a'] ? ucfirst($_GET['a']) : 'Index';
const EXT = '.class.php';
//系统路径分割符常量
define('DS', DIRECTORY_SEPARATOR);
//控制器目录
define('CONTROLLER_PATH', realpath('.'.DS.'controller'));
//模型目录
define('MODEL_PATH', realpath('.'.DS.'model'));
//视图目录
define('VIEW_PATH', realpath('.'.DS.'view'));
spl_autoload_register(function ($class) {
    if ('Controller' == substr($class, -10)) {
        //载入控制器
        include CONTROLLER_PATH.DS.$class.EXT;
    } elseif ('Model' == substr($class, -5)) {
        //载入模型
        include MODEL_PATH.DS.$class.EXT;
    } else {
        throw new Exception('路由错误');
    }
});
$controller .= 'Controller';
(new $controller())->$action();
(new IndexModel())->index();

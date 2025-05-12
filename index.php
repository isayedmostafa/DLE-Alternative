<?php

header("Content-Type: text/html; charset=utf-8");

use app\core\Router;

ob_start();

$mem_start = microtime(true);

//const NEX = true;
define("ROOT", dirname(__FILE__));
const APP = ROOT . '/app';
const CORE = ROOT . '/app/core';
const CONTROLLERS = ROOT . '/app/controllers';
//const PLUGIN_DIR = ROOT . '/app';

require 'vendor/autoload.php';

spl_autoload_register(function($class){
    $path = str_replace('\\', '/', $class . '.php');
    if(file_exists($path)){
        require $path;
    }
});

session_start();

$router = new Router();
try {
    $router->run();
} catch (Exception $e) {
}

ob_end_flush();

//echo round(microtime(true) - $mem_start, 3);
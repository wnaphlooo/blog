<?php
namespace Frame;
class Frame {

    public static function run(){
        //初始化字符集
        self::initCharset();
        //初始化配置文件
        self::initConfig();
        //初始化路由
        self::initRoote();
        //初始化常量设置
        self::initConst();
        //初始化的自动加载
        self::initAutoLoad();
        //初始化请求分发
        self::initDispatch();
    }

    public static function initCharset() {
        header("content-type:text/html;charset=utf-8");
    }

    public static function initConfig() {
        //配置文件路径
        echo APP_PATH.DS."Config".DS."Config.php";
        $GLOBALS['config'] = require_once(APP_PATH.DS."Config".DS."Config.php");

    }

    public static function initRoote (){
        $p = $GLOBALS['config']['default_platform'];
        $c = isset($_GET['c']) ? $_GET['c'] :  $GLOBALS['config']['default_controller'];
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];
        echo $p.",".$c.",".$a;
    }

    public static function initConst (){
        
    }

    public static function initAutoLoad() {

    }

    public static function initDispatch() {

    }
}
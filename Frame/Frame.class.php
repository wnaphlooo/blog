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
        $GLOBALS['config'] = require_once(APP_PATH.DS."Config".DS."Config.php");

    }

    public static function initRoote (){
        $p = $GLOBALS['config']['default_platform'];
        $c = isset($_GET['c']) ? $_GET['c'] :  $GLOBALS['config']['default_controller'];
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];
        define("PLATFORM",$p);
        define("CONTROLLER",$c);
        define("ACTION",$a);
       
    }

    public static function initConst (){
        define('VIEW_PATH',APP_PATH.'View'.DS.CONTROLLER.DS);
    }

    public static function initAutoLoad() {
        spl_autoload_register(function ($className) {
            //空间中的类名，转换成真实的类文件路径
            //空间中的类名；\home\Controller\StudentController;
            //真实的类文件：./home/Controller/StudentController

            $fileName = ROOT_PATH.str_replace("\\","/",$className).".class.php";
            if (file_exists($fileName)) {
                require_once($fileName);
            }

        });
    }

    public static function initDispatch() {
        //构建类的路径
        $className = "\\".PLATFORM."\\"."Controller"."\\".CONTROLLER."Controller";
        // echo $className;
        //创建控制类的对象
        $contollerObj = new $className();
        //调用控制器的对象方法
        $actionName = ACTION;
        $contollerObj->$actionName();
    }
}
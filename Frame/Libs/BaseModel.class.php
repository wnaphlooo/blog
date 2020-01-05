<?php
namespace Frame\Libs;

use \Frame\Vendor\PDOWrapper;

abstract class BaseModel {
    protected $pdo = null;

    protected static $modelObjArr = array();

    public function __construct()
    {
        $this->pdo = new PDOWrapper();
    }

    public static function getInstance () {
        $modelCLassNmae = get_called_class();

        if (!isset(self::$modelObjArr[$modelCLassNmae])) {
            $modelObj = new $modelCLassNmae();
            self::$modelObjArr[$modelCLassNmae] = $modelObj;     
        }

        return self:: $modelObjArr[$modelCLassNmae] ;
    }
}
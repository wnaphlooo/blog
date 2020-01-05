<?php
//生命命名空间
namespace Home\Controller;

use Home\Model\IndexMOdel;

final class IndexController {
    public function index() {
        echo 'hello world';
        $modelObj = IndexMOdel::getInstance();
        if(isset($modelObj)){
            $rows = $modelObj->queryAll();
            var_dump($rows);
        }
        
    }
 }

<?php
//生命命名空间
namespace Home\Controller;

use Frame\Libs\BaseController;
use Home\Model\IndexMOdel;

final class IndexController extends BaseController{
    public function index() {
        echo 'hello world';
        $modelObj = IndexMOdel::getInstance();

        $rows = $modelObj->queryAll();
         $this->smarty->assign("rows",$rows);
        $this->smarty->display("index.html");
    }
 }

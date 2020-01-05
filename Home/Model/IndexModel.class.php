<?php
namespace Home\Model;

use Frame\Libs\BaseModel;

class IndexMOdel extends BaseModel {
    public function queryAll() {
        $sql = "select * FROM category ";
        $rows = $this->pdo->fetchAll($sql);
        return $rows;
    }
}
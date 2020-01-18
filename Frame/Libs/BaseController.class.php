<?php
namespace Frame\Libs;

use Frame\Vendor\Smarty;

abstract class BaseController {
    protected $smarty = Null;
    
    public function __construct()
    {
        $smarty = new Smarty();
    
        $smarty = new Smarty();
        $smarty->left_delimiter = "<{";
        $smarty->right_delimiter = "}>";
        $smarty->setTemplateDir(VIEW_PATH);
        $smarty->setCompileDir(sys_get_temp_dir().DS."view");
        $this->smarty = $smarty;
    }  
}
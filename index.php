<?php

use Frame\Vendor\Smarty;

define("DS",DIRECTORY_SEPARATOR);
define("ROOT_PATH",getcwd().DS);
define("APP_PATH",ROOT_PATH."Home".DS);
require_once(ROOT_PATH."Frame".DS."Frame.class.php");

\Frame\Frame::run();
print(FRAME_PATH."Vendor".DS."smarty-3.1.34".DS."libs".DS."Smarty.class.php");

$pdo = new \Frame\Vendor\PDOWrapper();



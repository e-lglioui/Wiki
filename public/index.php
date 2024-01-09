<?php 
require_once '../config/app.php';
require_once '../vendor/autoload.php';
require_once '../routes/web.php';

use App\Controllers\UserController ;
$a=new UserController();
echo $a->test();
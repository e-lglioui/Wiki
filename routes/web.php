<?php

use Core\Application;

$app = new Application();

//$app::get('/', 'HomeController', 'test');
//$app::post('/', 'HomeController', 'test');
$app::get('/wiki\/', 'HomeController', 'test');
$app::post('/wiki\/', 'HomeController', 'test');

$app->run();
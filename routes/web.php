<?php

use Core\Application;
$app = new Application();
/*register router*/
$app::get('/register\/', 'UserController', 'register');
$app::post('/register\/', 'UserController', 'registerUser');
/*home page*/
$app::get('/wiki\/', 'HomeController', 'test');
$app::post('/wiki\/', 'HomeController', 'test');
/*login*/
$app::get('/login\/', 'UserController', 'login');
$app::post('/login\/', 'UserController', 'loginUser');
/*admin dashboard*/
$app::get('/admin\/', 'AdminController', 'admin');
$app::post('/admin\/', 'AdminController', 'admin');
/*auteur*/
$app::get('/auteur\/', 'AuteurController', 'auteur');
$app::post('/auteur\/', 'AuteurController', 'auteur');

$app->run();
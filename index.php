<?php

// define direktori utama
$app_folder = str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']);
define("HOME_DIR", $app_folder);
$app_url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.str_replace('index.php','',trim($_SERVER['SCRIPT_NAME'],'/'));
define("HOME_URL", $app_url);

define("HOME_HREF", str_replace('index.php','',trim($_SERVER['SCRIPT_NAME'],'/')));

// routing aplikasi
include_once HOME_DIR.'\config\Route\RouteHelper.php';
$route = new Route();

include('Route.php');

$route->submit();

// print_r($_SERVER);
// echo HOME_URL;
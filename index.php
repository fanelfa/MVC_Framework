<?php

// define direktori utama
$app_folder = str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']);
define("HOME_DIR", $app_folder);

// routing aplikasi
include_once HOME_DIR.'\config\Route\RouteHelper.php';
$route = new Route();

include('Route.php');

$route->submit();

// print_r(HOME_DIR);
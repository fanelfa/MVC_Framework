<?php

// print_r(PDO::getAvailableDrivers());
// $url = parse_url($_SERVER['REQUEST_URI']);
// echo $url['path'];

// echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


include_once 'Route.php';
include_once 'controller/SiswaController.php';
include_once 'controller/GuruController.php';

$route = new Route();

$route->add('/',function(){
	echo 'Hey this is home';
});
$route->add('/siswa', 'SiswaController@index');
$route->add('/guru', 'GuruController');

$route->submit();


// echo '<pre/>';
// print_r($route);


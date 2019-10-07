<?php

// $url = parse_url($_SERVER['REQUEST_URI']);
// echo $url['path'];

// echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


include_once HOME_DIR.'/controller/SiswaController.php';
include_once HOME_DIR.'/controller/GuruController.php';


$route->add('/',function(){
	echo 'Hey this is home';
});
$route->add('/siswa', 'SiswaController@index');
$route->add('/redirect', 'SiswaController@showRedirect');
$route->add('/guru', 'GuruController@index');



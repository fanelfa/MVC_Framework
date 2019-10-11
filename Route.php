<?php

// $url = parse_url($_SERVER['REQUEST_URI']);
// echo $url['path'];

// echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


include_once HOME_DIR.'/controller/TugasController.php';


// $route->add('/',function(){
// 	echo 'Hey this is home';
// });
$route->add('/', 'TugasController@index');
$route->add('/tugas/tambah', 'TugasController@create');
$route->add('/tugas/showadd/', 'TugasController@showTambah');
$route->add('/tugas/edit/[id]', 'TugasController@edit');
$route->add('/tugas/{id}', 'TugasController@edit');



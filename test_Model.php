<?php

// include_once 'Model.php';

// $m = new Model();

// echo $m->pisahkan();

include_once 'Model_Siswa.php';

// $data = [
// 'id'=>6,
// 'nama'=>'Tukiman Jukino'
// ];

$s = new Model_Siswa();
// print_r($s->create($data));

// print_r($s->readAll()->get());

// print_r($s->find('id = 1')->get());

// $data = [
// 'nama'=>'Tukiman Tuki'
// ];

// print_r($s->update($data,'id=3'));
print_r($s->delete('id=5'));

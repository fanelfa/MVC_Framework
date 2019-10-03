<?php

include_once 'DBTemplate.php';

// $tabel = function(DBTemplate $table){

// 			$table->string('orang');
// 			$table->int('id', 'AUTO_INCREMENT');
// 			$table->primary('id');

// 			return $table->save();
// 		};

// print_r($tabel);


$table = new DBTemplate();

$table->string('orang');
$table->int('id', 'AUTO_INCREMENT');
$table->primary('id');

// echo $table->save();


function tambah($a,$b){
	return $a . $b;
}

echo tambah('Semogaaaa ', $table->save());

// $tambahan = tambah('Semoga bisa... ', function(){
// 			$table = new DBTemplate();
// 			$table->string('orang');
// 			$table->int('id', 'AUTO_INCREMENT');
// 			$table->primary('id');

// 			return $table->save();
// 		});

// echo $tambahan;
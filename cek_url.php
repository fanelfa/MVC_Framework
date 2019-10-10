<?php

$url = array('page/aksi/[id]', 'page/[id]/aksi', 'halaman/[id]', '/page/[id]', '/');

$url_test = 'page/98kG';

$url_test_baru = explode('/', trim($url_test,'/'));

$array_hasil = array();

$array_kecocokan_url = array();
$array_hitung_kata = array();

foreach ($url as $key => $value) {
	$kecocokan_url = 0;
	$variabel_beda = '';
	$value_beda = '';

	$url_simpan = explode('/', trim($value,'/'));
	$hitung_kata = sizeof($url_simpan);
	if(sizeof($url_test_baru)>=$hitung_kata){
		foreach ($url_simpan as $k => $v) {
			if($v==$url_test_baru[$k]){
				$kecocokan_url += 1;
			}else{
				$variabel_beda = trim(trim($v,']'),'[');
				$value_beda = $url_test_baru[$k];
			}
		}
	}
	

	if($hitung_kata==($kecocokan_url+1)){
		echo $value." -> beda di ".$variabel_beda." => ".$value_beda."\n";
		$array_hasil[] = [
			'url_route' => $value,
			'url_request' => $url_test,
			'variabel' => $variabel_beda,
			'value' => $value_beda
		];
	}
}

print_r($array_hasil);

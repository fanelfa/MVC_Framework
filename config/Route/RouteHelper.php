<?php

class Route{

	private $_uri = array();
	private $_method = array();
	private $_found = 0;

	public function add($uri, $method = null){
		$this->_uri[] = '/' . trim($uri,'/');
		$this->_method[] = $method;
	}

	public function submit(){
		$uriGetParam = strtolower(isset($_GET['uri']) ? '/' . rtrim($_GET['uri'],'/') : '/');

		foreach ($this->_uri as $key => $value) {
			if(preg_match("#^$value$#", $uriGetParam)){
				$this->_found += 1;
				$this->implement_method($key);
			}
		}
		$this->get_variabel($uriGetParam, $this->_uri);
		if($this->_found == 0){
			echo '<b>404 not found</b><br/>';
		}
	}

	private function get_variabel($url_request, $url_route){
		$url_test_baru = explode('/', ltrim($url_request,'/'));

		$array_hasil = array();

		foreach ($url_route as $key => $value) {
			// echo $key." => ".$value." --m = ".$this->_method[$key]."<br/>";
			//cek apakah id berupa angka dan huruf saja
			if(preg_match('(\[[a-zA-Z0-9]*\])', $value)){
				$kecocokan_url = 0;
				// $variabel_beda = '';
				$variabel_beda = array();
				// $value_beda = '';
				$value_beda = array();
				$hitung_kata = 0;

				$url_simpan = explode('/', trim($value,'/'));
				// print_r($url_simpan);

				$hitung_kata = sizeof($url_simpan);

				if(sizeof($url_test_baru)==$hitung_kata){
					foreach ($url_simpan as $k => $v) {
						if($v==$url_test_baru[$k]){
							$kecocokan_url += 1;
						}else{
							// $variabel_beda = trim(trim($v,']'),'[');
							array_push($variabel_beda, trim(trim($v,']'),'['));
							array_push($value_beda, $url_test_baru[$k]);
							// $value_beda = $url_test_baru[$k];
						}				
					}
				}	
				// print_r($variabel_beda);echo "<br/>";		
				// print_r($value_beda);echo "<br/>";		

				// if($kecocokan_url==($hitung_kata-1) && $kecocokan_url!=0){
				if($kecocokan_url==($hitung_kata-sizeof($variabel_beda)) && $kecocokan_url!=0){
					// if(preg_match('(^[a-zA-Z0-9]*$)', $value_beda)){
					// 	$array_hasil = [
					// 		'variabel' => $variabel_beda,
					// 		'value' => $value_beda
					// 	];

					// 	$this->_found += 1;
					// 	$this->implement_method($key, $array_hasil);
						
					// }
					foreach ($value_beda as $ke => $val) {;	
						if(preg_match('(^[a-zA-Z0-9 ]*$)', $val)){
							array_push($array_hasil , [
								'variabel' => $variabel_beda[$ke],
								'value' => $value_beda[$ke]
							]);

							$this->_found += 1;						
						}	
					}
					$this->implement_method($key, $array_hasil);
				}
			}
		}
		// print_r($array_hasil);
	}

	private function implement_method($key, $array_id = null){
		$useMethod = $this->_method[$key];
		if(is_string($useMethod)){
			$arr_method = explode('@', $useMethod);
			$controller = $arr_method[0];
			$method = $arr_method[1];
			$object = new $controller();
			unset($_GET['uri']);
			unset($_REQUEST['uri']);
			if($array_id!=null){
				$data = array();
				foreach ($array_id as $key => $value) {
					$data = array_merge($data, array($value['variabel']=>$value['value']));
				}
				// print_r($data);
				if($data) $object->$method($data);
				$_POST = null;
				$_GET = null;
			}elseif(isset($_REQUEST)){
				$object->$method($_REQUEST);
				$_POST = null;
				$_GET = null;
			}else{
				$object->$method(null);
			}
		}else{
			call_user_func($useMethod);
		}
	}

}
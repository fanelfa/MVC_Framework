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
		$uriGetParam = isset($_GET['uri']) ? '/' . rtrim($_GET['uri'],'/') : '/';

		foreach ($this->_uri as $key => $value) {
			if(preg_match("#^$value$#", $uriGetParam)){
				$this->_found += 1;
				$this->implement_method($key);
			}
		}
		$this->get_variabel($uriGetParam, $this->_uri);
		if($this->_found == 0){
			echo '<b>404 not found</b>';
		}
	}

	private function get_variabel($url_request, $url_route){
		$url_test_baru = explode('/', ltrim($url_request,'/'));

		$array_hasil = array();

		foreach ($url_route as $key => $value) {
			$kecocokan_url = 0;
			$variabel_beda = '';
			$value_beda = '';
			$hitung_kata = 0;

			$url_simpan = explode('/', trim($value,'/'));

			$hitung_kata = sizeof($url_simpan);

			if(sizeof($url_test_baru)==$hitung_kata){
				foreach ($url_simpan as $k => $v) {
					if($v==$url_test_baru[$k]){
						$kecocokan_url += 1;
					}else{
						$variabel_beda = trim(trim($v,']'),'[');
						$value_beda = $url_test_baru[$k];
					}				
				}
			}			

			if($kecocokan_url==($hitung_kata-1) && $kecocokan_url!=0){
				$array_hasil = [
					'variabel' => $variabel_beda,
					'value' => $value_beda
				];

				$this->_found += 1;
				$this->implement_method($key, $array_hasil);
			}
		}

		// return $array_hasil;
	}

	private function implement_method($key, $array_id = null){
		$useMethod = $this->_method[$key];
		if(is_string($useMethod)){
			$arr_method = explode('@', $useMethod);
			$controller = $arr_method[0];
			$method = $arr_method[1];
			$object = new $controller();
			unset($_GET['uri']);
			if($array_id!=null){
				$data = array($array_id['variabel']=>$array_id['value']);
				$object->$method($data);
				$_POST = null;
				$_GET = null;
			}elseif(isset($_POST) && !isset($_GET)){
				$object->$method($_POST);
				$_POST = null;
				$_GET = null;
			}elseif(isset($_GET) && !isset($_POST)){
				$object->$method($_GET);
				$_POST = null;
				$_GET = null;
			}else{
				$object->$method();
			}
		}else{
			call_user_func($useMethod);
		}
	}

}
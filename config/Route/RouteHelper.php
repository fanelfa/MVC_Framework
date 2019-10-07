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

				$useMethod = $this->_method[$key];
				if(is_string($useMethod)){
					$arr_method = explode('@', $useMethod);
					$controller = $arr_method[0];
					$method = $arr_method[1];
					$object = new $controller();
					unset($_GET['uri']);
					if(isset($_POST)&&isset($_GET)){
						$data = array_merge($_POST, is_null($_GET)?array():$_GET);
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
		if($this->_found == 0){
			echo '<b>404 not found</b>';
		}
	}

}
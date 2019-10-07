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
		$uriGetParam = isset($_GET['uri']) ? '/' . $_GET['uri'] : '/';

		foreach ($this->_uri as $key => $value) {
			if(preg_match("#^$value$#", $uriGetParam)){
				$this->_found += 1;
				// echo 'match!';
				// $useMethod = $this->_method[$key];
				// if(is_string($useMethod)){
				// 	new $useMethod();
				// }else{
				// 	call_user_func($useMethod);
				// }

				$useMethod = $this->_method[$key];
				if(is_string($useMethod)){
					$arr_method = explode('@', $useMethod);
					$controller = $arr_method[0];
					$method = $arr_method[1];
					$object = new $controller();
					if(sizeof($_GET)==1){
						$object->$method();
					}else{
						unset($_GET['uri']);
						$object->$method($_GET);
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
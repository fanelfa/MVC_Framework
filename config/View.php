<?php
class View{
	public static function url($_url){
		echo ltrim($_url,'/');
	}

	public static function asset($_path){
		echo HOME_HREF.'view/asset/'.ltrim($_path,'/');
	}

	public static function render($nama_file,$data=''){
		include $nama_file.".fandi.php";
	}

	public static function redirect($url, $data=''){
		session_start();

		$_SESSION['data']=$data;	

		header("Location:".trim($url,'/'));
		exit;
	}

}

class Change_View_Element{
	public function change($nama_file){
		$file = file_get_contents($nama_file.".fandi.php");
		$file = str_replace('{{', '<?php', $file);
		$file = str_replace('}}', '?>', $file);

		return $file;
	}
	public function generate_session($data){
		if($this->isAssoc($data)){
			session_start();

			$k = array_keys($data);
			foreach ($k as $value) {
				$_SESSION[(string)$value]=$data[(string)$value];
			}
			$_SESSION['data']=$data;
		}else{
			return 'data is not association array!';
		}
	}
	private function isAssoc(array $arr){
	    if (array() === $arr) return false;
	    return array_keys($arr) !== range(0, count($arr) - 1);
	}
}
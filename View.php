<?php
class View{
	public static function render($nama_file,$data=''){
		// $c = new Change_View_Element();
		// $file = $c->change($nama_file);
		include $nama_file.".fandi.php";
	}

	public static function redirect($nama_file, $data=''){
		$c = new Change_View_Element();

		if($data!=''){
			$c->generate_session($data);
		}

		header("Location:".$nama_file.".fandi.php");  
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
		if($this::isAssoc($data)){
			session_start();

			$k = array_keys($data);
			foreach ($k as $value) {
				$_SESSION[(string)$value]=$data[(string)$value];
			}
		}else{
			return 'data is not association array!';
		}
	}
	private function isAssoc(array $arr){
	    if (array() === $arr) return false;
	    return array_keys($arr) !== range(0, count($arr) - 1);
	}
}
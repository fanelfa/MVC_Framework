<?php

include_once 'Model.php';

class Model_Siswa extends Model{
	public function __construct(){
		$this->table_name = 'siswa';
		$this->model_fields = array('id','nama');
	}
}
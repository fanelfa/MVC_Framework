<?php

include HOME_DIR.'\config\DB\Model.php';

class Tugas extends Model{
	public function __construct(){
		$this->table_name = 'tugas';
		$this->model_fields = array('id','nim', 'nama', 'judul', 'jenis', 'deskripsi');
	}
}
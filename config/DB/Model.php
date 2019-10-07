<?php

include_once 'Connection.php';
include_once 'DBTemplate.php';

class Model{

	protected $table_name ='';
	protected $model_fields;

	private $fields_sementara;
	private $values_sementara;
	protected $hasil;

	// public function __construct(){
	// }

	public function create($data_assoc_array){

		$this->pisahkan($data_assoc_array);

		$database = new Connection();
		$db = $database->openConnection();

		$hasil = $db->exec("INSERT INTO ".$this->table_name." (".$this->fields_sementara.") VALUES
		(".$this->values_sementara.")");

		$database->closeConnection();

		return $hasil;
	}

	public function readAll(){
		$database = new Connection();
		$db = $database->openConnection();

		$query = "SELECT * FROM ".$this->table_name;
		$this->hasil = $db->query($query);

		$database->closeConnection();
		return $this;
	}

	public function find($condition){
		$database = new Connection();
		$db = $database->openConnection();

		$query = "SELECT * FROM ".$this->table_name." WHERE ".$condition;
		$this->hasil = $db->query($query);

		$database->closeConnection();
		return $this;
	}

	public function update($data_assoc_array, $condition){
		$database = new Connection();
		$db = $database->openConnection();

		$find = $this->find($condition)->get();

		if($find){
			$field = $this->change_field_update($data_assoc_array);

			$sql = "UPDATE ".$this->table_name." SET ".$field." WHERE ".$condition."";
			$stmt= $db->prepare($sql);
			$stmt->execute($data_assoc_array);

			$database->closeConnection();
			return true;
		}else{
			return false;
		}
	}

	public function delete($condition){
		$database = new Connection();
		$db = $database->openConnection();

		$find = $this->find($condition)->get();

		if($find){
			$stmt=$db->prepare("DELETE FROM ".$this->table_name." WHERE ".$condition);
			$stmt->execute();

			$database->closeConnection();
			return true;
		}else{
			return false;
		}
	}

	public function get(){
		// $data = array();
		// foreach ($this->hasil as $value) {
		// 	array_push($data, $value);
		// }

		// return $data;
		return $this->hasil->fetchAll(PDO::FETCH_ASSOC);
	}

	private function pisahkan($data_assoc_array){
		$gabung = array();

		$fields = "".implode(', ', array_keys($data_assoc_array))."";
		$values = "'".implode("', '", array_values($data_assoc_array))."'";

		$this->fields_sementara = $fields;
		$this->values_sementara = $values;
	}

	private function change_field_update($data_assoc_array){
		$new_field_array = array();

		$fields = array_keys($data_assoc_array);
		foreach ($fields as $value) {
			array_push($new_field_array, $value."=:".$value);
		}

		$new_field_array = "".implode(', ', $new_field_array)."";

		return $new_field_array;
	}

	private function change_condition_update($condition){
		return str_replace('=', '=:', $condition);
	}

}
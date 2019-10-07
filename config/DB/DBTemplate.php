<?php

class DBTemplate{
	private $sql_hasil='';
	private $primary_key = false;

	public function string($nama_field,$length=255){
		$this->sql_hasil .= ($this->sql_hasil==''?'':', ').$nama_field." character varying(".$length.")";
		return $this;
	}

	public function int($nama_field){
		$this->sql_hasil .= ($this->sql_hasil==''?'':', ').$nama_field." INT ";
		return $this;
	}

	public function setPrimary($nama_field){
		$this->sql_hasil .= ", PRIMARY KEY (".$nama_field.")";
		$this->primary_key=true;
	}

	public function primary(){
		$this->sql_hasil .= ' PRIMARY KEY ';
		$this->primary_key=true;
		return $this;
	}

	public function serial($nama_field){
		$this->sql_hasil .= ($this->sql_hasil==''?'':', ').$nama_field.' SERIAL ';
		return $this;
	}

	public function null(){
		$this->sql_hasil .= ' NULL ';
		return $this;
	}

	public function notnull(){
		$this->sql_hasil .= ' NOT NULL ';
		return $this;
	}

	public function auto_increment(){
		$this->sql_hasil .= ' AUTO_INCREMENT ';
		return $this;
	}

	public function unique(){
		$this->sql_hasil .= ' UNIQUE ';
		return $this;
	}

	public function save(){
		if($this->primary_key){
			return (string)$this->sql_hasil;
		}		
	}
}
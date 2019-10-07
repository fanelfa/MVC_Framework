<?php

include_once 'Connection.php';

abstract class Migration{
	public function create_table($nama_tabel, $sql_query){
		try{
		     $database = new Connection();
		     $db = $database->openConnection();

		     // sql to create table
		     $sql = "CREATE TABLE IF NOT EXISTS ".$nama_tabel." (".$sql_query.");";
		     $this->nama_tabel = $nama_tabel;

		     // use exec() because no results are returned
		     $db->exec($sql);

		     echo "Table ".$nama_tabel." created successfully\n";

		     $database->closeConnection();
		}
		catch (PDOException $e){
		    echo "There is some problem in connection: " . $e->getMessage();
		}
	}
}
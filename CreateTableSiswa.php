<?php

include_once 'Migration.php';
include_once 'DBTemplate.php';

class CreateTableSiswa extends Migration{

	public function up(){
		$table = new DBTemplate();

		$table->int('id')->notnull();
		$table->string('nama')->null();
		$table->primary('id');

		// echo $table->save();

		$this->create_table('siswa', $table->save());
	}
}
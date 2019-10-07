<?php

include_once __DIR__.'\..\Migration.php';
include_once __DIR__.'\..\DBTemplate.php';

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
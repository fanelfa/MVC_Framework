<?php

include_once __DIR__.'\..\Migration.php';
include_once __DIR__.'\..\DBTemplate.php';

class CreateTableSiswa extends Migration{

	public function up(){
		$table = new DBTemplate();

		$table->serial('id')->primary();
		$table->string('nama')->notnull();
		$table->string('kelas')->notnull();

		// echo $table->save();

		$this->create_table('siswa', $table->save());
	}
}
<?php

include_once __DIR__.'\..\Migration.php';
include_once __DIR__.'\..\DBTemplate.php';

class CreateTableTugas extends Migration{

	public function up(){
		$table = new DBTemplate();

		$table->serial('id')->primary();
		$table->string('nim')->notnull();
		$table->string('nama')->notnull();
		$table->string('judul')->notnull();
		$table->string('jenis')->notnull();
		$table->string('deskripsi')->notnull();

		// echo $table->save();

		$this->create_table('tugas', $table->save());
	}
}
<?php

include_once __DIR__.'\..\Migration.php';
include_once __DIR__.'\..\DBTemplate.php';

class CreateTableGuru extends Migration{

	public function up(){
		$table = new DBTemplate();

		$table->serial('id')->primary();
		$table->string('nama')->notnull();
		$table->string('nip')->notnull();

		// echo $table->save();

		$this->create_table('guru', $table->save());
	}
}
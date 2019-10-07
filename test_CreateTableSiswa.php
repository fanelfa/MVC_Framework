<?php

include_once 'config\DB\migration\CreateTableSiswa.php';

$create = new CreateTableSiswa();

$create->up();


// include_once 'config\DB\migration\CreateTableGuru.php';

// $create = new CreateTableGuru();

// $create->up();
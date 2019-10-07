<?php

include_once '\config\DB\migration\CreateTableSiswa.php';

$create = new CreateTableSiswa();

$create->up();
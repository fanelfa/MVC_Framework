<?php

include_once 'Connection.php';

$con = new Connection();

print_r($con->baca_dbconfig('dbconfig.ini')['DBMS']);
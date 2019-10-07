<?php

foreach (glob("config/DB/migration/*.php") as $path) {
    include_once $path;
    new $class_name = basename($path, ".php");
    new $create = new $class_name();
    $create->up();
    $class_name = null;
    $create = null;
    // echo $class_name;
}


<?php

foreach (glob("config/DB/migration/*.php") as $path) {
    include_once $path;
    $class_name = basename($path, ".php");
    $create = new $class_name();
    $create->up();
    $class_name = null;
    $create = null;
}


<?php

$controller = "index";
//$view = "index";


if (isset($_SERVER['PATH_INFO'])) {
    $controller = str_replace("/", "", $_SERVER['PATH_INFO']);
}

if (file_exists("controllers/{$controller}.controller.php")) {
    require "controllers/{$controller}.controller.php";
} else {
    echo "Controller not found.";
}

//require "views/template/app.php";
<?php

function view($view) {
  //$view = "livro";
  require "views/template/app.php";
}

function abort($code) {
  http_response_code($code);
  view($code);
  die();
}



?>
<?php

$DB = new DB();

$livros = $DB->Livros();

view('index', compact('livros'));

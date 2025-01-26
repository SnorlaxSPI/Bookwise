<?php

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 'Não informado';

$db = new DB;

$livro = $db->livro($id);

view('livro', compact('livro'));

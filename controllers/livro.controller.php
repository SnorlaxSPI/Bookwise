<?php

require 'dados.php';

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 'Não informado';

$filtrado = array_values(array_filter($livros, fn($livro) => $livro['id'] == $id));

$livro = array_pop($filtrado);

view('livro');


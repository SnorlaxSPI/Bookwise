<?php

class DB
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO('sqlite:database.sqlite');
  }

  public function livros($pesquisa = '')
  {
    $prepare = $this->db->prepare("SELECT * FROM livros WHERE usuario_id = 1 and titulo like :pesquisa");
    $prepare->bindValue(':pesquisa', "%$pesquisa%");
    $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
    $prepare->execute();

    return $prepare->fetchAll();
  }

  public function livro($id)
  {
    $prepare = $this->db->prepare("SELECT * FROM livros WHERE id = :id");
    $prepare->bindValue(':id', $id);
    $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
    $prepare->execute();

    return $prepare->fetch();
  }
}

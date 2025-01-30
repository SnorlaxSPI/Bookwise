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
    //$sql = "SELECT * FROM livros where titulo like '%$pesquisa%' or autor like '%$pesquisa%' or descricao like '%$pesquisa%'";
    //$query = $this->db->query($sql);
    $prepare = $this->db->prepare("SELECT * FROM livros WHERE usuario_id = 1 and titulo like :pesquisa");
    $prepare->bindValue(':pesquisa', "%$pesquisa%");
    $prepare->execute();

    $items = $prepare->fetchAll();

    return array_map(fn($item) => Livro::make($item), $items);
  }

  public function livro($id)
  {
    $sql = "SELECT * FROM livros";
    $sql .= " WHERE id = " . $id;
    $query = $this->db->query($sql);
    $items = $query->fetchAll();

    return array_map(fn($item) => Livro::make($item), $items)[0];
  }
}

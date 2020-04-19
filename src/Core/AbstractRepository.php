<?php
namespace App\Core;

use PDO;

abstract class AbstractRepository
{

  protected $pdo;

  public function __construct(PDO  $pdo)
  {
    $this -> pdo = $pdo;
  }

  abstract public function getTableName();
  abstract public function getModelName();

  function all()
  {
    $table = $this -> getTableName();
    $model = $this -> getModelName();
    $stmt = $this -> pdo->query("SELECT * FROM `$table`");
    $posts = $stmt -> fetchAll(PDO::FETCH_CLASS, $model); //Übergibt es dem Layer
    return $posts;
  }


  function find($id)
  {
    $table = $this -> getTableName();
    $model = $this -> getModelName();
    $q = $this -> pdo->prepare("SELECT * FROM `$table` WHERE id = :id"); //Entsprechende Abfrage an die Datenbank
    $q -> execute(['id' => $id]);
    $q -> setFetchMode(PDO::FETCH_CLASS,$model);
    $post = $q -> fetch(PDO::FETCH_CLASS);

    return $post;
  }

}
?>

<?php

namespace App\Post;

use App\Core\AbstractRepository;
use PDO;

class PostsRepository extends AbstractRepository
{

  public function getTableName()
  {
    return 'items';
  }

  public function getModelName()
  {
    return 'App\\Post\\PostModel';
  }

  public function getRow()
  {
    return 'title';
  }

  public function update(PostModel $model)
  {
    $table = $this->getTableName();

    $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `content` = :content, `title` = :title, `manufacturer` = :manufacturer, `hscode` = :hscode, `storage` = :storage, `partnumber`= :partnumber, `dn`=:dn, `pn`=:pn, `type`=:type, `supplier`=:supplier, `groupname`=:groupname, `material`=:material, `weight`=:weight, `price`=:price WHERE `id` = :id");
    $stmt->execute([
      'manufacturer' => $model->manufacturer,
      'content' => $model->content,
      'hscode' => $model->hscode,
      'title' => $model->title,
      'id' => $model->id,
      'storage' => $model->storage,
      'partnumber' => $model->partnumber,
      'dn' => $model->dn,
      'pn' => $model->pn,
      'type' => $model->type,
      'supplier' => $model->supplier,
      'groupname' => $model->groupname,
      'material' => $model->material,
      'weight' => $model->weight,
      'price' => $model->price
    ]);
  }

  public function insert($manufacturer, $content, $hscode, $title, $storage, $partnumber, $dn, $pn, $type, $supplier, $groupname, $material, $weight, $price)
  {
    $table = $this->getTableName();

    $stmt = $this->pdo->prepare("INSERT INTO `{$table}` (`id`, `title`, `content`, `partnumber`, `hscode`, `manufacturer`, `storage`, `dn`, `pn`, `type`, `supplier`, `groupname`, `material`, `weight`, `price`) VALUES (NULL, :title, :content,:partnumber,:hscode,:manufacturer,:storage,:dn,:pn,:type,:supplier,:groupname,:material,:weight,:price)");
    $stmt->execute([
      'manufacturer' => $manufacturer,
      'content' => $content,
      'hscode' => $hscode,
      'title' => $title,
      'storage' => $storage,
      'partnumber' => $partnumber,
      'dn' => $dn,
      'pn' => $pn,
      'type' => $type,
      'supplier' => $supplier,
      'groupname' => $groupname,
      'material' => $material,
      'weight' => $weight,
      'price' => $price
    ]);
    return true;
  }

  public function delete($id)
  {
    $table = $this->getTableName();
    $stmt = $this->pdo->prepare("DELETE FROM `{$table}` WHERE id = :id ");
    $stmt->execute([
      'id' => $id
    ]);

  }

  public function search($title)
  {
    $table = $this -> getTableName();
    $model = $this -> getModelName();
    $row = $this -> getRow();
    $manufacturer = 'manufacturer';

    $stmt = $this->pdo->prepare("SELECT * FROM `{$table}` WHERE `{$row}` LIKE :title");
    $stmt->execute([
      'title' => "%$title%"
    ]);

    $item = $stmt -> fetchAll(PDO::FETCH_CLASS, $model);;


    return $item;
  }

}

?>

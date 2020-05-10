<?php

namespace App\Post;

use App\Core\AbstractRepository;

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

  public function update(PostModel $model)
  {
    $table = $this->getTableName();

    $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `content` = :content, `title` = :title, `manufacturer` = :manufacturer, `hscode` = :hscode, `storage` = :storage, `partnumber`= :partnumber, `dn`=:dn, `pn`=:pn, `type`=:type, `supplier`=:supplier, `groupname`=:groupname, `material`=:material WHERE `id` = :id");
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
      'material' => $model->material

    ]);
  }

  public function insert($manufacturer, $content, $hscode, $title, $storage, $partnumber, $dn, $pn, $type, $supplier, $groupname, $material )
  {
    $table = $this->getTableName();

    $stmt = $this ->pdo->prepare("INSERT INTO `{$table}` (`id`, `title`, `content`, `partnumber`, `hscode`, `manufacturer`, `storage`, `dn`, `pn`, `type`, `supplier`, `groupname`, `material`) VALUES (NULL, :title, :content,:partnumber,:hscode,:manufacturer,:storage,:dn,:pn,:type,:supplier,:groupname,:material)");
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
      'material' => $material
    ]);
    return true;
  }

}

?>

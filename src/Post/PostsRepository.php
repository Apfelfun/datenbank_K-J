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

    $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `content` = :content, `title` = :title, `manufacturer` = :manufacturer, `hscode` = :hscode, `storage` = :storage WHERE `id` = :id");
    $stmt->execute([
      'manufacturer' => $model->manufacturer,
      'content' => $model->content,
      'hscode' => $model->hscode,
      'title' => $model->title,
      'id' => $model->id,
      'storage' => $model->storage

    ]);
  }

}

?>

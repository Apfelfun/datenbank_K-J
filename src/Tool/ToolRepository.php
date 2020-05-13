<?php
namespace App\Tool;

use App\Core\AbstractRepository;
use PDO;

class ToolRepository extends AbstractRepository
{
  public function getTableName()
  {
    return 'tools';
  }

  public function getModelName()
  {
    return 'App\\Tool\\ToolModel';
  }

  public function insert($serialnumber, $name, $manufacturer, $supplier, $storage, $hscode, $description, $weight)
  {
    $table = $this->getTableName();

    $stmt = $this->pdo->prepare("INSERT INTO `{$table}` (`id`, `serialnumber`, `name`, `manufacturer`, `supplier`, `storage`, `hscode`, `description`, `weight`) VALUES (NULL, :serialnumber, :name, :manufacturer, :supplier, :storage, :hscode, :description, :weight)");

    $stmt->execute([
      'serialnumber' => $serialnumber,
      'name' => $name,
      'manufacturer' => $manufacturer,
      'supplier' => $supplier,
      'storage' => $storage,
      'hscode' => $hscode,
      'description' => $description,
      'weight' => $weight
    ]);

    return true;
  }

  public function update(ToolModel $model)
  {
    $table = $this->getTableName();

    $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `serialnumber` = :serialnumber, `name` = :name, `manufacturer` = :manufacturer, `supplier` = :supplier, `storage`= :storage, `hscode`=:hscode, `description`=:description, `weight`=:weight WHERE `id` = :id");
    $stmt->execute([
      'id' => $model->id,
      'serialnumber' => $model->serialnumber,
      'name' => $model->name,
      'manufacturer' => $model->manufacturer,
      'supplier' => $model->supplier,
      'storage' => $model->storage,
      'hscode' => $model->hscode,
      'description' => $model->description,
      'weight' => $model->weight
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

}
?>

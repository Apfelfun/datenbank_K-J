<?php
namespace App\Service;

use App\Core\AbstractRepository;
use PDO;

class ServiceRepository extends AbstractRepository
{
  public function getTableName()
  {
    return 'vesselOverview';
  }

  public function getModelName()
  {
    return 'App\\Service\\ServiceModel';
  }

  public function orderd()
  {
    $table = $this->getTableName();
    $model = $this->getModelName();
    $stmt = $this->pdo->query("SELECT * FROM `$table` ORDER BY `startdate` DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_CLASS, $model); //Übergibt es dem Layer
    return $posts;
  }

}
?>

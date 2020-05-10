<?php
namespace App\Status;

use App\Core\AbstractRepository;
use PDO;

class DeliveryRepository extends AbstractRepository
{
  public function getTableName()
  {
    return 'deliverynote';
  }

  public function getRow()
  {
    return 'projectnumber';
  }

  public function getModelName()
  {
    return 'App\\Status\\DeliveryModel';
  }

  public function insert($projectnumber, $deliverynumber, $deliverycompanyname, $deliverycompanyadress, $deliverycompanyzipcode, $reference, $personcustomer, $companynameinvoice, $companyadressinvoice, $zipcodeinvoice, $vessel, $dimension)
  {
    $table = $this->getTableName();

    $stmt = $this->pdo->prepare("INSERT INTO `{$table}` (`projectnumber`, `deliverynumber`, `deliverycompanyname`, `deliverycompanyadress`, `id`, `deliverycompanyzipcode`, `reference`, `personcustomer`, `companynameinvoice`, `companyadressinvoice`, `zipcodeinvoice`, `vessel`, `dimension`, `progress`) VALUES (:projectnumber, :deliverynumber, :deliverycompanyname, :deliverycompanyadress, NULL, :deliverycompanyzipcode, :reference, :personcustomer, :companynameinvoice, :companyadressinvoice, :zipcodeinvoice, :vessel, :dimension, :progress)");

    $stmt->execute([
      'projectnumber' => $projectnumber,
      'deliverynumber' => $deliverynumber,
      'deliverycompanyname' => $deliverycompanyname,
      'deliverycompanyadress' => $deliverycompanyadress,
      'deliverycompanyzipcode' => $deliverycompanyzipcode,
      'reference' => $reference,
      'personcustomer' => $personcustomer,
      'companynameinvoice' => $companynameinvoice,
      'companyadressinvoice' => $companyadressinvoice,
      'zipcodeinvoice' => $zipcodeinvoice,
      'vessel' => $vessel,
      'dimension' => $dimension,
      'progress' => '1'
    ]);
  }

  public function search($projectnumber)
  {
    $table = $this -> getTableName();
    $model = $this -> getModelName();
    $row = $this -> getRow();

    $stmt = $this->pdo->prepare("SELECT * FROM `{$table}` WHERE `{$row}` LIKE :projectnumber");
    $stmt->execute([
      'projectnumber' => "%$projectnumber%"
    ]);

    $deliv = $stmt -> fetchAll(PDO::FETCH_CLASS, $model);;


    return $deliv;
  }

  public function exactNumber($projectnumber)
  {
    $table = $this -> getTableName();
    $model = $this -> getModelName();
    $row = $this -> getRow();

    $stmt = $this->pdo->prepare("SELECT * FROM `{$table}` WHERE `{$row}` REGEXP :projectnumber");
    $stmt->execute([
      'projectnumber' => "%$projectnumber%"
    ]);

    $deliv = $stmt -> fetchAll(PDO::FETCH_CLASS, $model);;


    return $deliv;
  }
}
?>

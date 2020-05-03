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

  public function getModelName()
  {
    return 'App\\Status\\DeliveryModel';
  }

  public function insert($projectnumber, $deliverynumber, $deliverycompanyname, $deliverycompanyadress, $deliverycompanyzipcode, $reference, $personcustomer, $companynameinvoice, $companyadressinvoice, $zipcodeinvoice, $vessel, $dimension)
  {
    $table = $this->getTableName();

    $stmt = $this->pdo->prepare("INSERT INTO `deliverynote` (`projectnumber`, `deliverynumber`, `deliverycompanyname`, `deliverycompanyadress`, `id`, `deliverycompanyzipcode`, `reference`, `personcustomer`, `companynameinvoice`, `companyadressinvoice`, `zipcodeinvoice`, `vessel`, `dimension`, `progress`) VALUES (:projectnumber, :deliverynumber, :deliverycompanyname, :deliverycompanyadress, NULL, :deliverycompanyzipcode, :reference, :personcustomer, :companynameinvoice, :companyadressinvoice, :zipcodeinvoice, :vessel, :dimension, :progress)");

    //$stmt = $this->pdo->prepare("UPDATE `{$table}` SET `content` = :content, `title` = :title, `manufacturer` = :manufacturer, `hscode` = :hscode, `storage` = :storage WHERE `id` = :id");
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
}
?>

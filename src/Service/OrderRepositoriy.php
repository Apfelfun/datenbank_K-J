<?php
namespace App\Service;

use App\Core\AbstractRepository;
use PDO;

class OrderRepositoriy extends AbstractRepository
{
  public function getTableName()
  {
    return 'insertOrder';
  }

  public function getModelName()
  {
    return 'App\\Service\\InsertModel';
  }

  public function insert($ordernumber, $customername, $customeraddress, $customerzipcode, $email, $orderProduct, $customercountry, $offernumber, $sellingprice, $purchasingprice, $orderdate, $deliverydate, $vessel, $user)
  {
    $table = $this->getTableName();
    $stmt = $this->pdo->prepare("INSERT INTO `{$table}` (`id`, `ordernumber`, `customername`, `customeraddress`, `customerzipcode`, `email`, `orderProduct`, `customercountry`, `offernumber`, `sellingprice`, `purchasingprice`, `orderdate`, `deliverydate`, `vessel`, `user`) VALUES (NULL, :ordernumber, :customername, :customeraddress, :customerzipcode, :email, :orderProduct, :customercountry, :offernumber, :sellingprice, :purchasingprice, :orderdate, :deliverydate, :vessel, :user)");
    $stmt->execute([
      'ordernumber' => $ordernumber,
      'customername' => $customername,
      'customeraddress' => $customeraddress,
      'customerzipcode' => $customerzipcode,
      'orderdate' => $orderdate,
      'email' => $email,
      'orderProduct' => $orderProduct,
      'deliverydate' => $deliverydate,
      'customercountry' => $customercountry,
      'offernumber' => $offernumber,
      'sellingprice' => $sellingprice,
      'purchasingprice' => $purchasingprice,
      'vessel' => $vessel,
      'user' => $user
    ]);
  }

  public function search($title)
  {
    $table = $this -> getTableName();
    $model = $this -> getModelName();
    $row = 'ordernumber';

    $stmt = $this->pdo->prepare("SELECT * FROM `{$table}` WHERE `{$row}` LIKE :title");
    $stmt->execute([
      'title' => "%$title%"
    ]);

    $order = $stmt -> fetchAll(PDO::FETCH_CLASS, $model);;


    return $order;
  }


}

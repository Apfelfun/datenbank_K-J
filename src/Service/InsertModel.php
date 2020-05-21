<?php
namespace App\Service;

use ArrayAccess;
use App\Core\AbstractModel;

class InsertModel extends AbstractModel implements ArrayAccess
{
  // Grundlegenden Aufbau
  public $id;
  public $ordernumber;
  public $customername;
  public $customeraddress;
  public $customerzipcode;
  public $orderdate;
  public $email;
  public $orderProduct;
  public $deliverydate;
  public $customercountry;
  public $offernumber;
  public $sellingprice;
  public $purchasingprice;
}
?>

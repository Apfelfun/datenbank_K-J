<?php
namespace App\Status;

use ArrayAccess;
use App\Core\AbstractModel;

class DeliveryModel extends AbstractModel implements ArrayAccess
{
  // Grundlegenden Aufbau
  public $id;
  public $projectnumber;
  public $deliverynumber;
  public $deliverycompanyname;
  public $deliverycompanyadress;
  public $deliverycompanyzipcode;
  public $reference;
}
?>

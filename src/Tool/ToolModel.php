<?php
namespace App\Tool;

use ArrayAccess;
use App\Core\AbstractModel;

class ToolModel extends AbstractModel implements ArrayAccess
{
  // Grundlegenden Aufbau
  public $id;
  public $serialnumber;
  public $name;
  public $manufacturer;
  public $supplier;
  public $storage;
  public $hscode;
  public $description;
  public $weight;
}
?>

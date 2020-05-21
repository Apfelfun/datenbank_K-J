<?php
namespace App\Service;

use ArrayAccess;
use App\Core\AbstractModel;

class ServiceModel extends AbstractModel implements ArrayAccess
{
  // Grundlegenden Aufbau
  public $id;
  public $vessel;
  public $startdate;
  public $enddate;
}
?>

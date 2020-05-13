<?php

namespace App\Post;

use ArrayAccess;
use App\Core\AbstractModel;

class PostModel extends AbstractModel implements ArrayAccess
{
  // Grundlegenden Aufbau
  public $id;
  public $title;
  public $content;
  public $manufacturer;
  public $hscode;
  public $storage;
  public $supplier;
  public $pn;
  public $dn;
  public $material;
  public $groupname;
  public $partnumber;
  public $type;
  public $weight;
  public $price;

}
?>

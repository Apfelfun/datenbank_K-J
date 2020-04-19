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

}
?>

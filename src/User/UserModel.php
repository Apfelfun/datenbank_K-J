<?php

namespace App\User;

use ArrayAccess;
use App\Core\AbstractModel;

class UserModel extends AbstractModel implements ArrayAccess
{
  // Grundlegenden Aufbau
  public $id;
  public $username;
  public $password;

}
?>

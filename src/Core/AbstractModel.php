<?php
namespace App\Core;

abstract class AbstractModel
{
  public function offsetExists($offset)
  {
    return isset($this -> $offset);
  }

  public function offsetGet($offset)
  {
    return $this -> $offset;
  }

  public function offsetSet($offset, $value)
  {
    return $this -> $offset = $value;
  }

  public function offsetUnset($offset)
  {
    unset($this -> $offset);
  }
}

?>

<?php

namespace App\Core;


abstract class AbstractController
{

  protected function render($view, $params)
    {

      foreach ($params AS $key => $value)
      {
        //erstellt eine Variable mit dem Namen
        ${$key} = $value;
      }

      include __DIR__ . "/../../views/{$view}.php";
    }
}

?>

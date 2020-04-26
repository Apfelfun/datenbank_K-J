<?php
require __DIR__ . "/autoload.php";

function e($str)
{
  return htmlentities($str, ENT_QUOTES | ENT_XML1, 'UTF-8');
}

function convert($str) {
  return iconv('UTF-8', 'windows-1252', $str);
}

$container = new App\Core\Container();


?>

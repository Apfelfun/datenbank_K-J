<?php
namespace App\Core;

use App\Core\pdf\fpdf;

class Pdf extends fpdf
{
  function Header()
  {
    // Logo
    $this->Image(__DIR__ . '/../../data/logo.png',35,10,130);

    // Line break
    $this->Ln(20);
  }
}
?>

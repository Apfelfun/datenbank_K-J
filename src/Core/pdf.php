<?php
namespace App\Core;

use App\Core\pdf\fpdf;

class Pdf extends fpdf
{

  const DPI = 96;
  const MM_IN_INCH = 25.4;
  const A4_HEIGHT = 297;
  const A4_WIDTH = 210;
  // tweak these values (in pixels)
  const MAX_WIDTH = 800;
  const MAX_HEIGHT = 500;

  function pixelsToMM($val) {
    return $val * self::MM_IN_INCH / self::DPI;
  }

  function resizeToFit($imgFilename) {
    list($width, $height) = getimagesize($imgFilename);

    $widthScale = self::MAX_WIDTH / $width;
    $heightScale = self::MAX_HEIGHT / $height;

    $scale = min($widthScale, $heightScale);

    return array(
      round($this->pixelsToMM($scale * $width)),
      round($this->pixelsToMM($scale * $height))
    );
  }

  function Header()
  {
    $img = __DIR__ .'/../../data/logo.png';

    list($width, $height) = $this -> resizeToFit($img);

    // Logo
    $this->Image($img,
    (self::A4_HEIGHT  - $width) / 2,
    10
    );
    $this->SetFont('Arial','',7);
    $this->SetTextColor(27,90,155);
        $this->Cell(100,60,'Knaack & Jahn Schiffbau GmbH Uffelnsweg 10 20539 Hamburg',0,0,'C');



        $this->SetFont('Arial','B',8);
        $this->SetTextColor(0,0,0);
        $this->Cell(1,65,'Invoice to:',0,0,'C');





        // Line break
        $this->Ln(20);
  }
}
?>

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

  function header()
  {
    $img = __DIR__ .'/../../data/logo.png';

    list($width, $height) = $this -> resizeToFit($img);

    // Logo
    $this->Image($img,
    (self::A4_HEIGHT  - $width) / 2,
    10
    );
    $this->setY(30);
    $this->setX(20);
    $this->SetFont('Arial','',7);
    $this->SetTextColor(27,90,155);
    $this->Cell(1,5,'Knaack & Jahn Schiffbau GmbH Uffelnsweg 10 20539 Hamburg',0,1);

    $this->setX(90);
    $this->SetFont('Arial','B',10);
    $this->SetTextColor(0,0,0);
    $this->Cell(1,5,'Invoice to:',0,1);
    //Beschreibung der Leistung
    $this->setY(40);
    $this->setX(150);
    $this->SetFont('Arial','B',7);
    $this->SetTextColor(249,0,0);
    $this->Cell(1,3,'Pipeline: Repairs',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Conversion: New construction',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Supply and disposal technolgy',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Ship operation technolgy',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Mechanical engineering',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Exhaust systems',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Ventilation',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Refrigeration. Air-Conditioning',0,1);
    $this->setX(150);
    $this->Cell(1,3,'KJ FireOff Systems:',0,1);
    $this->setX(150);
    $this->Cell(1,3,'water, gas and foam',0,1);
    //Anschrift von KJ
    $this->setY(75);
    $this->setX(150);
    $this->SetFont('Arial','',7);
    $this->SetTextColor(27,90,155);
    $this->Cell(1,3,'Knaack & Jahn Schiffbau GmbH',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Uffelnsweg 10',0,1);
    $this->setX(150);
    $this->Cell(1,3,'20539 Hamburg',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Telefon: +49 (0) 40 / 78 12 93 -0',0,1);
    $this->setX(150);
    $this->Cell(1,3,'Telefax: +49 (0) 40 / 78 12 93 -10',0,1);
    $this->setX(150);
    $this->Cell(1,3,'www.k-j.de schiffbau@k-j.de',0,1);
    //Nummer des Lieferscheins
    $this->setY(100);
    $this->setX(20);
    $this->SetFont('Arial','BI',18);
    $this->SetTextColor(0,0,0);
    $this->Cell(1,2,'Deliverynote',0,0);
    $this->Cell(1,3,'',0,0);
    //Tabelle
    $this->setY(110);
    $this->setX(20);
    $this->SetFont('Arial','',10);
    $this->SetTextColor(0,0,0);
    $this->Cell(90,10,'Order by:',1,0);
    $this->Cell(90,10,'Projectnumber:',1,1);
    $this->setX(20);
    $this->Cell(90,10,'Your ordernumber: by:',1,0);
    $this->Cell(90,10,'Our contact',1,1);
    $this->setX(20);
    $this->Cell(90,10,'Vessel:',1,0);
    $this->Cell(90,10,'Date:',1,1);
    $this->setX(20);
    $this->Cell(90,10,'Your order from:',1,0);
    $this->Cell(90,10,'Page: 1',1,1);



  }
}
?>

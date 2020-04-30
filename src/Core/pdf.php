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
    $this->Cell(1,5,convert('Knaack & Jahn Schiffbau GmbH · Uffelnsweg 10 · 20539 Hamburg'),0,1);

    $this->setX(90);
    $this->SetFont('Arial','B',10);
    $this->SetTextColor(0,0,0);
    $this->Cell(1,5,'Invoice to:',0,1);
    //Beschreibung der Leistung
    $this->setY(40);
    $this->setX(150);
    $this->SetFont('Arial','B',7);
    $this->SetTextColor(249,0,0);
    $this->Cell(1,3,convert('· Pipeline: Repairs'),0,1);
    $this->setX(150);
    $this->Cell(1,3,'  Conversion: New construction',0,1);
    $this->setX(150);
    $this->Cell(1,3,convert('· Supply and disposal technolgy'),0,1);
    $this->setX(150);
    $this->Cell(1,3,convert('· Ship operation technolgy'),0,1);
    $this->setX(150);
    $this->Cell(1,3,convert('· Mechanical engineering'),0,1);
    $this->setX(150);
    $this->Cell(1,3,convert('· Exhaust systems'),0,1);
    $this->setX(150);
    $this->Cell(1,3,convert('  Ventilation'),0,1);
    $this->setX(150);
    $this->Cell(1,3,convert('· Refrigeration. Air-Conditioning'),0,1);
    $this->setX(150);
    $this->Cell(1,3,convert('· KJ FireOff Systems:'),0,1);
    $this->setX(150);
    $this->Cell(1,3,convert('  water, gas and foam'),0,1);
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
    $this->Cell(1,3,convert('www.k-j.de · schiffbau@k-j.de'),0,1);
    $this->middlePart();
  }

  function middlePart()
  {
    //Nummer des Lieferscheins
    $this->setY(100);
    $this->setX(20);
    $this->SetFont('Arial','BI',18);
    $this->SetTextColor(0,0,0);
    $this->Cell(1,2,'Delivery note',0,0);
    $this->Cell(1,3,'',0,0);
    //Tabelle
    $this->setY(110);
    $this->setX(20);
    $this->SetFont('Arial','',10);
    $this->SetTextColor(0,0,0);
    $this->Cell(90,10,'Order by',1,0);
    $this->Cell(90,10,'Project no.',1,1);
    $this->setX(20);
    $this->Cell(90,10,'Your order no.:',1,0);
    $this->Cell(90,10,'Our contact',1,1);
    $this->setX(20);
    $this->Cell(90,10,'Vessel',1,0);
    $this->Cell(90,10,'Date',1,1);
    $this->setX(20);
    $this->Cell(90,10,'Your order from',1,0);
    $this->Cell(90,10,'Page',1,1);
    //Auflistung
    $this->setY(156);
    $this->setX(20);
    $this->Cell(10,4,'Pos.',1,0);
    $this->Cell(12,4,'Quant.',1,0);
    $this->Cell(10,4,'Unit',1,0);
    $this->Cell(68,4,'Article/Description',1,0);
    $this->Cell(40,4,'CTN',1,0);
    $this->Cell(40,4,'Weight kg',1,0);
  }

  function footer()
  {
    $this->setY(-26);
    $this->setX(20);
    $this->SetFont('Arial','',7);
    $this->SetTextColor(249,0,0);
    $this->Cell(1,3,convert('Our general terms and conditions (GTC) on www.k-j.de are to be applied, which we will send to you on demand.'),0,1);
    $this->setX(20);
    $this->SetTextColor(27,90,155);
    $this->Cell(1,3,convert('Managing Directors: Manfred Klitzke, Hasan Yilmaz'),0,1);
    $this->setX(20);
    $this->Cell(1,3,convert('HRB Nr. 95290 Amtsgericht Hamburg · USt.-IdNr. DE 814554892 · EORI Nr. DE504701735754827'),0,1);
    $this->setX(20);
    $this->Cell(1,3,'Commerzbank Hamburg	IBAN DE23 2008 0000 0307 3130 00	BIC DRESDEFF200',0,1);
    $this->setX(20);
    $this->Cell(1,3,'Hamburger Sparkasse	IBAN DE62 2005 0550 1252 1222 52	BIC HASPDEHHXXX',0,1);
    $this->setX(20);
    $this->Cell(1,3,'Sparkasse Holstein	IBAN DE91 2135 2240 0030 0245 75	BIC NOLADE21HOL',0,1);

  }
}
?>

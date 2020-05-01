<?php
namespace App\Post;

use App\Core\AbstractController;
use App\User\LoginService;
use App\Core\pdf;

class DeliverynoteController extends AbstractController
{
  public function __construct(PostsRepository $postsRepository, LoginService $loginService) {
    $this->postsRepository = $postsRepository;
    $this->loginService = $loginService;
  }

  public function date() {
    return date('d.m.Y');
  }

  //Überprüft ob das Dropdown gesetzt wurde
  public function dataCheck($itemSelect, $itemSelect2)
  {

    return $answer;
    //Array Ausgabe mit den entsprechenden Daten
  }

  public function show()
  {

    $this -> loginService -> check();
    $all = $this -> postsRepository -> all();

    if (isset($_POST['pdf'])) {
      $this->createPDF();
    }

    $this -> render("user/deliverynote", [
      'all' => $all
    ]);
  }

  public function createPDF() {
    $pdf= new Pdf();
    $cell_width = 68;
    $cell_height = 4;
    $leftFrame = 20;
    $invoiceLeftFrame = 90;


      $deliveryno = $_POST['deliveryno'];
      $projectnumber = $_POST['projectnumber'];

      $companyname = $_POST['companyname'];
      $companyadress = $_POST['companyadress'];
      $zipcode = $_POST['zipcode'];

      $companynameinvoice = $_POST['companynameinvoice'];
      $companyadressinvoice = $_POST['companyadressinvoice'];
      $zipcodeinvoice = $_POST['zipcodeinvoice'];

      $vessel = $_POST['vessel'];
      $reference = $_POST['reference'];
      $personcustomer = $_POST['personcustomer'];

      $dimension = $_POST['dimension'];

      $productcountdropdown = $_POST['productcountdropdown'];
      $productcountdropdown2 = $_POST['productcountdropdown2'];

      $itemSelect = $_POST['thenumbers'];
      $itemSelect2 = $_POST['thenumbers2'];

      $select = $this -> postsRepository -> find($itemSelect);
      $select2 = $this -> postsRepository -> find($itemSelect2);


    $pdf->AddPage();
    $pdf->setY(50);
    $pdf->setX($leftFrame);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(2,4,$companyname,0,1);
    $pdf->setX($leftFrame);
    $pdf->Cell(2,4,$companyadress,0,1);
    $pdf->setX($leftFrame);
    $pdf->Cell(2,4,$zipcode,0,1);
    //Rechnungsanschrift
    $pdf->SetXY($invoiceLeftFrame,50);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(2,4,$companynameinvoice,0,1);
    $pdf->setX($invoiceLeftFrame);
    $pdf->Cell(2,4,$companyadressinvoice,0,1);
    $pdf->setX($invoiceLeftFrame);
    $pdf->Cell(2,4,$zipcodeinvoice,0,1);
    //Lieferscheinzahl
    $pdf->SetXY(61,100);
    $pdf->SetFont('Arial','BI',17);
    $pdf->Cell(1,2,$deliveryno,0,1);
    //Projektnummer
    $pdf->SetFont('Arial','',10);
    $pdf->setXY(52,113);
    $pdf->Cell(2,4,$personcustomer,0,0);
    $pdf->setX(135);
    $pdf->Cell(2,4,$projectnumber,0,0);
    $pdf->setXY(52,123);
    $pdf->Cell(2,4,$reference,0,0);
    $pdf->SetX(135);
    $pdf->Cell(2,4,'Mr '. $_SESSION['login'],0,1);
    $pdf->setXY(52,133);
    $pdf->Cell(2,4,$vessel,0,0);
    $pdf->setX(135);
    $pdf->Cell(2,4,$this->date(),0,1);
    //Aufzählung
    $pdf->setY(160);
    $pdf->setX($leftFrame);
    $pdf->SetFont('Arial','',11);
    /*
    Einfügen der Produktnamen und etc. in die PDF
    */
    //Erstes Dropdown
    /*
    Code gegebenfalls optimieren!!!!! ->
    */
    if (isset($_POST["productname"]))
    {
      $amountProductname = count($_POST["productname"]);
      $amountCount = count($_POST["productcount"]);
      if ($amountProductname == $amountCount)
      {
        for ($i=1; $i <= $amountProductname; $i++) {
          $pdf->setXY(52,160);
          $pdf->MultiCell($cell_width,$cell_height,$_POST["productname"][$i],1,'1L');
          $H = $pdf->GetY();
          $hight = $H-160;
          $pdf->setXY(20,160);
          $pdf->Cell(10,$hight,'1',1,0);
          $pdf->Cell(12,$hight,$_POST["productcount"][$i],1,0);
          $pdf->Cell(10,$hight,'',1,0);
          $pdf->setX(120);
          $pdf->Cell(40,$hight,'',1,0);
          $pdf->Cell(40,$hight,'',1,1);
        }
      }
    }

    if (!empty($productcountdropdown) AND !empty($select->title))
    {
      $pdf->setXY(52,160);
      $pdf->MultiCell($cell_width,$cell_height,e($select->title),1,'1L');
      $H = $pdf->GetY();
      $hight = $H-160;
      $pdf->setXY($leftFrame,160);
      $pdf->Cell(10,$hight,'1',1,0);
      $pdf->Cell(12,$hight,$productcountdropdown,1,0);
      $pdf->Cell(10,$hight,'',1,0);
      $pdf->setX(120);
      $pdf->Cell(40,$hight,$select->hscode,1,0);
      $pdf->Cell(40,$hight,'',1,1);
    }

    if (!empty($productcountdropdown2) AND !empty($select2->title))
    {
      $pdf->setX(52);
      $pdf->MultiCell($cell_width,$cell_height,e($select2->title),1,'1L');
      $H2 = $pdf->GetY();
      $hight2 = $H2-$H;
      $pdf->setY($H2-$hight2);
      $pdf->setX($leftFrame);
      $pdf->Cell(10,$hight2,'2',1,0);
      $pdf->Cell(12,$hight2,$productcountdropdown2,1,0);
      $pdf->Cell(10,$hight2,'',1,0);
      $pdf->setX(120);
      $pdf->Cell(40,$hight2,$select2->hscode,1,0);
      $pdf->Cell(40,$hight2,'',1,1);
    }

    $pdf->setX($leftFrame);
    $pdf->Cell(1,10,'Dimension (L x W x H): ' . $dimension . ' cm',0,1);
    $pdf->setX($leftFrame);
    $pdf->Cell(1,10,'The delivered ware is our property till final payment.',0,1);
    $pdf->setX($leftFrame);
    $pdf->Cell(1,10,'_____________',0,0);
    $pdf->setX(65);
    $pdf->Cell(1,10,'________________',0,0);

    $pdf->Output();
  }


}

?>

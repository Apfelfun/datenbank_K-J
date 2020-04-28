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

  public function show()
  {
    $this -> loginService -> check();
    $all = $this -> postsRepository -> all();

    if (!empty($_POST['deliveryno']) AND !empty($_POST['projectnumber']))
    {
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

      $itemSelect = $_POST['thenumbers'];
      $select = $this -> postsRepository -> find($itemSelect);

      $itemSelect2 = $_POST['thenumbers2'];
      $select2 = $this -> postsRepository -> find($itemSelect2);

    }

    if (isset($_POST['pdf'])) {
      if ($_POST['thenumbers'] == "") {

      }
      $pdf= new Pdf();
      $pdf->AddPage();
      $pdf->setY(50);
      $pdf->setX(20);
      $pdf->SetFont('Arial','',11);
      $pdf->Cell(2,4,$companyname,0,1);
      $pdf->setX(20);
      $pdf->Cell(2,4,$companyadress,0,1);
      $pdf->setX(20);
      $pdf->Cell(2,4,$zipcode,0,1);
      //Rechnungsanschrift
      $pdf->setY(50);
      $pdf->setX(90);
      $pdf->SetFont('Arial','',11);
      $pdf->Cell(2,4,$companynameinvoice,0,1);
      $pdf->setX(90);
      $pdf->Cell(2,4,$companyadressinvoice,0,1);
      $pdf->setX(90);
      $pdf->Cell(2,4,$zipcodeinvoice,0,1);
      //Lieferscheinzahl
      $pdf->setY(100);
      $pdf->setX(61);
      $pdf->SetFont('Arial','',17);
      $pdf->Cell(1,2,$deliveryno,0,1);
      //Projektnummer
      $pdf->setY(113);
      $pdf->setX(140);
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(2,4,$projectnumber,0,1);
      $pdf->setY(123);
      $pdf->setX(52);
      $pdf->Cell(2,4,$reference,0,1);
      $pdf->setY(133);
      $pdf->setX(52);
      $pdf->Cell(2,4,$vessel,0,0);
      $pdf->setX(120);
      $pdf->Cell(2,4,$this->date(),0,1);
      //Aufzählung
      $pdf->setY(160);
      $pdf->setX(20);
      $pdf->SetFont('Arial','',11);
      $pdf->Cell(10,4,'1',1,0);
      $pdf->Cell(10,4,'1',1,1);

      $pdf->Output();
    }

    $this -> render("user/deliverynote", [
      'all' => $all,
    ]);
  }



}

?>

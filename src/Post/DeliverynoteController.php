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
      $invoiceadress = $_POST['invoiceadress'];
      $vessel = $_POST['vessel'];
      $reference = $_POST['reference'];
    }

    if (isset($_POST['pdf'])) {
      $pdf= new Pdf();
      $pdf->AddPage();
      $pdf->SetFont('Arial','',11);
      $pdf->Cell(10,2,$companyname,0,2);
      $pdf->Cell(10,2,$companyadress,0,2);
      $pdf->Cell(10,2,$zipcode,0,2);

      $pdf->Output();
    }


    $this -> render("user/deliverynote", [
      'all' => $all
    ]);
  }



}

?>

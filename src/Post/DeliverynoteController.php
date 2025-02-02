<?php
namespace App\Post;

use App\Core\AbstractController;
use App\User\LoginService;
use App\Status\DeliveryRepository;
use App\Core\pdf;

class DeliverynoteController extends AbstractController
{
  public function __construct(PostsRepository $postsRepository, LoginService $loginService, DeliveryRepository $deliveryRepository) {

    $this->postsRepository = $postsRepository;
    $this->loginService = $loginService;
    $this->deliveryRepository = $deliveryRepository;
  }


  public function date() {
    return date('d.m.Y');
  }

  public function year() {
    return date('Y');
  }

  public function show()
  {

    $this -> loginService -> check();
    $all = $this -> deliveryRepository -> all();

    foreach ($all as $row) {
      $orderNumber[] = e($row->projectnumber);
    }
    $removeOrderFirst = array_unique($orderNumber);
    $removeOrder = array_values($removeOrderFirst);

    if (isset($_POST['pdf'])) {
      $this->createPDF();
    }

    $this -> render("user/deliverynote", [
      'all' => $all,
      'removeOrder' => $removeOrder
    ]);
  }

  public function createPDF() {
    $pdf= new Pdf();
    $count = 1;
    $cell_width = 68;
    $cell_height = 4;
    $leftFrame = 20;
    $invoiceLeftFrame = 90;

    //Berechnung für das Gewicht
    $weightFirstDropDownWith = 0;
    $weightSecondDropDownWith = 0;
    $weightFirstDropDown =0;
    $weightSecondDropDown = 0;
    $firstClickWeight = 0;

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

    $deliveryno = $this->deliveryRepository->search($projectnumber);
    $startNumber = $deliveryno[count($deliveryno) - 1]->deliverynumber;

    if (strlen($startNumber) == 1){
      $deliverynumber = $startNumber+1;
      $deliverynoName = '00'.$deliverynumber.'/'.$this->year();
    } else {
      $deliverynumber = $startNumber+1;
      $deliverynoName = '0'.$deliverynumber.'/'.$this->year();
    }

    $select = $this -> postsRepository -> find($itemSelect);
    $select2 = $this -> postsRepository -> find($itemSelect2);


    $pdf->AddPage();
    $pdf->setY(50);
    $pdf->setX($leftFrame);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(2,4,convert($companyname),0,1);
    $pdf->setX($leftFrame);
    $pdf->Cell(2,4,convert($companyadress),0,1);
    $pdf->setX($leftFrame);
    $pdf->Cell(2,4,$zipcode,0,1);
    //Rechnungsanschrift
    $pdf->SetXY($invoiceLeftFrame,50);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(2,4,convert($companynameinvoice),0,1);
    $pdf->setX($invoiceLeftFrame);
    $pdf->Cell(2,4,convert($companyadressinvoice),0,1);
    $pdf->setX($invoiceLeftFrame);
    $pdf->Cell(2,4,$zipcodeinvoice,0,1);
    //Lieferscheinzahl
    $pdf->SetXY(61,100);
    $pdf->SetFont('Arial','BI',17);
    $pdf->Cell(1,2,$deliverynoName,0,1);
    //Projektnummer
    $pdf->SetFont('Arial','',10);
    $pdf->setXY(52,113);
    $pdf->Cell(2,4,convert($personcustomer),0,0);
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
        if (!empty($_POST['weight'][1]) AND !empty($_POST['productcount'][1])){
          $firstClickWeight = $_POST['weight'][1]*$_POST['productcount'][1];
        }
        $pdf->setXY(52,160);
        $pdf->MultiCell($cell_width,$cell_height,convert($_POST["productname"][1]),1,'1L');
        $H[1] = $pdf->GetY();
        $hight = $H[1]-160;
        $pdf->setXY(20,160);
        $pdf->Cell(10,$hight,$count,1,0);
        $pdf->Cell(12,$hight,$_POST["productcount"][1],1,0);
        $pdf->Cell(10,$hight,'',1,0);
        $pdf->setX(120);
        $pdf->Cell(40,$hight,$_POST["productcostum"][1],1,0);
        $pdf->Cell(40,$hight,$_POST["weight"][1],1,1);

        for ($i=2; $i <= $amountProductname; $i++) {
          if (!empty($_POST['weight'][$i]) AND !empty($_POST['productcount'])){
            $firstClickWeight += $_POST["weight"][$i]*$_POST["productcount"][$i];
          }
          $pdf->setX(52);
          $pdf->MultiCell($cell_width,$cell_height,convert($_POST["productname"][$i]),1,'1L');
          $H[$i] = $pdf->GetY();
          $hight2 = $H[$i]-$H[$i-1];
          $pdf->setY($H[$i]-$hight2);
          $pdf->setX($leftFrame);
          $pdf->Cell(10,$hight2,$count+=1,1,0);
          $pdf->Cell(12,$hight2,e($_POST["productcount"][$i]),1,0);
          $pdf->Cell(10,$hight2,'',1,0);
          $pdf->setX(120);
          $pdf->Cell(40,$hight2,$_POST["productcostum"][$i],1,0);
          $pdf->Cell(40,$hight2,$_POST["weight"][$i],1,1);
        }

        if (!empty($productcountdropdown) AND !empty($select->title))
        {
          if (!empty($select->weight)){
            $weightFirstDropDownWith = $select->weight*$productcountdropdown;
          }
          $pdf->setXY(52,$pdf->GetY());
          $pdf->MultiCell($cell_width,$cell_height,e($select->title),1,'1L');
          $Hi2 = $pdf ->GetY();
          $highte = $Hi2-end($H);
          array_push($H,$Hi2);
          $pdf->setY($Hi2-$highte);
          $pdf->setX($leftFrame);
          $pdf->Cell(10,$highte,$count+=1,1,0);
          $pdf->Cell(12,$highte,$productcountdropdown,1,0);
          $pdf->Cell(10,$highte,'',1,0);
          $pdf->setX(120);
          $pdf->Cell(40,$highte,$select->hscode,1,0);
          $pdf->Cell(40,$highte,$select->weight ,1,1);
        }


        if (!empty($productcountdropdown2) AND !empty($select2->title))
        {
          if (!empty($select2->weight)){
            $weightSecondDropDownWith = $select2->weight*$productcountdropdown2;
          }
          $pdf->setXY(52,$pdf->GetY());
          $pdf->MultiCell($cell_width,$cell_height,e($select2->title),1,'1L');
          $Hi3 = $pdf->GetY();
          $hight3 = $Hi3-end($H);
          $pdf->setY($Hi3-$hight3);
          $pdf->setX($leftFrame);
          $pdf->Cell(10,$hight3,$count+=1,1,0);
          $pdf->Cell(12,$hight3,$productcountdropdown2,1,0);
          $pdf->Cell(10,$hight3,'',1,0);
          $pdf->setX(120);
          $pdf->Cell(40,$hight3,$select2->hscode,1,0);
          $pdf->Cell(40,$hight3,$select2->weight,1,1);
        }
        $equal=$firstClickWeight+$weightFirstDropDownWith+$weightSecondDropDownWith;
        $pdf->setX(140);
        $pdf->Cell(1,10,'Tot. weight: '.$equal . ' kg',0,0);

      }
    } else {

      if (!empty($productcountdropdown) AND !empty($select->title))
       {
         if (!empty($select->weight)){
          $weightFirstDropDown = $select->weight*$productcountdropdown;
         }
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
         $pdf->Cell(40,$hight,$select->weight,1,1);
       }

       if (!empty($productcountdropdown2) AND !empty($select2->title))
       {
         if (!empty($select2->weight)){
          $weightSecondDropDown = $select2->weight*$productcountdropdown2;
         }
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
         $pdf->Cell(40,$hight2,$select2->weight,1,1);
       }
       $equal=$weightFirstDropDown+$weightSecondDropDown;

       $pdf->setX(140);
       $pdf->Cell(1,10,'Tot. weight: '.$equal . ' kg',0,0);

    }
    $this->deliveryRepository->insert($projectnumber, $deliverynumber, $companyname, $companyadress, $zipcode, $reference, $personcustomer, $companynameinvoice, $companyadressinvoice, $zipcodeinvoice, $vessel, $dimension, $this->date());
    $pdf->setX($leftFrame);
    $pdf->Cell(1,10,'Dimension (L x W x H): ' . $dimension . ' cm',0,0);
    $pdf->setXY($leftFrame,180);
    $pdf->Cell(1,10,'The delivered ware is our property till final payment.',0,1);
    $pdf->setX($leftFrame);
    $pdf->Cell(1,10,'_____________',0,0);
    $pdf->setX(70);
    $pdf->Cell(1,10,'________________',0,1);
    $pdf->setX($leftFrame);
    $pdf->Cell(1,5,'Date',0,0);
    $pdf->setX(70);
    $pdf->Cell(1,5,'Signature mover',0,0);


    $pdf->Output('I', $projectnumber);
  }


}

?>

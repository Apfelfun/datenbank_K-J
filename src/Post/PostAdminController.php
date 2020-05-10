<?php
namespace App\Post;


use App\Core\AbstractController;
use App\User\LoginService;
use App\Core\pdf;

class PostAdminController extends AbstractController
{
  public function __construct(PostsRepository $postsRepository, LoginService $loginService)
{
  $this -> postsRepository = $postsRepository;
  $this -> loginService = $loginService;
}

public function index()
{
  $this -> loginService -> check();
  $all = $this -> postsRepository -> all();

  $this -> render("user/admin", [
    'all' => $all
  ]);

}

public function decision()
{
  $this->loginService->check();
  $this->render("insert/decisionMaterial",[]);
}

public function materialOverview()
{
  $this -> loginService -> check();
  $this -> render("user/material",[]);
}

public function showItem()
{
  $this -> loginService -> check();
  $id = $_GET['id'];
  $entry = $this -> postsRepository -> find($id);

  $this -> render("user/showItem",[
    'entry' => $entry
  ]);

}

public function storageEdit()
{
  $this -> loginService -> check();
  $id = $_GET['id'];
  $entry = $this -> postsRepository -> find($id);

  $saved = false;
  if (!empty($_POST['stoargeChange']))
  {
    $entry->storage = $_POST['stoargeChange'];
    $this->postsRepository->update($entry);
    $saved = true;
  }

  $this -> render("user/showStorage",[
    'entry' => $entry,
    'saved' => $saved
  ]);

}

public function edit()
{
  $this -> loginService -> check();
  $id = $_GET['id'];
  $entry = $this -> postsRepository -> find($id);


  $saved = false;
if (!empty($_POST['customnummer']) AND !empty($_POST['content']))
{
  $entry->partnumber = $_POST['partnumber'];
  $entry->groupname = $_POST['group'];
  $entry->title = $_POST['title'];
  $entry->supplier = $_POST['supplier'];
  $entry->material = $_POST['material'];
  $entry->type = $_POST['type'];
  $entry->dn = $_POST['dn'];
  $entry->pn = $_POST['pn'];
  $entry->content = $_POST['content'];
  $entry->hscode = $_POST['customnummer'];
  $entry->manufacturer = $_POST['manufacturer'];
  $entry->storage = $_POST['storage'];
  $this->postsRepository->update($entry);
  $saved = true;
}

if (isset($_POST['pdf'])) {
  $pdf= new Pdf();
  $pdf->AddPage();
  $pdf->SetFont('Arial','',13);
  $pdf->Cell(40,10,$entry->title);

  $pdf->Output();
}

  $this -> render("user/edit", [
    'entry' => $entry,
    'saved' => $saved
  ]);
}


}


?>

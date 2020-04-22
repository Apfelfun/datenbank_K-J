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

public function edit()
{
  $this -> loginService -> check();
  $id = $_GET['id'];
  $entry = $this -> postsRepository -> find($id);


  $saved = false;
if (!empty($_POST['hscode']) AND !empty($_POST['content']))
{
  $entry->content = $_POST['content'];
  $entry->hscode = $_POST['hscode'];
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

<?php
namespace App\Tool;

use App\Core\AbstractController;
use App\User\LoginService;

class ToolController extends AbstractController
{
  public function __construct(LoginService $loginService, ToolRepository $toolRepository)
  {
    $this->loginService = $loginService;
    $this->toolRepository = $toolRepository;
  }

  public function toolList()
  {
    $this->loginService->check();
    $all = $this->toolRepository->all();
    $this->render("tool/listTool",[
      'all' => $all
    ]);
  }

  public function showTool()
  {
    $this->loginService->check();
    $id = $_GET["id"];
    $entry = $this->toolRepository->find($id);
    $this->render("tool/showTool",[
      'entry' => $entry
    ]);
  }

  public function toolEdit()
  {
    $save = false;
    $this->loginService->check();
    $id = $_GET['id'];
    $entry = $this->toolRepository->find($id);

    if (isset($_POST['title']))
    {
      $entry->serialnumber = $_POST['serialnumber'];
      $entry->name = $_POST['title'];
      $entry->manufacturer = $_POST['manufacturer'];
      $entry->supplier = $_POST['supplier'];
      $entry->storage = $_POST['storage'];
      $entry->hscode = $_POST['customnummer'];
      $entry->description = $_POST['content'];
      $entry->weight = $_POST['weight'];
      $save = $this->toolRepository->update($entry);

    }

    $this->render("tool/tooledit",[
      'entry' => $entry,
      'save' => $save
    ]);
  }

  public function storageEdit()
  {
    $this->loginService->check();
    $id = $_GET['id'];
    $entry = $this->toolRepository->find($id);
    $saved = false;

    if (!empty($_POST['stoargeChange']))
    {
      $entry->storage = $_POST['stoargeChange'];
      $this->toolRepository->update($entry);
      $saved = true;
    }

    $this -> render("tool/showStorage",[
      'entry' => $entry,
      'saved' => $saved
    ]);
  }

  public function deleteTool()
  {
    $this->loginService->check();
    $id = $_GET['id'];
    $this->toolRepository->delete($id);
    $path = "toolliste";
    $this->render("delete/delete",[
      'path' => $path
    ]);
  }
}
?>

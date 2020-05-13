<?php
namespace App\Insert;

use App\Core\AbstractController;
use App\User\LoginService;
use App\Post\PostsRepository;
use App\Tool\ToolRepository;

class InsertController extends AbstractController
{
  public function __construct(LoginService $loginService, PostsRepository $postsRepsitory, ToolRepository $toolRepository)
  {
    $this->loginService = $loginService;
    $this->postsRepsitory = $postsRepsitory;
    $this->toolRepository = $toolRepository;
  }

  public function start()
  {
    $this->loginService->check();
    $this->render("insert/insertItem",[]);
  }

  public function startTool()
  {
    $this->loginService->check();
    $this->render("insert/insertTool",[]);
  }

  public function insertItem()
  {
    if (isset($_POST['partnumber']))
    {
      $partnumber = $_POST['partnumber'];
      $title = $_POST['title'];
      $manufacturer = $_POST['manufacturer'];
      $hscode = $_POST['customnummer'];
      $storage = $_POST['storage'];
      $supplier = $_POST['supplier'];
      $pn = $_POST['pn'];
      $dn = $_POST['dn'];
      $material = $_POST['material'];
      $groupname = $_POST['group'];
      $type = $_POST['type'];
      $content = $_POST['content'];
      $weight = $_POST['weight'];
      $price = $_POST['price'];

      $save = $this->postsRepsitory->insert($manufacturer, $content, $hscode, $title, $storage, $partnumber, $dn, $pn, $type, $supplier, $groupname, $material, $weight, $price);

      $this->render("insert/save",[
        'save' => $save
      ]);
    }
  }

  public function insertTool()
  {
    if (isset($_POST['title']))
    {
      $serialnumber = $_POST['serialnumber'];
      $group = $_POST['group'];
      $title = $_POST['title'];
      $manufacturer = $_POST['manufacturer'];
      $supplier = $_POST['supplier'];
      $storage = $_POST['storage'];
      $hscode = $_POST['customnummer'];
      $content = $_POST['content'];
      $weight = $_POST['weight'];
      $save = $this->toolRepository->insert($serialnumber, $title, $manufacturer, $supplier, $storage, $hscode, $content, $weight);
      $this->render("insert/save",[
        'save' => $save
      ]);
    }

  }
}
?>

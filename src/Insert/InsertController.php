<?php
namespace App\Insert;

use App\Core\AbstractController;
use App\User\LoginService;
use App\Post\PostsRepository;

class InsertController extends AbstractController
{
  public function __construct(LoginService $loginService, PostsRepository $postsRepsitory )
  {
    $this->loginService = $loginService;
    $this->postsRepsitory = $postsRepsitory;
  }

  public function start()
  {
    $this->loginService->check();
    $this->render("insert/insertItem",[]);
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

      $save = $this->postsRepsitory->insert($manufacturer, $content, $hscode, $title, $storage, $partnumber, $dn, $pn, $type, $supplier, $groupname, $material);

      $this->render("insert/save",[
        'save' => $save
      ]);
    }
  }

  public function insertTool()
  {
    echo e("start");
  }
}
?>

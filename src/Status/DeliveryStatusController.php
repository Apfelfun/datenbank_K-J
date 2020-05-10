<?php
namespace App\Status;

use App\Core\AbstractController;
use App\User\LoginService;

class DeliveryStatusController extends AbstractController
{
  public function __construct(DeliveryRepository $deliveryRepository, LoginService $loginService)
  {
    $this -> deliveryRepository = $deliveryRepository;
    $this -> loginService = $loginService;
  }

  public function show()
  {
    $this -> loginService -> check();
    $id = $_GET['id'];
    $find = $this -> deliveryRepository -> find($id);

    $this -> render("status/deliveryShow",[
      'find' => $find
    ]);
  }

  public function status()
  {
    $this->loginService->check();
    $all = $this->deliveryRepository->all();

    foreach ($all as $row) {
      $orderNumber[] = e($row->projectnumber);
    }
    $removeOrderFirst = array_unique($orderNumber);
    $removeOrder = array_values($removeOrderFirst);
    $countOrder = count($removeOrder);

    for ($i=0; $i <= $countOrder-1 ; $i++) {
      $info = $removeOrder[$i];
      $complete[] = $this->deliveryRepository->search($info);
    }


      $this -> render("status/deliverystatus", [
        'all' => $all,
        'removeOrder' => $removeOrder,
        'complete' => $complete,
        'countOrder' => $countOrder
      ]);

  }
}
?>

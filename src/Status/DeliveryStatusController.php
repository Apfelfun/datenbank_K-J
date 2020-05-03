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

  public function status()
  {
    $this -> loginService -> check();
    $all = $this -> deliveryRepository -> all();

    $this -> render("status/deliverystatus", [
      'all' => $all
    ]);
  }
}

?>

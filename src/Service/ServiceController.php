<?php
namespace App\Service;

use App\Core\AbstractController;
use App\User\LoginService;
use App\Status\DeliveryRepository;

class ServiceController extends AbstractController
{
  public function __construct(LoginService $loginService, ServiceRepository $serviceRepository, DeliveryRepository $deliveryRepository, OrderRepositoriy $orderRepository){
    $this->loginService = $loginService;
    $this->serviceRepository = $serviceRepository;
    $this->deliveryRepository = $deliveryRepository;
    $this->orderRepository = $orderRepository;
  }

  public function show(){
    $this->loginService->check();
    $all = $this->serviceRepository->orderd();
    $allOrder = $this->orderRepository->all();
    $nowDate = date("Y-m-d");
    $nowCalc = strtotime(date("Y-m-d"));
    $count = count($allOrder);
    $max = 5;

    $this->render("service/startview",[
      'all' => $all,
      'allOrder' => $allOrder,
      'count' => $count,
      'max' => $max
    ]);
  }

  public function insert()
  {
    $this->loginService->check();
    $entry = $this->orderRepository->all();


    if (!empty($_POST['ordernumber']))
    {
      $ordernumber = $_POST['ordernumber'];
      $customername = $_POST['customName'];
      $customeraddress = $_POST['customStreet'];
      $customerzipcode = $_POST['customCity'];
      $orderdate = date('Y-m-d');
      $email = $_POST['customEmail'];
      $orderProduct = $_POST['content'];
      $date = $_POST['endDate'];
      $deliverydate = date("Y-m-d", strtotime($date));
      $customercountry = $_POST['country'];
      $offernumber = $_POST['offnumber'];
      $sellingprice = $_POST['sellingprice'];
      $purchasingprice = $_POST['purchasingprice'];
      $vessel = $_POST['vessel'];
      $user = $_SESSION['login'];

      $test = $this->orderRepository->insert($ordernumber, $customername, $customeraddress, $customerzipcode, $email, $orderProduct, $customercountry, $offernumber, $sellingprice, $purchasingprice, $orderdate, $deliverydate, $vessel, $user);
    }
    $this->render("service/insert",[

    ]);
  }

  public function result() {
    $this->loginService->check();
    $search = $_POST['search'];
    $find = $this->orderRepository->search($search);

    $this->render("search/resultService",[
      'find' => $find
    ]);
  }

  public function showOrder() {
    $this->loginService->check();
    $id = $_GET['id'];
    $find = $this->orderRepository->find($id);
    $searchdelivery = $this->deliveryRepository->search($find->ordernumber);

    $this->render("service/detailOrder",[
      'find' => $find,
      'searchdelivery' => $searchdelivery
    ]);
  }
}
?>

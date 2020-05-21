<?php
namespace App\User;

use App\Core\AbstractController;
use App\Post\PostsRepository;
use App\Service\OrderRepositoriy;


class LoginController extends AbstractController
{

  function __construct(LoginService $loginService, OrderRepositoriy $orderRepository)
  {
    $this->loginService = $loginService;
    $this->orderRepository = $orderRepository;
  }

  public function shipping()
  {
    $this -> loginService -> check();
    $this -> render("user/shipping", []);
  }

  public function dashbord()
  {
    $this -> loginService -> check();
    //$all = $this->orderRepository->all();
    $this -> render("user/dashbord", []);

  }

  public function logout()
  {
    $this -> loginService->logout();
    header("Location: login");
  }

  public function login()
  {


    $error = null;
    if (!empty($_POST['username']) AND !empty($_POST['password']))
    {
      $username = $_POST['username'];
      $password = $_POST['password'];

      if ($this -> loginService -> attempt($username, $password))
      {

        header("Location: dashbord");
      } else {

        $error = true;
      }
    }

    $this -> render("user/login",[
      'error' => $error
    ]);

  }
}


?>

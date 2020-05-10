<?php
namespace App\Search;

use App\Core\AbstractController;
use App\User\LoginService;
use App\Status\DeliveryRepository;

class SearchController extends AbstractController
{

  public function __construct(DeliveryRepository $deliveryRepository, LoginService $loginService)
  {
    $this -> deliveryRepository = $deliveryRepository;
    $this -> loginService = $loginService;
  }
  public function search()
  {
    $this -> loginService -> check();
    $all = $this -> deliveryRepository -> all();

    $this -> render("search/search",[
      'all' => $all
    ]);
  }

  public function searchResult()
  {
    $this -> loginService -> check();

    if (isset($_POST['submit-search']))
    {
      if ($_POST['search'] != '') {
        $input = e($_POST['search']);
        $entry = $this -> deliveryRepository -> search($input);
        $this -> render("search/result", [
          'entry' => $entry
        ]);
      }
    }
  }

  public function detailView()
  {
    $this -> loginService -> check();
    $id = $_GET['id'];
    $find = $this -> deliveryRepository -> find($id);
    $this -> render("search/detail",[
      'find' => $find
    ]);
  }
}

?>

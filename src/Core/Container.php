<?php

namespace App\Core;

use PDO;
use Exception;
use PDOException;
//Repository
use App\Post\PostsRepository;
use App\Post\CommentsRepository;
use App\Status\DeliveryRepository;
use App\User\UserRepository;
use App\Tool\ToolRepository;
//Controller
use App\Tool\ToolController;
use App\Search\SearchController;
use App\Post\PostsController;
use App\User\LoginController;
use App\Post\PostAdminController;
use App\Post\DeliverynoteController;
use App\Status\DeliveryStatusController;
use App\Insert\InsertController;
//Login
use App\User\LoginService;
use App\Post\PostModel;

class Container
{
  //Aufzählung der Funktionen für die bestimmten Dinge
  private $receipts = [];
  private $instances = [];
  /*
  Funktion Aufbauen die die entsprechende Datenbank aufbaut
  */

  //Wird aufgerufen wenn die Klasse defeniert wird
  //Bei einem bestimmten Platzhalter wird die entsprechende Funktion abgerufen
  public function __construct()
  {
    $this -> receipts = [
      // Erstellt für den Controller das entsprechende Repository (Quelle) aus den darunter
      'postsController' => function() {
        return new PostsController(
          $this -> make("postsRepository"),
          $this -> make("usersRepository")
        );
      },

      'toolController' => function()
      {
        return new ToolController(
          $this->make("loginService"),
          $this->make("toolRepository")
        );
      },

      'insertController' => function()
      {
        return new InsertController(
          $this -> make("loginService"),
          $this -> make("postsRepository"),
          $this->make("toolRepository")
        );
      },

      'searchController' => function()
      {
        return new SearchController(
          $this -> make("deliveryRepository"),
          $this -> make("loginService")
        );
      },

      'postAdminController' => function()
      {
        return new PostAdminController(
          $this -> make("postsRepository"),
          $this -> make("loginService")
        );
      },
      'deliveryStatusController' => function()
      {
        return new DeliveryStatusController (
          $this -> make("deliveryRepository"),
          $this -> make("loginService")
        );
      },

      'deliverynoteController' => function()
      {
        return new DeliverynoteController (
          $this -> make("postsRepository"),
          $this -> make("loginService"),
          $this -> make("deliveryRepository")
        );
      },

      'loginController' => function()
      {
        return new LoginController(
          $this -> make('loginService')
        );
      },

      'postsRepository' => function() {
        return new PostsRepository(
          $this -> make("pdo")
        );
      },

      'toolRepository' => function() {
        return new ToolRepository(
          $this->make("pdoTool")
        );
      },

      //Anleitung zum erstellen der Verbindung
      'pdo' => function() {
        try {

          //Local
          $pdo = new PDO('mysql:host=localhost; dbname=blog','material','mfzzfLBvsoVyEoMk'); // Datenbank Verbindung
          //$pdo = new PDO('mysql:host=rdbms.strato.de; dbname=DB4149349','U4149349','mircaw-3hyszy-sevfaJ');
        } catch (Exception $e) {
          echo "Fehler";
          die();
        }

        $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
      },

      'pdoTool' => function() {
        try {

          //Local
          $pdoTool = new PDO('mysql:host=localhost; dbname=Tool','tool','JMkJFtxcjAhJyqu5'); // Datenbank Verbindung
          //$pdoTool = new PDO('mysql:host=rdbms.strato.de; dbname=DB4153293','U4153293','mircaw-3hyszy-sevfaJ');
        } catch (Exception $e) {
          echo "Fehler2";
          die();
        }

        $pdoTool -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdoTool;
      },

      'usersRepository' => function()
      {
        return new UserRepository (
          $this -> make("pdo")
        );
      },

      'deliveryRepository' => function()
      {
        return new DeliveryRepository (
          $this->make("pdo")
        );
      },

      'loginService' => function()
      {
        return new LoginService
        (
          $this -> make("usersRepository")
        );
      },
      'postModel' => function() {
        return new PostModel(

        );
      }
    ];
  }

  public function make ($name)
  {
    //Wenn der Wert gesetzt ist
    if (!empty($this -> instances[$name]))
    {
      return $this -> instances[$name];
    }

    // Wenn der Name mit der entsprechenden Funktion übereinstimmt so wird dieses an das Array instances übergeben
    if (isset($this -> receipts[$name])) {
      $this -> instances[$name] = $this -> receipts[$name]();
    }

    //Entsprechende Funktion bilden
    return $this -> instances[$name];

  }
}

  /*
  private $pdo;
  private $postsRepsitory;

  public function getPdo()
  {

    if (!empty($this -> pdo)) // Die Variable PDO nicht leer ist -> baut er nicht immer die selbe Datenbank verbindung auf
    {
      return $this -> pdo;
    }


    $this -> pdo = new PDO('mysql:host=localhost; dbname=blog','root',''); // Datenbank Verbindung

    $this -> pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $this -> pdo;
  }

  public function getPostsRepository()
  {
    if (!empty($this -> postsRepository))
    {
      return $this -> postsRepository;
    }
    $this -> postsRepository = new PostsRepository(
      $this -> getPdo()
    );
    return $this -> postsRepository;
  }
  */



?>

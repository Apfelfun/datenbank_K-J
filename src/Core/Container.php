<?php

namespace App\Core;

use PDO;
use Exception;
use PDOException;
use App\Post\PostsRepository;
use App\Post\CommentsRepository;
use App\User\UserRepository;
use App\Post\PostsController;
use App\User\LoginController;
use App\Post\PostAdminController;
use App\User\LoginService;

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

      'postAdminController' => function()
      {
        return new PostAdminController(
          $this -> make("postsRepository"),
          $this -> make("loginService")
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

      //Anleitung zum erstellen der Verbindung
      'pdo' => function() {
        try {
          $pdo = new PDO('mysql:host=localhost; dbname=blog','root',''); // Datenbank Verbindung
        } catch (Exception $e) {
          echo "Fehler";
          die();
        }

        $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
      },

      'usersRepository' => function()
      {
        return new UserRepository (
          $this -> make("pdo")
        );
      },

      'loginService' => function()
      {
        return new LoginService
        (
          $this -> make("usersRepository")
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

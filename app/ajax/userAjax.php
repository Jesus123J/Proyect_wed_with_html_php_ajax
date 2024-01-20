<?php
require_once "../../config/app.php";
//require_once "../views/inc/sessionStart.php";
require_once "../../autoload.php";

use app\controllers\UsersController;

$usersController = new UsersController();

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);

  if ($data["type"] === "register") {
    echo $usersController->createUser($data);
    exit();
  }

  if ($data["type"] === "login") {
    echo $usersController->loginUser($data);
    exit();
  }

  if ($data["type"] === "logout") {
    session_destroy();
    http_response_code(200);
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);

  echo $usersController->updateUser($data);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  header('Content-Type: application/json');

  if (isset($_GET['users'])) {
    echo $usersController->getUsers();
    exit();
  }

  if (isset($_SESSION['role'])) {
    $response = $data = [
      "role"     => $_SESSION['role'],
      "dni"      => $_SESSION['dni'],
      "name"     => $_SESSION['name'],
      "lastname" => $_SESSION['lastname'],
      "email"    => $_SESSION['email'],
      "phone"    => $_SESSION['phone'],
      "genre"    => $_SESSION['genre']
    ];
    http_response_code(200);
  } else {
    $response = array("message" => "Inicie sesión para realizar su orden");
    http_response_code(404);
  }

  echo json_encode($response);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  echo $usersController->deleteUser($_GET['dni']);
  exit();
}


<?php
require_once "../../config/app.php";
require_once "../views/inc/sessionStart.php";
require_once "../../autoload.php";

use app\controllers\OrdersController;

$ordersController = new OrdersController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);

  echo $ordersController->createOrder($data);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $dni = $_GET['dni'] ?? null;
  $id = $_GET['id'] ?? null;

  if ($role === "Admin") {
    if (isset($_GET['type']) && $_GET['type'] === 'getOrder') {
      echo $ordersController->getOrders();
      exit();
    }
  }

  if ($role === "Client") {
    if ($dni != null) {
      echo $ordersController->getOrdersByDni($dni);
      exit();
    }

    if ($id != null) {
      echo $ordersController->getOrderDetailsById($id);
      exit();
    }
  }
}


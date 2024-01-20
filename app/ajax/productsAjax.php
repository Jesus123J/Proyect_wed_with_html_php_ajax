<?php
require_once "../../config/app.php";
require_once "../views/inc/sessionStart.php";
require_once "../../autoload.php";

use app\controllers\ProductsController;

$productsController = new ProductsController();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo $productsController->getProducts();
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);
  echo $productsController->registerProduct($data);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);
  echo $productsController->editProduct($data);
  exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);
  echo $productsController->deleteProduct($data);
  exit();
}

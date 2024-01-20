<?php
require_once "../../config/app.php";
require_once "../views/inc/sessionStart.php";
require_once "../../autoload.php";

use app\controllers\ComplaintsController;

$complaintsController = new ComplaintsController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);

  echo $complaintsController->createComplaint($data);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  echo $complaintsController->getComplaints();
  exit();
}
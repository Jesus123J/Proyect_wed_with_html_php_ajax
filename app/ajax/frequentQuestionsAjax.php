<?php
require_once "../../config/app.php";
require_once "../views/inc/sessionStart.php";
require_once "../../autoload.php";

use app\controllers\FrequentQuestionsController;

$frequentQuestionsController = new FrequentQuestionsController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo $frequentQuestionsController->getFrequentQuestions();
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);
  echo $frequentQuestionsController->updateFrequentQuestion($data);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);
  echo $frequentQuestionsController->deleteFrequentQuestion($data);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);
  echo $frequentQuestionsController->createFrequentQuestion($data);
  exit();
}
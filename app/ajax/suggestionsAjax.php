<?php
require_once "../../config/app.php";
require_once "../views/inc/sessionStart.php";
require_once "../../autoload.php";

use app\controllers\SuggestionsController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $suggestionsController = new SuggestionsController();

  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body, true);

  echo $suggestionsController->createSuggestion($data);
  exit();
}
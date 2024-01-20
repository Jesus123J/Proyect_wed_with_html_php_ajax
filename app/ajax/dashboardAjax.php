<?php
require_once "../../config/app.php";
require_once "../views/inc/sessionStart.php";
require_once "../../autoload.php";

use app\controllers\DashboardController;

$dashboardController = new DashboardController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo $dashboardController->getAllDataDashboard();
  exit();
}
<?php

namespace app\controllers;

use app\models\DashboardModel;

class DashboardController {
  private $complaints;
  public function __construct() {
    $this->complaints = new DashboardModel();
  }
  public function getAllDataDashboard() {
    return $this->complaints->getAllDataDashboard();
  }
}
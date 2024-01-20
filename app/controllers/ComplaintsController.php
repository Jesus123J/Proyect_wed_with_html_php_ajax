<?php

namespace app\controllers;

use app\models\ComplaintsModel;

class ComplaintsController {
  private $complaints;
  public function __construct() {
    $this->complaints = new ComplaintsModel();
  }
  public function createComplaint($data) {
    return $this->complaints->createComplaint($data);
  }

  public function getComplaints() {
    return $this->complaints->getComplaints();
  }
}
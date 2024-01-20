<?php

namespace app\controllers;

use app\models\OrdersModel;

class OrdersController {
  private $orders;
  public function __construct() {
    $this->orders = new OrdersModel();
  }

  public function createOrder($order) {
    return $this->orders->createOrder($order);
  }

  public function getOrdersByDni($dni) {
    return $this->orders->getOrdersByDni($dni);
  }

  public function getOrderDetailsById($id) {
    return $this->orders->getOrderDetailsById($id);
  }

  public function getOrders() {
    return $this->orders->getOrders();
  }
}
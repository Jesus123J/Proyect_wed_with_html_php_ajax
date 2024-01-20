<?php

namespace app\controllers;

use app\models\ProductsModel;

class ProductsController {
  private $products;
  public function __construct() {
    $this->products = new ProductsModel();
  }
  public function getProducts() {
    return $this->products->getProducts();
  }
  public function editProduct($dataProduct) {
    return $this->products->editProduct($dataProduct);
  }
  public function deleteProduct($dataProduc) {
    return $this->products->deleteProduct($dataProduc);
  }
  public function registerProduct($dataProduct) {
    return $this->products->registerProduct($dataProduct);
  }
}
<?php

namespace app\models;

class ProductsModel extends DBManager {
  public function __construct() {
    parent::__construct();
  }
  public function editProduct($dataProduct) {
    try {
      $sql = "UPDATE products
                SET 
                    name = ?,
                    price = ?,
                    img_url = ?
                WHERE id = ?";

      $stmt = $this->getConnection()->prepare($sql);

      header('Content-Type: application/json');

      $stmt->bind_param("sdss", $dataProduct['name'], $dataProduct['price'], $dataProduct['image'], $dataProduct['id']);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
        $msj = 'Producto actualizado con éxito.';
        http_response_code(200);
      } else {
        $msj = 'No se pudo actualizar el producto. Verifica el ID del producto.';
        http_response_code(404);
      }
      if (!isset($msj)) {
        $msj = 'Error inesperado al actualizar el producto.';
        http_response_code(500);
      }

    } catch (\mysqli_sql_exception $e) {
      $msj = 'Error al actualizar el producto: ' . $e->getMessage();
      http_response_code(500);
    }

    return json_encode(array('message' => $msj));

  }


  public function registerProduct($dataProduct) {
    try {
      if($dataProduct.category_name  ==  'hamburguesas'){
          $idCategory = 1;
      }else if($dataProduct.category_name == 'pizzas'){
        $idCategory = 2;
      }else if($dataProduct.category_name == 'bebidas'){
        $idCategory = 3;
      }else if($dataProduct.category_name == 'postres'){
        $idCategory = 4;
      }
      $sql = "INSERT INTO products (id, name, price, sold, img_url, category_id) VALUES (?, ?, ?, 0, ?, ?)";
      $stmt = $this->getConnection()->prepare($sql);
      header('Content-Type: application/json');

      $stmt->bind_param("ssdsi", $dataProduct["id"],
        $dataProduct['name'], $dataProduct['price'],
        $dataProduct['image'], $idCategory);
      $stmt->execute();

      $msj = "Producto registrado con éxito.";
      http_response_code(201);
    } catch (\mysqli_sql_exception $e) {
      $msj = "Error al registrar el producto.";
      http_response_code(400);
    }

    return json_encode(array("message" => $msj));
  }

  public function deleteProduct($deleteProduct) {
    try {
      $deleteOrderDetailsSql = "DELETE FROM order_details WHERE product_id = ?";
      $stmtOrderDetails = $this->getConnection()->prepare($deleteOrderDetailsSql);
      $stmtOrderDetails->bind_param("s", $deleteProduct['id']);
      $stmtOrderDetails->execute();

      $deleteProductSql = "DELETE FROM products WHERE id = ?";
      $stmtProduct = $this->getConnection()->prepare($deleteProductSql);
      $stmtProduct->bind_param("s", $deleteProduct['id']);
      $stmtProduct->execute();

      if ($stmtProduct->affected_rows > 0) {
        $msj = "Producto eliminado con éxito.";
        http_response_code(200);
      } else {
        $msj = "No se pudo eliminar el producto. Verifica el ID del producto.";
        http_response_code(404);
      }
    } catch (\mysqli_sql_exception $e) {
      $msj = "Error al eliminar el producto: " . $e->getMessage();
      http_response_code(500);
    }
    return json_encode(array("message" => $msj));
  }


  public function getProducts() {
    $sql = "SELECT products.id, products.name, products.price, products.img_url, categories.name AS category_name 
            FROM products 
            INNER JOIN categories on products.category_id = categories.id";

    $result = $this->getConnection()->query($sql);

    header('Content-Type: application/json');

    if ($result) {
      $data = $result->fetch_all(MYSQLI_ASSOC);

      $data = array_map(function ($row) {
        $row['price'] = (float) $row['price'];
        return $row;
      }, $data);

      return json_encode(array("data" => $data));
    } else {
      $error = $this->getConnection()->error;
      return json_encode(array("error" => $error));
    }
  }
}

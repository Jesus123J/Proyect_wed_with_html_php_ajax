<?php

namespace app\models;

class OrdersModel extends DBManager {
  public function __construct() {
    parent::__construct();
    header('Content-Type: application/json');
  }

  public function createOrder($data) {
    $sql = "INSERT INTO orders (id,user_dni,order_date,address,total,total_sold,status) VALUES (?,?,?,?,?,?,?)";
    $stmt = $this->getConnection()->prepare($sql);

    $id = $data['id'];
    $user_dni = $data['user_dni'];
    $order_date = $data['order_date'];
    $address = $data['address'];
    $total = $data['total'];
    $totalSold = $data['total_sold'];
    $status = "En Proceso";
    $cartList = $data['cartList'];

    $stmt->bind_param("ssssdis", $id, $user_dni, $order_date, $address, $total, $totalSold, $status);

    try {
      $stmt->execute();
      $msj = "Orden registrada con éxito.";

      foreach ($cartList as $item) {
        $sqlDetails = "INSERT INTO order_details (order_id, product_id, qty, subtotal) VALUES (?, ?, ?, ?)";
        $stmtDetails = $this->getConnection()->prepare($sqlDetails);
        $stmtDetails->bind_param("ssid", $id, $item['product_id'], $item['qty'], $item['subtotal']);
        $stmtDetails->execute();

        $sqlUpdateProduct = "UPDATE products SET sold = sold + ? WHERE id = ?";
        $stmtUpdateProduct = $this->getConnection()->prepare($sqlUpdateProduct);
        $stmtUpdateProduct->bind_param("is", $item['qty'], $item['product_id']);
        $stmtUpdateProduct->execute();
      }

      http_response_code(201);
    } catch (\mysqli_sql_exception $e) {
      $msj = "Error al registrar la orden.";
      http_response_code(400);
    }

    return json_encode(array("message" => $msj));
  }

  public function getOrdersByDni($dni) {
    $sql = "SELECT id, order_date, address, total, status FROM orders WHERE user_dni = ? ORDER BY order_date DESC";
    $stmt = $this->getConnection()->prepare($sql);
    $stmt->bind_param("s", $dni);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
      http_response_code(404);
      return json_encode(array("msj" => "No se encontraron ordenes"));
    }

    $data = $result->fetch_all(MYSQLI_ASSOC);
    http_response_code(200);
    return json_encode(array("data" => $data));
  }

  public function getOrderDetailsById($id) {
    $sql = "SELECT products.name, products.price, order_details.qty, order_details.subtotal
    FROM order_details
    INNER JOIN products ON products.id = order_details.product_id
    WHERE order_details.order_id = ?";

    $stmt = $this->getConnection()->prepare($sql);
    $stmt->bind_param("s", $id);

    $stmt->execute();
    $result = $stmt->get_result();

    $data = $result->fetch_all(MYSQLI_ASSOC);
    http_response_code(200);
    return json_encode(array("data" => $data));
  }

  public function getOrders() {
    $sql = "SELECT * FROM orders";
    $result = $this->getConnection()->query($sql);
    if ($result) {
      $data = $result->fetch_all(MYSQLI_ASSOC);
      return json_encode(array("data" => $data));
    } else {
      $error = $this->getConnection()->error;
      return json_encode(array("error" => $error));
    }
  }
}
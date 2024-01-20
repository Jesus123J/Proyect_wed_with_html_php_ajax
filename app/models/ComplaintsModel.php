<?php

namespace app\models;

use app\models\DBManager;

class ComplaintsModel extends DBManager {
  public function __construct() {
    parent::__construct();
    header('Content-Type: application/json');
  }

  public function createComplaint($data) {
    $sql = "INSERT INTO complaints (order_id, name, lastname, email, complaint_date, complaint_text) VALUES (?,?,?,?,?,?)";
    $stmt = $this->getConnection()->prepare($sql);

    $order_id = $data['order_id'];
    $name = $data['name'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $complaint_date = $data['complaint_date'];
    $complaint_text = $data['complaint_text'];

    $stmt->bind_param("ssssss", $order_id, $name, $lastname, $email, $complaint_date, $complaint_text);

    try {
      $stmt->execute();

      $msj = "Queja registrada con éxito";
      http_response_code(201);
    } catch (\mysqli_sql_exception $e) {
      $msj = "El id de la orden no existe";
      http_response_code(400);
    }

    return json_encode(array("message" => $msj));
  }

  public function getComplaints() {
    $sql = "SELECT * FROM complaints";
    $stmt = $this->getConnection()->prepare($sql);

    try {
      $stmt->execute();
      $result = $stmt->get_result();
      $frequent_questions = $result->fetch_all(MYSQLI_ASSOC);
      http_response_code(200);
    } catch (\mysqli_sql_exception $e) {
      $frequent_questions = array();
      http_response_code(400);
    }

    return json_encode($frequent_questions);
  }
}
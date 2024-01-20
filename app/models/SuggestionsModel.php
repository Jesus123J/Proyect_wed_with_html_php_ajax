<?php

namespace app\models;

use app\models\DBManager;

class SuggestionsModel extends DBManager {
  public function __construct() {
    parent::__construct();
  }

  public function createSuggestion($data) {
    $sql = "INSERT INTO suggestions (name, lastname, email, dni, suggestion) VALUES (?,?,?,?,?)";
    $stmt = $this->getConnection()->prepare($sql);

    $name = $data['name'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $dni = $data['dni'];
    $suggestion = $data['suggestion'];

    $stmt->bind_param("sssss", $name, $lastname, $email, $dni, $suggestion);

    try {
      $stmt->execute();

      $msj = "Sugerencia registrada con éxito.";
      http_response_code(201);
    } catch (\mysqli_sql_exception $e) {
      $msj = "Un error inhesperado ha ocurrido.";
      http_response_code(400);
    }
    header('Content-Type: application/json');
    return json_encode(array("message" => $msj));
  }
}
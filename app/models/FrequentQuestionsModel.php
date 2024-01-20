<?php

namespace app\models;

class FrequentQuestionsModel extends DBManager {
  public function __construct() {
    parent::__construct();
    header('Content-Type: application/json');
  }

  public function getFrequentQuestions() {
    $sql = "SELECT * FROM frequent_questions";
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

  public function updateFrequentQuestion($data) {
    $sql = "UPDATE frequent_questions SET question = ?, answer = ?, updated_at = ? WHERE id = ?";
    $stmt = $this->getConnection()->prepare($sql);

    $stmt->bind_param('sssi', $data["question"], $data["answer"], $data["updated_at"], $data["id"]);

    try {
      $stmt->execute();
      if ($stmt->affected_rows == 1) {
        $msj = "Pregunta actualizada con éxito.";
        http_response_code(200);
      } else {
        $msj = "No se pudo actualizar la pregunta.";
        http_response_code(400);
      }
    } catch (\mysqli_sql_exception $e) {
      http_response_code(400);
    }
    return json_encode(array("message" => $msj));
  }

  public function deleteFrequentQuestion($data) {
    $sql = "DELETE FROM frequent_questions WHERE id = ?";
    $stmt = $this->getConnection()->prepare($sql);

    $stmt->bind_param('i', $data["id"]);

    try {
      $stmt->execute();
      if ($stmt->affected_rows == 1) {
        $msj = "Pregunta eliminada con éxito.";
        http_response_code(200);
      } else {
        $msj = "No se pudo eliminar la pregunta.";
        http_response_code(400);
      }
    } catch (\mysqli_sql_exception $e) {
      http_response_code(400);
    }
    return json_encode(array("message" => $msj));
  }

  public function createFrequentQuestion($data) {
    $sql = "INSERT INTO frequent_questions (question, answer) VALUES (?,?)";
    $stmt = $this->getConnection()->prepare($sql);

    $stmt->bind_param('ss', $data["question"], $data["answer"]);

    try {
      $stmt->execute();
      $id = $stmt->insert_id;
      $msj = "Pregunta creada con éxito.";
      http_response_code(201);
    } catch (\mysqli_sql_exception $e) {
      http_response_code(400);
    }

    return json_encode(array("message" => $msj, "id" => $id));
  }
}
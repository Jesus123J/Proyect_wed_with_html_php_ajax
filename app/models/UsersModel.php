<?php

namespace app\models;

class UsersModel extends DBManager {

  public function __construct() {
    parent::__construct();
    header('Content-Type: application/json');
  }

  public function createUser($data) {
    $secret_key = "F2j9#mDv!Lz*5kGhRp@Q1XwY3Z";
    $fixed_salt = hash('sha256', $secret_key);

    $sql = "INSERT INTO users (dni, name, lastname, genre, email, password, phone, role) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $this->getConnection()->prepare($sql);

    $dni = $data['dni'];
    $name = $data['name'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $password = $data['password'];
    $phone = $data['phone'];
    $genre = $data['genre'];
    $role = $data['role'] ?? "Client";

    $hashed_password = hash('sha256', $password . $fixed_salt);
    $stmt->bind_param("ssssssss", $dni, $name, $lastname, $genre, $email, $hashed_password, $phone, $role);

    try {
      $stmt->execute();
      $msj = "Usuario registrado con éxito.";
      http_response_code(201);
    } catch (\mysqli_sql_exception $e) {
      if (strpos($e->getMessage(), "PRIMARY")) {
        $msj = "El dni ya está registrado.";
      } else if (strpos($e->getMessage(), "email")) {
        $msj = "El email ya existe.";
      }
      http_response_code(400);
    }

    return json_encode(array("message" => $msj));
  }

  public function loginUser($data) {
    $secret_key = "F2j9#mDv!Lz*5kGhRp@Q1XwY3Z";
    $fixed_salt = hash('sha256', $secret_key);

    $email = $data['email'];
    $password = $data['password'];

    $hashed_password = hash('sha256', $password . $fixed_salt);

    $sql = "SELECT dni, name, lastname, genre, email, phone, role FROM users WHERE email = ? AND password = ?";
    $stmt = $this->getConnection()->prepare($sql);

    $stmt->bind_param("ss", $email, $hashed_password);

    try {
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows === 1) {
        $msj = "Ingreso exitoso";
        $data = $result->fetch_assoc();
        $_SESSION['role'] = $data['role'];
        $_SESSION['dni'] = $data['dni'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['lastname'] = $data['lastname'];
        $_SESSION['phone'] = $data['phone'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['genre'] = $data['genre'];

        http_response_code(200);
      } else {
        $msj = "Correo o Contraseña incorrecta";
        http_response_code(404);
      }
    } catch (\mysqli_sql_exception $e) {
      $msj = "Un error ha ocurrido intentelo más tarde";
      http_response_code(400);
    }

    return json_encode(array("message" => $msj, "role" => $data['role'] ?? null));
  }

  public function updateUser($data) {
    $sql = "UPDATE users SET name = ?, lastname = ?, email = ?, genre = ?, phone = ? WHERE dni = ? ";
    $stmt = $this->getConnection()->prepare($sql);

    $dni = $data['dni'];
    $name = $data['name'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $phone = $data['phone'];
    $genre = $data['genre'];

    $stmt->bind_param("ssssss", $name, $lastname, $email, $genre, $phone, $dni);

    try {
      $stmt->execute();
      $msj = "Usuario editado con éxito.";
      if ($_SESSION['dni'] == $dni) {
        $_SESSION['name'] = $name;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['genre'] = $genre;
      }
      http_response_code(200);
    } catch (\mysqli_sql_exception $e) {
      $msj = "El email ya existe.";
      http_response_code(400);
    }

    return json_encode(array("message" => $msj));
  }

  public function deleteUser($dni) {
    $sql = "DELETE FROM users WHERE dni = ?";
    $stmt = $this->getConnection()->prepare($sql);

    $stmt->bind_param("s", $dni);

    $stmt->execute();

    $msj = "Usuario eliminado con éxito.";
    http_response_code(200);

    return json_encode(array("message" => $msj));
  }

  public function getUsers() {
    $sql = "SELECT dni, name, lastname, genre, email, phone, role FROM users WHERE role ='Admin'";
    $stmt = $this->getConnection()->query($sql);
    return json_encode($stmt->fetch_all(MYSQLI_ASSOC));
  }
}


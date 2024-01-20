<?php

namespace app\controllers;

use app\models\UsersModel;

class UsersController {
  private $userAuth;
  public function __construct() {
    $this->userAuth = new UsersModel();
  }
  public function createUser($data) {
    return $this->userAuth->createUser($data);
  }
  public function loginUser($data) {
    return $this->userAuth->loginUser($data);
  }
  public function updateUser($data) {
    return $this->userAuth->updateUser($data);
  }
  public function deleteUser($data) {
    return $this->userAuth->deleteUser($data);
  }
  public function getUsers() {
    return $this->userAuth->getUsers();
  }
}
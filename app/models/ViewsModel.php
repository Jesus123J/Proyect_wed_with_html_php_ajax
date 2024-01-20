<?php

namespace app\models;

class ViewsModel {
  protected function getViewsModel($view, $role) {
    $whiteListPublic = ["login", "register", "products", "suggestions", "complaintsBook", "frequentQuetions", "home", "contact"];
    $whitelistClient = ["home", "cart", "myOrders", "myAccount", "products"];
    $whitelistAdmin = ["login", "dashboard", "products", "orders", "users", "clients", "frequentQuetions", "complaintsBook"];

    if ($role === "Admin" && in_array($view, $whitelistAdmin)) {
      $content = "./app/views/admin/" . $view . ".php";
    } elseif ($role === "Client" && in_array($view, $whitelistClient)) {
      $content = "./app/views/client/" . $view . ".php";
    } elseif ($role === "" && in_array($view, $whiteListPublic)) {
      if (file_exists("./app/views/auth/" . $view . ".php")) {
        $content = "./app/views/auth/" . $view . ".php";
      } elseif (file_exists("./app/views/client/" . $view . ".php")) {
        $content = "./app/views/client/" . $view . ".php";
      } else {
        $content = "./app/views/layouts/404.php";
      }
    } else {
      $content = "404";
    }

    return $content;
  }
}
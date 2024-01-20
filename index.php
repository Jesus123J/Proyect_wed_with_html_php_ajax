<?php
require_once "./config/app.php";
require_once "./app/views/inc/sessionStart.php";
require_once "./autoload.php";

if (isset($_GET['views'])) {
  $url = explode("/", $_GET['views']);
} else {
  $url = [""];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once "./app/views/inc/head.php"; ?>
</head>

<body>
  <?php
  use app\controllers\ViewsController;

  $viewsControllers = new ViewsController();
  $view = $viewsControllers->getViewsController($url[0], $role);

  if ($view === "404" || count($url) > 1) {
    require_once "./app/views/layouts/404.php";
  } elseif ($url[0] !== "products" && $role !== "Admin") {
    require_once $view;
    require_once "./app/views/layouts/footer.php";
  } else if ($role !== "Admin") {
    require_once "./app/views/layouts/navbarClient.php";
    require_once $view;
    require_once "./app/views/layouts/footer.php";
  } else if ($role === "Admin") {
    require_once "./app/views/layouts/sidebarAdmin.php";
    require_once $view;
  }
  ?>

</body>

</html>
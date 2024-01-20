<?php
namespace app\models;

class DashboardModel extends DBManager {
  public function __construct() {
    parent::__construct();
    header('Content-Type: application/json');
  }

  public function getAllDataDashboard() {
    $sqlWorkers = "SELECT COUNT(*) AS total FROM users WHERE role = 'Admin'";
    $resultWorkers = $this->getConnection()->query($sqlWorkers);

    $sqlProductsSold = "SELECT SUM(total_sold) AS products_sold FROM orders";
    $resultProductSold = $this->getConnection()->query($sqlProductsSold);

    $sqlDataByDay = "SELECT DATE(order_date) AS date, COUNT(*) AS orders, SUM(total) as total 
            FROM orders 
            GROUP BY date 
            ORDER BY date ASC";

    $resultDataByDay = $this->getConnection()->query($sqlDataByDay);

    $sqlLastOrders = "SELECT user_dni, order_date, total, total_sold FROM orders ORDER BY order_date DESC LIMIT 5";
    $resultLastOrders = $this->getConnection()->query($sqlLastOrders);

    $sqlTopProducts = "SELECT name, sold FROM products WHERE sold > 0 ORDER BY sold DESC LIMIT 5";
    $resultTopProducts = $this->getConnection()->query($sqlTopProducts);

    $resultDataByDay = $resultDataByDay->fetch_all(MYSQLI_ASSOC);

    $totalOrders = 0;
    $totalSales = 0;

    foreach ($resultDataByDay as $row) {
      $totalOrders += (int) $row["orders"];
      $totalSales += (float) $row["total"];
    }


    http_response_code(200);
    return json_encode(array(
      "total_workers" => $resultWorkers->fetch_assoc()["total"],
      "products_sold" => (int) $resultProductSold->fetch_assoc()["products_sold"],
      "total_orders"  => $totalOrders,
      "total_sales"   => $totalSales,
      "data_by_day"   => $resultDataByDay,
      "last_orders"   => $resultLastOrders->fetch_all(MYSQLI_ASSOC),
      "top_products"  => $resultTopProducts->fetch_all(MYSQLI_ASSOC)
    ));
  }
}

?>
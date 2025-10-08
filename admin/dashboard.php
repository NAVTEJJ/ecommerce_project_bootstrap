<?php include('../config.php'); if(!isset($_SESSION['admin'])){ header('Location:index.php'); }
$productCount = $conn->query('SELECT COUNT(*) as c FROM products')->fetch_assoc()['c'];
$userCount = $conn->query('SELECT COUNT(*) as c FROM users')->fetch_assoc()['c'];
$orderCount = $conn->query('SELECT COUNT(*) as c FROM orders')->fetch_assoc()['c'];
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Admin Dashboard</h2>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
  <div class="row mt-3">
    <div class="col-md-4"><div class="card shadow-sm p-3"><h6>Total Products</h6><h3><?= $productCount ?></h3></div></div>
    <div class="col-md-4"><div class="card shadow-sm p-3"><h6>Total Users</h6><h3><?= $userCount ?></h3></div></div>
    <div class="col-md-4"><div class="card shadow-sm p-3"><h6>Total Orders</h6><h3><?= $orderCount ?></h3></div></div>
  </div>
  <div class="mt-4">
    <a href="manage_products.php" class="btn btn-success">Manage Products</a>
    <a href="manage_users.php" class="btn btn-info">Manage Users</a>
    <a href="manage_orders.php" class="btn btn-warning">Manage Orders</a>
  </div>
</div>
</body></html>
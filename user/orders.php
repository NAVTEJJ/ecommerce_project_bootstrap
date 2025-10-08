<?php include('../config.php'); include('navbar.php');
if(!isset($_SESSION['user'])){ header('Location:login.php'); }
$user_email = $_SESSION['user'];
$user = $conn->query("SELECT * FROM users WHERE email='$user_email'")->fetch_assoc();
$user_id = intval($user['id']);
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Orders - ElectroStore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-4">
  <h2>My Orders</h2>
  <?php
  $orders = $conn->query("SELECT * FROM orders WHERE user_id={$user_id} ORDER BY created_at DESC");
  while($o = $orders->fetch_assoc()){
    echo "<div class='card mb-3'><div class='card-body'><h5>Order #{$o['id']} - {$o['created_at']}</h5><ul>";
    $items = $conn->query("SELECT p.name, oi.quantity FROM order_items oi JOIN products p ON oi.product_id=p.id WHERE oi.order_id={$o['id']}"); 
    while($it = $items->fetch_assoc()){ echo "<li>{$it['name']} x {$it['quantity']}</li>"; }
    echo "</ul></div></div>";
  }
  ?>
</div>
</body></html>
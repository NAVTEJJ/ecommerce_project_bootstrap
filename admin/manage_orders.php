<?php include('../config.php'); if(!isset($_SESSION['admin'])){ header('Location:index.php'); }
$orders = $conn->query('SELECT * FROM orders ORDER BY created_at DESC');
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Manage Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-4">
  <h2>All Orders</h2>
  <?php while($o=$orders->fetch_assoc()): ?>
    <div class="card mb-3"><div class="card-body">
      <h5>Order #<?= $o['id'] ?> - <?= $o['created_at'] ?></h5>
      <ul>
      <?php $items = $conn->query('SELECT p.name, oi.quantity FROM order_items oi JOIN products p ON oi.product_id=p.id WHERE oi.order_id='.intval($o['id']));
        while($it = $items->fetch_assoc()) echo "<li>{$it['name']} x {$it['quantity']}</li>";
      ?>
      </ul>
    </div></div>
  <?php endwhile; ?>
</div>
</body></html>
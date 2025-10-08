<?php include("../config.php"); include('navbar.php'); ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>ElectroStore - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style> .card-img-top{height:200px; object-fit:cover;} </style>
</head>
<body class="bg-light">
<div class="container mt-4">
  <div class="p-4 bg-white rounded shadow-sm">
    <h1 class="mb-0">ElectroStore <small class="text-muted">— Electronics you'll love</small></h1>
    <p class="text-muted">Professional demo store — preloaded with 10 electronics.</p>
  </div>

  <div class="row mt-4">
    <?php
    $res = $conn->query("SELECT * FROM products");
    while($row = $res->fetch_assoc()): ?>
      <div class="col-md-4 col-lg-3 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="../<?= $row['image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
            <p class="card-text text-muted small"><?= htmlspecialchars(substr($row['description'],0,80)) ?>...</p>
            <div class="mt-auto">
              <p class="fw-bold">$<?= $row['price'] ?></p>
              <a href="cart.php?id=<?= $row['id'] ?>" class="btn btn-primary w-100">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

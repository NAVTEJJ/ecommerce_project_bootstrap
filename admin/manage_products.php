<?php include('../config.php'); if(!isset($_SESSION['admin'])){ header('Location:index.php'); }
if(isset($_POST['add'])){
    $name = $conn->real_escape_string($_POST['name']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $imgpath = '';
    if(isset($_FILES['image']) && $_FILES['image']['error']==0){
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $target = 'uploads/' . uniqid('p') . '.' . $ext;
        if(move_uploaded_file($_FILES['image']['tmp_name'], '../' . $target)){
            $imgpath = $target;
        }
    }
    $conn->query("INSERT INTO products(name,description,price,image) VALUES('$name','$desc',$price,'$imgpath')");
    $msg = 'Product added';
}
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    // delete image file
    $row = $conn->query("SELECT image FROM products WHERE id=$id")->fetch_assoc();
    if($row && $row['image']) @unlink('../'.$row['image']);
    $conn->query("DELETE FROM products WHERE id=$id");
    header('Location:manage_products.php'); exit;
}
$rows = $conn->query('SELECT * FROM products');
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Manage Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-4">
  <h2>Manage Products</h2>
  <?php if(isset($msg)) echo "<div class='alert alert-success'>{$msg}</div>"; ?>
  <div class="card p-3 mb-3">
    <form method="post" enctype="multipart/form-data">
      <input class="form-control mb-2" name="name" placeholder="Product name" required>
      <textarea class="form-control mb-2" name="description" placeholder="Description"></textarea>
      <input class="form-control mb-2" name="price" type="number" step="0.01" placeholder="Price" required>
      <input class="form-control mb-2" name="image" type="file" accept="image/*">
      <button class="btn btn-success" name="add">Add Product</button>
    </form>
  </div>
  <div class="row">
    <?php while($p = $rows->fetch_assoc()): ?>
      <div class="col-md-4">
        <div class="card mb-3">
          <?php if($p['image']): ?>
            <img src="../<?= $p['image'] ?>" class="card-img-top" style="height:180px;object-fit:cover">
          <?php endif; ?>
          <div class="card-body">
            <h5><?= htmlspecialchars($p['name']) ?></h5>
            <p class="text-muted small"><?= htmlspecialchars($p['description']) ?></p>
            <p class="fw-bold">$<?= $p['price'] ?></p>
            <a href="manage_products.php?delete=<?= $p['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
</body></html>
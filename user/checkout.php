<?php include('../config.php'); include('navbar.php');
if(!isset($_SESSION['user'])){ header('Location:login.php'); }
$user_email = $_SESSION['user'];
$user = $conn->query("SELECT * FROM users WHERE email='$user_email'")->fetch_assoc();
if(isset($_POST['place_order']) && isset($_SESSION['cart']) && count($_SESSION['cart'])){
    $conn->query("INSERT INTO orders(user_id) VALUES (".intval($user['id']).")");
    $oid = $conn->insert_id;
    foreach($_SESSION['cart'] as $pid=>$qty){
        $conn->query("INSERT INTO order_items(order_id,product_id,quantity) VALUES (".intval($oid).", ".intval($pid).", ".intval($qty).")");
    }
    unset($_SESSION['cart']);
    echo '<div class="container mt-3"><div class="alert alert-success">Order placed! <a href="orders.php">View orders</a></div></div>';
}
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Checkout - ElectroStore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-4">
  <h2>Checkout</h2>
  <div class="card p-3">
    <p><strong>Pay on delivery demo</strong> — click confirm to place a demo order.</p>
    <form method="post"><button class="btn btn-primary" name="place_order">Confirm Order</button></form>
  </div>
</div>
</body></html>
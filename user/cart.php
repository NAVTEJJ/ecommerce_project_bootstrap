<?php include('../config.php'); include('navbar.php');
if(!isset($_SESSION['user'])){ header('Location:login.php'); }
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    if(!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
    if(isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id]++;
    else $_SESSION['cart'][$id] = 1;
    header('Location:cart.php'); exit;
}
if(isset($_GET['remove'])){ $r = intval($_GET['remove']); unset($_SESSION['cart'][$r]); header('Location:cart.php'); exit; }
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Cart - ElectroStore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-4">
  <h2>Your Cart</h2>
  <div class="table-responsive">
  <table class="table table-bordered bg-white">
    <thead class="table-dark"><tr><th>Product</th><th>Qty</th><th>Price</th><th>Action</th></tr></thead>
    <tbody>
    <?php $total=0; if(isset($_SESSION['cart']) && count($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $pid=>$qty){
        $res=$conn->query("SELECT * FROM products WHERE id=".intval($pid));
        $p=$res->fetch_assoc();
        $line = $p['price']*$qty; $total += $line;
        echo "<tr><td><img src='../{$p['image']}' style='height:60px;object-fit:cover;margin-right:10px;'/> {$p['name']}</td><td>{$qty}</td><td>$".number_format($line,2)."</td><td><a class='btn btn-sm btn-danger' href='cart.php?remove={$pid}'>Remove</a></td></tr>";
      }
    } else { echo "<tr><td colspan='4'>Cart is empty</td></tr>"; } ?>
    <tr><td colspan="2" class="text-end"><strong>Total</strong></td><td colspan="2">$<?php echo number_format($total,2); ?></td></tr>
    </tbody>
  </table>
  </div>
  <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
</div>
</body></html>
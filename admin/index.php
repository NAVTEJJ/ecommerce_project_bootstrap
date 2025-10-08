<?php include('../config.php');
// simple admin login (demo)
if(isset($_POST['login'])){
    $user = $_POST['username']; $pass = $_POST['password'];
    if(($user=='admin' && $pass=='admin123') || ($user=='admin@example.com' && $pass=='admin123')){
        $_SESSION['admin'] = $user; header('Location:dashboard.php'); exit;
    } else { $err = 'Invalid admin credentials'; }
}
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4>Admin Login</h4>
          <?php if(isset($err)) echo "<div class='alert alert-danger'>{$err}</div>"; ?>
          <form method="post">
            <input class="form-control mb-2" name="username" placeholder="username or email" required>
            <input class="form-control mb-2" name="password" type="password" placeholder="password" required>
            <button class="btn btn-primary w-100" name="login">Enter Dashboard</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body></html>
<?php include('../config.php'); include('navbar.php');
if(isset($_POST['login'])){
    $email = $conn->real_escape_string($_POST['email']);
    $pass = md5($_POST['password']);
    $r = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");
    if($r->num_rows){ $_SESSION['user'] = $email; header('Location:index.php'); }
    else { echo '<div class="container mt-3"><div class="alert alert-danger">Invalid login.</div></div>'; }
}
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Login - ElectroStore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4>Login</h4>
          <form method="post">
            <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
            <input class="form-control mb-2" name="password" type="password" placeholder="Password" required>
            <button class="btn btn-primary w-100" name="login">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body></html>
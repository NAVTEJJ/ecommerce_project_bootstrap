<?php include('../config.php'); include('navbar.php');
if(isset($_POST['register'])){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $pass = md5($_POST['password']);
    $conn->query("INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");
    echo '<div class="container mt-3"><div class="alert alert-success">Registered. You can <a href="login.php">login</a>.</div></div>';
}
?>
<!doctype html>
<html><head>
  <meta charset="utf-8"><title>Register - ElectroStore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4>Create Account</h4>
          <form method="post">
            <input class="form-control mb-2" name="name" placeholder="Full name" required>
            <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
            <input class="form-control mb-2" name="password" type="password" placeholder="Password" required>
            <button class="btn btn-success w-100" name="register">Create Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body></html>
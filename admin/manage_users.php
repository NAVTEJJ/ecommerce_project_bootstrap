<?php include('../config.php'); if(!isset($_SESSION['admin'])){ header('Location:index.php'); }
$users = $conn->query('SELECT * FROM users');
?>
<!doctype html><html><head>
  <meta charset="utf-8"><title>Manage Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container mt-4"><h2>Registered Users</h2><ul class="list-group"><?php while($u=$users->fetch_assoc()) echo "<li class='list-group-item'>{$u['name']} - {$u['email']}</li>"; ?></ul></div>
</body></html>
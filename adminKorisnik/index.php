<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="card">
<div class="card-header"><div class="card-title text-center">login</div></div>
<div class="card-body">
<form action="php/log.php" method="post">
<div class="form-group">
<input type="text" class="form-control" placeholder="korisnicko ime" name="korisnickoime">
<input type="text" class="form-control" placeholder="sifra" name="sifra">
<button class="btn btn-primary" name="login">login</button>
</div>
</form>
</div>
</div>
</div>

</body>
</html>
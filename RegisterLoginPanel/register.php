<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-2"></div>
<div class="col-8">
<div class="card bg-dark text-white">
<div class="card-header">Register</div>
<div class="card-body">
<form action="php/register.php" method="post">
<div class="form-group">
<label for="name">Ime</label>
<input type="text" name="name" id="name" class="form-control">
</div>
<div class="form-group">
<label for="lastname">Prezime</label>
<input type="text" name="lastname" id="lastname" class="form-control">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" id="password" class="form-control">
</div>
<div class="form-group">
<label for="repassword">Re-Password</label>
<input type="password" name="repassword" id="repassword" class="form-control">
</div>
<div class="form-group">
<textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
<div class="card-footer">
<?php

if(isset($_REQUEST["error"])){
    if($_REQUEST["error"]==1){
        echo "<div class='alert alert-danger' role='alert'>";
        echo 'Sifre se ne poklapaju';
        echo '</div>';
    }
   else if($_REQUEST["error"]==2){
        echo "<div class='alert alert-danger' role='alert'>";
        echo 'Postojeci korisnik';
        echo '</div>';
    }
}


?>

</div>
</div>
</div>
</div>
</div>
    <!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
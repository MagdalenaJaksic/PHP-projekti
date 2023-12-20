<?php
include "php/connection.php";
session_start();
if( !isset($_SESSION["priv"])){
    die(header("Location: index.php?error=2"));
}

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
<body class="bgc">
<div class="container">
<div class="row">
<div class="col-2"></div>
<div class="col-8">

<?php

$informacije="SELECT * FROM korisnici";
$rez=mysqli_query($conn,$informacije);
while($kupi = $rez->fetch_object()){
    echo'<div class="card bg-dark text-white">';
    echo'<div class="card-header">PANEL</div>';
    echo'<div class="card-body">';
    echo'<h3 class="card-title">Hello '.$kupi->name.' '.$kupi->lastname.'</h3>';
   echo' <p class="card-text">';
   echo $kupi->email;
   echo '<br>';
   echo $kupi->message;
    echo '</p>';
    echo '<a href="php/logout.php" class="btn btn-primary">Logout</a>';
    
   echo' </div>';
    echo '<div class="card-footer">';
    echo '</div>';
    echo '</div>';
}

?>
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
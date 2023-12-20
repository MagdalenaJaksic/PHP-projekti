<?php
session_start();
if(isset($_SESSION["sessionid"])){
    
    $korisnickoime=$_SESSION["korisnickoime"];
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
<body>
<div class="container">
<div class="card">
<div class="card-header"><div class="card-title">Pozdrav <?php echo $korisnickoime;?></div></div>
<div class="card-body">
<form action="php/prigovori.php" method="POST">
<div class="form-group">
<textarea name="prigovor" id="" cols="30" rows="10" class="form-control"></textarea>
<button class="btn btn-primary" name="posalji">posalji</button>
</div>
</form>
<a href="php/logout.php" class="btn btn-danger">logout</a>
</div>
</div>
</div>
<div class="svi">
<?php
include "php/connection.php";
$upitPrig="SELECT * FROM prigovori WHERE imekorisnika='$korisnickoime'";
$rezPrig=mysqli_query($conn,$upitPrig);
if(mysqli_num_rows($rezPrig)>0){
    while($row=mysqli_fetch_assoc($rezPrig)){
        echo '<div class="card">';
        echo '<div class="card-title">'.$row["imekorisnika"].'</div>';
        echo '<div class="card-body">'.$row["prigovor"].'</div>';
        echo '<div class="card-footer">'.$row["odgovor"].'</div>';
        echo '</div>';
    }
}
?>
</div>
    <!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
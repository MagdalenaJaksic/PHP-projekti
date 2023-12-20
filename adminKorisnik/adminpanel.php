<?php
include "php/connection.php";
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

<div class="container-fluid">
<div class="row">
<?php
$upitAd="SELECT * FROM prigovori";
$rezAd=mysqli_query($conn,$upitAd);
if(mysqli_num_rows($rezAd)>0){
    while($row=mysqli_fetch_assoc($rezAd)){
        echo '<div class="card col-3">'.$row["imekorisnika"].'<br>'.$row["prigovor"];
        echo '<form action="php/odgovori.php" method="post">';
        if($row["odgovor"]==""){
        echo '<input type="text" name="odgovor" class="form-control">';
        } else {
            echo '<div>odgovorili ste : '.$row["odgovor"].'</div>';
        }
        echo '<input type="hidden" name="ime" class="form-control" value="'.$row["imekorisnika"].'">';
        echo '<input type="hidden" name="prigovor" class="form-control" value="'.$row["prigovor"].'">';
        echo '<button class="btn btn-primary" name="odgovori">odgovori</button>';
        echo '</form></div>';
    }
}

?>
</div>
<a href="php/logout.php" class="btn btn-danger">logout</a>
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
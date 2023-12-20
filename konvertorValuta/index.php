<?php
include "php/connection.php";
session_start();
if(isset($_SESSION["id"])){
    $vrednostUnos = $_SESSION['vrednostUnos'];
$izVrednost = $_SESSION['izVrednost'];
$uVrednost = $_SESSION['uVrednost'];
$uKurs = $_SESSION['uKurs'];
$izKurs = $_SESSION['izKurs'];
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
<div class="card-header"><h4 class="card-title">konvertor</h4></div>
<div class="card-body">
<form action="php/podaci.php" method="post">
<div class="input-group">
<div class="row">
<input type="text" class="form-control col" id="vrednostUnos" name="vrednostUnos" value="<?php echo isset($_SESSION["vrednostUnos"]) ? $_SESSION["vrednostUnos"]: "" ?>">
<div class="col"></div>
<select name="izKurs" id="izKurs" class="form-control col-3">
<?php
$upitDva="SELECT valuta FROM valute";
$rezDva=mysqli_query($conn,$upitDva);
if(mysqli_num_rows($rezDva)>0){
    while($row=mysqli_fetch_assoc($rezDva)){
        $selected=($row["valuta"]==$izKurs && isset($izKurs))? "selected" : "";
        echo '<option value='.$row["valuta"].' '.$selected.'>'.$row["valuta"].'</option>';
    }
}
?>
</select>
<div class="col"></div>
<select name="uKurs" id="uKurs" class="form-control col-3">
<?php
$upitDva="SELECT valuta FROM valute";
$rezDva=mysqli_query($conn,$upitDva);
if(mysqli_num_rows($rezDva)>0){
    while($row=mysqli_fetch_assoc($rezDva)){
        $selected=($row["valuta"]==$uKurs)? "selected" : "";
        echo '<option value='.$row["valuta"].' '.$selected.'>'.$row["valuta"].'</option>';
    }
}
?>
</select>
<div class="col"></div>
<button class="btn btn-primary col" name="konvertuj">konvertuj</button>
</div>
</div>
</form>
</div>
<div class="card-footer">
<p> Rezultat: <span>
<?php 
if(isset($vrednostUnos)){
$rezultat=($vrednostUnos*$izVrednost)/$uVrednost;
echo $rezultat;
}
?></span></p>
</div>
</div>
<table class="table">
<thead>
<th>Valuta</th>
<th>Vrednost</th>
</thead>
<tbody>
<?php
$upit="SELECT * FROM valute WHERE indx=0 ";
$rez=mysqli_query($conn,$upit);
if(mysqli_num_rows($rez)>0){
    while($row=mysqli_fetch_assoc($rez)){
        echo '<tr><td>'.$row["valuta"].'</td><td>'.$row["vrednost"].'</td></tr>';
    }
}

?>
</tbody>
</table>
</div> 


    <!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
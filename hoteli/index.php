<?php
session_start();
if(isset ($_SESSION["id"])){
    echo "zapoceta";
    $goingTo = $_SESSION["goingto"];
    $travelers = $_SESSION["travelers"];
    $rooms = $_SESSION["rooms"];
    $flight= isset($_SESSION['flight']) ? "Da": "Ne";
    $car= isset($_SESSION['car']) ? "Da": "Ne";
    $hotelnaziv = $_SESSION["hotelnaziv"];
    $hotelmesto = $_SESSION["hotelmesto"];
    $hotelcena = intval($_SESSION["hotelcena"]);
    $checkin = strtotime($_SESSION["checkin"]);
$checkout = strtotime($_SESSION["checkout"]);
$brojDana=($checkout-$checkin)/(20*60*60);
if (!isset($_SESSION["poslata"])) {
    $_SESSION["poslata"] = false;
}
$poslata=$_SESSION["poslata"];
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
<h1>Hotels</h1>

<form action="php/pretraga.php" class="form" method="post">
<div class="input-group">
<div class="row">
<input type="text" class="goingto form-control col-3" name="goingto" value="<?php echo isset($_SESSION['goingto']) ? $_SESSION['goingto'] : ''; ?>">
<div class="col"></div>
<input type="date" class="form-control checkin col-2" name="checkin" value="<?php echo isset($_SESSION['checkin']) ? $_SESSION['checkin'] : ''; ?>">
<div class="col"></div>
<input type="date" class="form-control checkout col-2" name="checkout" value="<?php echo isset($_SESSION['checkout']) ? $_SESSION['checkout'] : ''; ?>">
<div class="col"></div>
<select class="travelers form-control col-2" id="travelers" name="travelers">
    <option value="1" <?php echo isset($_SESSION['travelers']) && $_SESSION['travelers'] === '1' ? 'selected' : ''; ?>>1</option>
    <option value="2" <?php echo isset($_SESSION['travelers']) && $_SESSION['travelers'] === '2' ? 'selected' : ''; ?>>2</option>
    <option value="3" <?php echo isset($_SESSION['travelers']) && $_SESSION['travelers'] === '3' ? 'selected' : ''; ?>>3</option>
</select>
<div class="col"></div>
<select class="rooms form-control col-2" id="rooms" name="rooms">
    <option value="1" <?php echo isset($_SESSION['rooms']) && $_SESSION['rooms'] === '1' ? 'selected' : ''; ?>>1</option>
    <option value="2" <?php echo isset($_SESSION['rooms']) && $_SESSION['rooms'] === '2' ? 'selected' : ''; ?>>2</option>
    <option value="3" <?php echo isset($_SESSION['rooms']) && $_SESSION['rooms'] === '3' ? 'selected' : ''; ?>>3</option>
</select>
</div>
<div class="input-group">
<div class="row">
    <input type="checkbox" class="flight" name="flight" <?php echo isset($_SESSION["flight"]) ? "checked" : ""; ?>>
    <label for="flight">add a flight</label>
    <div class="col"></div>
    <input type="checkbox" class="car" name="car" <?php echo isset($_SESSION["car"]) ? "checked" : ""; ?>>
    <label for="car">add a car</label>
</div>

</div>
</div>
<button type="submit" class="btn btn-primary search" name="search">search</button>
</form>
<div class="hotels">
<?php 
include "php/connection.php";
$upit="SELECT * FROM hotelitabela WHERE mesto='$goingTo'";
$rez=mysqli_query($conn,$upit);
if(mysqli_num_rows($rez)>0){
    while($row=mysqli_fetch_assoc($rez)){
        echo '<form action="php/kupovina.php" method="post">';
        echo '<div class="card">';
        echo '<img class="img-top" src="data:image/jpeg;base64,'.base64_encode($row["slika"]).'  " width="200" height="200">';
        echo '<div class="card-body">';
        echo "Ime: " .$row["naziv"];
        echo '<input type="hidden" name="hotelnaziv" value="'.$row["naziv"].'">';
        echo "<br>";
        echo "Mesto: " .$row["mesto"];
        echo '<input name="hotelmesto" type="hidden" value="'.$row["mesto"].'">';
        echo "<br>";
        echo "Cena po nocenju: ".$row["cenaPoNoci"];
        echo '<input name="hotelcena" type="hidden" value="'.$row["cenaPoNoci"].'">';
        echo '<input name="hotelid" type="hidden" value="'.$row["id"].'">';
        echo "<br>";
        echo "</div>";
        echo "<div class='card-footer'>";
        echo "<button class='btn btn-success submit' name='submit'>submit</button>";
       
        echo "</div>";
        echo "</div>";
        echo'</form>';
    }
}


?>
</div>
<div class="racun">
<?php
if($poslata===true){

    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Informacije o hotelu</th><th>Ukupno i dodatni troskovi</th></thead><tbody><tr>';
    echo '<td>Naziv: ' . $hotelnaziv . '</td>';
    
    $ukupnacena = $hotelcena * $brojDana * $travelers * $rooms;
    
    echo '<td>Ukupna cena: ' . $ukupnacena . '</td>';
    echo '</tr><tr>';
    echo '<td>Mesto: ' . $hotelmesto . '</td><td>Let: ' . $flight . '</td></tr>';
    echo '<tr><td>Cena po noci: ' . $hotelcena . '</td><td>Kola: ' . $car . '</td></tr></tbody></table>';
}

?>



</div>
</div>







</body>
</html>
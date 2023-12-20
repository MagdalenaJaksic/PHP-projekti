<?php 
include "connection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $goingto=$_POST["goingto"];
    $checkin=$_POST["checkin"];
    $checkout=$_POST["checkout"];
    $travelers=$_POST["travelers"];
    $rooms=$_POST["rooms"];
    $flight=$_POST["flight"];
    $car=$_POST["car"];
    $_SESSION["goingto"]=$goingto;
    $_SESSION["checkin"]=$checkin;
    $_SESSION["checkout"]=$checkout;
    $_SESSION["travelers"]=$travelers;
    $_SESSION["rooms"]=$rooms;
    $_SESSION["flight"]=$flight;
    $_SESSION["car"]=$car;

    $id=session_id();
  //  echo $id;
    $_SESSION["id"]=$id;
   header("Location: ../index.php");
   exit();
}
?>

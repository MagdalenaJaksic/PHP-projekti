<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "connection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["submit"])){
  $poslata=true;
  $_SESSION["poslata"]=$poslata;
  $hotelmesto=$_POST["hotelmesto"];
  $hotelnaziv=$_POST["hotelnaziv"];
  $hotelcena=$_POST["hotelcena"];
  $hotelid=$_POST["hotelid"];
  
  $_SESSION["hotelid"]=$hotelid;
  $_SESSION["hotelnaziv"]=$hotelnaziv;
  $_SESSION["hotelmesto"]=$hotelmesto;
  $_SESSION["hotelcena"]=$hotelcena;
 

 header("Location: ../index.php");
 exit();
}

?>

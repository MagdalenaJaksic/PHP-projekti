<?php
include "connection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $odgovor=$_POST["odgovor"];
    $ime=$_POST["ime"];
    $prigovor=$_POST["prigovor"];

    $upit="UPDATE prigovori SET odgovor='$odgovor' WHERE imekorisnika='$ime' AND prigovor='$prigovor'";
   $rez=mysqli_query($conn,$upit);
   if($rez){
       header("Location: ../adminpanel.php");
   }
}
?>
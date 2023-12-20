<?php
include "connection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $prigovor=$_POST["prigovor"];
    $korisnickoime=$_SESSION["korisnickoime"];
    $upit="INSERT INTO prigovori(prigovor,imekorisnika,odgovor) VALUES ('$prigovor','$korisnickoime','')";
    $rez=mysqli_query($conn,$upit);
    if($rez){
        header("Location:../userpanel.php");
    }
}
?>
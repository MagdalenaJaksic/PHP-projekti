<?php

include "connection.php";
session_start();

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $korisnickoime=$_POST["korisnickoime"];
    $sifra=$_POST["sifra"];
    $_SESSION["korisnickoime"]=$korisnickoime;
    $sessionid=session_id();
    $_SESSION["sessionid"]=$sessionid;
    $upit="SELECT * FROM logovanje WHERE korisnickoime='$korisnickoime' AND sifra='$sifra'";
    $rez=mysqli_query($conn,$upit);
    if(mysqli_num_rows($rez)===1){
     $row=mysqli_fetch_assoc($rez);
   
     if($row["priv"]==0){
         header("Location: ../userpanel.php");
     } else if($row["priv"]==1){
         header("Location: ../adminpanel.php");
     }
    }
  


}

?>
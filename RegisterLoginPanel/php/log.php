<?php 
include "connection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $email=stripslashes($_POST["email"]);
    $password=stripslashes($_POST["password"]);
    $md5=md5($password);

    $provera="SELECT * FROM korisnici WHERE email='$email' AND password='$md5'";
    $rez=mysqli_query($conn,$provera);
    if(mysqli_num_rows($rez)==1){
$podaci= $rez->fetch_object();
$_SESSION["name"]=$podaci->name;
$_SESSION["lastname"]=$podaci->lastname;
$_SESSION["email"]=$podaci->email;
$_SESSION["message"]=$podaci->message;
$_SESSION["priv"]=$podaci->priv;
header("Location: ../panel.php");

    } else {
        die(header("Location: ../index.php?error=1"));
    }
}
?>
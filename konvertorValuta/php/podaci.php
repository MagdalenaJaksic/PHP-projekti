<?php
include "connection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id=session_id();
    $_SESSION["id"]=$id;
$vrednostUnos=intval($_POST["vrednostUnos"]);
$_SESSION['vrednostUnos'] = $vrednostUnos;
$izKurs=$_POST["izKurs"];
$_SESSION['izKurs'] = $izKurs;
$uKurs=$_POST["uKurs"];
$_SESSION['uKurs'] = $uKurs;

$query1="SELECT vrednost FROM valute WHERE valuta='$izKurs'";
$rez1=mysqli_query($conn,$query1);
if(mysqli_num_rows($rez1)===1){
    $row=mysqli_fetch_assoc($rez1);
    $izVrednost=$row["vrednost"];
    $_SESSION['izVrednost'] = $izVrednost;
    
}
$query2="SELECT vrednost FROM valute WHERE valuta='$uKurs'";
$rez2=mysqli_query($conn,$query2);
if(mysqli_num_rows($rez2)===1){
    $row=mysqli_fetch_assoc($rez2);
    $uVrednost=$row["vrednost"];
    $_SESSION['uVrednost'] = $uVrednost;
    
}
header("Location: ../index.php");
}
?>




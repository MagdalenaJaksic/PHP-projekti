<?php
$host="localhost";
$user="root";
$password="";
$db="hoteli";

$conn= new mysqli($host,$user,$password,$db);
if($conn->connect_error){
    die("greska sa konekcijom na bazu".$conn->connect_error);
}


?>
<?php

$host="localhost";
$user="root";
$password="";
$db="kursevi";
$conn= new mysqli($host,$user,$password,$db);
if($conn->connect_error){
    die("greska: ".$conn->connect_error);
}
?>
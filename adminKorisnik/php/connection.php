<?php

$host="localhost";
$username="root";
$password="";
$db="okt22";

$conn=new mysqli($host,$username,$password,$db);
if($conn->connect_error){
    die("greska".$conn->connect_error);
}

?>
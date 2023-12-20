<?php

$host="localhost";
$username="root";
$password="";
$database="forme";


$conn=new mysqli($host,$username,$password,$database);

if($conn->connect_error){
    die("error with conn".$conn->connect_error);
}

?>
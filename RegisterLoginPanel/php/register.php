<?php

include "connection.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $repassword=$_POST["repassword"];
    $message=$_POST["message"];
    $priv=0;

    if($password != $repassword){
        die(header("Location: ../register.php?error=1"));
    } else {
     $proverapostojeceg="SELECT * from korisnici where email='$email'";
     $rezultat=mysqli_query($conn,$proverapostojeceg);
     if(mysqli_num_rows($rezultat)>0){
         die(header("Location: ../register.php?error=2"));
     }
  
    }

$stmt=$conn->prepare("INSERT INTO korisnici(name,lastname,email,password,message,priv) VALUES(?,?,?,?,?,?);");
$stmt->bind_param("ssssss",$name,$lastname,$email,md5($password),$message,$priv);
if($stmt->execute()){
    header("Location: ../index.php?success=1");
} else {
    die("Greska sa registracijom");
}
}


?>
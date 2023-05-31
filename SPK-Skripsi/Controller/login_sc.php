<?php
//connect databasse//
require '../Include/db.php';

//Backend//
if (isset($_POST["button"])){
  $email = $_POST["email"];
  $pass = $_POST["password"];
  $cek = mysqli_query($db, "SELECT * FROM admin WHERE email = '$email'");
  
  if(mysqli_num_rows($cek)=== 1){
    $liat = mysqli_fetch_assoc ($cek);
    if (password_verify($pass,$liat["password"])){
      $_SESSION ["masuk"]= true ;
      header("Location: admin.php");
      exit();
    }
  }
  $tap = true;

}
?>
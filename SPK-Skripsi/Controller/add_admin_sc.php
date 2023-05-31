<?php
//connect databasse//
require '../Include/db.php';

//Backend//
if(isset($_POST["submit"])){
    
        if(add($_POST) > 0){
            header("Location: admin.php");
        } else{
            echo "
                <script>
                    alert('Data Admin Baru Gagal Ditambahkan!');
                </script>
            ";
        }
}

function add($detail){
    global $db;

    $email = stripslashes($detail["email"]);
    $password = mysqli_real_escape_string($db, $detail["password"]);

    $result = mysqli_query($db, "SELECT email FROM admin WHERE email = '$email'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('email sudah terdaftar');
             </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $tambah = mysqli_query($db, "INSERT INTO admin VALUES('','$email', '$password')");
    //var_dump($tambah);//
    return mysqli_affected_rows($db);
}
?>
<?php
//connect databasse//
require '../Include/db.php';
$id= $_GET ["id"];
mysqli_query($db, "DELETE FROM kamera WHERE kamera_id = $id");
header("Location: ../View/admin.php");
?>

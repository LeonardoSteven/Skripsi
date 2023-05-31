<?php
//connect databasse//
require '../Include/db.php';
$id= $_GET["id"];
$kam= query("SELECT * FROM kamera 
JOIN brand ON kamera.brand_id = brand.brand_id 
WHERE kamera.brand_id=$id");

?>
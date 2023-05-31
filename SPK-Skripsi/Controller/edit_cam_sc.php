<?php
require '../Include/db.php';
$id = $_GET['id'];
$kamera = query("SELECT * FROM kamera WHERE kamera_id=$id")[0];
// var_dump($kamera);
if (isset($_POST["edit"])) {
    $pos = $_POST['brand'];
    $rip = query("SELECT * FROM brand WHERE brand_id = $pos");
    if (edit($_POST) > 0) {
        header("Location: ../View/admin.php");
        exit;
    } else {
        echo mysqli_error($db);
    }
}
function edit($kamera){
    global $db;
    global $id;
   
    $is = query("SELECT * FROM iso");
    $beb = query("SELECT * FROM beban");
    $har = query("SELECT * FROM harga");
    $pix = query("SELECT * FROM pixel");

    $brand = $kamera["brand"];
    $tipe = $kamera["tipe"];
    $pixel = $kamera["pix"];
    $harga = $kamera["harga"];
    $resolution = $kamera["reso_name"];
    $iso = $kamera["iso"];
    $shutter = $kamera["shutter"];
    $beban = $kamera["beban"];
    $rareso = $kamera["resolution"];
    $rashutter = $kamera["ra_shutter"];

    for ($a = 0; $a < count($is); $a++) {
        if ($iso >= $is[$a]['min_iso'] && $iso <= $is[$a]['max_iso']) {
            $iso_id = $is[$a]['iso_id'];
        }
    }
    for ($a = 0; $a < count($beb); $a++) {
        if ($beban >= $beb[$a]['min_beban'] && $beban <= $beb[$a]['max_beban']) {
            $beban_id = $beb[$a]['beban_id'];
        }
    }
    for ($a = 0; $a < count($har); $a++) {
        if ($harga >= $har[$a]['min_harga'] && $harga <= $har[$a]['max_harga']) {
            $harga_id = $har[$a]['harga_id'];
        }
    }
    for ($a = 0; $a < count($pix); $a++) {
        if ($pixel >= $pix[$a]['min_pixel'] && $pixel <= $pix[$a]['max_pixel']) {
            $pixel_id = $pix[$a]['pixel_id'];
        }
    }
    
    $old_img = $kamera["cek"];
    if($_FILES["img"] ["error"] === 4){
        $kamera_img =  $old_img;
    } else{
        $kamera_img = cekimg();
    }

    mysqli_query($db, "UPDATE kamera SET pixel_id = '$pixel_id' , resolution_id = '$rareso' , ISO_id = '$iso_id' , shutter_id = '$rashutter', beban_id = '$beban_id', harga_id = '$harga_id', brand_id = '$brand', kamera_name = '$tipe', kamera_img = '$kamera_img', pixel = '$pixel', resolution = '$resolution', iso = '$iso', shutter = '$shutter', beban = '$beban' WHERE kamera_id = '$id'  ");
return mysqli_affected_rows($db);
}

function cekimg()
{
    global $rip;
    $fileName = $_FILES['img']['name'];
    $tmpName = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];

    // cek apakah yg diupload adalah gambar
    $valimg = ['jpg', 'jpeg', 'png'];
    $eksimg = explode('.', $fileName);
    $eksimg = strtolower(end($eksimg));

    // cek apakah tidak ada gambar yg diuplaod
    if ($error === 4) {
        $newFileName = "default.png";
    } else {
        if (!in_array($eksimg, $valimg)) {
            echo "
                    <script>
                        alert('Yang diupload bukan gambar!');
                    </script>
                ";
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $eksimg;
        move_uploaded_file($tmpName, '../Assets Kamera/' . $rip[0]['brand_name'] . '/' . $newFileName);
    }

    return $newFileName;
}

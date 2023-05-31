<?php
//connect databasse//
require '../Include/db.php';

//Backend//
if (isset($_POST["submit"])) {
    $pos = $_POST['brand'];
    $rip = query("SELECT * FROM brand WHERE brand_id = $pos");
    if (addcam($_POST) > 0) {
        header("Location: ../View/admin.php");
        exit;
    } else {
        echo mysqli_error($db);
    }
}

function addcam($add)
{
    global $db;
    $is = query("SELECT * FROM iso");
    $beb = query("SELECT * FROM beban");
    $har = query("SELECT * FROM harga");
    $pix = query("SELECT * FROM pixel");


    $brand = $add["brand"];
    $tipe = $add["tipe"];
    $pixel = $add["pix"];
    $harga = $add["harga"];
    $resolution = $add["reso_name"];
    $iso = $add["iso"];
    $shutter = $add["shutter"];
    $beban = $add["beban"];
    $rareso = $add["resolution"];
    $rashutter = $add["ra_shutter"];
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


    // $rip = query("SELECT * FROM brand WHERE brand_id = $brand");


    $img = cekimg();
    if (!$img) {
        return false;
    }
    mysqli_query($db, "INSERT INTO kamera VALUES ('','$pixel_id','$rareso','$iso_id','$rashutter','$beban_id','$harga_id','$brand','$tipe','$harga','$img','$pixel','$resolution','$iso','$shutter','$beban')");
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

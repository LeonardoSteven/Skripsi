<?php
require '../Include/db.php';

if(isset($_POST["sub"])){
    $_SESSION["sub"] = true;

    $cameras = query("SELECT * FROM kamera 
            JOIN harga ON kamera.harga_id=harga.harga_id
            JOIN pixel ON kamera.pixel_id=pixel.pixel_id
            JOIN brand ON kamera.brand_id=brand.brand_id
            JOIN resolution ON kamera.resolution_id=resolution.resolution_id
            JOIN iso ON kamera.iso_id=iso.iso_id
            JOIN shutter ON kamera.shutter_id=shutter.shutter_id
            JOIN beban ON kamera.beban_id=beban.beban_id
            ");

    // var_dump($cameras);die;

    // min max bobot
    $minhargaBobot = query("SELECT MIN(bobot_harga) as 'min_harga' FROM kamera JOIN harga ON kamera.harga_id=harga.harga_id");
    $maxpixelBobot = query("SELECT MAX(pixel.bobot_pixel) as 'max_pixel' FROM kamera JOIN pixel ON kamera.pixel_id=pixel.pixel_id");
    $maxresolutionBobot = query("SELECT MAX(resolution.bobot_resolution) as 'max_resolution' FROM kamera JOIN resolution ON kamera.resolution_id=resolution.resolution_id");
    $maxisoBobot = query("SELECT MAX(iso.bobot_iso) as 'max_iso' FROM kamera JOIN iso ON kamera.iso_id=iso.iso_id");
    $maxshutterBobot = query("SELECT MAX(shutter.bobot_shutter) as 'max_shutter' FROM kamera JOIN shutter ON kamera.shutter_id=shutter.shutter_id");
    $maxbebanBobot = query("SELECT MAX(beban.bobot_beban) as 'max_beban' FROM kamera JOIN beban ON kamera.beban_id=beban.beban_id");

    // var_dump($minhargaBobot);
    // var_dump($maxpixelBobot);
    // var_dump($maxresolutionBobot);
    // var_dump($maxisoBobot);
    // var_dump($maxshutterBobot);
    // var_dump($maxbebanBobot);
    // die;

    // saw
    $bobot = [
        $_POST["harga"],
        $_POST["pixel"],
        $_POST["reso"],
        $_POST["iso"],
        $_POST["shutter"],
        $_POST["beban"]
    ];

    // var_dump($bobot);
    // die;

    // normalisasi
    foreach($cameras as $key => $kam){
        $r[$key]["kamera_id"] = $kam["kamera_id"];
        $r[$key]["kamera_name"] = $kam["kamera_name"];
        $r[$key]["kamera_img"] = $kam["kamera_img"];
        $r[$key]["kamera_harga"] = $kam["kamera_harga"];
        $r[$key]["kamera_brand"] = $kam["brand_name"];
        $r[$key]["harga"] = $minhargaBobot[0]["min_harga"]/$kam["bobot_harga"];
        $r[$key]["pixel"] = $kam["bobot_pixel"]/$maxpixelBobot[0]["max_pixel"];
        $r[$key]["resolution"] = $kam["bobot_resolution"]/$maxresolutionBobot[0]["max_resolution"];
        $r[$key]["iso"] = $kam["bobot_iso"]/$maxisoBobot[0]["max_iso"];
        $r[$key]["shutter"] = $kam["bobot_shutter"]/$maxshutterBobot[0]["max_shutter"];
        $r[$key]["beban"] = $kam["bobot_beban"]/$maxbebanBobot[0]["max_beban"];
    }

    // nilai preferensi (v)
    foreach($r as $key => $saw){
        $v[$key]["kamera_id"] = $saw["kamera_id"];
        $v[$key]["kamera_name"] = $saw["kamera_name"];
        $v[$key]["kamera_img"] = $saw["kamera_img"];
        $v[$key]["kamera_harga"] = $saw["kamera_harga"];
        $v[$key]["kamera_brand"] = $saw["kamera_brand"];
        $v[$key]["harga"] = $bobot[0] * $saw["harga"];
        $v[$key]["pixel"] = $bobot[1] * $saw["pixel"];
        $v[$key]["resolution"] = $bobot[2] * $saw["resolution"];
        $v[$key]["iso"] = $bobot[3] * $saw["iso"];
        $v[$key]["shutter"] = $bobot[4] * $saw["shutter"];
        $v[$key]["beban"] = $bobot[5] * $saw["beban"];
        $v[$key]["v"] = $v[$key]["harga"] + $v[$key]["pixel"] + $v[$key]["resolution"] + $v[$key]["iso"] + $v[$key]["shutter"] + $v[$key]["beban"];
    }
    
    // merging $v datas into array
    $v_total = array();
    foreach($v as $nul => $sum){
        $v_total[] = array_merge($v_total, $v);
    }

    $counter = 0;
    foreach($v_total as $v_sum){
        // get first iteration of $v_total[] foreach loop
        if($counter == 0){
            $saw_cameras = $v_sum;

            // var_dump($saw_cameras);
        }
        $counter++;
    }

    // sorting
    foreach($saw_cameras as $key => $value){
        $sort["v"][$key] = $value["v"];

        // var_dump($sort["v"][$key]);
    }

    array_multisort($sort["v"], SORT_DESC, $saw_cameras);

    // var_dump($sort["v"]);

    //pagination
    $results = array();
    $temp = [];
    for ($i = 0; $i < count($saw_cameras); $i++)
    {
        
        if ($i != 0 && $i % 10 == 0){
            array_push($results, $temp);
            $temp = [];
        }
        array_push($temp, $saw_cameras[$i]);
    }
    if (count($temp) !== 0){
        array_push($results, $temp);
    }

// var_dump($results);
// die;

    // $result['saw_cameras_5'] = array_slice($saw_cameras, 0, 43);
    
    // var_dump($result['saw_cameras_5']);
    // die;

    $_SESSION["saw_cameras_5"] = $results;
   
    // var_dump($_SESSION["saw_cameras_5"]);
    // die;

    header("Location: hasil_rekom.php");
    exit;
}
?>
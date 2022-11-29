<?php
    
    $img = $_POST['image'];
    $folderPath = "upload/";
  
    $fetch_imgParts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $fetch_imgParts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($fetch_imgParts[1]);
    $img_name = uniqid() . '.png';
  
    $file = $folderPath . $img_name;
    file_put_contents($file, $image_base64);
  
    print_r($img_name);
  
?>
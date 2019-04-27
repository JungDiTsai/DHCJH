<?php
    $upload_dir = "images//";
    if( ! file_exists($upload_dir ))
    mkdir($upload_dir);
    $img = $_REQUEST["imgURL"]; //取得ajax的值
    
    $img = str_replace('data:image/jpeg;base64,', '', $img);// 處理base64轉碼
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    
    $fileName = date("Ymd");
    $file = $upload_dir . $fileName . ".jpeg";
    $success = file_put_contents($file, $data);
    echo $success ? $file : 'Unable to save the file.';  
?>
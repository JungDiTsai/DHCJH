<?php

    $orderNo = $_REQUEST["orderNo"];
    $saveDir ="../../images//flyer//member_";
    $dir = "../../images//flyer//";
    $file = "$saveDir$orderNo.jpg"; //更改儲存的檔名
    $img = $_REQUEST["imgURL"]; //取得ajax的值

    // ------處理base64轉碼---------------------------------------
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    // -----------------------------------------------------------
    $success = file_put_contents($file, $data);
    echo "images/flyer/member_$orderNo.jpg";
?>
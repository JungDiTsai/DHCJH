<?php
    $dir = "../../images//flyer//";
    $FileNum=count(glob("$dir/*.*"))+1;
    $file = "$dir$FileNum.jpg"; //更改儲存的檔名
    $img = $_REQUEST["imgURL"]; //取得ajax的值

    // ------處理base64轉碼---------------------------------------
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    // -----------------------------------------------------------
    $success = file_put_contents($file, $data);
    // file_put_contents(file,data,mode,context)
    // file 必需。規定要寫入數據的文件。如果文件不存在，則創建一個新文件。
    // data 可選。規定要寫入文件的數據。可以是字符串、數組或數據流。
    // mode 可選。規定如何打開/寫入文件。可能的值：FILE_USE_INCLUDE_PATH 、 FILE_APPEND 、 LOCK_EX
    // context 可選。規定文件句柄的環境。是一套可以修改流的行為的選項。若使用null，則忽略。




    //Json API
    $json = file_get_contents("24hours.json");
    //獲得json文件的內容
    $jsonData = json_decode ($json, true);
    $number = count($jsonData);
    //取得前一天的數值
    $lastDay = date("Y-m-d H:i:s",strtotime("-3 day"));
    $now = date("Y-m-d H:i:s");
    //解碼成數組
    //處理過期的圖檔
    for ($i=0; $i < $number; $i++) { 
        if(strtotime($jsonData[$i]["time"])<strtotime($lastDay)){
            unset($jsonData[$i]);
        }
    }
    //給它賦予新的值
    $jsonData[$number+1]["time"]= $now;
    $jsonData[$number+1]["src"]= "images/flyer/$FileNum.jpg";
    sort($jsonData);
    //還原成.json文件
    $newdata = json_encode($jsonData);
    //保存到原來的文件中
    file_put_contents('24hours.json', $newdata);
    echo $newdata;
?>
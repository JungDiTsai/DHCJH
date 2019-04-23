<?php
switch($_FILES['updateInput']['error']){
    case 0:
            
            $dir = "../../images//flyerUpload//";
            $FileNum=count(glob("$dir/*.*"))+1;
            $from = $_FILES['updateInput']['tmp_name'];
            $type = $_FILES['updateInput']['type'];
			$to = $dir . "$FileNum.png";
			copy($from, $to);
			echo "上傳成功<br>",$FileNum;
			break;	
	case 1:
			echo "上傳檔案太大, 不得超過", ini_get("upload_max_filesize") ,"<br>";
			break;
	case 2:
			echo "上傳檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
			break;
	case 3:
			echo "上傳檔案不完整<br>";
			break;
	case 4:
			echo "没選送檔案<br>";
			break;
	default:
			echo "請聯絡網站維護人員<br>";
			echo "error code : ", $_FILES['updateInput']['error'],"<br>";
}
?>
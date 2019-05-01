<?php
require_once("_connectDHC.php");
$memberNo=$_REQUEST['memberNo'];

switch($_FILES['memberImg']['error']){
    case 0:
            
            $dir = "../../images//member//";
            // $FileNum=count(glob("$dir/*.*"))+1;
            $from = $_FILES['memberImg']['tmp_name'];
            $type = $_FILES['memberImg']['type'];
			$to = $dir . "member_$memberNo.png";
			copy($from, $to);
			

			try {
				$sql = "UPDATE member SET memImgUrl='images/member/member_$memberNo.png' where memNo = $memberNo";
				$products = $pdo->exec($sql);
				
			 } catch (PDOException $e) {
				$errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
				$errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
			 }

			 echo "images/member/member_$memberNo.png";
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
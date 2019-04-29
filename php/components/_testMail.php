<?php
require("class.phpmailer.php");
require_once("_connectDHC.php");
$memMail = $_REQUEST['memMail'];
$errMsg='';
try {
    $sql = "SELECT * from member where memEmail = '$memMail';";
    
   $products = $pdo->query($sql);
   
} catch (PDOException $e) {
   $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
   $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
}
$number = $products->rowCount();
    
   if($number!=0){
    $psw = $products->fetch();

    //Send mail using gmail
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 465; // set the SMTP port for the GMAIL server
        $mail->Username = "cd106g1@gmail.com"; // =====GMAIL username
        $mail->Password = "iiicd106"; // =====GMAIL password
    
    //Typical mail data
    $mail->AddAddress("$memMail");//========收件者
    $mail->SetFrom("cd106g1@gmail.com");//========寄件者
    $mail->Subject = "台灣大舞台系統服務信箱--密碼查詢";//========
    $mail->Body = $psw['memName'] ."先生/小姐您好，您的密碼您的密碼是   ".$psw['memPsw'];//========
    
    try{
        $mail->Send();
        echo "Success!";
    } catch(Exception $e){
        //Something went bad
        echo "Fail - " . $mail->ErrorInfo;
    }
}else{
    echo '沒有找到此信箱';
}
    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php
require("class.phpmailer.php");
$memMail = $_REQUEST['memMail'];

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
$mail->AddAddress("receiver@gmail.com");//========收件者
$mail->SetFrom("cd106g1@gmail.com");//========寄件者
$mail->Subject = "台灣大舞台系統服務信箱--密碼查詢";//========
$mail->Body = "祝大家 ... 心涼脾透開 ...";//========

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}

?>
</body>
</html>
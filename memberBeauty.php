<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的發表</title>
    <link rel="stylesheet" href="css/memberBeauty.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <?php require_once("php/header.php");?>
    <?php require_once("php/loginLightBox.php");?>
    <?php require_once("php/components/_connectDHC.php"); ?>
    
    <!-- 並排 -->
    <div class="wrap">
        <?php require_once("php/memberTopNav.php");?>
      <!-- 我的收藏Card -->
      <article class="cardGroup col-md-10">
          <div class="myBeauty">
               <div class="beautyMessage">
                    <h3>我的選美</h3>
                    <?php
                        try {
                            $member =$_SESSION['member'][0][0];
                            
                            $sql = "SELECT * from orders where memNo = $member;";
                            $products = $pdo->query($sql);
                         } catch (PDOException $e) {
                            $errMsg = '';
                            $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                            $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                            echo $errMsg;
                         }
                         
                         $products = $products->fetchAll();
                         foreach ($products as $key => $data) {
                             $errMsg='';
                             try {
                                $member =$_SESSION['member'][0][0];
                                $sql = "SELECT * from message where orderno = $data[0];";
                                $products = $pdo->query($sql);
                                $number = $products->rowCount();
                             } catch (PDOException $e) {
                                $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                                $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                             }
                    ?>
                    <p>您發表的 <span><?php echo $data['orderName']; ?></span> 共有 <?php echo $number; ?>筆 留言<br><a href="beautyPageant.php#CarOrder<?php echo $data['orderNo'];?>">立即查看</a></p>
                    <?php } ?>
               </div>
          </div>
          <div class="myFootprint">
                <div class="myMessage">
                    <h3>我的留言</h3>
                    <?php
                         try {
                            $member =$_SESSION['member'][0][0];

                            $sql = "SELECT * from message join orders on orders.orderNo= message.orderNo where message.memno = $member;";
                            $products = $pdo->query($sql);
                         } catch (PDOException $e) {
                            $errMsg = '';
                            $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                            $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                            echo $errMsg;
                         }

                         $products = $products->fetchAll();
                         foreach ($products as $key => $data) {
                    ?>
                    <p>您在 <span><?php echo $data['orderName']; ?></span> 的留言<br><a href="beautyPageant.php#CarOrder<?php echo $data['orderNo'];?>">立即查看</a></p>
                         <?php } ?>
                </div>
          </div>
      </article>
</body>
</html>
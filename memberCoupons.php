<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>台灣大舞台-我的優惠券</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/logo.ico">
    <link rel="stylesheet" href="css/memberCoupons.css">
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
        <!-- 我的優惠券 -->
        <div class="col-md-10">
            <div class="allCoupons">
                <h3>我的優惠券</h3>
                <table>
                    <tr>
                        <th>編號</th>
                        <th>折扣</th>
                        <th>狀態</th>
                        <th>使用訂單</th>
                        <th>有效期限</th>
                    </tr>
                    <?php 
                    try {
                        $member =$_SESSION['member'][0][0];
                        $sql = "SELECT * from memcoupons left outer join orders on memcoupons.memCouponsNo = orders.memCouponsNo join coupons on memcoupons.couponsType = coupons.couponsType where memcoupons.memNo = $member;";
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
                    <tr>
                        <td><?php echo $data[0]?></td>
                        <td><?php echo $data['discount']?>元</td>
                        <td class="used"><?php echo $data['memStatus']?></td>
                        <td>
                            <?php
                                if($data['orderNo']!=null){
                                    echo $data['orderNo'];
                                }else{
                                    echo '-';
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if(strtotime(date('Y/m/d'))>strtotime($data['expiry'])){
                                    echo '已過期';
                                }else{
                                    echo $data['expiry'];
                                }
                            ?>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
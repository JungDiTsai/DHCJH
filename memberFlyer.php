<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>宣傳單管理</title>
    <link rel="stylesheet" href="css/memberFlyer.css">
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
        <!-- 我的宣傳單 -->
        <div class="col-md-10">
            <article class="AllflyerBox">
                <h3>所有宣傳單</h3>
                <table>
                    <tr>
                        <th>訂單編號</th>
                        <th>活動日期</th>
                        <th>狀態</th>
                        <th>人數統計</th>
                    </tr>
                    <tr class="out">
                        <td>2020202</td>
                        <td>2019-03-02</td>
                        <td>已過期</td>
                        <td>126人</td>
                    </tr>
                    <tr>
                        <td>2020203</td>
                        <td>2019-06-02</td>
                        <td>
                            <label>
                                <input type="checkbox" class="cbox" checked>
                                <span class="btnBox">
                                    <span class="btn"></span>
                                </span>
                                <span class="txt">公開</span>
                            </label>
                        </td>
                        <td>6人</td>
                    </tr>
                    <tr>
                        <td>2020204</td>
                        <td>2019-06-02</td>
                        <td>
                            <label>
                                <input type="checkbox" class="cbox">
                                <span class="btnBox">
                                    <span class="btn"></span>
                                </span>
                                <span class="txt">關閉</span>
                            </label>
                        </td>
                        <td>-</td>
                    </tr>
                </table>
            </article>
            <article class="detailFlyer">
                <h4>2020203</h4>
                <img src="images/flyer.png" alt="">
                <p>宣傳單連結 : <a href="memberFlyer.html">memberFlyer.html</a></p>
                <div class="btnBar">
                    <button class="commonBtn">刪除</button>
                    <button class="commonBtn">修改</button>
                </div>
            </article>
        </div>
    </div>
</body>
</html>
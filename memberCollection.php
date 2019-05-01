<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>我的收藏</title>
    <link rel="stylesheet" href="css/memberCollection.css" />
    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
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
        <div class="cardGroupWidth">
          <?php
              try {
                $member =$_SESSION['member'][0][0];
                $sql = "SELECT * from collection join orders on collection.orderno = orders.orderno join member on member.memNo = orders.memNo where collection.memNo = $member;";
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
          <section class="card">
              <div class="font">
                  <div class="topArea">
                      <div class="headImg">
                          <img src="<?php echo $data['memImgUrl'] ?>" alt="">
                      </div>
                      <h3><?php echo $data['memName'] ?></h3>
                  </div>
                  <div class="stageImg">
                    <img src="<?php echo $data['orderImgUrl'] ?>" alt="">
                  </div>
                  <div class="toolBar">
                    <i class="fas fa-heart"></i>
                    <span><?php echo $data['orderVote'] ?></span>
                    <i class="fas fa-ellipsis-h"></i>
                  </div>  
              </div>
              <div class="back">
                <div class="centerBox">
                    <div class="unlike" value="<?php echo $data['orderNo'] ?>">取消追蹤</div>
                    <div class="return">返回</div>
                </div>
              </div>
          </section>
          <?php } ?>
        </div>
      </article>
    </div>


    <script>
      /* 點擊旋轉到背面 */
      let dots = document.querySelectorAll('.fa-ellipsis-h');
      for (let i = 0; i < dots.length; i++) {
        let backs = document.querySelectorAll('.back');
        dots[i].addEventListener('click',function(e){
        e.target.parentNode.parentNode.style.transform =` perspective(1200px) rotateY(180deg) `;
        backs[i].style.transform = ` perspective(1200px) rotateY(360deg) `;
        });
      }
      let returns =  document.querySelectorAll('.return');
      for (let i = 0; i < returns.length; i++) {
        let fonts = document.querySelectorAll('.font');
        let backs = document.querySelectorAll('.back');
        returns[i].addEventListener('click',function(){
        fonts[i].style.transform = ` perspective(1200px) rotateY(0deg) `;
        backs[i].style.transform =` perspective(1200px) rotateY(180deg) `;
        });
      }

      /* 點擊取消訂閱 */
      let unlikes = document.querySelectorAll('.unlike');
      for (let i = 0; i < unlikes.length; i++) {
        let cards = document.querySelectorAll('.card');
        unlikes[i].addEventListener('click',function(e){
          let data = e.target.getAttribute('value');


            //產生XMLHttpRequest物件
            var xhr = new XMLHttpRequest();
            //註冊callback function
            xhr.onreadystatechange = function(){
              if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                if( xhr.status == 200){ //server端可以正確的執行
                     console.log(xhr.responseText);
                }else{ //其它
                    alert( xhr.status );
                }
              }
            } 
            //設定好所要連結的程式
            var url = "php/components/_changeCollection.php?orderNo=" + data;
            xhr.open("get", url, true);
            //送出資料
            xhr.send(null);
          

          cards[i].style.display = `none`;
        });
      }
    </script>

  </body>
</html>

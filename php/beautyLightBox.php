<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/beautyPageant.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div class="beautyDiscWrap">
    <div class="beautyDiscContainer">
        <div class="beautyDiscFilter"></div>
<div class="beautyDiscIg">
    <div class="beautyDiscIgMem">
        <img src="../images/beautyPageant/DiscStage/Lisa/lisa.png" alt="Lisa">
        <div class="beautyDiscIgTopic">
                <p class="beautyDiscIgMName">Lisa</p>
                <p class="beautyDiscIgMNameCar">故人西辭黃鶴樓</p>
        </div>
        <div class="dotflip">
            <i class="fas fa-ellipsis-h"></i>
            <div class="dotpanel">
                <li>檢舉</li>
                <!-- <li>刪除</li> -->
            </div>
        </div>
    </div>
    <div class="beautyDiscIgMemStage">
        <img src="../images/beautyPageant/DiscStage/Lisa/newVersionStage1.png" alt="memID的車">
    </div>
    <div class="beautyRankingSocialBtns">
        <i class="far fa-heart"></i>
        <i class="far fa-comment" alt="留言"></i>
        <i class="fas fa-external-link-alt" alt="分享"></i>
        <i class="far fa-bookmark" alt="分享"></i>
    </div>
    <p class="likeCount">622個喜歡</p>
    <div class="beautyDiscIgMemTextContainerWrap">
      <script>
      $(document).ready(function(){
          $.ajax({
              url:'../php/_connetbeautyDiscIg.php',
              type:'GET',
              data:{
                DiscTextArea:$('.DiscTextArea').val()
              },
              dataType:'TEXT',
              success:function(response){
                let data = JSON.parse(response);
                var beautyDiscIgMesData ="<div class='beautyDiscIgMemTextContainer'>";
                $.each(data['messageRow'],function(i,n){
                    var messageRowOd = 2
                    if(messageRowOd==2){
                        // console.log(n['messageContent']);
                        beautyDiscIgMesData += "<div class='beautyDiscIgMemTextContainer'>"+
                            "<img src='../"+n['memImgUrl']+"' alt='Alex'>"+
                                "<p class='beautyDiscIgMName'>"+n['memName']+"</p>"+
                                "<p class='beautyDiscIgNameText'>"+n['messageContent']+"</p>";
                        beautyDiscIgMesData+='</div>';
                    }else{
                        return '';
                    };
                });
              },//sucess
              error:function(xhr){
                  alert('Ajax request 發生錯誤');
              }
          });
      })
      </script>
    </div>
    <div class="beautyDiscForm">
        <img src="../images/beautyPageant/DiscStage/Lisa/lisa.png" alt="Alex">
        <form>
            <input class="DiscTextArea" type="text" name="欄位名稱" placeholder="留言回覆...">
            <input class="DiscSent" type="submit" value="送出">
        </form>
    </div>
</div>
</div>
</div>
</body>
</html>

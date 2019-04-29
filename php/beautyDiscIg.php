
<script>
	$(document).ready(function(){
		// 'php/_connetbeautyDiscIg.php';
		var selectUrl = 'php/_connetbeautyDiscIg.php';
		$('#listList').change(function () {
			// console.log($('#listList').val());
			var Listvalue = $('#listList').val();
			if (Listvalue == 1) {
				selectUrl =  'php/_connetbeautyDiscIg.php';
				switchList(selectUrl);
			}else if(Listvalue == 2){
				selectUrl =  'php/_switchBeautySelect.php';
				switchList(selectUrl);
			}else{
				return;_
			};
			// console.log(selectUrl);
		});
		// console.log($('#listList').val());
		// console.log(document.getElementById('listList').value);
		// console.log(selectUrl);
		switchList(selectUrl);
		function switchList(selectUrl) {
		$.ajax({
			url: selectUrl,
			type: 'GET',
			data:{
				DiscTextArea:$('.DiscTextArea').val()
			},
			dataType:'TEXT',
			success: function(response){
				
				//轉成陣列 抓取陣列裡面的資料
				//需要order的所有留言串
				//判斷 ORDER是否相同
				
				
				let data = JSON.parse(response);
				var beautyDiscIgMesData ="<div class='beautyDiscIgMemTextContainer'>";
				var beautyDiscIgData = '<div class="beautyDiscStageContainer">';
				$.each(data['beautyIntendRow'],function(i,n){
					var beautyIntendRowOd = n['orderNo'];//order: index[0]['orderNo']=3,index[1]['orderNo']=4 ,index[2]['orderNo']=5  	
					//  console.log(beautyIntendRowOd); 
					 var beautyDiscIgMesData ="";
					 $.each(data['messageRow'],function(i,n){
						var messageRowOd = n['orderNo']
						if(messageRowOd==beautyIntendRowOd){
							// console.log(n['messageContent']);
							beautyDiscIgMesData += "<div class='beautyDiscIgMemTextContainer'>"+
								"<img src='"+n['memImgUrl']+"' alt='Alex'>"+
									"<p class='beautyDiscIgMName'>"+n['memName']+"</p>"+
									"<p class='beautyDiscIgNameText'>"+n['messageContent']+"</p>";
							beautyDiscIgMesData+='</div>';
						}else{
							return '';
						};
					});
					
					beautyDiscIgData +=
					"<div id=CarOrder"+n['orderNo']+" class='beautyDiscIg'>"+
						"<div class='beautyDiscIgMem'>"+
							"<img src='"+n['memImgUrl']+"' alt=''>"+
							"<div class='beautyDiscIgTopic'>"+
									"<p class='beautyDiscIgMName'>"+n['memName']+"</p>"+
									"<p class='beautyDiscIgMNameCar'>"+n['orderName']+"</p>"+
							"</div>"+
							"<div class='dotflip'>"+
								"<i class='fas fa-ellipsis-h'></i>"+
								"<div class='dotpanel'>"+
									"<li>檢舉</li>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div class='beautyDiscIgMemStage'>"+
							"<img src='"+n['orderImgUrl']+"' alt=''>"+
						"</div>"+
						"<div class='beautyRankingSocialBtns'>"+
							"<i><img class='likeHeart' src='images/like.png' alt='喜歡收藏'></i>"+
							"<span class='display:none;'></span>"+
							"<i class='far fa-comment' alt='留言'></i>"+
							"<i class='fas fa-external-link-alt' alt='分享'></i>"+
							"<i class='far fa-bookmark' alt='分享'></i>"+
						"</div>"+
						"<p class='likeCount'>"+n['orderVote']+"個喜歡</p>"+
						"<div class='beautyDiscIgMemTextContainerWrap'>"+
						//留言內容開始
						// n['memNo']+
						beautyDiscIgMesData+

						//這裡包住的
						"</div>"+
						//留言內容結束
						
						"<div class='beautyDiscForm'>"+
							"<img src='<?php if(isset($_SESSION['member'])){print_r($_SESSION['member'][0][6]);}else{ echo "images/member/member.jpg";} ?>' alt='Alex'>"+
							"<form>"+
								
								"<input class='DiscTextArea' type='text' name='messageContent' value='' placeholder='留言回覆...'>"+
								"<input class='DiscSent' type='button' value='送出'>"+
								"<input type='hidden' name='orderNo' value='"+ n['orderNo'] +"' placeholder='留言回覆...'>"+
							"</form>"+
						"</div>";
						beautyDiscIgData+='</div>';
				});
				$('.beautyDiscStageContainer').eq(0).remove();
				$('.beautyDiscStageContainerWrap').eq(0).prepend(beautyDiscIgData);
				var hearts = document.getElementsByClassName("likeHeart");
        for(let i=0; i< hearts.length; i++){
            hearts[i].onclick = function(e){

                let orderNo = e.target.parentNode.nextElementSibling.innerText;
                let amount;
    

                if(e.target.src.indexOf("images/like.png") != -1 ){
                    e.target.src = "images/likeAlready.png";
                    amount = 1;
                }else{
                    e.target.src = "images/like.png";
                    amount = -1;
				}
				console.log(orderNo);
                let url = "updateVotes.php?orderNo=" + <?php if(isset($_SESSION['member'])){print_r($_SESSION['member'][0]['orderNo']);}else{ echo "images/member/member.jpg";} ?> + "&amount=" + amount;
                var xhr2 = new XMLHttpRequest();
                xhr2.onload = function(){
                    //console.log(xhr2.responseText);
                    var str = e.target.parentNode.parentNode.nextElementSibling.innerHTML.replace("個喜歡","");
                    console.log("------",parseInt(str)+ amount +"個喜歡" );
                    e.target.parentNode.parentNode.nextElementSibling.innerHTML = parseInt(str)+ amount +"個喜歡";
                }
                xhr2.open("get",url,true);
                xhr2.send(null);
            }
        }
				//註冊每個表單接受訊息
				for(let i=0;i<document.getElementsByClassName("DiscSent").length;i++){
					console.log('5566');
					document.getElementsByClassName("DiscSent")[i].addEventListener("click", function(e){
						let btn = e.target;
						let orderNo = btn.nextElementSibling.value;
						let messageContent = btn.previousElementSibling.value;
						console.log(orderNo);
						console.log(messageContent);
						//先抓取留言的"內容"對應"訂單"
						var index = $('.DiscSent').index(this);
						console.log(index);
						$(".beautyDiscIgMemTextContainerWrap").eq(index).prepend("<div class='beautyDiscIgMemTextContainer'>"+"<img src='<?php if(isset($_SESSION['member'])){print_r($_SESSION['member'][0][6]);}else {
							print_r("images/member/member.jpg");
						} ?>' alt=''>"+"<p class='beautyDiscIgMName'>"+"<?php if(isset($_SESSION['member'])){print_r($_SESSION['member'][0][3]);}else {
							print_r("訪客");
						} ?>"+"</p>"+"<p class='beautyDiscIgNameText'>"+messageContent+"</p>"+"</div>")

						let xhr = new XMLHttpRequest();
						xhr.onload = function (){
							// alert(xhr.responseText);
							//reset
							btn.nextElementSibling.value="";
							btn.previousElementSibling.value="";
						}
						xhr.open("get", "php/addmessage.php?messageContent=" + messageContent + "&orderNo=" + +orderNo+"&memNo="+<?php if(isset($_SESSION['member'])){print_r($_SESSION['member'][0][0]);}else {
							print_r("1");
						} ?>);
						xhr.send(null);
						console.log("addmessage.php?messageContent=" + messageContent + "&orderNo=" + orderNo+"&memNo="+<?php if(isset($_SESSION['member'])){print_r($_SESSION['member'][0][0]);}else {
							print_r("1");
						} ?>);

					}
				)};
				
				
			},//sucess
			error: function(xhr) {
			alert('Ajax request 發生錯誤');
			}
		});
	}
	});


</script>
<script>
	// $(document).ready(function(){
	// 		$(".DiscSent").click(function(){
	// 			var result1 = $(this).siblings('.DiscTextArea').val();
	// 			alert("result1 = " + result1);
	// 		});


</script>

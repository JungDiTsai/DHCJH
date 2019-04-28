

<!-- <script src="../js/jquery-3.3.1.min.js"></script> -->
<script>
	$(document).ready(function(){

		// $xx = '13';
		//  beautyDiscIgData =`<div>${$xx}</div>`;

		$.ajax({
			url: 'php/_connetbeautyDiscIg.php',
			// url: '../php/_connetbeautyDiscIg.php',
			type: 'GET',
			success: function(response){
				//轉成陣列 抓取陣列裡面的資料
				// console.log(JSON.parse(response));
				let data = JSON.parse(response);
				// //看裡面的key value 三圍陣列;
				// console.log(data['beautyIntendRow']);
				// console.log(data['messageRow']);
				// data['beautyIntendRow'][0]['orderNo']
				// console.log(data['messageRow'].length);
					// console.log(beautyDiscIgData);
				//需要order的所有留言串
				// $.each(data['beautyIntendRow'],function(i,n){
				// 	var beautyIntendRowOd = n['orderNo'];//order: index[0]['orderNo']=3,index[1]['orderNo']=4 ,index[2]['orderNo']=5  
				// 	 console.log(beautyIntendRowOd);
				// 	//  if(n['order'])
				// 	$.each(data['messageRow'],function(i,n){
				// 		// console.log(beautyIntendRowOd); //這是上面beautyIntendRow 的 orderNo
				// 		// console.log(n['orderNo']);//messageRow 的 orderNo console.log(n['orderNo']); //message index[0]['oderNo']= 3 *4 ; index[4]['oderNo']= 4 *3
				// 		//判斷 ORDER是否相同
				// 		var messageRowOd = n['orderNo']
				// 		if(messageRowOd==beautyIntendRowOd){
				// 			console.log(n['messageContent']);
				// 			beautyDiscIgMesData += 
				// 				"<img src='"+n['memImgUrl']+"' alt='Alex'>"+
				// 					"<p class='beautyDiscIgMName'>"+n['memName']+"</p>"+
				// 					"<p class='beautyDiscIgNameText'>"+n['messageContent']+"</p>"+
				// 			"</div>"
				// 			beautyDiscIgMesData+="<div>";
				// 		}else{
				// 			return '';
				// 		};
				// 	});
					
				// });

				var beautyDiscIgData = '<div class="beautyDiscStageContainer">';
				var beautyDiscIgMesData ="<div class='beautyDiscIgMemTextContainer'>";
			
			
	
				$.each(data['beautyIntendRow'],function(i,n){
					var beautyIntendRowOd = n['orderNo'];//order: index[0]['orderNo']=3,index[1]['orderNo']=4 ,index[2]['orderNo']=5  	
					 console.log(beautyIntendRowOd); 
					 var beautyDiscIgMesData ="";
					 $.each(data['messageRow'],function(i,n){
						var messageRowOd = n['orderNo']
						if(messageRowOd==beautyIntendRowOd){
							console.log(n['messageContent']);
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
					"<div class='beautyDiscIg'>"+
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
							"<i class='far fa-heart'></i>"+
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
							"<img src='images/beautyPageant/DiscStage/Lisa/lisa.png' alt='Alex'>"+
							"<form>"+
								"<input class='DiscTextArea' type='text' name='欄位名稱' placeholder='留言回覆...'>"+
								"<input class='DiscSent' type='submit' value='送出'>"+
							"</form>"+
						"</div>";
						beautyDiscIgData+='</div>';
				});

				
				
				
				
				$('.beautyDiscStageContainer').append(beautyDiscIgData);
			},//sucess
			error: function(xhr) {
			alert('Ajax request 發生錯誤');
			}
		});
	});
</script>













window.addEventListener("load", function () {
$.ajax({
url: 'php/components/_getBigFlyer.php',
type: 'GET',
data: {
},
success: function(response) {
console.log(JSON.parse(response));
let data = JSON.parse(response);
document.createElement('div');
console.log(data[0]['flyerImgUrl'])
// <div class="item"><img src="images/flyer/1.jpg" class="flyer"></div>
},
error: function(xhr) {
alert('Ajax request 發生錯誤');
}
});
})
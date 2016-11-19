$(document).ready(function(){
	var browserHeight = window.innerHeight; //lấy chiều cao khung trình duyệt trên các trình duyệt khác
	var ContentHeight = browserHeight - 150;//tính chiều cao cho phần nội dung
	$('.listbox').css({"height": ContentHeight});
});
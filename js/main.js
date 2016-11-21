$(document).ready(function(){
	var browserHeight = window.innerHeight; //lấy chiều cao khung trình duyệt trên các trình duyệt khác
	var ContentHeight = browserHeight - 150;//tính chiều cao cho phần nội dung
	$('.listbox').css({"height": ContentHeight});
	$('#search').keyup(function(){
		var input = $(this).val().toUpperCase();
	    $('#contactUL li').each(function () {
	    	var temp = $(this).children('a').text().toUpperCase();
	        if (temp.search(input) > -1) {
	            $(this).show();
	        } else {
	            $(this).hide();
	        }
	    });
	});

	$("#contactUL a").click(function(event){
		var mall = $(this).attr("malienlac");
		console.log(mall);
		var url = "index.php?mll=" + mall; 
		console.log(url);
		$.get(url, function(data, status){
	//        alert("Data: " + data + "\nStatus: " + status);
			$("#contact-info").html(data); 
	    });
	});
});
var temp;

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
	//addPhone
	$(".addPhone").click(function(){
		var textbox = '<div><div class="col-sm-6 col-sm-offset-2"><input class="form-control" type="text" name="hoten" id="hoten"></div><div class="col-sm-1"><label class="detail-label" for="hoten">Loại: </label></div><div class="col-sm-2"><select class="form-control"><option>Nhà Riêng</option><option>Di động</option></select></div><div class="col-sm-1"><a class="deletePhone">Xóa</a></div></div>';
		$(this).parent().parent().prepend(textbox);
	});
	//deletePhone
	$('body').on('click', 'a.deletePhone', function() {
		$(this).parent().parent().remove();
	});

	$('body').on('click', '[data-target="#modalEdit"]', function() {
		temp = $('#modalEdit').clone();
		console.log(temp);
    });

    $('body').on('click', '[data-target="#modalAdd"]', function() {
		temp = $('#modalAdd').clone();
		console.log(temp);
    });

 //    $('#modal-content').on('shown.bs.modal', function() {
	//     $("#txtname").focus();
	// })

    $('.modal').on('hide.bs.modal', function () { 
		$(this).replaceWith(temp);
	}); 
});

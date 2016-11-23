var temp;
var groups;
var clone = false;

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

	$('body').on('click', '#groupUL a', function() {
		if ($(this).attr('id') == "all-contact") {
			$('#contactUL li').show();
			console.log("hello");
			return;
		}

		$('#contactUL li').hide();
		var groupID = $(this).attr("nhom");
		var selector = "[manhom=" + groupID + "]";
		$(selector).show();
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
	// $(".addPhone").click(function(){
	// 	var textbox = '<div><div class="col-sm-6 col-sm-offset-2"><input class="form-control" type="text" name="hoten" id="hoten"></div><div class="col-sm-1"><label class="detail-label" for="hoten">Loại: </label></div><div class="col-sm-2"><select class="form-control"><option>Nhà Riêng</option><option>Di động</option></select></div><div class="col-sm-1"><a class="deletePhone">Xóa</a></div></div>';
	// 	$(this).parent().parent().prepend(textbox);
	// });
	$('body').on('click', 'a.addPhone', function() {
		var addPhone = $('#phone-hidden .addPhoneForm').clone();
	//	addPhone = addPhone.clone();
		$(this).parent().parent().prepend(addPhone);
	});
	//deletePhone
	$('body').on('click', 'a.deletePhone', function() {
		$(this).parent().parent().remove();
	});

	$('body').on('click', '[data-target="#modalEdit"]', function() {
		temp = $('#modalEdit').clone();
		clone = true;
    });

    $('body').on('click', '[data-target="#modalAdd"]', function() {
		temp = $('#modalAdd').clone();
		clone = true;
    });

    $('body').on('click', '[data-target="#modalAddGroup"]', function() {
		temp = $('#modalAddGroup').clone();
		clone = true;
    });

    $('body').on('hide.bs.modal', '.modal', function () {

    	if (clone)
			$(this).replaceWith(temp);
		clone = false;

	});

	$('body').on('click', '#delete-contact', function () {
		var malienlac = $(this).attr("malienlac");
		console.log(malienlac);
		var url = "index.php?action=del&mll=" + malienlac;
		console.log(url);
		$.get(url, function(data, status){
			var newDoc = document.open("text/html", "replace");
			newDoc.write(data);
			newDoc.close();
	    });
	});

	$('#showAddGroupBtn').click(function(event) {
		groups = $('.nhom');
		console.log('test');
	});

	// add group
	$('body').on('click', '#addGroupBtn', function () {
		var newGroup = $('#new-group').val();
		newGroup = newGroup.trim();

		console.log(newGroup);
    	for (var i = 0; i < groups.length; i++) {
    		if (groups[i].text == newGroup) {
    			console.log("giong roi");
    			return;
    		}
    	}
    	var url = "index.php?action=addgroup&newgroup=" + newGroup;
		console.log(url);
		$.get(url, function(data, status){
			console.log("done");
			var newDoc = document.open("text/html", "replace");
			newDoc.write(data);
			newDoc.close();
	    });

	});

	// add contact
	$('body').on('click', '#addContactBtn', function () {
		var hoten 	 = $('#hoten').val();
		var ngaysinh = $('#ngaysinh').val();
		var email    = $('#email').val();
		var diachi   = $('#diachi').val();
		var nickname = $('#nickname').val();
		var sdt      = $('#modalAdd .sdt');
		var loai     = $('#modalAdd .loai');
		var ghichu   = $('#ghichu').val();
		var manhom   = $('#nhom').val();

    var url = "index.php?action=addcontact"
							 + "&hoten=" + hoten
							 + "&manhom=" + manhom
							 + "&ngaysinh=" + ngaysinh
							 + "&email=" + email
							 + "&diachi=" + diachi
							 + "&nickname= " + nickname
							 + "&ghichu=" + ghichu;

		for (var i =0; i< sdt.length -1; i++){  // sdt.length -1 ko tinh clone
			url += "&sdt[]=" + sdt[i].value + "&loai[]=" + loai[i].value;
		};

		console.log(url);
		$.get(url, function(data, status){
			console.log("done");
			var newDoc = document.open("text/html", "replace");
			newDoc.write(data);
			newDoc.close();
	    });

	});
});

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

	var preContact = null;
	var preGroup = $("#groupUL a").first();

	preGroup.css("background-color", "#ddd");;

	$('body').on('click', '#groupUL a', function() {
		$(this).css("background-color", "#ddd");
		if(preGroup != null) preGroup.css("background-color", "#fff");
		preGroup = $(this);

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

	// choose a contact
	$("#contactUL a").click(function(event){
		$(this).css("background-color", "#ddd");
		if(preContact != null) preContact.css("background-color", "#fff");
		preContact = $(this);

		var mall = $(this).attr("malienlac");
		console.log(mall);
		var url = "index.php?mll=" + mall;
		console.log(url);
		$.get(url, function(data, status){
			$("#contact-info").html(data);
	    });	
	});

	
	$('body').on('click', 'a.addPhone', function() {
		var addPhone = $('#phone-hidden .addPhoneForm').clone();
	//	addPhone = addPhone.clone();
		$(this).parent().parent().before(addPhone);
	});
	//deletePhone
	$('body').on('click', 'a.deletePhone', function() {
		$(this).parent().parent().remove();
	});

	$('body').on('click', '[data-target="#modalEdit"]', function() {
		temp = $('#modalEdit').clone();
		clone = true;
		addToEdit();
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

	// edit contact
	$('body').on('click', '#editContactBtn', function () {
		var hoten 	 = $('#e-hoten').val();
		var ngaysinh = $('#e-ngaysinh').val();
		var email    = $('#e-email').val();
		var diachi   = $('#e-diachi').val();
		var nickname = $('#e-nickname').val();
		var sdt      = $('#modalEdit .sdt');
		var loai     = $('#modalEdit .loai');
		var ghichu   = $('#e-ghichu').val();
		var manhom   = $('#e-nhom').val();
		var malienlac = $('#delete-contact').attr('malienlac');

		console.log("sdt: " + sdt);

    	var url = "index.php?action=edit"
    								+ "&malienlac=" + malienlac
									+ "&hoten=" + hoten
									+ "&manhom=" + manhom
									+ "&ngaysinh=" + ngaysinh
									+ "&email=" + email
									+ "&diachi=" + diachi
									+ "&nickname=" + nickname
									+ "&ghichu=" + ghichu;

		for (var i = 0; i< sdt.length; i++){  // sdt.length -1 ko tinh clone
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

	function addToEdit() {
		$('#e-hoten').val($('#i-hoten').text());
		$('#e-ngaysinh').val($('#i-ngaysinh').text());
		$('#e-nickname').val($('#i-nickname').text());
		console.log("nickname: " + $('#i-nickname').text())
		$('#e-ghichu').val($('#i-ghichu').text());
		$('#e-diachi').val($('#i-diachi').text());
		$('#e-email').val($('#i-email').text());

		$('#e-nhom').val($('#i-nhom').attr("manhom"));

		var sdt = $('#contact-info .sdt');
		var loai = $('#contact-info .loai');

		for(var i = 0; i < sdt.length-1; i++) {
			$('#modalEdit .addPhone').trigger('click');
		}

		var eSDT = $('#modalEdit .sdt');
		var eLoai = $('#modalEdit .loai');


		for(var i = 0; i < sdt.length; i++) {
			eSDT[i].value = sdt[i].innerText;
			eLoai[i].value = loai[i].getAttribute("masdt");
		}
	}

});

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Personal Contact Manager</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div class="container-fluid">
	<h1>Danh bạ</h1>
	<br>
	<div class="row">
		<div class="col-sm-2">
			<button class="button">Thêm nhóm</button>
			<div class="listbox">
				<ul class="myUL">
				<?php
					foreach ($groups as $g) {
					  echo '<li><a href="">'.$g['tennhom'].'</a></li>';
					}
				?>
				</ul>
			</div>
		</div>
		<div class="col-sm-3">
			<input type="text" id="search" placeholder="Tìm kiếm ...">
			<div class="listbox">
				<ul class="myUL" id="contactUL">
					<?php
					foreach ($contacts as $c) {
					  echo '<li><a malienlac='.$c['malienlac'].'>'.$c['hoten'].'</a></li>';
					}
					?>
				</ul>
			</div>
		</div>
		<div class="col-sm-7">
			<button class="button" data-toggle="modal" data-target="#addModal">Thêm liên lạc</button>

			<div class="row" id="contact-info">
				<div class="col-sm-9">
					<h2>Chọn một liên lạc để xem thông tin chi tiết</h2>
				</div>
			</div>

		</div>
	</div>

</div>

<?php 
	// Modal
    include('pcmgr/template/add-modal.php');
?>


<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>


</body>
</html>

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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
        	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Chỉnh Sửa</h4>
	        </div>
	        <div class="modal-body">
	        	<form id="form" method="post" action="">
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label" for="hoten">Họ tên: </label>
						</div>
						<div class="col-sm-6">
							<input class="detail-input" type="text" name="hoten" id="hoten">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label" for="hoten">Ngày sinh: </label>
						</div>
						<div class="col-sm-6">
							<input class="detail-input" type="text" name="hoten" id="hoten">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label" for="hoten">Email: </label>
						</div>
						<div class="col-sm-6">
							<input class="detail-input" type="text" name="hoten" id="hoten">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label" for="hoten">Địa chỉ: </label>
						</div>
						<div class="col-sm-6">
							<input class="detail-input" type="text" name="hoten" id="hoten">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label" for="hoten">Nickname: </label>
						</div>
						<div class="col-sm-6">
							<input class="detail-input" type="text" name="hoten" id="hoten">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<label class="detail-label" for="hoten">Số điện thoại: </label>
						</div>
						<div class="col-sm-4">
							<button class="button">Thêm số điện thoại</button>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-2">
							<input class="detail-input" type="text" name="hoten" id="hoten">
						</div>
						<div class="col-sm-1">
							<label class="detail-label" for="hoten">Loại: </label>
						</div>
						<div class="col-sm-2">
							<select class="select">
								<option>Nhà Riêng</option>
								<option>Di động</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label" for="hoten">Ghi chú: </label>
						</div>
						<div class="col-sm-6">
							<textarea class="form-control" rows="3" id="note"></textarea>
						</div>
					</div>
				</form>
	        </div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-default">Cập nhật</button>
        		<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        	</div>
    	</div>
    </div>
</div>


<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>


</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Personal Contact Manager</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<div class="title">Personal Contact Manager</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-2">
			<button class="btn btn-primary" data-toggle="modal" id="addGroupBtn" data-target="#modalAddGroup">Thêm nhóm</button>
			<div class="listbox">
				<ul class="myUL">
					<li><a href="">Tất cả</a></li>
					<?php
						foreach ($groups as $g) {
						  echo '<li><a class="nhom">'.$g['tennhom'].'</a></li>';
						}
					?>
				</ul>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="row">
				<div class="col-sm-11">
					<input type="text" class="form-control" id="search" placeholder="Tìm kiếm ...">
				</div>
			</div>
			
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
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Thêm liên lạc</button>

			<div id="contact-info">
				<div class="col-sm-9">
					<h2>Chọn một liên lạc để xem thông tin chi tiết</h2>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Modal Add Group -->
<div class="modal fade" id="modalAddGroup" role="dialog">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
        	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h2 class="modal-title">Thêm nhóm</h2>
	        </div>
	        <div class="modal-body">
	        	<form class="form" id="addGroup" method="post" action="">
					<div class="row">
						<div class="col-sm-2 col-sm-offset-1">
							<label class="detail-label">Tên nhóm: </label>
						</div>
						<div class="col-sm-8">
							<input class="form-control" type="text">
						</div>
					</div>
				</form>
	        </div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-primary">Chấp nhận</button>
        		<button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
        	</div>
    	</div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" role="dialog">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
        	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h2 class="modal-title">Thêm liên lạc</h2>
	        </div>
	        <div class="modal-body">
	        	<form class="form" id="add" method="post" action="">
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Họ tên: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text">
						</div>
						<div class="col-sm-1">
							<label class="detail-label">Nhóm: </label>
						</div>
						<div class="col-sm-2">
							<select class="form-control">
								<option>Gia đình</option>
								<option>Bạn bè</option>
								<option>Đối tác</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Ngày sinh: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Email: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Địa chỉ: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Nickname: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Số điện thoại: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text">
						</div>
						<div class="col-sm-1">
							<label class="detail-label">Loại: </label>
						</div>
						<div class="col-sm-2">
							<select class="form-control">
								<option>Nhà Riêng</option>
								<option>Di động</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-sm-offset-2">
							<a class="addPhone">Thêm số điện thoại</a>
						</div>
						</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Ghi chú: </label>
						</div>
						<div class="col-sm-6">
							<textarea class="form-control" rows="3" id="note"></textarea>
						</div>
					</div>
    			</form>
	        </div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-primary">Chấp nhận</button>
        		<button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
        	</div>
    	</div>
    </div>
</div>

<?php 
	// Modal
    include('pcmgr/view/template/add-modal.php');
?>


<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>
</html>

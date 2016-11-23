<!-- Modal Add -->
<div class="modal fade" id="modalAdd" role="dialog">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
        	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h2 class="modal-title">Thêm liên lạc</h2>
	        </div>
	        <div class="modal-body">
	        	<form class="form" id="addcontact" method="post" action="">
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Họ tên: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="hoten">
						</div>
						<div class="col-sm-1">
							<label class="detail-label">Nhóm: </label>
						</div>
						<div class="col-sm-2">
							<select class="form-control" id="nhom">
								<?php
									foreach ($groups as $g) {
									  echo '<option value='.$g['manhom'].'>'.$g['tennhom'].'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Ngày sinh: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="ngaysinh">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label" >Email: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="email">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Địa chỉ: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="diachi">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Nickname: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="nickname">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Số điện thoại: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control sdt" type="text" >
						</div>
						<div class="col-sm-1">
							<label class="detail-label">Loại: </label>
						</div>
						<div class="col-sm-2">
							<select class="form-control loai" >
								<?php
									foreach ($phoneTypes as $t) {
									  echo '<option value='.$t['maloai'].'>'.$t['tenloai'].'</option>';
									}
								?>
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
							<textarea class="form-control" rows="3" id="ghichu"></textarea>
						</div>
					</div>
    			</form>
	        </div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-primary" id="addContactBtn">Chấp nhận</button>
        		<button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
        	</div>
    	</div>
    </div>
    <div style="display:none" id="phone-hidden">
    	<div class="addPhoneForm">
			<div class="col-sm-6 col-sm-offset-2">
				<input class="form-control sdt a" type="text">
			</div>
			<div class="col-sm-1">
				<label class="detail-label" for="hoten">Loại: </label>
			</div>
			<div class="col-sm-2">
				<select class="form-control loai">
					<?php
						foreach ($phoneTypes as $t) {
						  echo '<option value='.$t['maloai'].'>'.$t['tenloai'].'</option>';
						}
					?>
				</select>
			</div>
			<div class="col-sm-1">
				<a class="deletePhone">Xóa</a>
			</div>
		</div>
    </div>
</div>

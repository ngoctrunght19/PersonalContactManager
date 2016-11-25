<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" role="dialog">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
        	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h2 class="modal-title">Chỉnh Sửa</h2>
	        </div>
	        <div class="modal-body">
	        	<form class="form" id="edit" method="post">
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Họ tên: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="e-hoten">
						</div>
						<div class="col-sm-1">
							<label class="detail-label">Nhóm: </label>
						</div>
						<div class="col-sm-2">
							<select class="form-control" id="e-nhom">
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
							<input class="form-control" type="text" id="e-ngaysinh">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Email: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="e-email">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Địa chỉ: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="e-diachi">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Nickname: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text" id="e-nickname">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="detail-label">Số điện thoại: </label>
						</div>
						<div class="col-sm-6">
							<input class="form-control sdt" type="text">
						</div>
						<div class="col-sm-1">
							<label class="detail-label">Loại: </label>
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
							<textarea class="form-control" rows="3" id="e-ghichu"></textarea>
						</div>
					</div>
				</form>
	        </div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-primary" id="editContactBtn">Cập nhật</button>
        		<button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
        	</div>
    	</div>
    </div>
</div>
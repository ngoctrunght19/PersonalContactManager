<div class="row">
	<div class="col-sm-9">
		<h2><?php echo $info[0]['hoten'] ?></h2>
	</div>
	<div class="col-sm-1">
		<button class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Sửa</button>
	</div>

	<div class="col-sm-1">
		<?php
			echo '<button class="btn btn-primary" id="delete-contact" malienlac='.$info[0]['malienlac'].'>Xóa</button>'
		?>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		<label class="detail-label">Ngày sinh: </label>
	</div>
	<div class="col-sm-10">
		<p class="detail-text"><?php echo $info[0]['ngaysinh'] ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		<label class="detail-label">Email: </label>
	</div>
	<div class="col-sm-10">
		<p class="detail-text"><?php echo $info[0]['email'] ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		<label class="detail-label">Địa chỉ: </label>
	</div>
	<div class="col-sm-10">
		<p class="detail-text"><?php echo $info[0]['diachi'] ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		<label class="detail-label">Nickname: </label>
	</div>
	<div class="col-sm-10">
		<p class="detail-text"><?php echo $info[0]['nickname'] ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<label class="detail-label">Số điện thoại: </label>
	</div>
</div>
<div class="row">
	<?php
		foreach ($sdt as $i){
		//	echo '<p class="detail-text">'.$i['sdt'].' - '.$i['loaisdt'].'</p>';
			echo '<div class="col-sm-6 col-sm-offset-2">
			<p class="detail-text">'.$i['sdt'].'</p>
	</div>
	<div class="col-sm-1">
		<label class="detail-label">Loại: </label>
	</div>
	<div class="col-sm-2">
		<p class="detail-text">'.$i['loaisdt'].'</p>
	</div>';
		}
    ?>
</div>
<div class="row">
	<div class="col-sm-2">
		<label class="detail-label">Ghi chú: </label>
	</div>
	<div class="col-sm-10">
		<p class="detail-text"><?php echo $info[0]['ghichu'] ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<button class="btn btn-primary" data-toggle="modal" data-target="#modalShowCall">Thông tin các cuộc gọi</button>
	</div>

</div>
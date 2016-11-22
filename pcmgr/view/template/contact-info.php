
  <div class="row">
  	<div class="col-sm-9">
      <h2><?php echo $info[0]['hoten'] ?></h2>
    </div>
    <div class="col-sm-1">
      <button class="button" data-toggle="modal" data-target="#updateModal"> Sửa</button>
    </div>
    <div class="col-sm-1">
      <button class="button">Xóa</button>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-2">
      <label class="detail-label" for="hoten">Ngày sinh: </label>
    </div>
    <div class="col-sm-10">
      <p class="detail-text"><?php echo $info[0]['ngaysinh'] ?></p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <label class="detail-label" for="hoten">Email: </label>
    </div>
    <div class="col-sm-10">
      <p class="detail-text"><?php echo $info[0]['email'] ?></p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <label class="detail-label" for="hoten">Địa chỉ: </label>
    </div>
    <div class="col-sm-10">
      <p class="detail-text"><?php echo $info[0]['diachi'] ?></p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <label class="detail-label" for="hoten">Nickname: </label>
    </div>
    <div class="col-sm-10">
      <p class="detail-text"><?php echo $info[0]['nickname'] ?></p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
    <label class="detail-label" for="hoten">Số điện thoại: </label>
    </div>
    <div class="col-sm-10">
    <?php
      foreach ($sdt as $i){
        echo '<p class="detail-text">'.$i['sdt'].' - '.$i['loaisdt'].'</p>';
      }
    ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <button class="detail-button">Các cuộc gọi</button>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
    <label class="detail-label" for="hoten">Ghi chú: </label>
    </div>
    <div class="col-sm-10">
    <p class="detail-text"><?php echo $info[0]['ghichu'] ?></p>
    </div>
  </div>

<?php
include('pcmgr/view/template/update-modal.php');
?>
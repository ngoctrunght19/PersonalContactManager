<?php
echo '<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Thêm liên lạc</h4>
          </div>
          <div class="modal-body">
            <form id="form" method="post" action="?action=update&mll='.$info[0]['malienlac'].'">
          <div class="row">
            <div class="col-sm-2">
              <label class="detail-label" for="hoten">Họ tên: </label>
            </div>
            <div class="col-sm-6">
              <input class="detail-input" type="text" name="hoten" id="hoten" value="'.$info[0]['hoten'].'">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label class="detail-label" for="hoten">Ngày sinh: </label>
            </div>
            <div class="col-sm-6">
              <input class="detail-input" type="text" name="ngaysinh" id="hoten" value="'.$info[0]['ngaysinh'].'">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label class="detail-label" for="hoten">Email: </label>
            </div>
            <div class="col-sm-6">
              <input class="detail-input" type="text" name="email" id="hoten" value="'.$info[0]['email'].'">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label class="detail-label" for="hoten">Địa chỉ: </label>
            </div>
            <div class="col-sm-6">
              <input class="detail-input" type="text" name="diachi" id="hoten" value="'.$info[0]['diachi'].'">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label class="detail-label" for="hoten">Nickname: </label>
            </div>
            <div class="col-sm-6">
              <input class="detail-input" type="text" name="nickname" id="hoten" value="'.$info[0]['nickname'].'">
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
              <input class="detail-input" type="text" id="hoten">
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
              <textarea class="form-control" rows="3" name="ghichu" id="note">'.$info[0]['ghichu'].'</textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default">Cập nhật</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
          </div>
        </form>
          </div>
      </div>
    </div>
</div>';
?>

<?php
class ContactView {
  public function __construct($groups, $contacts) {
      $this->contacts = $contacts;
      $this->groups = $groups;
  }

  public function load($info) {

    // Head
    echo '
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
    ';

    //Group
    echo '
    <div class="listbox">
    <ul class="myUL">
    <li><a href="">Tất cả</a></li>
    ';
    foreach ($this->groups as $g) {
      echo '<li><a href="">'.$g['tennhom'].'</a></li>';
    }
    echo '
    </ul>
    </div>
    </div>
    ';

    //Contact list
    echo '
    <div class="col-sm-3">
			<input type="text" id="search" placeholder="Tìm kiếm ...">
			<div class="listbox">
				<ul class="myUL" id="contactUL">
    ';
    foreach ($this->contacts as $c) {
      echo '<li><a href=?action=view&mll='.$c['malienlac'].'>'.$c['hoten'].'</a></li>';
    };
    echo '
        </ul>
      </div>
    </div>
    <div class="col-sm-7">
      <button class="button">Thêm liên lạc</button>

      <div class="row">
        <div class="col-sm-9">
    ';
    echo '<h2>'.$info[0]['hoten'].'</h2>';
    echo '
    </div>
    <div class="col-sm-1">
      <button class="button" data-toggle="modal" data-target="#myModal"> Sửa</button>
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
    </div>

    <div class="col-sm-1">
      <button class="button">Xóa</button>
    </div>
  </div>

  <form id="form" method="post" action="">
    <div class="row">
      <div class="col-sm-2">
        <label class="detail-label" for="hoten">Ngày sinh: </label>
      </div>
      <div class="col-sm-10">
      ';
      echo '
        <p class="detail-text">'.$info[0]['ngaysinh'].'</p>
      ';
      echo '
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label class="detail-label" for="hoten">Email: </label>
      </div>
      <div class="col-sm-10">
      ';
      echo '
        <p class="detail-text">'.$info[0]['email'].'</p>
      ';
    echo '
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label class="detail-label" for="hoten">Địa chỉ: </label>
      </div>
      <div class="col-sm-10">
      ';
      echo '
        <p class="detail-text">'.$info[0]['diachi'].'</p>
      ';
      echo '
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label class="detail-label" for="hoten">Nickname: </label>
      </div>
      <div class="col-sm-10">
      ';
      echo '
        <p class="detail-text">'.$info[0]['nickname'].'</p>
      ';
      echo '
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label class="detail-label" for="hoten">Số điện thoại: </label>
      </div>
      <div class="col-sm-10">
    ';

    foreach ($info as $i){
      echo '<p class="detail-text">'.$i['sdt'].' - '.$i['tenloai'].'</p>';
    }

    echo '
    </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <button class="detail-button">Các cuộc gọi</button>
      </div>
    ';
      echo '
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label class="detail-label" for="hoten">Ghi chú: </label>
      </div>
      <div class="col-sm-10">
      ';
      echo '
        <p class="detail-text">'.$info[0]['ghichu'].'</p>
      ';
      echo '
            </div>
          </div>
        </form>
      </div>
      </div>

      </div>


      <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>


      </body>
      </html>
    ';



  }
}

?>

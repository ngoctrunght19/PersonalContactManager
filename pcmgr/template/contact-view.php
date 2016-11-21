<?php
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
</div>';

?>

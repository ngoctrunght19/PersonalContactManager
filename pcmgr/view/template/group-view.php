<?php
echo'
  <div class="col-sm-2">
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
</div>';
?>

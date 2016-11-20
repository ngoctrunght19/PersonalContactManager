<?php
    // namespace pcmgr\model;
    use core\data\model\PDOData;

    require_once("./core/data/PDOData.php");

    class Contact {

        public function __contruct() {

        }

        public function getAll() {
          $db = new PDOData();
          $ret = $db->doQuery("select * from lienlac");
          return $ret;
        }

        public function newContact($ht,  $sdt, $ns=null, $email=null,
                                    $diachi=null, $nickname=null, $ghichu=null) {
          $db = new PDOData();
          $c = $db->doSql("insert into LienLac(masv, hoten) values('$m', '$ht')");
          return $c;
        }

    }

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

        public function getContactById($id) {
          $db = new PDOData();
          $c = $db->doQuery("select l.*, s.*, li.* from lienlac l
                             inner join sodienthoai s
                             on l.malienlac = s.malienlac
                             inner join loaisdt li
                             on s.loaisdt = li.maloai
                             where l.malienlac=$id");
                             //  inner join cuocgoi c
                             //  on c.masdt = s.masdt
          return $c;
        }

    }

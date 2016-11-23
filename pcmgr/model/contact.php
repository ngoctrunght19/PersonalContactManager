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

        public function addContact($data) {
          $db = new PDOData();
          $db->doSql("insert into lienLac(hoten, manhom, ngaysinh, email, diachi, nickname, ghichu)
                           values('$data->hoten',
                                  '$data->manhom',
                                  '$data->ngaysinh',
                                  '$data->email',
                                  '$data->diachi',
                                  '$data->nickname',
                                  '$data->ghichu')");

          $id = $db->doQuery("select malienlac from lienlac where hoten ='$data->hoten'");
          $sdtLength = count($data->sdt);

          for ($i= 0; $i< $sdtLength; $i++) {
            $db->doSql("insert into sodienthoai(sdt, malienlac, loaisdt)
                        values( ".$data->sdt[$i].",".$id[0]['malienlac'].",".$data->loai[$i].")");
          }

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

        public function getContactById1($id) {
          $db = new PDOData();
          $c = $db->doQuery("select * from lienlac
                             where malienlac=$id");
          return $c;
        }

        public function getPhoneType() {
          $db = new PDOData();
          $c = $db->doQuery("select * from loaisdt");
          return $c;
        }

        public function getSDT($id) {
          $db = new PDOData();
          $c = $db->doQuery("select sdt.sdt, lsdt.tenloai as loaisdt from sodienthoai sdt
                            inner join loaisdt lsdt on sdt.loaisdt=lsdt.maloai
                            where malienlac=$id");
          return $c;
        }

        public function updateContact($data) {
          $db = new PDOData();
          try {
          $c = $db->doSql("Update lienlac set
                            hoten     = '$data->hoten',
                            ngaysinh  = '$data->ngaysinh',
                            email     = '$data->email',
                            diachi    = '$data->diachi',
                            nickname  = '$data->nickname',
                            ghichu    = '$data->ghichu'
                            where malienlac = $data->id");
          } catch(Exception $e)
          {
              echo($e->getMessage());
          }

        }

        public function delContact($id) {
          $db = new PDOData();
          $db->doSql("delete from sodienthoai
                     where malienlac='$id'");
          $db->doSql("delete from lienlac
                      where malienlac='$id'");

        }

    }

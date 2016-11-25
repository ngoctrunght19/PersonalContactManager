<?php
    // namespace pcmgr\model;
    use core\data\model\PDOData;

    require_once("./core/data/PDOData.php");

    class Contact {

        public function __contruct() {

        }

        public function getAll() {
          $db = new PDOData();
          $ret = $db->doQuery("select lienlac.*, nhom.tennhom tennhom from lienlac
                                inner join nhom on nhom.manhom=lienlac.manhom");
          return $ret;
        }

        public function addContact($data) {
        
          $db = new PDOData();
    
          $stmt = $db->prepare("INSERT INTO lienlac (hoten, manhom, ngaysinh, email, diachi, nickname, ghichu) VALUES (:hoten, :manhom, :ngaysinh, :email, :diachi, :nickname, :ghichu)");

          $stmt->bindParam(':hoten', $data->hoten,  PDO::PARAM_STR);
          $stmt->bindParam(':nickname', $data->nickname,  PDO::PARAM_STR);
          $stmt->bindParam(':manhom', $data->manhom,  PDO::PARAM_STR);
          $stmt->bindParam(':diachi', $data->diachi,  PDO::PARAM_STR);
          $stmt->bindParam(':ngaysinh', $data->ngaysinh,  PDO::PARAM_STR);
          $stmt->bindParam(':email', $data->email,  PDO::PARAM_STR);
          $stmt->bindParam(':ghichu', $data->ghichu,  PDO::PARAM_STR);

          $value = $stmt->execute();

          $id = $db->doQuery("select malienlac from lienlac where hoten ='$data->hoten'");
          
          $sdtLength = count($data->sdt);

          for ($i= 0; $i< $sdtLength; $i++) {
            $db->doSql("insert into sodienthoai(sdt, malienlac, loaisdt)
                        values( ".$data->sdt[$i].",".$id[0]['malienlac'].",".$data->loai[$i].")");
          }

        }


        public function editContact($data) {
          
          $db = new PDOData();
         
          $stmt = $db->prepare("UPDATE lienlac set 
                                hoten=:hoten, manhom=:manhom, ngaysinh=:ngaysinh, email=:email, 
                                diachi=:diachi, nickname=:nickname, ghichu=:ghichu
                                where malienlac=:malienlac");

          $stmt->bindParam(':hoten', $data->hoten,  PDO::PARAM_STR);
          $stmt->bindParam(':nickname', $data->nickname,  PDO::PARAM_STR);
          $stmt->bindParam(':manhom', $data->manhom,  PDO::PARAM_STR);
          $stmt->bindParam(':diachi', $data->diachi,  PDO::PARAM_STR);
          $stmt->bindParam(':ngaysinh', $data->ngaysinh,  PDO::PARAM_STR);
          $stmt->bindParam(':email', $data->email,  PDO::PARAM_STR);
          $stmt->bindParam(':ghichu', $data->ghichu,  PDO::PARAM_STR);
          $stmt->bindParam(':malienlac', $data->malienlac,  PDO::PARAM_STR);

          try {
            $value = $stmt->execute();

            if (!$value) {
              echo $stmt->errorCode();
              return;
            }
          } catch(PDOException $ex) { 
            echo $ex->getMessage(); 
            return;
          }

          $ids = $db->doQuery("select malienlac from lienlac where hoten ='$data->hoten'");
          $malienlac = $ids[0]['malienlac'];
          $oldPhone = $db->doQuery("select * from sodienthoai where malienlac =$malienlac");
          
          $sdtLength = count($data->sdt);
          var_dump($data->sdt);
          $oldLength = count($oldPhone);
          $exited = false;
          for ($i = 0; $i < $sdtLength; $i++) {
            echo "$i: " . $i . '<br>';
            for ($j = 0; $j < $oldLength; $j++) {
              if ($oldPhone[$j]['sdt'] == $data->sdt[$i]) { // giống sdt cũ
                if ($oldPhone[$j]['loaisdt'] != $data->loai[$i]) {  // khác loại
                  // cập nhật loại
                  $db->doSql("update sodienthoai set loaisdt=".$data->loai[$i]."
                              where masdt=".$oldPhone[$j]['masdt']);
                }
                $oldPhone[$i]["1"] = '1';
                $exited = true;
                break;
              }
            }
            if ( !$exited ) { // số điện thoại chưa tồn tại
              echo 'add phone';
              $db->doSql("insert into sodienthoai(sdt, malienlac, loaisdt)
                        values( ".$data->sdt[$i].",".$malienlac.",".$data->loai[$i].")");
            } else 
              echo 'exited<br>';
          }

          for ($i= 0; $i< $oldLength; $i++) {
            if (!isset($oldPhone[$i]["1"])) {
                $db->doSql("delete from sodienthoai 
                            where masdt=".$oldPhone[$i]["masdt"]);
            }
          }
          
          for ($i= 0; $i< $sdtLength; $i++) {
        //    $db->doSql("insert into sodienthoai(sdt, malienlac, loaisdt)
        //                values( ".$data->sdt[$i].",".$id[0]['malienlac'].",".$data->loai[$i].")");
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
          $c = $db->doQuery("select lienlac.*, nhom.tennhom tennhom from lienlac
                              inner join nhom on nhom.manhom=lienlac.manhom
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
          $c = $db->doQuery("select sdt.sdt, sdt.loaisdt as maloaisdt, lsdt.tenloai as loaisdt from sodienthoai sdt
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

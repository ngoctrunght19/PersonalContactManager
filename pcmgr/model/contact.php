<?php
    namespace pcmgr\model;
    use core\data\model\PDOData;
    
    require_once("../../core/data/PDOData.php");
    
    class Contact {

        public function __contruct() {
            
        }
        
        public function getById($masv) {
            $db = new PDOData();
            $ret = $db->doQuery("select * from sinhvien where masv ='$masv'");
            return $ret;
        }
        
        public function getAll() {
            $db = new PDOData();
            $ret = $db->doQuery("select * from lienlac");
            return $ret;
        }
        
        public function find($s) {
            $db = new PDOData();
            $sql = "select * from sinhvien  ";
            if ($s != "") {
                $sql .= " where masv like '%$s%' ";
                $sql .= " or  hoten like '%$s%' ";
            }
            $ret = $db->doQuery($sql);
            return $ret;
        }
        
        
        
         
        public function newContact($ht,  $sdt, $ns=null, $email=null, 
                                    $diachi=null, $nickname=null, $ghichu=null) {
            $db = new PDOData();
            $c = $db->doSql("insert into LienLac(masv, hoten) values('$m', '$ht')"); 
            return $c;
        }

         public function delStd($m) {
            $db = new PDOData();
            $c = $db->doSql("delete from sinhvien where masv = '$m' "); 
            return $c;
         }
        
        
   
    }

echo "hello";
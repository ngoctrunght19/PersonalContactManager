<?php
    // namespace pcmgr\model;
    use core\data\model\PDOData;

    require_once("./core/data/PDOData.php");

    class Group {

        public function __contruct() {

        }

        public function getAll() {
            $db = new PDOData();
            $ret = $db->doQuery("select * from nhom");
            return $ret;
        }


        public function newGroup($group) {
            $db = new PDOData();
            $c = $db->doSql("insert into nhom(tennhom) values('$group')");
            return $c;
        }

        public function delGrop($group) {
            $db = new PDOData();
            $c = $db->doSql("delete from nhom where tennhom = '$m'");
            return $c;
        }

        public function addGroup($newGroup) {
            $db = new PDOData();
            $c = $db->doSql("insert into nhom(tennhom) values('$newGroup')");
            return $c;
        }
    }

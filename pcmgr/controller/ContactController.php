<?php
require_once("pcmgr/model/Contact.php");
require_once("pcmgr/model/Group.php");
require_once("pcmgr/view/ContactView.php");

class ContactController {
  public function __construct() {}

    public function proc() {
       if (isset($_GET["action"]) && $_GET["action"] == "add" &&
            isset($_GET["ht"]) && isset($_GET["m"]) ) {
                //  $std = new \stdmgr\model\Student();
                //  $std->newStd(Util::clean($_GET["m"], 20), Util::clean($_GET["ht"], 200));
            }


       if (isset($_GET["s"])) {
            // $v = Util::clean($_GET["s"], 0);
            // $std= new \stdmgr\model\Student();
            // $data = $std->find($v);
            // $stdview = new \stdmgr\view\StdView($data, count($data)/10, 0);
            // $stdview->listView();
       } else { //hien thi theo trang binh thuong
            $contactData = new Contact();
            $groupData   = new Group();

            $contacts = $contactData->getAll();
            $groups   = $groupData->getAll();

            $view = new ContactView($groups, $contacts);
            $view->load();
        }
    }
}

?>

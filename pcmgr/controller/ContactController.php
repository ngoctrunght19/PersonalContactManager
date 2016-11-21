<?php
require_once("pcmgr/model/Contact.php");
require_once("pcmgr/model/Group.php");
require_once("pcmgr/view/ContactView.php");

class ContactController {
  public function __construct() {}

    public function proc() {
       if (isset($_GET["action"]) && $_GET["action"] == "view" &&
            isset($_GET["mll"])) {
                //  $std = new \stdmgr\model\Student();
                //  $std->newStd(Util::clean($_GET["m"], 20), Util::clean($_GET["ht"], 200));
                $contactData = new Contact();
                $groupData   = new Group();

                $contacts = $contactData->getAll();
                $groups   = $groupData->getAll();

                $view = new ContactView($groups, $contacts);

                $info = $contactData->getContactById($_GET["mll"]);
                // if ($info != null)
                  $view->load($info[0]);
            }
            else { //hien thi theo trang binh thuong
            $contactData = new Contact();
            $groupData   = new Group();

            $contacts = $contactData->getAll();
            $groups   = $groupData->getAll();
            $info = $contactData->getContactById($contacts[0]['malienlac']);
            $view = new ContactView($groups, $contacts);
            $view->load($info[0]);
        }
    }
}

?>

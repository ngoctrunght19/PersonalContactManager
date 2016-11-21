<?php
require_once("pcmgr/model/Contact.php");
require_once("pcmgr/model/Group.php");
require_once("pcmgr/view/ContactView.php");

class ContactController {
  public function __construct() {}

    public function proc() {
       if (isset($_GET["action"]) && $_GET["action"] == "view" && isset($_GET["mll"]) && !isset($_POST["hoten"])) {
          $contactData = new Contact();
          $groupData   = new Group();

          $contacts = $contactData->getAll();
          $groups   = $groupData->getAll();

          $view = new ContactView($groups, $contacts);

          $info = $contactData->getContactById($_GET["mll"]);
          if ($info != null)
            $view->load($info);
      }
      else if (isset($_POST["hoten"])){
        $data = (object) [
          'id'       => $_GET["mll"],
          'hoten'    => $_POST["hoten"],
          'ngaysinh' => $_POST["ngaysinh"],
          'email'    => $_POST["email"],
          'diachi'   => $_POST["diachi"],
          'nickname' => $_POST["nickname"],
          'ghichu'   => $_POST["ghichu"]
        ];

        $contactData = new Contact();
        $groupData   = new Group();

        $contactData->updateContact($data);

        $contacts = $contactData->getAll();
        $groups   = $groupData->getAll();

        $view = new ContactView($groups, $contacts);

        $info = $contactData->getContactById($_GET["mll"]);
        if ($info != null)
          $view->load($info[0]);

      }
      else { //hien thi theo trang binh thuong
      $contactData = new Contact();
      $groupData   = new Group();

      $contacts = $contactData->getAll();
      $groups   = $groupData->getAll();
      // $info = $contactData->getContactById($contacts[0]['malienlac']);
      $view = new ContactView($groups, $contacts);
      $view->load(null);
      }
    }
}

?>

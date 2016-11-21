<?php
require_once("pcmgr/model/Contact.php");
require_once("pcmgr/model/Group.php");
require_once("pcmgr/view/ContactView.php");
require_once("pcmgr/view/ContactView1.php");
require_once("core/util/View_Loader.php");

class ContactController1 {
  public function __construct() {
    $this->helper = new View_Loader();
  }

    public function load() {
      //  $helper = new View_Loader();

        // Load heloer
        $contactData = new Contact();
        $contacts = $contactData->getAll();

        $data = array(
            'contacts' => $contacts
        );

        $this->helper->load('contact-view', $data);

        $this->helper->show();
         
       
    }

    public function homeLoad() {
        $helper = new View_Loader();

        // Load heloer
        $contactData = new Contact();
        $groupData   = new Group();

        $contacts = $contactData->getAll();
        $groups   = $groupData->getAll();

        $data = array(
            'contacts' => $contacts,
            'groups'  => $groups
        );

        $helper->load('home', $data);

        $helper->show();
    }

    public function proc() {

        if (isset($_GET["mll"])) {
    
          $id = $_GET["mll"];
          $contactData = new Contact();
          $info = $contactData->getContactById1($id);

          $sdt = $contactData->getSDT($id);
          ContactView1::createContactInfo($info, $sdt);
          return;
        }

      $this->homeLoad();
    }
}

?>

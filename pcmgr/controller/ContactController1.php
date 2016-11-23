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
        $phoneTypes = $contactData->getPhoneType();

        $data = array(
            'contacts' => $contacts,
            'groups'  => $groups,
            'phoneTypes' => $phoneTypes
        );

        $helper->load('home', $data);

        $helper->show();
    }

    public function addGroup() {
        if (isset($_GET["newgroup"])) {
            $newgroup = $_GET['newgroup'];
            $group = new Group();
            $group->addGroup($newgroup);
        }
    }

    public function addContact() {
        if (isset($_GET["hoten"])) {
          $data = (object) [
            'hoten'    => $_GET["hoten"],
            'manhom'   => $_GET["manhom"],
            'ngaysinh' => $_GET["ngaysinh"],
            'email'    => $_GET["email"],
            'diachi'   => $_GET["diachi"],
            'nickname' => $_GET["nickname"],
            'ghichu'   => $_GET["ghichu"],
            'sdt'      => $_GET['sdt'],
            'loai'     => $_GET['loai'],
          ];

          $newContact = new Contact();
          $newContact->addContact($data);
        }
    }

    public function proc() {
        if ( isset($_GET['action']) && $_GET['action']=="del" && isset($_GET["mll"]) ) {
            $contactData = new Contact();
            $contactData->delContact($_GET["mll"]);
        //    return;
        }
        else if (isset($_GET["mll"])) {

            $id = $_GET["mll"];
            $contactData = new Contact();
            $info = $contactData->getContactById1($id);

            $sdt = $contactData->getSDT($id);
            ContactView1::createContactInfo($info, $sdt);
            return;
        }
        else if ( isset($_GET['action']) && $_GET['action']=="addgroup") {
            $this->addGroup();
        }
        else if ( isset($_GET['action']) && $_GET['action']=='addcontact') {
            $this->addContact();
        }

        $this->homeLoad();
    }
}

?>

<?php

require_once("core/util/View_Loader.php");

class ContactView1 {
    public function __construct() {}

    public static function createContactInfo($info, $sdt) {
        $helper = new View_Loader();

        $data = array(
            'info' => $info,
            'sdt'  => $sdt
        );

        $helper->load('contact-info', $data);

        $helper->show();
    }
}

?>
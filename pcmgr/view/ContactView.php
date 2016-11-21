<?php
class ContactView {
  public function __construct($groups, $contacts) {
      $this->contacts = $contacts;
      $this->groups = $groups;
  }

  public function load($info) {
    // Modal
    include('pcmgr/template/add-modal.php');
    include('pcmgr/template/update-modal.php');

    // Html
    echo '
    <!DOCTYPE html>
    <html>
    <head>
    	<meta charset="utf-8">
    	<title>Personal Contact Manager</title>
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

    <div class="container-fluid">
    	<h1>Danh bạ</h1>
    	<br>
      <div class="row">';
    // Group view
    include("pcmgr/template/group-view.php");
    // Contact view
    include("pcmgr/template/contact-view.php");
    // Info view
    include("pcmgr/template/info-view.php");
    echo '
      </div>
    </div>

    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    </body>
    </html>';

  }
}

?>

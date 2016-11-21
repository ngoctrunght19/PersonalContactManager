<?php
  require_once("pcmgr/controller/ContactController.php");
  require_once("pcmgr/controller/ContactController1.php");
//  $controller = new ContactController();
//  $controller->proc();

  $controller = new ContactController1();
  $controller->proc();
//  $controller->load();
?>

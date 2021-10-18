<?php

  $tool = $_POST['tool'];
  $toolDescription = $_POST['toolDescription'];
  $toolLink = $_POST['toolLink'];

  $output = ""; 
  if (empty($tool) || empty($toolDescription) || empty($toolLink)) {
      $output .= "Error please fill out all fields. \n\n";
  }
  if (strlen($tool) > 40) {
      $output .= "Error tool is longer than 40 chracters. \n\n";
  }
  if (strlen($toolDescription) > 1000) {
      $output .= "Error tool description is longer than 1000 chracters. \n\n";
  }
  if (!preg_match("/^(https?:\/\/)/", $toolLink )) {
      $output .= "Error tool link accepts a http(s):// URL. \n\n";
  }
  if (!empty($output)) {
      $output .= "Please navigate back.";
      include_once  $root . '/components/error.html.php';
      echo $foot;
      exit();  
  }

?>


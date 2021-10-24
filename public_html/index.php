<?php 
$root = $_SERVER["DOCUMENT_ROOT"] . "/daniel";
include_once $root . "/template/template.php";
echo $head;
echo file_get_contents($root . "/components/index.html");
echo $foot;
exit();
?>
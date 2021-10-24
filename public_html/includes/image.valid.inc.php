<?php

$alt = $_POST["alt"];
$caption = $_POST["caption"];

$output = ""; 
if (empty($alt) || empty($caption)) {
    $output .= "Error please fill out all fields. \n\n";
}
if (strlen($alt) > 255) {
    $output .= "Error alt is longer than 255 chracters. \n\n";
}
if (strlen($caption) > 255) {
    $output .= "Error caption is longer than 255 chracters. \n\n";
}
if (!empty($output)) {
    $output .= "Please navigate back.";
    include_once  $root . "/components/error.html.php";
    echo $foot;
    exit();  
}

?>


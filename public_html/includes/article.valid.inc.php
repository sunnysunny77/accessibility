<?php

$article = $_POST['article'];
$articleDescription = $_POST['articleDescription'];
$articleLink = $_POST['articleLink'];

$output = ""; 
if (empty($article) || empty($articleDescription) || empty($articleLink)) {
    $output .= "Error please fill out all fields. \n\n";
}
if (strlen($article) > 40) {
    $output .= "Error article is longer than 40 chracters. \n\n";
}
if (strlen($articleDescription) > 1000) {
    $output .= "Error article description is longer than 1000 chracters. \n\n";
}
if (!preg_match("/^(https?:\/\/)/", $articleLink )) {
    $output .= "Error article link accepts a http(s):// URL. \n\n";
}
if (!empty($output)) {
    $output .= "Please navigate back.";
    include_once  $root . '/components/error.html.php';
    echo $foot;
    exit();  
}

?>


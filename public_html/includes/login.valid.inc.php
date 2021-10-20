<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

$output = "";
if (empty($user) || empty($pass)) {
    $output .= "Error please fill out all fields. \n\n";
}
if (preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $user)) {
    $output .= "Error username includes special characters. \n\n";
}
if (strlen($user) > 40) {
    $output .= "Error username is longer than 40 chracters. \n\n";
}
if (strlen($pass) > 40) {
    $output .= "Error password is longer than 40 chracters. \n\n";
}
if (!empty($output)) {
    include_once  $root . '/components/error.html.php';
    echo $foot;
    header( "refresh:5;./admin.php" );
    exit();  
}

?>


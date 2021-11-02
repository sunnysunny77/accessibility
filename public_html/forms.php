<?php 
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/template/template.php";
echo $head;
if (isset($_POST["action"]) && $_POST["action"] == "Send Request") {
  
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  $contactpreference = $_POST["contactpreference"];
  
  $output = ""; 
  if (empty($contactpreference)) {
    $output .= "Error choose a contact preference. \n\n";
  }
  if (!preg_match("/^[A-Z \.\-']{2,40}$/i", $name )) {
    $output .= "Error enter youre name. \n\n";
  } 
  if (!preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/", $email )) {
    $output .= "Error email patern accepts examaple@example.com. \n\n";
  } 
  if (!preg_match("/^[+]?[0-9]{3,15}$/", $phone )) {
    $output .= "Error phone number patern accepts +###############. \n\n";
  }
  if (!preg_match("/^.*[a-zA-Z0-9].*$/", $message )) {
    $output .= "Error enter youre message. \n\n";
  }
  if (!empty($output)) {
    $output .= "Please navigate back.";
    include_once  $root . "/components/error.html.php";
    echo $foot;
    exit();  
  }
  
  $to_email = "@gmail.com";
  $subject = "New Contact Us Message";
  $contactus = "
  You have a message from the contact us page on your website:
  Name: ".$name."
  Phone: ".$phone."
  Email: ".$email."
  Contact preference: ".$contactpreference."
  Message: ".$message;
  $contactus  = wordwrap($contactus ,70);

  $mail = mail($to_email,$subject,$contactus);
  if (!$mail) {
    $res = "Error sending \xf0\x9f\x93\xa7";
  } else {
    $res = "Thanks sent to \xf0\x9f\x93\xa7";
  }
  
  include_once $root . "/components/form.response.html.php";
  echo $foot; 
  header( "refresh:5;./" ); 
  exit();
} 
if (!isset($_POST["action"])){
  
  echo file_get_contents($root . "/components/forms.html");
  echo $foot;
  exit(); 
}
?>
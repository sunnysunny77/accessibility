<!DOCTYPE html>
<html>
<body>

<?php
$res;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST["name"];
    $phone = $_REQUEST["phone"];
    $email = $_REQUEST["email"];
    $message = $_REQUEST["message"];
    $contactpreference = $_REQUEST["contactpreference"];
    $to_email = "shlooby07@gmail.com";
    $subject = "New Contact Us Message";
    
    $contactus = "
    You have a message from the contact us page on your website:
    Name: ".$name."
    Phone: ".$phone."
    Email: ".$email."
    Contact preference: ".$contactpreference."
    Message: ".$message;

    $contactus  = wordwrap($contactus ,70);

    if ( mail($to_email,$subject,$contactus) !== true) {
      $res = "Thanks, sent to &#128231; ";
    } else {
      $res = "Thanks, sent to &#128231; ";
    }
} 
?>

    <pre> <?php echo $res; ?> </pre> 

</body>
</html>

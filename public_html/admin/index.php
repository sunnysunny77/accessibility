<?php 
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/template/template.php";
echo $head;
if (isset($_POST["action"]) && $_POST["action"] == "Change Login" && $_SESSION["login"]) {

    include_once $root . "/includes/login.valid.inc.php";
    
    include_once $root . "/includes/db.inc.php";
  
    try {
      $sql = "UPDATE login
              SET user=:user, pass=:pass
              WHERE user=:userwhere";
      $s = $pdo->prepare($sql);
      $s->bindValue(":user", $user);
      $s->bindValue(":pass", md5($pass . "acms"));
      $s->bindValue(":userwhere", $_SESSION["user"]);
      $s->execute();
    } catch (PDOException $e) {
      $output = "Error updating credentials: " . $e->getMessage();
      include_once  $root . "/components/error.html.php";
      echo $foot;
      exit();
    }
  
    $_SESSION["user"] = $user;
  
    $res = "Inserted credentials";
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../admin/" );
    exit();
}
if ($_SESSION["login"] && !isset($_POST["action"])) {

    include_once $root . "/components/admin.html.php";
    echo $foot;  
    exit();   
}
if (isset($_POST["action"]) && $_POST["action"] == "Login") {
    
    include_once $root . "/includes/login.valid.inc.php";

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "SELECT user, pass FROM login WHERE user = :user AND pass = :pass";
        $s = $pdo->prepare($sql);
        $s->bindValue(":user", $user);
        $s->bindValue(":pass", md5($pass . "acms"));
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error fetching credentials: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    if ($s->rowCount() == 0) {
        $output = "Incorrect credentials.";
        include_once  $root . "/components/error.html.php";
        echo $foot;
        header( "refresh:5;../admin/" );
        exit();
    }

    $_SESSION["login"] = true;
    $_SESSION["user"] = $s->fetch()["user"];

    include_once $root . "/components/admin.html.php";
    echo $foot;  
    exit(); 
}
if (!$_SESSION["login"]) {

    echo file_get_contents($root . "/components/admin.form.html");
    echo $foot;  
    exit(); 
}
?>
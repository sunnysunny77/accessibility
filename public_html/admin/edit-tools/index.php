<?php 
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/template/template.php";
echo $head;
if (isset($_POST["action"]) && $_POST["action"] == "Update Tool" && $_SESSION["login"]) {

    include_once $root . "/includes/tool.valid.inc.php";

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "UPDATE tools
                SET tool=:t, toolDescription=:td, toolLink=:tl
                WHERE id=:id";
        $s = $pdo->prepare($sql);
        $s->bindValue(":t", $tool);
        $s->bindValue(":td", $toolDescription);
        $s->bindValue(":tl", $toolLink);
        $s->bindValue(":id", $_POST["id"]);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error updating tool: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    $res = "Updated tool.";
    include_once $root . "/components/form.response.html.php"; 
    echo $foot;
    header( "refresh:5;../../admin/" );
    exit();
}
if (isset($_POST["action"]) && $_POST["action"] == "Delete Tool" && $_SESSION["login"]) {

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "DELETE FROM tools WHERE id=:id";
        $s = $pdo->prepare($sql);
        $s->bindValue(":id", $_POST["id"]);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error deleting tool: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }
    
    $res = "Deleted tool.";
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../../admin/" );
    exit();
}
if ($_SESSION["login"] && !isset($_POST["action"])) {

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "SELECT id, tool, toolDescription, toolLink FROM tools";
        $s = $pdo->query($sql);
    }
    catch (PDOException $e) {
        $output = "Error fetching tools table: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    $tool = $s->fetchAll();

    include_once $root . "/components/edit-tools.html.php";
    echo $foot;  
    exit();   
}
if (!$_SESSION["login"]) {

    header( "Location: ../../admin/" ); 
    exit(); 
}
?>
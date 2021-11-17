<?php 
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/template/template.php";
echo $head;

if (isset($_POST["action"]) && $_POST["action"] == "Update Article" && $_SESSION["login"]) {

    include_once $root . "/includes/article.valid.inc.php";

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "UPDATE articles
                SET article=:a, articleDescription=:ad, articleLink=:al
                WHERE id=:id";
        $s = $pdo->prepare($sql);
        $s->bindValue(":a", $article);
        $s->bindValue(":ad", $articleDescription);
        $s->bindValue(":al", $articleLink);
        $s->bindValue(":id", $_POST["id"]);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error updating article: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    $res = "Updated article." ;
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../../admin/" );
    exit();
}
if (isset($_POST["action"]) && $_POST["action"] == "Delete Article" && $_SESSION["login"]) {

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "DELETE FROM articles WHERE id=:id";
        $s = $pdo->prepare($sql);
        $s->bindValue(":id", $_POST["id"]);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error deleting article: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    $res = "Deleted article.";
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../../admin/" );
    exit();
}
if ($_SESSION["login"] && !isset($_POST["action"])) {

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "SELECT id, article, articleDescription, articleLink FROM articles";
        $s = $pdo->query($sql);
    }
    catch (PDOException $e) {
        $output = "Error fetching articles table: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }
    
    $article = $s->fetchAll();

    include_once $root . "/components/edit.articles.html.php";
    echo $foot;  
    exit();   
}
if (!$_SESSION["login"]) {

    header( "Location:../../admin/" ); 
    exit(); 
}
?>
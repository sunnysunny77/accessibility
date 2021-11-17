<?php 
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/template/template.php";
echo $head;
if (isset($_POST["action"]) && $_POST["action"] == "Insert Article" && $_SESSION["login"]) {
    
    include_once $root . "/includes/article.valid.inc.php";

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "INSERT INTO articles SET
                article = :a,
                articleDescription = :ad,
                articleLink = :al";
        $s = $pdo->prepare($sql);
        $s->bindValue(":a", $article);
        $s->bindValue(":ad", $articleDescription);
        $s->bindValue(":al", $articleLink);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error inserting article: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    $res = "Inserted article.";
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../../admin/" );
    exit();
}
if (isset($_POST["action"]) && $_POST["action"] == "Insert Tool" && $_SESSION["login"]) {
    
    include_once $root . "/includes/tool.valid.inc.php";

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "INSERT INTO tools SET
                tool = :t,
                toolDescription = :td,
                toolLink = :tl";
        $s = $pdo->prepare($sql);
        $s->bindValue(":t", $tool);
        $s->bindValue(":td", $toolDescription);
        $s->bindValue(":tl", $toolLink);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error inserting tool: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    $res = "Inserted tool."; 
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../../admin/" );
    exit();
}
if (isset($_POST["action"]) and $_POST["action"] == "Upload" && $_SESSION["login"]) {

    include_once $root . "/includes/image.valid.inc.php";

    if (!is_uploaded_file($_FILES["upload"]["tmp_name"])) {
        
        $output = "There was no file uploaded.";
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    $uploadfile = $_FILES["upload"]["tmp_name"];
    $uploadname = $_FILES["upload"]["name"];
    $uploadtype = $_FILES["upload"]["type"];
    $uploaddata = file_get_contents($uploadfile);

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "INSERT IGNORE INTO mimetypes (mimetype)
                VALUES (:mimetype)";
        $s = $pdo->prepare($sql);
        $s->bindValue(":mimetype", $uploadtype);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error inserting mimetype: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    try {
        $sql = "INSERT INTO files (filename,alt,caption,filedata,mimetype_id) 
                VALUES (:filename,:alt,:caption,:filedata,(SELECT mimetype_id FROM mimetypes WHERE mimetype = :mimetype))";
        $s = $pdo->prepare($sql);
        $s->bindValue(":filename", $uploadname); 
        $s->bindValue(":alt", $alt);
        $s->bindValue(":caption", $caption);
        $s->bindValue(":filedata", $uploaddata);
        $s->bindValue(":mimetype", $uploadtype);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error inserting file: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }
    
    $res = "Uploaded file.";
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../../admin/" );
    exit();
}
if ($_SESSION["login"] && !isset($_POST["action"])) {

    echo file_get_contents($root . "/components/add.new.html");
    echo $foot;  
    exit();   
}
if (!$_SESSION["login"]) {

    header( "Location:../../admin/" ); 
    exit(); 
}
?>
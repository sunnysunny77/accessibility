<?php 
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/template/template.php";
echo $head;
if (isset($_POST["action"]) && $_POST["action"] == "Update Image" && $_SESSION["login"]) {

    include_once $root . "/includes/image.valid.inc.php";

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "UPDATE files 
                SET alt=:alt,caption=:caption
                WHERE id=:id";
        $s = $pdo->prepare($sql);
        $s->bindValue(":alt", $alt);
        $s->bindValue(":caption", $caption);
        $s->bindValue(":id", $_POST["id"]);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error updating file: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    if (is_uploaded_file($_FILES["upload"]["tmp_name"])) {

        $uploadfile = $_FILES["upload"]["tmp_name"];
        $uploadname = $_FILES["upload"]["name"];
        $uploadtype = $_FILES["upload"]["type"];
        $uploaddata = file_get_contents($uploadfile);

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
            $sql = "UPDATE files SET
                    filename = :filename,
                    filedata = :filedata,
                    mimetype_id = (SELECT mimetype_id FROM mimetypes WHERE mimetype = :mimetype )
                    WHERE id = :id";
            $s = $pdo->prepare($sql);
            $s->bindValue(":filename", $uploadname);
            $s->bindValue(":filedata", $uploaddata);
            $s->bindValue(":mimetype", $uploadtype);
            $s->bindValue(":id", $_POST["id"]);
            $s->execute();
          }
          catch (PDOException $e) {
            $output = "Error updating file: " . $e->getMessage();
            include_once  $root . "/components/error.html.php";
            echo $foot;
            exit();
          }
    }
   
    $res = "Updated file.";
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../../admin/" );
    exit();
}
if (isset($_POST["action"]) && $_POST["action"] == "Delete Image" && $_SESSION["login"]) {

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "DELETE FROM files WHERE id=:id";
        $s = $pdo->prepare($sql);
        $s->bindValue(":id", $_POST["id"]);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error deleting file: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    try {
        $sql = "DELETE FROM mimetypes WHERE 
                mimetype_id NOT IN 
                (SELECT mimetype_id FROM files)";
        $s = $pdo->prepare($sql);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = "Error deleting mimetypes: " . $e->getMessage();
        include_once  $root . "/components/error.html.php";
        echo $foot;
        exit();
    }

    $res = "Deleted image.";
    include_once $root . "/components/form.response.html.php";
    echo $foot; 
    header( "refresh:5;../../admin/" );
    exit();
}
if ($_SESSION["login"] && !isset($_POST["action"])) {

    include_once $root . "/includes/db.inc.php";

    try {
        $sql = "SELECT id, filename, alt, caption FROM files";
        $s = $pdo->query($sql);
    }
    catch (PDOException $e) {
        $output = "Error fetching files: " . $e->getMessage();
        include_once $root . "/components/error.html.php";
        echo $foot;
        exit();
    }
    
    $gallery = $s->fetchAll();  

    include_once $root . "/components/edit-images.html.php";
    echo $foot;  
    exit();   
}
if (!$_SESSION["login"]) {

    header( "Location: ../../admin/" ); 
    exit(); 
}
?>
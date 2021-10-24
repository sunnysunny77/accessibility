<?php 
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/template/template.php";
echo $head;

include_once $root . "/includes/db.inc.php";

try {
    $sql = "SELECT id, alt, caption FROM files";
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = "Error fetching files: " . $e->getMessage();
    include_once  $root . "/components/error.html.php";
    echo $foot;
    exit();
}
  
$gallery = $s->fetchAll();

include_once $root . "/components/gallery.html.php";
echo $foot;
exit();
?>
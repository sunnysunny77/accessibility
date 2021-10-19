<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/template/template.php';
echo $head;

include_once $root . '/includes/db.inc.php';

try {
    $sql = 'SELECT id, alt, caption FROM files';
    $result = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = 'Error selecting files.' . $e->getMessage();;
    include_once  $root . '/components/error.html.php';
    echo $foot;
    exit();
}
  
$gallery = $result->fetchAll();

include_once $root . '/components/gallery.html.php';
echo $foot;
exit();
?>
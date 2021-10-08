<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/includes/db.inc.php';
try { 
    $sql = 'SELECT filename, mimetype, filedata
    FROM files
    WHERE id = "1"';
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = 'Database error fetching requested file.';
    include_once  $root . '/components/error.html.php';
    echo $foot;
    exit();
}

$file = $s->fetch();
if (!$file) {
    $output = 'File with specified ID not found in the database!';
    include_once  $root . '/components/error.html.php';
    echo $foot;
    exit();
}

$filename = $file['filename'];
$mimetype = $file['mimetype'];
$filedata = $file['filedata'];
$disposition = 'inline';

header('Content-length: ' . strlen($filedata));
header("Content-type: $mimetype");
header("Content-disposition: $disposition; filename=$filename");

echo $filedata;

exit();
?>
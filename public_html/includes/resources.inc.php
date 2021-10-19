<?php
try {
    $sql = 'SELECT id, article, articleDescription, articleLink FROM articles';
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = 'Error fetching articles table: ' . $e->getMessage();
    require $root . '/components/error.html.php';
    exit();
}
$article = $s->fetchAll();

try {
    $sql = 'SELECT id, tool, toolDescription, toolLink FROM tools';
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = 'Error fetching tools table: ' . $e->getMessage();
    require $root . '/components/error.html.php';
    exit();
}
$tool = $s->fetchAll();

try {
    $sql = 'SELECT id, filename, alt, caption FROM files';
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = 'Error fetching tools table: ' . $e->getMessage();
    require $root . '/components/error.html.php';
    exit();
}
$gallery = $s->fetchAll();

?>

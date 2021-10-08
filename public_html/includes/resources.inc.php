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
$count_1 = $s->rowCount();
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
$count_2 = $s->rowCount();
?>

<?php

try {
    $sql = "SELECT id, article, articleDescription, articleLink FROM articles";
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = "Error fetching articles table: " . $e->getMessage();
    include_once $root . "/components/error.html.php";
    echo $foot;
    exit();
}
$article = $s->fetchAll();

try {
    $sql = "SELECT id, tool, toolDescription, toolLink FROM tools";
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = "Error fetching tools table: " . $e->getMessage();
    include_once $root . "/components/error.html.php";
    echo $foot;
    exit();
}

$tool = $s->fetchAll();

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

?>

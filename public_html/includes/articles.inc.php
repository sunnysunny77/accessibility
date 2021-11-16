<?php

try {
    $sql = "SELECT article, articleDescription, articleLink FROM articles";
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = "Error fetching articles table: " . $e->getMessage();
    include_once  $root . "/components/error.html.php";
    echo $foot;
    exit();
}

$article = $s->fetchAll();

?>


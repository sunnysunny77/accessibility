<?php

try {
    $sql = "SELECT tool, toolDescription, toolLink FROM tools";
    $s = $pdo->query($sql);
}
catch (PDOException $e) {
    $output = "Error fetching tools table: " . $e->getMessage();
    include_once  $root . "/components/error.html.php";
    echo $foot;
    exit();
}

$tool = $s->fetchAll();

?>


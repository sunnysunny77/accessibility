<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/template/template.php';
echo $head;
if (isset($_POST['action']) && $_POST['action'] == 'View') {

    $view = $_POST['resource'];

    if (empty($view)) {
        $output = 'Error please choose a category.';
        include_once  $root . '/components/error.html.php';
        echo $foot;
        header( "refresh:5;./resources.php" );
        exit();  
    }

    include_once $root . '/includes/db.inc.php';
    
    if ($view == "articles") {
        try {
            $sql = 'SELECT article, articleDescription, articleLink FROM articles';
            $s = $pdo->query($sql);
        }
        catch (PDOException $e) {
            $output = 'Error fetching articles table: ' . $e->getMessage();
            include_once  $root . '/components/error.html.php';
            echo $foot;
            exit();
        }
        $article = $s->fetchAll();
        include_once $root . '/components/resources.article.html.php';
        echo $foot;
        exit();
    }
    if ($view == "tools") {
        try {
            $sql = 'SELECT tool, toolDescription, toolLink FROM tools';
            $s = $pdo->query($sql);
        }
        catch (PDOException $e) {
            $output = 'Error fetching tools table: ' . $e->getMessage();
            include_once  $root . '/components/error.html.php';
            echo $foot;
            exit();
        }
        $tool = $s->fetchAll();
        include_once $root . '/components/resources.tool.html.php';
        echo $foot;
        exit();
    }
    if ($view == "all") {
        try {
            $sql = 'SELECT article, articleDescription, articleLink FROM articles';
            $s = $pdo->query($sql);
        }
        catch (PDOException $e) {
            $output = 'Error fetching articles table: ' . $e->getMessage();
            include_once  $root . '/components/error.html.php';
            echo $foot;
            exit();
        }
        $article = $s->fetchAll();
        try {
            $sql = 'SELECT tool, toolDescription, toolLink FROM tools';
            $s = $pdo->query($sql);
        }
        catch (PDOException $e) {
            $output = 'Error fetching tools table: ' . $e->getMessage();
            include_once  $root . '/components/error.html.php';
            echo $foot;
            exit();
        }
        $tool = $s->fetchAll();
        include_once $root . '/components/resources.all.html.php';
        echo $foot;
        exit();
    }
}
if (!isset($_POST['action'])) {
    echo file_get_contents($root . '/components/resources.form.html');
    echo $foot;
    exit();
}
?>
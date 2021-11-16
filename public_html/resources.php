<?php 
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/template/template.php";
echo $head;
if (isset($_POST["action"]) && $_POST["action"] == "View") {

    $view = $_POST["resource"];

    if (empty($view)) {
        $output = "Error please choose a category: ";
        include_once  $root . "/components/error.html.php";
        echo $foot;
        header( "refresh:5;./resources.php" );
        exit();  
    }

    include_once $root . "/includes/db.inc.php";
    
    if ($view == "articles") {
        
        include_once $root . "/includes/articles.inc.php";

        include_once $root . "/components/resources.article.html.php";
        echo $foot;
        exit();
    }
    if ($view == "tools") {

        include_once $root . "/includes/tools.inc.php";

        include_once $root . "/components/resources.tool.html.php";
        echo $foot;
        exit();
    }
    if ($view == "all") {

        include_once $root . "/includes/articles.inc.php";
        
        include_once $root . "/includes/tools.inc.php";

        include_once $root . "/components/resources.all.html.php";
        echo $foot;
        exit();
    }
}
if (!isset($_POST["action"])) {
    
    echo file_get_contents($root . "/components/resources.form.html");
    echo $foot;
    exit();
}
?>
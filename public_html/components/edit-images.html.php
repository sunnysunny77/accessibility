<?php include_once $root . "/includes/helpers.inc.php"; ?>
<link href="../../css/admin.css" rel="stylesheet" type="text/css" />
<h2>Welcome <?php htmlout($_SESSION["user"]); ?></h2>
<?php
echo "<h3>Edit Gallery Images</h3>";
foreach ($gallery as $value) {
    echo "<form action=\"?\" method=\"post\" enctype=\"multipart/form-data\">";
        echo "<fieldset>";
            echo"<legend> Image: ";
            htmlout($value["id"]);
            echo"</legend>";
            echo "<input type=\"hidden\" name=\"id\"  value=\"";
            htmlout($value["id"]);
            echo "\"/>";
            echo "<label for=\"upload";
            htmlout($value["id"]);
            echo "\">Upload File:</label>";
            echo "<br>";
            echo "<input type=\"file\" id=\"upload";
            htmlout($value["id"]);
            echo "\" name=\"upload\" />";
            echo "<br>";
            echo "<label for=\"alt";
            htmlout($value["id"]);
            echo "\">Alternative text:</label>";
            echo "<br>";
            echo "<input type=\"text\" id=\"alt";
            htmlout($value["id"]);
            echo "\" name=\"alt\" value=\"";
            htmlout($value["alt"]);
            echo "\" />";
            echo "<br>";
            echo "<label for=\"caption";
            htmlout($value["id"]);
            echo "\">Caption:</label>";
            echo "<br>";
            echo "<input type=\"text\" id=\"caption";
            htmlout($value["id"]);
            echo "\" name=\"caption\" value=\"";
            htmlout($value["caption"]);
            echo "\" />";
            echo "<br>";
            echo "<br>";
            echo "<input type=\"submit\" name=\"action\" value=\"Update Image\">";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<input type=\"submit\" name=\"action\"  value=\"Delete Image\" />";
            echo "<br>";
            echo "<br>";
        echo "</fieldset>";
    echo "</form>";
    echo "<br>";
    echo "<br>";
}
?>
<br>
<br>
<a id="log" href="../../logout.php">Log Out</a>

<?php include_once $root . "/includes/helpers.inc.php"; ?>
<link href="../../css/admin.css" rel="stylesheet" type="text/css" />
<h2>Welcome <?php htmlout($_SESSION["user"]); ?></h2>
<?php
echo "<h3>Edit Resource Tools</h3>";
foreach ($tool as $value) {
    echo "<form action=\"?\" method=\"post\" >";
    echo "<fieldset>";
    echo "<legend>Edit</legend>";
    echo "<input type=\"hidden\" name=\"id\"  value=\"";
    htmlout($value["id"]);
    echo "\"/>";
    echo "<label for=\"tool";
    htmlout($value["id"]);
    echo "\">Tool</label>";
    echo "<br>";
    echo "<textarea id=\"tool";
    htmlout($value["id"]);
    echo "\" name=\"tool\">";
    htmlout($value["tool"]);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"toolDescription";
    htmlout($value["id"]);
    echo "\">Tool Description</label>";
    echo "<br>";
    echo "<textarea rows=\"10\" id=\"toolDescription";
    htmlout($value["id"]);
    echo "\" name=\"toolDescription\">";
    htmlout($value["toolDescription"]);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"toolLink";
    htmlout($value["id"]);
    echo "\">Tool Link</label>";
    echo "<br>";
    echo "<textarea id=\"toolLink";
    htmlout($value["id"]);
    echo "\" name=\"toolLink\">";
    htmlout($value["toolLink"]);
    echo "</textarea>";
    echo "<br>";
    echo "<br>";
    echo "<input type=\"submit\" name=\"action\"  value=\"Update Tool\" />";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<input type=\"submit\" name=\"action\"  value=\"Delete Tool\" />";
    echo "<br>";
    echo "<br>";
    echo "</fieldset>";
    echo "</form>";
    echo "<br>";
}
?>
<br>
<br>
<a id="log" href="../../logout.php">Log Out</a>

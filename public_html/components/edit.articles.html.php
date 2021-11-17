<?php include_once $root . "/includes/helpers.inc.php"; ?>
<link href="../../css/admin.css" rel="stylesheet" type="text/css" />
<h2>Welcome <?php htmlout($_SESSION["user"]); ?></h2>
<?php
echo "<h3>Edit Resource Atricles</h3>";
foreach ($article as $value) {
    echo "<form action=\"?\" method=\"post\" >";
    echo "<fieldset>";
    echo "<legend>Edit</legend>";
    echo "<input type=\"hidden\" name=\"id\"  value=\"";
    htmlout($value["id"]);
    echo "\"/>";
    echo "<label for=\"article";
    htmlout($value["id"]);
    echo "\">Article</label>";
    echo "<br>";
    echo "<textarea id=\"article";
    htmlout($value["id"]);
    echo "\" name=\"article\">";
    htmlout($value["article"]);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"articleDescription";
    htmlout($value["id"]);
    echo "\">Article Description</label>";
    echo "<br>";
    echo "<textarea rows=\"10\" id=\"articleDescription";
    htmlout($value["id"]);
    echo "\" name=\"articleDescription\">";
    htmlout($value["articleDescription"]);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"articleLink";
    htmlout($value["id"]);
    echo "\">Article Link</label>";
    echo "<br>";
    echo "<textarea id=\"articleLink";
    htmlout($value["id"]);
    echo "\" name=\"articleLink\">";
    htmlout($value["articleLink"]);
    echo "</textarea>";
    echo "<br>";
    echo "<br>";
    echo "<input type=\"submit\" name=\"action\"  value=\"Update Article\" />";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<input type=\"submit\" name=\"action\"  value=\"Delete Article\" />";
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

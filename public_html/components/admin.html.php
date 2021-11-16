<?php include_once $root . "/includes/helpers.inc.php"; ?>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<h2>Welcome <?php htmlout($_SESSION["user"]); ?></h2>
<br>
<br>
<a class="adminSection" href="./add-new/"> Add New Resources & Images</a>
<br>
<br>
<a class="adminSection" href="./edit-articles/">Edit Articles</a>
<br>
<br>
<a class="adminSection" href="./edit-tools/">Edit Tools</a>
<br>
<br>
<a class="adminSection" href="./edit-images/">Edit Images</a>
<br>
<br>
<?php
echo "<h3>Change admin login</h3>";
echo "<form action=\"?\" method=\"post\">";
echo "<fieldset>";
echo "<legend>Change</legend>";
echo "<label for=\"user\"> User: </label>";
echo "<input autocomplete=\"on\" id=\"user\" type=\"text\" name=\"user\" value=\"";
htmlout($_SESSION["user"]);
echo"\"/>";
echo "<label for=\"pass\">Password:</label>";
echo "<input autocomplete=\"on\" type=\"password\" name=\"pass\" id=\"pass\" />";
echo "<input type=\"submit\" name=\"action\" value=\"Change Login\" />";
echo "</fieldset>";
echo "</form>";
?>
<br>
<br>
<a id="log" href="../logout.php">Log Out</a>

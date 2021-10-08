<?php include_once $root . '/includes/helpers.inc.php'; ?>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<h2>Welcome <?php htmlout($_SESSION['user']); ?></h2>
<h3>Add Resource Articles</h3>
<form action="#" method="post" >
<fieldset>
    <legend>Insert new Article</legend>
    <label for="newarticle">Article</label>
    <br>
    <textarea id="newarticle" name="article"></textarea>
    <br>
    <label for="newarticleDescription">Article Description</label>
    <br>
    <textarea rows="10" id="newarticleDescription" name="articleDescription"></textarea>
    <br>
    <label for="newarticleLink">Article Link</label>
    <br>
    <textarea id="newarticleLink" name="articleLink"></textarea>
    <br>
    <br>
    <input type="submit" name="action"  value="Insert Article" />
    <br>
</fieldset>
</form>
<h3>Add Resource Tools</h3>
<form action="#" method="post" >
<fieldset>
    <legend>Insert new Tool</legend>
    <label for="newtool">Tool</label>
    <br>
    <textarea id="newtool" name="tool"></textarea>
    <br>
    <label for="newtoolDescription">Tool Description</label>
    <br>
    <textarea rows="10" id="newtoolDescription" name="toolDescription"></textarea>
    <br>
    <label for="newtoolLink">Tool Link</label>
    <br>
    <textarea id="newtoolLink" name="toolLink"></textarea>
    <br>
    <br>
    <input type="submit" name="action"  value="Insert Tool" />
    <br>
</fieldset>
</form>
<h3>Edit Resource Atricles</h3>
<?php
foreach ($article as $update_1) {
    echo "<form action=\"#\" method=\"post\" >";
    echo "<fieldset>";
    echo "<legend>Edit</legend>";
    echo "<input type=\"hidden\" name=\"id\"  value=\"";
    htmlout($update_1['id']);
    echo "\"/>";
    echo "<label for=\"article";
    htmlout($update_1['id']);
    echo "\">Article</label>";
    echo "<br>";
    echo "<textarea id=\"article";
    htmlout($update_1['id']);
    echo "\" name=\"article\">";
    htmlout($update_1['article']);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"articleDescription";
    htmlout($update_1['id']);
    echo "\">Article Description</label>";
    echo "<br>";
    echo "<textarea rows=\"10\" id=\"articleDescription";
    htmlout($update_1['id']);
    echo "\" name=\"articleDescription\">";
    htmlout($update_1['articleDescription']);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"articleLink";
    htmlout($update_1['id']);
    echo "\">Article Link</label>";
    echo "<br>";
    echo "<textarea id=\"articleLink";
    htmlout($update_1['id']);
    echo "\" name=\"articleLink\">";
    htmlout($update_1['articleLink']);
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
<h3>Edit Resource Tools</h3>
<?php
foreach ($tool as $update_2) {
    echo "<form action=\"#\" method=\"post\" >";
    echo "<fieldset>";
    echo "<legend>Edit</legend>";
    echo "<input type=\"hidden\" name=\"id\"  value=\"";
    htmlout($update_2['id']);
    echo "\"/>";
    echo "<label for=\"tool";
    htmlout($update_2['id']);
    echo "\">Tool</label>";
    echo "<br>";
    echo "<textarea id=\"tool";
    htmlout($update_2['id']);
    echo "\" name=\"tool\">";
    htmlout($update_2['tool']);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"toolDescription";
    htmlout($update_2['id']);
    echo "\">Tool Description</label>";
    echo "<br>";
    echo "<textarea rows=\"10\" id=\"toolDescription";
    htmlout($update_2['id']);
    echo "\" name=\"toolDescription\">";
    htmlout($update_2['toolDescription']);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"toolLink";
    htmlout($update_2['id']);
    echo "\">Tool Link</label>";
    echo "<br>";
    echo "<textarea id=\"toolLink";
    htmlout($update_2['id']);
    echo "\" name=\"toolLink\">";
    htmlout($update_2['toolLink']);
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
<h3>Upload Header Logo</h3>
<form action="#" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>Upload</legend>
    <label for="upload">Upload File:</label>
    <br>
    <input type="file" id="upload" name="upload">
    <br>
    <br>
    <input type="submit" name="action" value="Upload">
    <br>
    <br>
</fieldset>
</form>
<br>
<br>
<a id="log" href="./logout.php">Log Out</a>

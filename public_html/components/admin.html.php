<?php include_once $root . '/includes/helpers.inc.php'; ?>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<h2>Welcome <?php htmlout($_SESSION['user']); ?></h2>
<?php
echo "<h3>Change admin login</h3>";
echo "<form action=\"?\" method=\"post\">";
echo "<fieldset>";
echo "<legend>Change</legend>";
echo "<label for=\"user\"> User: </label>";
echo "<input autocomplete=\"on\" id=\"user\" type=\"text\" name=\"user\" value=\"";
htmlout($_SESSION['user']);
echo"\"/>";
echo "<label for=\"pass\">Password:</label>";
echo "<input autocomplete=\"on\" type=\"password\" name=\"pass\" id=\"pass\" />";
echo "<input type=\"submit\" name=\"action\" value=\"Change Login\" />";
echo "</fieldset>";
echo "</form>";
?>
<h3>Add Resource Articles</h3>
<form action="?" method="post" >
<fieldset>
    <legend>Add New Resource Article</legend>
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
<h3>Add New Resource Tools</h3>
<form action="?" method="post" >
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
<h3>ADD New Gallery Image</h3>
<form action="?" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>Upload</legend>
    <label for="upload">Upload File:</label>
    <br>
    <input type="file" id="upload" name="upload" />
    <br>
    <label for="alt">Alternative text:</label>
    <br>
    <input type="text" id="alt" name="alt" />
    <br>
    <label for="caption">Caption:</label>
    <br>
    <input type="text" id="caption" name="caption" />
    <br>
    <br>
    <input type="submit" name="action" value="Upload" />
    <br>
    <br>
</fieldset>
</form>
<?php
echo "<h3>Edit Resource Atricles</h3>";
foreach ($article as $value) {
    echo "<form action=\"?\" method=\"post\" >";
    echo "<fieldset>";
    echo "<legend>Edit</legend>";
    echo "<input type=\"hidden\" name=\"id\"  value=\"";
    htmlout($value['id']);
    echo "\"/>";
    echo "<label for=\"article";
    htmlout($value['id']);
    echo "\">Article</label>";
    echo "<br>";
    echo "<textarea id=\"article";
    htmlout($value['id']);
    echo "\" name=\"article\">";
    htmlout($value['article']);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"articleDescription";
    htmlout($value['id']);
    echo "\">Article Description</label>";
    echo "<br>";
    echo "<textarea rows=\"10\" id=\"articleDescription";
    htmlout($value['id']);
    echo "\" name=\"articleDescription\">";
    htmlout($value['articleDescription']);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"articleLink";
    htmlout($value['id']);
    echo "\">Article Link</label>";
    echo "<br>";
    echo "<textarea id=\"articleLink";
    htmlout($value['id']);
    echo "\" name=\"articleLink\">";
    htmlout($value['articleLink']);
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
foreach ($tool as $value) {
    echo "<form action=\"?\" method=\"post\" >";
    echo "<fieldset>";
    echo "<legend>Edit</legend>";
    echo "<input type=\"hidden\" name=\"id\"  value=\"";
    htmlout($value['id']);
    echo "\"/>";
    echo "<label for=\"tool";
    htmlout($value['id']);
    echo "\">Tool</label>";
    echo "<br>";
    echo "<textarea id=\"tool";
    htmlout($value['id']);
    echo "\" name=\"tool\">";
    htmlout($value['tool']);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"toolDescription";
    htmlout($value['id']);
    echo "\">Tool Description</label>";
    echo "<br>";
    echo "<textarea rows=\"10\" id=\"toolDescription";
    htmlout($value['id']);
    echo "\" name=\"toolDescription\">";
    htmlout($value['toolDescription']);
    echo "</textarea>";
    echo "<br>";
    echo "<label for=\"toolLink";
    htmlout($value['id']);
    echo "\">Tool Link</label>";
    echo "<br>";
    echo "<textarea id=\"toolLink";
    htmlout($value['id']);
    echo "\" name=\"toolLink\">";
    htmlout($value['toolLink']);
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
<h3>Edit Gallery Images</h3>
<?php
foreach ($gallery as $value) {
    echo "<form action=\"?\" method=\"post\" enctype=\"multipart/form-data\">";
        echo "<fieldset>";
            echo"<legend> Image: ";
            htmlout($value['id']);
            echo"</legend>";
            echo "<input type=\"hidden\" name=\"id\"  value=\"";
            htmlout($value['id']);
            echo "\"/>";
            echo "<label for=\"upload";
            htmlout($value['id']);
            echo "\">Upload File:</label>";
            echo "<br>";
            echo "<input type=\"file\" id=\"upload";
            htmlout($value['id']);
            echo "\" name=\"upload\" />";
            echo "<br>";
            echo "<label for=\"alt";
            htmlout($value['id']);
            echo "\">Alternative text:</label>";
            echo "<br>";
            echo "<input type=\"text\" id=\"alt";
            htmlout($value['id']);
            echo "\" name=\"alt\" value=\"";
            htmlout($value['alt']);
            echo "\" />";
            echo "<br>";
            echo "<label for=\"caption";
            htmlout($value['id']);
            echo "\">Caption:</label>";
            echo "<br>";
            echo "<input type=\"text\" id=\"caption";
            htmlout($value['id']);
            echo "\" name=\"caption\" value=\"";
            htmlout($value['caption']);
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
<a id="log" href="./logout.php">Log Out</a>

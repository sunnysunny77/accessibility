<?php include_once $root . "/includes/helpers.inc.php"; ?>
<link href="css/resources.css" rel="stylesheet" type="text/css" />
<?php 
echo "<table>";
  echo "<caption>";
    echo "<h2>Links to accessibility articles</h2>";
  echo "</caption>";
  echo "<tr>";
    echo "<th id=\"article\">Article Name</th>";
    echo  "<th id=\"articleDescription\">Description</th>";
    echo  "<th id=\"articleLink\">Link</th>";
  echo "</tr>";
  foreach ($article as $value) {
    echo "<tr>";
      echo "<td headers=\"article\">";
      htmlout($value["article"]);
      echo "</td>";
      echo "<td headers=\"articleDescription\">";
      htmlout($value["articleDescription"]); 
      echo "</td>";
      echo "<td headers=\"articleLink\">";
      echo "<a href=\"";
      htmlout($value["articleLink"]); 
      echo "\" rel=\"external\" target=\"";    
      htmlout($value["article"]);    
      echo "\">";
      htmlout($value["article"]);
      echo "</a>";
      echo "</td>";
    echo "</tr>";
  }
echo "</table>";
?>


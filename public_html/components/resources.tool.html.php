<?php include_once $root . "/includes/helpers.inc.php"; ?>
<link href="css/resources.css" rel="stylesheet" type="text/css" />
<?php 
echo "<table>";
  echo "<caption>";
    echo "<h2>Links to accessibility tools</h2>";
  echo "</caption>";
  echo "<tr>";
    echo "<th id=\"tool\">Tool Name</th>";
    echo  "<th id=\"toolDescription\">Description</th>";
    echo  "<th id=\"toolLink\">Link</th>";
  echo "</tr>";
  foreach ($tool as $value) {
    echo "<tr>";
      echo "<td headers=\"tool\">";
      htmlout($value["tool"]);
      echo "</td>";
      echo "<td headers=\"toolDescription\">";
      htmlout($value["toolDescription"]); 
      echo "</td>";
      echo "<td headers=\"toolLink\">";
      echo "<a href=\"";
      htmlout($value["toolLink"]); 
      echo "\" rel=\"external\" target=\"";    
      htmlout($value["tool"]);    
      echo "\">";
      htmlout($value["tool"]);
      echo "</a>";
      echo "</td>";
    echo "</tr>";
  }
echo "</table>";
?>


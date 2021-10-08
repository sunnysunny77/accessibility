<?php include_once $root . '/includes/helpers.inc.php'; ?>
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
  for ($x = 0; $x < $count_2; $x++) {
    echo "<tr>";
      echo "<td headers=\"tool\">";
      htmlout($tool[$x]['tool']);
      echo "</td>";
      echo "<td headers=\"toolDescription\">";
      htmlout($tool[$x]['toolDescription']); 
      echo "</td>";
      echo "<td headers=\"toolLink\">";
      echo "<a href=\"";
      htmlout($tool[$x]['toolLink']); 
      echo "\" rel=\"external\" target=\"";    
      htmlout($tool[$x]['tool']);    
      echo "\">";
      htmlout($tool[$x]['tool']);
      echo "</a>";
      echo "</td>";
    echo "</tr>";
  }
echo "</table>";
?>


<link href="css/gallery.css" rel="stylesheet" type="text/css" />
<h2>Images</h2>
<?php include_once $root . '/includes/helpers.inc.php';
foreach ($gallery as $file) {
  echo "<figure>";
    echo "<img src=\"./image.download.php?image_id=";
    htmlout($file["id"]);
    echo "\" alt=\"";
    htmlout($file["alt"]);
    echo "\" />";
    echo "<figcaption>";
    htmlout($file["caption"]);
    echo "</figcaption>";
  echo "</figure>";
}
?>  
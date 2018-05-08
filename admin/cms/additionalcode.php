<?php
require_once('../../Connections/configuration.php');
require_once('../../Connections/db.php');
require_once('../../Connections/authenticate.php');

$colname_cms = "1";
if (isset($_GET['ID'])) {
  $colname_cms = (get_magic_quotes_gpc()) ? $_GET['ID'] : addslashes($_GET['ID']);
}

$query_cms = sprintf("SELECT * FROM content WHERE ID = '%s'", $colname_cms);
$cms = mysql_query($query_cms, $db) or die(mysql_error());
$row_cms = mysql_fetch_assoc($cms);
$totalRows_cms = mysql_num_rows($cms);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/css/admin-header.css" rel="stylesheet" type="text/css" />
<link href="/css/admin-left_column.css" rel="stylesheet" type="text/css" />
<link href="/css/admin-content.css" rel="stylesheet" type="text/css" />
<link href="/css/footer.css" rel="stylesheet" type="text/css" />
<title>Preview of <?php echo $row_cms['Page']; ?></title>
</head>

<body>
<h1>Additional code entered for <?php echo $row_cms['Page']; ?></h1>
<p>
<xmp>
<?php echo stripslashes($row_cms['JavaScript']); ?>
</xmp>
</p>
</body>
</html>

<?php
// Get the menu items
$query_topnav = "SELECT * FROM content WHERE Top_Menu > 0";
if ($enableCountries) {
	$query_topnav .= " AND Section = ".$GLOBALS['MM_UserSection'];
}
$query_topnav .= " ORDER BY Top_Menu ASC";
$topnav = mysql_query($query_topnav, $db) or die(mysql_error());
$row_topnav = mysql_fetch_assoc($topnav);
$totalRows_topnav = mysql_num_rows($topnav);


?>
<link href="/css/admin-header.css" rel="stylesheet" type="text/css" />

<div id="header">

	
<div class="logo"><a href="/index.php"><img src="/images/_admin_logo.jpg" alt="<?php echo $webSiteName; ?>" width="187" height="50" border="0" /></a></div>
<div class="strapline">Content Management System</div>
<div class="solidblocktopnav">
<?php
if ($enableCountries) {
	// Get the country/section
	$query_topnav2 = "SELECT * FROM section WHERE ID = ".$GLOBALS['MM_UserSection2'];
	$topnav2 = mysql_query($query_topnav2, $db) or die(mysql_error());
	$row_topnav2 = mysql_fetch_assoc($topnav2);
	$totalRows_topnav2 = mysql_num_rows($topnav2);
?>
<div class="current_section">You are currrently viewing the <strong><?php echo $row_topnav2['Content_Type']; ?></strong> section</div>
<?php } ?>


<div class="live_site_link"><a href="/<?php echo $indexURL; ?>" target="_blank">View Live Site</a> &nbsp; | &nbsp; <a href="<?php echo $logoutAction ?>">Log Out</a></div>

</div>

<div class="header_bottom"><div class="header_bottom_border"></div></div>

</div>
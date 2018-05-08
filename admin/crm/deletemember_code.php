<?php
// The rowspan to create the contextual menu table
$contextualRowSpan = 8;
if ($GLOBALS['MM_UserGroup'] >= 300) {
	$contextualRowSpan = $contextualRowSpan + 2;
}

if ((isset($_GET['Email'])) && ($_GET['Email'] != "") && (isset($_POST['MM_delete']))) {

	// Update cms with the old ID to be the new ID
	$updateSQL = sprintf("UPDATE cms SET Uploaded_By=%s WHERE Uploaded_By=%s",
                       GetSQLValueString($_POST['newowner'], "text"),
                       GetSQLValueString($_POST['ID'], "text"));
	$Result1 = mysql_query($updateSQL, $db) or die(mysql_error());
	// Update cms_content
	$updateSQL = sprintf("UPDATE cms_content SET Category_Creator=%s WHERE Category_Creator=%s",
                       GetSQLValueString($_POST['newowner'], "text"),
                       GetSQLValueString($_POST['ID'], "text"));
	$Result1 = mysql_query($updateSQL, $db) or die(mysql_error());	

	// Update the groups database
	$deleteSQL = sprintf("DELETE FROM `crm-crm_group` WHERE crm_ID=%s",
						   GetSQLValueString($_POST['ID'], "text"));
	$Result1 = mysql_query($deleteSQL, $db) or die(mysql_error());

  // Delete from CRM (user) database
  $deleteSQL = sprintf("DELETE FROM crm WHERE Email=%s",
                       GetSQLValueString($_GET['Email'], "text"));
  mysql_select_db($database_db, $db);
  $Result1 = mysql_query($deleteSQL, $db) or die(mysql_error());

  $deleteGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$EmailSearch = "Search Members";

$colname_crm = "1";
if (isset($_GET['Email'])) {
  $colname_crm = (get_magic_quotes_gpc()) ? $_GET['Email'] : addslashes($_GET['Email']);
}
mysql_select_db($database_db, $db);
$query_crm = sprintf("SELECT * FROM crm WHERE Email = '%s'", $colname_crm);
$crm = mysql_query($query_crm, $db) or die(mysql_error());
$row_crm = mysql_fetch_assoc($crm);
$totalRows_crm = mysql_num_rows($crm);

$query_newusers = sprintf("SELECT * FROM crm WHERE Access_Level >= '%s' AND Email != '%s' ORDER BY First_Name", $row_crm['Access_Level'], $row_crm['Email'] );
$newusers = mysql_query($query_newusers, $db) or die(mysql_error());
$row_newusers = mysql_fetch_assoc($newusers);
$totalRows_newusers = mysql_num_rows($newusers);
?>
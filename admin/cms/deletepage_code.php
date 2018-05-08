<?php
$colname_cms = "1";
if (isset($_GET['ID'])) {
  $colname_cms = (get_magic_quotes_gpc()) ? $_GET['ID'] : addslashes($_GET['ID']);
}
mysql_select_db($database_db, $db);
$query_cms = sprintf("SELECT content.*, language.Language FROM content, language WHERE content.ID = '%s' AND content.Language_ID = language.ID", $colname_cms);
$cms = mysql_query($query_cms, $db) or die(mysql_error());
$row_cms = mysql_fetch_assoc($cms);
$totalRows_cms = mysql_num_rows($cms);

if ($row_cms['Checked_Out'] > 0 AND $GLOBALS['MM_UserGroup'] != 500 AND $GLOBALS['MM_UID'] !=  $row_cms['Checked_Out']) {
	// Item is checked out, but not by admin or user, therefore do not allow to delete as a safe guard but redirect back to the listing page
	
	$updateGoTo = "index.php";

	header(sprintf("Location: %s", $updateGoTo));
	exit;

}

if ((isset($_POST['ID'])) && ($_POST['ID'] != "") && (isset($_POST['MM_delete']))) {

	$deleteSQL = sprintf("DELETE FROM content WHERE ID=%s",
						GetSQLValueString($_POST['ID'], "text"));
	$Result1 = mysql_query($deleteSQL, $db) or die(mysql_error());

	// Update any categories or pages related to this item
	$updateSQL = "UPDATE content SET Related_Page='0', Menu_Section = 'Standalone' WHERE Related_Page = '".$_POST['ID']."'";
	$Result1 = mysql_query($updateSQL, $db) or die(mysql_error());
	$updateSQL = "UPDATE cms_content SET Related_Page='1' WHERE Related_Page = '".$_POST['ID']."'";
	$Result1 = mysql_query($updateSQL, $db) or die(mysql_error());

	$deleteGoTo = "index.php";	
	header(sprintf("Location: %s", $deleteGoTo));
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
$errorMessage ="";
$EmailSearch = "Search Members";

$colname_crmcheck = "1";
if (isset($_POST['Email'])) {
  $colname_crmcheck = (get_magic_quotes_gpc()) ? $_POST['Email'] : addslashes($_POST['Email']);
}
mysql_select_db($database_db, $db);
$query_crmcheck = sprintf("SELECT * FROM crm WHERE Email = '%s'", $colname_crmcheck);
$crmcheck = mysql_query($query_crmcheck, $db) or die(mysql_error());
$row_crmcheck = mysql_fetch_assoc($crmcheck);
$totalRows_crmcheck = mysql_num_rows($crmcheck);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
if ($totalRows_crmcheck < 1 || strcmp(strtolower($colname_crmcheck), strtolower($_POST['EmailTemp'])) == 0) {
	if (!isset($_POST['Subscribed'])) {
		$_POST['Subscribed'] = "No";
	}
	
	
	$updateSQL = sprintf("UPDATE crm SET Email=%s, Password=%s, Access_Level=%s, Company=%s, First_Name=%s, Surname=%s, Job_Title=%s WHERE ID=%s",
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['Access_Level'], "text"),
                       GetSQLValueString($_POST['Company'], "text"),
                       GetSQLValueString($_POST['First_Name'], "text"),
                       GetSQLValueString($_POST['Surname'], "text"),
                       GetSQLValueString($_POST['Job_Title'], "text"),
                       GetSQLValueString($_POST['ID'], "text"));

	$Result1 = mysql_query($updateSQL, $db) or die(mysql_error());

	if ($enableCountries) {
		if ($_POST['Access_Level'] > 99 AND $_POST['Access_Level'] < 500) {
			// Insert Country code for admin users that are not God level users
			$updateSQL = sprintf("UPDATE crm SET Section=%s WHERE ID=%s",
						   GetSQLValueString($_POST['Country'], "text"),
						   GetSQLValueString($_POST['ID'], "int"));
	
			$Result1 = mysql_query($updateSQL, $db) or die(mysql_error());
		}
	}


	// Delete the entries in the crm-crm_group table and re-add them
	$deleteSQL = sprintf("DELETE FROM `crm-crm_group` WHERE crm_ID=%s",
						   GetSQLValueString($_POST['ID'], "text"));
	$Result1 = mysql_query($deleteSQL, $db) or die(mysql_error());
	
	if (count($_POST['Group']) > 0) {
		$dbID = mysql_insert_id(); // Find the ID of the product above
		foreach ($_POST['Group'] as $key => $value) {
			$insertSQL = sprintf("INSERT INTO `crm-crm_group` (
								crm_ID, crm_group_ID
								) VALUES (
								%s, %s)",
							   GetSQLValueString($_POST['ID'], "int"),
							   GetSQLValueString($value, "int")
							   );
			$Result1 = mysql_query($insertSQL, $db) or die(mysql_error());
		}
	}

	$updateGoTo = "index.php";	
	if (isset($_SERVER['QUERY_STRING'])) {
		$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
		$updateGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $updateGoTo));
} else {
	// Already an entry with that email address
	$errorMessage = "The email address you entered has already been registered";
}
}

$colname_crm = "1";
if (isset($_GET['Email'])) {
  $colname_crm = (get_magic_quotes_gpc()) ? $_GET['Email'] : addslashes($_GET['Email']);
}

$query_crm = sprintf("SELECT * FROM crm WHERE Email = '%s'", $colname_crm);
$crm = mysql_query($query_crm, $db) or die(mysql_error());
$row_crm = mysql_fetch_assoc($crm);
$totalRows_crm = mysql_num_rows($crm);

$query_crm_access = "SELECT * FROM crm_access WHERE Access_Level >= 100 ORDER BY Access_Level ASC";
$crm_access = mysql_query($query_crm_access, $db) or die(mysql_error());
$row_crm_access = mysql_fetch_assoc($crm_access);
$totalRows_crm_access = mysql_num_rows($crm_access);

// Find Groups
$query_section = "SELECT * FROM crm_group ORDER BY Name ASC";
$section = mysql_query($query_section, $db) or die(mysql_error());
$row_section = mysql_fetch_assoc($section);
$totalRows_section = mysql_num_rows($section);

if ($enableCountries) {
	// Find Countries
	$query_countries = "SELECT * FROM section WHERE System != 1 ORDER BY Content_Type ASC";
	$countries = mysql_query($query_countries, $db) or die(mysql_error());
	$row_countries = mysql_fetch_assoc($countries);
	$totalRows_countries = mysql_num_rows($countries);
}

// Social Media Session of user
$_SESSION['MM_socialMediaID'] = $row_crm['ID'];

?>
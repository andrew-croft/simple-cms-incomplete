<?php
$editFormAction = $_SERVER['PHP_SELF'];
$errorMessage ="";

$colname_CRM = "1";
if (isset($_POST['Email'])) {
  $colname_CRM = (get_magic_quotes_gpc()) ? $_POST['Email'] : addslashes($_POST['Email']);
}
mysql_select_db($database_db, $db);
$query_CRM = sprintf("SELECT * FROM crm WHERE Email = '%s'", $colname_CRM);
$CRM = mysql_query($query_CRM, $db) or die(mysql_error());
$row_CRM = mysql_fetch_assoc($CRM);
$totalRows_CRM = mysql_num_rows($CRM);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
if ($totalRows_CRM < 1) {
	if (!isset($_POST['Subscribed'])) {
		$_POST['Subscribed'] = "No";
	}
	$dateCreated = date("Y-m-d");
	$insertSQL = sprintf("INSERT INTO crm (Email, Password, Access_Level, Company, First_Name, Surname, Job_Title, Date_Created) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['Access_Level'], "text"),
                       GetSQLValueString($_POST['Company'], "text"),
                       GetSQLValueString($_POST['First_Name'], "text"),
                       GetSQLValueString($_POST['Surname'], "text"),
                       GetSQLValueString($_POST['Job_Title'], "text"),
					   GetSQLValueString($dateCreated, "text"));

	$Result1 = mysql_query($insertSQL, $db) or die(mysql_error());
		
	$dbID = mysql_insert_id(); // Find the ID of the inserted user

	if ($enableCountries) {
		
		if ($_POST['Access_Level'] > 99 AND $_POST['Access_Level'] < 500) {
			// Insert Country code for admin users that are not God level users
			$updateSQL = sprintf("UPDATE crm SET Section=%s WHERE ID=%s",
						   GetSQLValueString($_POST['Country'], "text"),
						   GetSQLValueString($dbID, "int"));
	
			$Result1 = mysql_query($updateSQL, $db) or die(mysql_error());
		}
	}
	
	// Insert any grousp into the groups database
	if (count($_POST['Group']) > 0) {
		foreach ($_POST['Group'] as $key => $value) {
			$insertSQL = sprintf("INSERT INTO `crm-crm_group` (
									crm_ID, crm_group_ID
									) VALUES (
									%s, %s)",
								   GetSQLValueString($dbID, "int"),
								   GetSQLValueString($value, "int")
								   );
	
			$Result1 = mysql_query($insertSQL, $db) or die(mysql_error());
		}
	}	

  $insertGoTo = "index.php";

  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
	} else {
		// Already an entry with that email address
		$errorMessage = "The email address you entered has already been registered";
	}
}

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

mysql_free_result($CRM);
?>
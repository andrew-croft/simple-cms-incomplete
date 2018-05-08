<?php
//initialize the session
session_start();

mysql_select_db($database_db, $db);

//**************************************************************************************/
// Find out the users access level

if (isset($_SESSION['MM_UserGroup'])) {   
	$GLOBALS['MM_UserGroup'] = $_SESSION['MM_UserGroup'];	
} else {
	$GLOBALS['MM_UserGroup'] = "0";
}

//**************************************************************************************/
// Find out the users section level

if (isset($_SESSION['MM_UserSection']) AND $_SESSION['MM_UserSection'] > 1) {   
	$GLOBALS['MM_UserSection'] = $_SESSION['MM_UserSection'];	
} else {
	$GLOBALS['MM_UserSection'] = "1"; // Default pages
}


// Admin area
if (isset($_SESSION['MM_UserSection2']) AND $_SESSION['MM_UserSection2'] > 1) {   
	$GLOBALS['MM_UserSection2'] = $_SESSION['MM_UserSection2'];	
} else {
	$GLOBALS['MM_UserSection2'] = "1"; // Default pages
}

if (!strstr($_SERVER["PHP_SELF"], "/admin/")) {
	// Support for country cookie.
	if (isset($_COOKIE["MM_Country"]) AND $_COOKIE["MM_Country"] > 0) {
		$GLOBALS['MM_UserSection'] = $_SESSION['MM_UserSection'] = $_COOKIE["MM_Country"];
	}
	
	if (isset($_GET['sectionID']) AND $_GET['sectionID'] > 0) {
		$_GET['sectionID'] = parseInput($_GET['sectionID']);
		// Gone to a Section/Index URL, therefore this is the country
		$_SESSION['MM_UserSection'] = $GLOBALS['MM_UserSection'] =	$_GET['sectionID'] = parseInput($_GET['sectionID']);

		// Set a cookie for when the person comes back.
		setcookie("MM_Country", $GLOBALS['MM_UserSection'], time()+ (60 * 60 * 24 * 30 * 6));  /* expire in about 6 months */

	}

	// Check that the country is still acitve. If not, return back to default.
	$query_country = "SELECT * FROM section where ID = '%s'", $GLOBALS['MM_UserSection']);
	$country = mysql_query($query_country, $db) or die(mysql_error());
	$row_country = mysql_fetch_assoc($country);
	$totalRows_country = mysql_num_rows($country);
	if ($totalRows_country < 1) {
		$GLOBALS['MM_UserSection'] = "1"; // Default pages
	}
}
//**************************************************************************************/
// Get the user name (email address) and ID

if (isset($_SESSION['MM_Username'])) {
	$GLOBALS['MM_Username'] = $_SESSION['MM_Username'];
	
	$query_userID = sprintf("select First_Name, ID from crm where Email = '%s'", $GLOBALS['MM_Username']);
	$userID = mysql_query($query_userID, $db) or die(mysql_error());
	$row_userID = mysql_fetch_assoc($userID);
	$totalRows_userID = mysql_num_rows($userID);
	if ($totalRows_userID == 1) {
		$GLOBALS['MM_UID'] = $row_userID['ID'];
		$GLOBALS['MM_Name'] = $row_userID['First_Name'];
		
	} else {
		$GLOBALS['MM_UID'] = 0;
	}
	
	// Find the group they belong to
	$query_crm = "SELECT * FROM `crm-crm_group` where crm_ID = '%s'", $GLOBALS['MM_UID']);
	$crm = mysql_query($query_crm, $db) or die(mysql_error());
	$count = 1;
	$groupID['0'] = 0;	// Always ensure we have a value to prevent PHP errors
	
	while ($row_crm = mysql_fetch_assoc($crm)) {
		$groupID[$count] = $row_crm["crm_group_ID"];
		$count++;
	}

} else {
	$GLOBALS['MM_Username'] = "";
	$GLOBALS['MM_UID'] = 0;
	$count = 1;
	$groupID['0'] = 0;	// Always ensure we have a value to prevent PHP errors

}


// If the user is not logged in, redirect to the login page
$MM_restrictGoTo = "login.php";


// if trying to use admin page and not logged in
if (strstr($_SERVER["PHP_SELF"], "/admin/")) {
	if (!(isset($_SESSION['MM_Username'])) OR $GLOBALS['MM_UserGroup'] < 100) {   
		$MM_qsChar = "?";
		$MM_referrer = $_SERVER['PHP_SELF'];
		if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
		if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) {
			$MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
		}
		$MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
		header("Location: ". $MM_restrictGoTo); 
		exit;
	} else {
		// Admin area and my access level is valid
		$_SESSION['MM_logged'] = true;
	}
	
	// If a non admin user is trying to load an admin page and are logged in, rediretc back to login page
	if (strstr($_SERVER["PHP_SELF"], "/admin/") AND strstr($_SERVER["PHP_SELF"], "/admin/") AND $GLOBALS['MM_UserGroup'] < 100) { 
		header("Location: ". $MM_restrictGoTo); 
		exit;
	}
}


//**************************************************************************************/
// If clicked on the country menu
// Change Country View
if (isset($_GET['changeCountry']) AND $_GET['changeCountry'] > 0 AND !strstr($_SERVER["PHP_SELF"], "/admin/")) {
	// Do not do if int he admin area
	$_POST['changeCountry'] = $_GET['changeCountry'];
}
if (isset($_POST['changeCountry']) AND $_POST['changeCountry'] > 0) {
	$_SESSION['MM_UserSection'] = $GLOBALS['MM_UserSection'] = $_POST['changeCountry'];	
	// Also set a cookie for when the person comes back.
	setcookie("MM_Country", $_POST['changeCountry'], time()+ (60 * 60 * 24 * 30 * 6));  /* expire in about 6 months */
	
	//Rediret back to main home page
	$redirectPage = "/".$indexURL;
	if ($_SESSION['MM_UserSection'] > 1) { 
		$redirectPage = "/index-inx-".$_SESSION['MM_UserSection'].".php";
	}
	header("Location: ".$redirectPage);
}

//**************************************************************************************/
// Set the language being used
if (isset($_SESSION['MM_language'])) {   
	$GLOBALS['MM_language'] = $_SESSION['MM_language'];	
} else {

	$GLOBALS['MM_language'] = "en";

}
?>

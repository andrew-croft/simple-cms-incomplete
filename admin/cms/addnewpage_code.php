<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "upload")) {

	// Form has been submitted with file details
	mysql_select_db($database_db, $db);

	// Set the menuorder variable
	if ($_POST['menuname'] != "" OR $_POST['menusection'] == "LHM" OR substr($_POST['menusection'],0,1) == "c" OR substr($_POST['menusection'],0,1) == "p") {
		$menuorder = $_POST['menuorder'];
	} else {
		$menuorder = 0;
	}

	if (substr($_POST['menusection'],0,1) == "c") {
		// Categoy, therefore remove the first character
		$relatedPage = 1;	// Set to be standalone in the eyes of the left hand menu
		$relatedCategory = substr($_POST['menusection'], 1,strlen($_POST['menusection']) - 1);	
		//$_POST['menusection'] = substr($_POST['menusection'], 1,strlen($_POST['menusection']) - 1);
		$topmenu = 0;	
	} else if (substr($_POST['menusection'],0,1) == "p") {
		// Page, therefore remove the first character
		$relatedPage = substr($_POST['menusection'], 1,strlen($_POST['menusection']) - 1);	
		//$_POST['menusection'] = substr($_POST['menusection'], 1,strlen($_POST['menusection']) - 1);	
		$relatedCategory = 0;
		$topmenu = 0;
	} else if ($_POST['menusection'] == "TopMenu") {
		// Top Menu Item		
		$relatedPage = 0;	
		$relatedCategory = 0;
		$topmenu = $menuorder;
	} else {
		$relatedPage = 0;	
		$relatedCategory = 0;
		$topmenu = 0;
	}

	$_POST['headercode'] = preg_replace('/<p>/', '', $_POST['headercode']);	// Remove the start <p> or <p attr="">
	$_POST['headercode'] = preg_replace('/<\/p>/', '', $_POST['headercode']);		// Replace the end </p>
	
	//secondary banner	
	$_POST['secondarybannercode'] = preg_replace('/<p>/', '', $_POST['secondarybannercode']);	// Remove the start <p> or <p attr="">
	$_POST['secondarybannercode'] = preg_replace('/<\/p>/', '', $_POST['secondarybannercode']);		// Replace the end </p>

	$_POST['heading'] = preg_replace('/<p[^>]*>/', '', $_POST['heading']);	// Remove the start <p> or <p attr="">
	$_POST['heading'] = preg_replace('/<\/p>/', '', $_POST['heading']);		// Replace the end </p>
	
	
	$insertSQL = sprintf("INSERT INTO content (
								Page, Title, Keywords, Description, Active, Menu_Name, Menu_Section, Menu_Order, Heading, Main_Content, Header_Code, Secondary_Banner,
								Related_Page, Related_Category, User_Group, URL, JavaScript, Section, Top_Menu
							) VALUES (
								%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,
								%s, %s, %s, %s, %s, %s, %s, %s
							)",								
								GetSQLValueString(addslashes($_POST['page']), "text"),
							   GetSQLValueString(addslashes($_POST['title']), "text"),
							   GetSQLValueString(addslashes($_POST['keywords']), "text"),
							   GetSQLValueString(addslashes($_POST['description']), "text"),
							   GetSQLValueString($_POST['active'], "text"),
							   GetSQLValueString($_POST['menuname'], "text"),
							   GetSQLValueString($_POST['menusection'], "text"),
							   GetSQLValueString($menuorder, "int"),
							   GetSQLValueString(addslashes($_POST['heading']), "text"),
							   GetSQLValueString(addslashes($_POST['content1']), "text"),
							   GetSQLValueString($_POST['headercode'], "text"),
							   GetSQLValueString($_POST['secondarybannercode'], "text"),
							   GetSQLValueString($relatedPage, "int"),
								GetSQLValueString($relatedCategory, "int"),
								GetSQLValueString($_POST['group'], "int"),
								GetSQLValueString($_POST['url'], "text"),
								GetSQLValueString($_POST['JavaScript'], "text"),
								GetSQLValueString($_POST['section'], "int"),
								GetSQLValueString($topmenu, "int")
						  );		
	$Result1 = mysql_query($insertSQL, $db) or die(mysql_error());

	// Get the ID of the item we just submitted
	$dbID = mysql_insert_id();	
	
	// Store the filename, based on the name of the page and if a top menu, store the id number of the item in the menu section
	$filename = generateURL($_POST['page']);
	if ($_POST['menusection'] == "TopMenu") {
		$_POST['menusection'] = "t".$dbID;
	}
	$updateSQL = sprintf("UPDATE content SET Filename=%s, Menu_Section=%s WHERE ID=%s",
								GetSQLValueString($filename, "text"),
								GetSQLValueString($_POST['menusection'], "text"),
							   GetSQLValueString($dbID, "int")
						   );
	$Result1 = mysql_query($updateSQL, $db) or die(mysql_error());



	$insertGoTo = "index.php";
	if (isset($_SERVER['QUERY_STRING'])) {
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $insertGoTo));
}

$query_access_level = "SELECT * FROM language WHERE Active = 'Yes' ORDER BY Language ASC";
$access_level = mysql_query($query_access_level, $db) or die(mysql_error());
$row_access_level = mysql_fetch_assoc($access_level);
$totalRows_access_level = mysql_num_rows($access_level);

// Find LHM Categories
//$query_cms_cat = "SELECT * FROM cms_content WHERE Related_Page = 'LHM'";
$query_cms_cat = "SELECT * FROM cms_content WHERE (Related_Page = 0 OR Related_Page > 1 OR (Related_Page = 1 AND Related_Category > 0))";
if ($enableCountries) {
	$query_cms_cat .= " AND Section = ".$GLOBALS['MM_UserSection2'];
}
$query_cms_cat .= " ORDER BY Content_Type ASC";
$cms_cat = mysql_query($query_cms_cat, $db) or die(mysql_error());
$row_cms_cat = mysql_fetch_assoc($cms_cat);
$totalRows_cms_cat = mysql_num_rows($cms_cat);

// Find LHM Pages
//$query_cms_cat2 = "SELECT * FROM content WHERE Menu_Section = 'LHM'";
$query_cms_cat2 = "SELECT * FROM content WHERE ID != '".$colname_crmcheck."' AND Menu_Section != 'Standalone' AND Top_Menu < 1 AND Menu_Section NOT LIKE 't%' AND (Related_Page = 0 OR Related_Page > 1 OR (Related_Page = 1 AND Related_Category > 0))";
if ($enableCountries) {
	$query_cms_cat2 .= " AND Section = ".$GLOBALS['MM_UserSection2'];
}
$query_cms_cat2 .= " ORDER BY Page ASC";

$cms_cat2 = mysql_query($query_cms_cat2, $db) or die(mysql_error());
$row_cms_cat2 = mysql_fetch_assoc($cms_cat2);
$totalRows_cms_cat2 = mysql_num_rows($cms_cat2);

if ($enableSections) {
	// Find Sections
	$query_cms_cat3 = "SELECT * FROM section WHERE System != 1 ORDER BY `Order` ASC";
	$cms_cat3 = mysql_query($query_cms_cat3, $db) or die(mysql_error());
	$row_cms_cat3 = mysql_fetch_assoc($cms_cat3);
	$totalRows_cms_cat3 = mysql_num_rows($cms_cat3);
}

if ($enableCountries) {
	// Find Sections
	$query_sections = "SELECT * FROM section WHERE ID > 0 ORDER BY Content_Type ASC";
	$sections = mysql_query($query_sections, $db) or die(mysql_error());
	$row_sections = mysql_fetch_assoc($sections);
	$totalRows_sections = mysql_num_rows($sections);
}

// Get the menu items
$query_navoptions = "SELECT * FROM content WHERE Top_Menu > 0";
if ($enableCountries) {
	$query_navoptions .= " AND Section = ".$GLOBALS['MM_UserSection2'];
}
$query_navoptions .= " ORDER BY Top_Menu ASC";

$navoptions = mysql_query($query_navoptions, $db) or die(mysql_error());
$row_navoptions = mysql_fetch_assoc($navoptions);
$totalRows_navoptions = mysql_num_rows($navoptions);

// Find Groups
$query_groups = "SELECT * FROM crm_group ORDER BY System DESC, Name ASC";
$groups = mysql_query($query_groups, $db) or die(mysql_error());
$row_groups = mysql_fetch_assoc($groups);
$totalRows_groups = mysql_num_rows($groups);
?>

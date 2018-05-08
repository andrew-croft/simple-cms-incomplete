<?php


$db = mysql_connect($hostname_db, $username_db, $password_db) or trigger_error(mysql_error(),E_USER_ERROR);
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){

	// Destroy the session variables
	// Works best on all browsers, PHP versions and web server platforms
  session_start();
  $_SESSION = array();
  if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
  }
  session_destroy();

	$logoutGoTo = "login.php";

  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}



function GetSize ($sizeb) {
  $sizekb = $sizeb / 1024;
  $sizemb = $sizekb / 1024;
  $sizegb = $sizemb / 1024;
  $sizetb = $sizegb / 1024;
  $sizepb = $sizetb / 1024;
  if ($sizeb > 1) {$size = round($sizeb,2) . " b";}
  if ($sizekb > 1) {$size = round($sizekb,2) . " kb";}
  if ($sizemb > 1) {$size = round($sizemb,2) . " mb";}
  if ($sizegb > 1) {$size = round($sizegb,2) . " gb";}
  return $size;
}

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

function getPageName($pageID, $db){

	$pageName= "";

	if (substr($pageID,0,1) == "c") {
		// Category lookup
		
		$pageID = substr($pageID,1,strlen($pageID) -1);
		
		$query_menuname = "SELECT * FROM cms_content WHERE ID = '".$pageID."'";
		$menuname = mysql_query($query_menuname, $db) or die(mysql_error());
		$row_menuname = mysql_fetch_assoc($menuname);
		$totalRows_menuname = mysql_num_rows($menuname);
		if ($totalRows_menuname == 1) {
			$pageName = $row_menuname['Content_Type'];
		}

	} else {
		// Page lookup

		$query_menuname = "SELECT * FROM content WHERE ID = '".$pageID."'";
		$menuname = mysql_query($query_menuname, $db) or die(mysql_error());
		$row_menuname = mysql_fetch_assoc($menuname);
		$totalRows_menuname = mysql_num_rows($menuname);
		if ($totalRows_menuname == 1) {
			$pageName = $row_menuname['Page'];
		}
	}
	return stripslashes($pageName);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
function generateURL($URL) {
    // Format a URL
    $URL = strip_tags($URL);                            // Remove any HTML tags
    $URL = strtolower($URL);                            // Ensure URL is lowercase
    $URL = str_replace(" ", "-", $URL);                    // Replace any spaces with hypthens
    
    $URL = str_replace("-c-", "-", $URL);                // Replace any special sequence of charcters that are used by the system
    $URL = str_replace("-i-", "-", $URL);
    $URL = str_replace("-inx-", "-", $URL);
    $URL = str_replace("-p-", "-", $URL);
    $URL = str_replace("-pa-", "-", $URL);
    $URL = str_replace("-pr-", "-", $URL);
    
    $URL = ereg_replace("[^A-Za-z0-9_-]", "", $URL);    // Only allow letters, nubers, underscores and hypthens in the URL, remove all others

    return $URL;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////// 




?>

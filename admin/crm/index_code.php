<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_CRM = 10;
if (isset($_GET['showAll'])) {
	$maxRows_CRM = $_GET['totalRows_CRM'];
}
$pageNum_CRM = 0;

// Clear the search
if (isset($_POST['clearSearch']) & $_POST['clearSearch'] == true) {
	$_SESSION['MM_crmSearch'] = "";
	$_SESSION['MM_crmDateSearch'] = "";
	$_SESSION['MM_crmdateFrom'] = "";
	$_SESSION['MM_crmdateTo'] = "";
	$_SESSION['MM_crmtextField'] = "";
	$_SESSION['MM_crmtextData'] = "";
	$_SESSION['MM_crmpageNum'] = "";
	$_SESSION['MM_crmsortOrder'] = "";
	$_SESSION['MM_crmshowAll'] = "";
}

// Translate the cookies
if (isset($_SESSION['MM_crmDateSearch']) AND $_SESSION['MM_crmDateSearch'] == true AND $_POST['crmDateSearch'] != true AND $_POST['crmSearch'] != true) { 
	$_POST['crmDateSearch'] = $_SESSION['MM_crmDateSearch'];
	if (isset($_SESSION['MM_crmdateFrom'])) {
		$_POST['day'] = substr($_SESSION['MM_crmdateFrom'],8,2);
		$_POST['month'] = substr($_SESSION['MM_crmdateFrom'],5,2);
		$_POST['year'] = substr($_SESSION['MM_crmdateFrom'],0,4);
	}
	if (isset($_SESSION['MM_crmdateTo'])) { 
		$_POST['day2'] = substr($_SESSION['MM_crmdateTo'],8,2);
		$_POST['month2'] = substr($_SESSION['MM_crmdateTo'],5,2);
		$_POST['year2'] = substr($_SESSION['MM_crmdateTo'],0,4);
	
	}
}

if (isset($_SESSION['MM_crmSearch']) AND $_SESSION['MM_crmSearch'] == true AND $_POST['crmSearch'] != true AND $_POST['crmDateSearch'] != true) { 
	$_POST['crmSearch'] = $_SESSION['MM_crmSearch'];
	if (isset($_SESSION['MM_crmtextField'])) { 
		$_POST['searchField'] = $_SESSION['MM_crmtextField'];
	}
	if (isset($_SESSION['MM_textData'])) { 
		$_POST['EmailSearch'] = $_SESSION['MM_crmtextData'];
	}
}

if (isset($_SESSION['MM_crmpageNum']) AND $_SESSION['MM_crmpageNum'] >0) {
  $pageNum_crm = $_SESSION['MM_crmpageNum'];
}

if (isset($_SESSION['MM_crmsortOrder']) and !isset($_GET['sortOrder'])) {
  $_GET['sortOrder'] = $_SESSION['MM_crmsortOrder'];
}

if (isset($_SESSION['MM_crmshowAll']) AND $_SESSION['MM_crmshowAll'] == true) {
  $_GET['showAll'] = true;
}
// ---------------------------------------------------------------

if (isset($_GET['pageNum_CRM'])) {
  $pageNum_CRM = $_GET['pageNum_CRM'];
}
if (isset($_POST['pageNum_go'])) {
  $pageNum_CRM = $_POST['pageNum_go'] - 1;

}
if (isset($_GET['pageNum_go'])) {
  $pageNum_CRM = $_GET['pageNum_go'] - 1;
}

if (isset($_GET['searchField'])) {
  $_POST['searchField'] = $_GET['searchField'];
}
if (isset($_GET['EmailSearch'])) {
  $_POST['EmailSearch'] = $_GET['EmailSearch'];
}
if (isset($_GET['crmSearch'])) {
  $_POST['crmSearch'] = $_GET['crmSearch'];
}
if (isset($_GET['crmDateSearch'])) {
  $_POST['crmDateSearch'] = $_GET['crmDateSearch'];
}
if (isset($_GET['day'])) {
  $_POST['day'] = $_GET['day'];
}
if (isset($_GET['month'])) {
  $_POST['month'] = $_GET['month'];
}
if (isset($_GET['year'])) {
  $_POST['year'] = $_GET['year'];
}
if (isset($_GET['day2'])) {
  $_POST['day2'] = $_GET['day2'];
}
if (isset($_GET['month2'])) {
  $_POST['month2'] = $_GET['month2'];
}
if (isset($_GET['year2'])) {
  $_POST['year2'] = $_GET['year2'];
}

// Set up what the search elements will show by default

if (isset($_POST['crmDateSearch']) and $_POST['crmDateSearch'] == true) {
	$daySet = $_POST['day'];
	$monthSet = $_POST['month'];
	$yearSet = $_POST['year'];
	$daySet2 = $_POST['day2'];
	$monthSet2 = $_POST['month2'];
	$yearSet2 = $_POST['year2'];
} else {
	$daySet2 = $daySet = $_POST['day'] = $_POST['day2'] = "DD";
	$monthSet2 = $monthSet = $_POST['month'] = $_POST['month2'] = "";
	$yearSet2 = $yearSet = $_POST['year'] = $_POST['year2'] = "YYYY";
}

// ----------------------------------------------------

if ($enableCountries) {
	$query_CRM = "SELECT crm.*, crm_access.Description, section.Content_Type FROM crm, crm_access, section WHERE crm.Access_Level >= 100 AND crm_access.Access_level = crm.Access_level AND section.ID = crm.Section";
} else {
	$query_CRM = "SELECT crm.*, crm_access.Description FROM crm, crm_access WHERE crm.Access_Level >= 100 AND crm_access.Access_level = crm.Access_level";
}

if (isset($_POST['crmSearch']) & $_POST['crmSearch'] == true & $_POST['searchField'] != "" & $_POST['searchField'] != "Select field") {
	// Searching by string entered
	if ($_POST['searchField'] == "Access") {
		$query_CRM .= " AND crm_access.Description LIKE \"%".$_POST['EmailSearch']."%\"";
	} else {
		$query_CRM .= " AND ".$_POST['searchField']." like \"%".$_POST['EmailSearch']."%\""; 
	}
	$crmSearch = true;
	$EmailSearch = $_POST['EmailSearch'];
	$searchField = $_POST['searchField'];
} elseif (isset($_POST['crmDateSearch']) & $_POST['crmDateSearch'] == true) {
	if (strlen($_POST['day']) < 2) {
		$_POST['day'] = "0".$_POST['day'];
	}
	if (strlen($_POST['day2']) < 2) {
		$_POST['day2'] = "0".$_POST['day2'];
	}
	$query_CRM .= " AND Date_Created BETWEEN ".$_POST['year'].$_POST['month'].$_POST['day']." AND ".$_POST['year2'].$_POST['month2'].$_POST['day2'];
	
	$crmDateSearch = true;
	$EmailSearch = "Search";
	$dateFrom = $_POST['dateFrom'];
	$dateTo = $_POST['dateTo'];
} else {
	$EmailSearch = "Search";
}

// Only show "600" users IF logged in as a "600" user
if ($GLOBALS['MM_UserGroup'] < 600) {
	$query_CRM .= " AND crm.Access_level < 600";
}



	// Sort Order of Categories
	switch ($_GET['sortOrder']) {
	case "date_desc":
		$query_CRM .= "	ORDER BY crm.Date_Created DESC";
		break;
	case "date_asc":
		$query_CRM .= "	ORDER BY crm.Date_Created ASC";
		break;
	case "company_desc":
		$query_CRM .= "	ORDER BY crm.Company DESC";
		break;
	case "company_asc":
		$query_CRM .= "	ORDER BY crm.Company ASC";
		break;
	case "name_desc":
		$query_CRM .= "	ORDER BY crm.First_Name DESC";
		break;
	case "name_asc":
		$query_CRM .= "	ORDER BY crm.First_Name ASC";
		break;
	case "surname_desc":
		$query_CRM .= "	ORDER BY crm.Surname DESC";
		break;
	case "surname_asc":
		$query_CRM .= "	ORDER BY crm.Surname ASC";
		break;
	case "access_desc":
		$query_CRM .= "	ORDER BY crm.Access_Level DESC";
		break;
	case "access_asc":
		$query_CRM .= "	ORDER BY crm.Access_Level ASC";
		break;
	case "country_desc":
		$query_CRM .= "	ORDER BY section.Content_Type DESC";
		break;
	case "country_asc":
		$query_CRM .= "	ORDER BY section.Content_Type ASC";
		break;				
	default:
		$query_CRM .= " ORDER BY crm.Date_Created DESC";
		$_GET['sortOrder'] = "date_desc";
	}
	// DEBUG
	//print $query_CRM;
	//exit;


// -----------------------------------------------------
// Apply the search cookies
//register the session variables
session_register("MM_crmdateFrom");
session_register("MM_crmdateTo");
session_register("MM_crmtextField");
session_register("MM_crmtextData");
session_register("MM_crmSearch");
session_register("MM_crmDateSearch");
session_register("MM_crmpageNum");
session_register("MM_crmsortOrder");
session_register("MM_crmshowAll");

$_SESSION['MM_crmSearch'] = $crmSearch;
$_SESSION['MM_crmDateSearch'] = $crmDateSearch;
$_SESSION['MM_crmdateFrom'] = $dateFromCookie;
$_SESSION['MM_crmdateTo'] = $dateToCookie;
$_SESSION['MM_crmtextField'] = $textFieldCookie;
$_SESSION['MM_crmtextData'] = $textDataCookie;
$_SESSION['MM_crmpageNum'] = $pageNum_crm;
$_SESSION['MM_crmsortOrder'] = $_GET['sortOrder'];
$_SESSION['MM_crmshowAll'] = $_GET['showAll'];

// -----------------------------------------------------

// Find out the total number of items in the ECM for the Show All option
$all_CRM = mysql_query("SELECT * FROM crm");
$allRows_CRM = mysql_num_rows($all_CRM);

	
if (isset($_GET['totalRows_CRM'])) {
  $totalRows_CRM = $_GET['totalRows_CRM'];
} else {
  $all_CRM = mysql_query($query_CRM);
  $totalRows_CRM = mysql_num_rows($all_CRM);
}

if (($pageNum_CRM * $maxRows_CRM >= $totalRows_CRM) || $pageNum_CRM < 0) {
	$pageNum_CRM = 0;
}

$startRow_CRM = $pageNum_CRM * $maxRows_CRM;

if (isset($_GET['showAll'])) {
	$query_limit_CRM= $query_CRM;
} else {
	$query_limit_CRM = sprintf("%s LIMIT %d, %d", $query_CRM, $startRow_CRM, $maxRows_CRM);
}

$CRM = mysql_query($query_limit_CRM, $db) or die(mysql_error());
$row_CRM = mysql_fetch_assoc($CRM);

if (isset($_GET['showAll'])) {
	$pageNum_CRM = $totalPages_CRM = 0;
} else {
	$totalPages_CRM = ceil($totalRows_CRM/$maxRows_CRM)-1;
}

$queryString_CRM = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_CRM") == false && 
        stristr($param, "totalRows_CRM") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_CRM = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_CRM .= "&totalRows_CRM=".$totalRows_CRM;
$queryString_CRM .= "&searchField=".$searchField."&EmailSearch=".$EmailSearch;
$queryString_CRM .= "&crmSearch=".$crmSearch."&crmDateSearch=".$crmDateSearch;
$queryString_CRM .= "&day=".$daySet."&month=".$monthSet."&year=".$yearSet;
$queryString_CRM .= "&day2=".$daySet2."&month2=".$monthSet2."&year2=".$yearSet2;

// Which field is being searched?
if ($searchField == "") {
	$sField['default'] = "selected";
} else {
	$sField[$searchField] = "selected";
}



?>
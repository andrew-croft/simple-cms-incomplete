<?php
$currentPage = $_SERVER["PHP_SELF"];


if (isset($_POST['DescriptionSearch'])) {
	$descriptionSearch = $_POST['DescriptionSearch'];
} else {
	$descriptionSearch = "by description";
}

$maxRows_cms = 20000;
$pageNum_cms = 0;

// Clear the search
if (isset($_POST['clearSearch']) & $_POST['clearSearch'] == true) {
	$_SESSION['MM_contentcmsSearch'] = "";
	$_SESSION['MM_contentcmsDateSearch'] = "";
	$_SESSION['MM_contentdateFrom'] = "";
	$_SESSION['MM_contentdateTo'] = "";
	$_SESSION['MM_contenttextField'] = "";
	$_SESSION['MM_contenttextData'] = "";
	$_SESSION['MM_contentpageNum'] = "";
	$_SESSION['MM_contentsortOrder'] = "";
	$_SESSION['MM_contentshowAll'] = "";
}


// Translate the cookies
if (isset($_SESSION['MM_contentcmsDateSearch']) AND $_SESSION['MM_contentcmsDateSearch'] == true AND $_POST['cmsDateSearch'] != true AND $_POST['cmsSearch'] != true) { 
	$_POST['cmsDateSearch'] = $_SESSION['MM_contentcmsDateSearch'];
	if (isset($_SESSION['MM_contentdateFrom'])) {
		$_POST['day'] = substr($_SESSION['MM_contentdateFrom'],8,2);
		$_POST['month'] = substr($_SESSION['MM_contentdateFrom'],5,2);
		$_POST['year'] = substr($_SESSION['MM_contentdateFrom'],0,4);
	}
	if (isset($_SESSION['MM_contentdateTo'])) { 
		$_POST['day2'] = substr($_SESSION['MM_contentdateTo'],8,2);
		$_POST['month2'] = substr($_SESSION['MM_contentdateTo'],5,2);
		$_POST['year2'] = substr($_SESSION['MM_contentdateTo'],0,4);
	
	}
}

if (isset($_SESSION['MM_contentcmsSearch']) AND $_SESSION['MM_contentcmsSearch'] == true AND $_POST['cmsSearch'] != true AND $_POST['cmsDateSearch'] != true) { 
	$_POST['cmsSearch'] = $_SESSION['MM_contentcmsSearch'];
	if (isset($_SESSION['MM_contenttextField'])) { 
		$_POST['searchField'] = $_SESSION['MM_contenttextField'];
	}
	if (isset($_SESSION['MM_contenttextData'])) { 
		$_POST['EmailSearch'] = $_SESSION['MM_contenttextData'];
	}
}

if (isset($_SESSION['MM_contentpageNum']) AND $_SESSION['MM_contentpageNum'] >0) {
  $pageNum_cms = $_SESSION['MM_contentpageNum'];
}

if (isset($_SESSION['MM_contentsortOrder']) and !isset($_GET['sortOrder'])) {
  $_GET['sortOrder'] = $_SESSION['MM_contentsortOrder'];
}

if (isset($_SESSION['MM_contentshowAll']) AND $_SESSION['MM_contentshowAll'] == true) {
  $_GET['showAll'] = true;
}

if (isset($_GET['showAll'])) {
	//if ($_GET['totalRows_cms'] > 0) {
		$maxRows_cms = $_GET['totalRows_cms'];
	//}
}

if (isset($_GET['pageNum_cms'])) {
  $pageNum_cms = $_GET['pageNum_cms'];
}
if (isset($_POST['pageNum_go'])) {
  $pageNum_cms = $_POST['pageNum_go'] - 1;

}
if (isset($_GET['pageNum_go'])) {
  $pageNum_cms = $_GET['pageNum_go'] - 1;
}
if (isset($_GET['searchField'])) {
  $_POST['searchField'] = $_GET['searchField'];
}
if (isset($_GET['EmailSearch'])) {
  $_POST['EmailSearch'] = $_GET['EmailSearch'];
}
if (isset($_GET['cmsSearch'])) {
  $_POST['cmsSearch'] = $_GET['cmsSearch'];
}
if (isset($_GET['cmsDateSearch'])) {
  $_POST['cmsDateSearch'] = $_GET['cmsDateSearch'];
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

if (isset($_POST['cmsDateSearch']) and $_POST['cmsDateSearch'] == true) {
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

$query_cms = "SELECT content.*, language.Language, language.Suffix FROM content, language WHERE content.Language_ID = language.ID";

if ($enableCountries) {
	// Only show Content for that country if the person is country specific
//	if ($GLOBALS['MM_UserGroup'] < 500) {
		// Not a top level person, therefore show only the country specified
		$query_cms .= " AND Section = '".$GLOBALS['MM_UserSection2']."'";		
//	}
}
if (isset($_POST['cmsSearch']) & $_POST['cmsSearch'] == true & $_POST['searchField'] != "" & $_POST['searchField'] != "Select field") {
	// Searching by string entered
	if ($_POST['searchField'] == "Content") {
		// Search Content
		$query_cms .= " AND (Main_Content like '%".$_POST['EmailSearch']."%' OR Keywords like '%".$_POST['EmailSearch']."%')";
	} else if ($_POST['searchField'] == "Page") {
		// Search Page name
		$query_cms .= " AND Page like '%".$_POST['EmailSearch']."%'";
	} else if ($_POST['searchField'] == "ID") {
		// Search ID
		$query_cms .= " AND content.ID like '%".$_POST['EmailSearch']."%'";
	} else if ($_POST['searchField'] == "Active") {
		// Active Pages
		$query_cms .= " AND content.Active = 'Yes'";
	} else if ($_POST['searchField'] == "Inactive") {
		// Inactive Pages
		$query_cms .= " AND content.Active != 'Yes'";
	}
	$cmsSearch = true;
	$cmsDateSearch = false;
	$EmailSearch = $_POST['EmailSearch'];
	$searchField = $_POST['searchField'];
	
	// Create cookie with search information
	$textFieldCookie = $_POST['searchField'];
	$textDataCookie = $_POST['EmailSearch'];
	$dateFromCookie = "";
	$dateToCookie = "";
	
} elseif (isset($_POST['cmsDateSearch']) & $_POST['cmsDateSearch'] == true & 1 == 2) {
	if (strlen($_POST['day']) < 2) {
		$_POST['day'] = "0".$_POST['day'];
	}
	if (strlen($_POST['day2']) < 2) {
		$_POST['day2'] = "0".$_POST['day2'];
	}
	$query_cms .= " WHERE Date_Created BETWEEN ".$_POST['year'].$_POST['month'].$_POST['day']." AND ".$_POST['year2'].$_POST['month2'].$_POST['day2'];

	$cmsSearch = false;
	$cmsDateSearch = true;
	$EmailSearch = "Search";
	$dateFrom = $_POST['dateFrom'];
	$dateTo = $_POST['dateTo'];
	
	// Create cookie with search information
	$dateFromCookie = $dateFrom;
	$dateToCookie = $dateTo;
	$textFieldCookie = "";
	$textDataCookie = "";

} else {
	$EmailSearch = "Search";
	
	// Create cookie with search information
	$dateFromCookie = "";
	$dateToCookie = "";
	$textFieldCookie = "";
	$textDataCookie = "";
	$cmsSearch = false;
	$cmsDateSearch = false;
}

	// Sort Order
	switch ($_GET['sortOrder']) {
	case "page_desc":
		$query_cms .= "	ORDER BY Page DESC";
		break;
	case "page_asc":
		$query_cms .= "	ORDER BY Page ASC";
		break;
	case "filename_desc":
		$query_cms .= "	ORDER BY Filename DESC";
		break;
	case "filename_asc":
		$query_cms .= "	ORDER BY Filename ASC";
		break;
	case "section_desc":
		$query_cms .= "	ORDER BY Menu_Section DESC, Top_Menu DESC, Menu_Order DESC";
		break;
	case "section_asc":
		$query_cms .= "	ORDER BY Menu_Section ASC, Top_Menu DESC, Menu_Order ASC";
		break;
	case "status_desc":
		$query_cms .= "	ORDER BY Active DESC";
		break;
	case "status_asc":
		$query_cms .= "	ORDER BY Active ASC";
		break;
	case "id_desc":
		$query_cms .= "	ORDER BY ID DESC";
		break;
	case "id_asc":
		$query_cms .= "	ORDER BY ID ASC";
		break;
				
	default:
		$query_cms .= " ORDER BY Page ASC";
		$_GET['sortOrder'] = "page_asc";
	}

$query_cms .= "";

//echo $query_cms ; //exit;

// Apply the search cookies
//register the session variables
session_register("MM_contentdateFrom");
session_register("MM_contentdateTo");
session_register("MM_contenttextField");
session_register("MM_contenttextData");
session_register("MM_contentcmsSearch");
session_register("MM_contentcmsDateSearch");
session_register("MM_contentpageNum");
session_register("MM_contentsortOrder");
session_register("MM_contentshowAll");

$_SESSION['MM_contentcmsSearch'] = $cmsSearch;
$_SESSION['MM_contentcmsDateSearch'] = $cmsDateSearch;
$_SESSION['MM_contentdateFrom'] = $dateFromCookie;
$_SESSION['MM_contentdateTo'] = $dateToCookie;
$_SESSION['MM_contenttextField'] = $textFieldCookie;
$_SESSION['MM_contenttextData'] = $textDataCookie;
$_SESSION['MM_contentpageNum'] = $pageNum_cms;
$_SESSION['MM_contentsortOrder'] = $_GET['sortOrder'];
$_SESSION['MM_contentshowAll'] = $_GET['showAll'];


// Find out the total number of items in the ECM for the Show All option
$all_cms = mysql_query("SELECT * FROM cms");
$allRows_cms = mysql_num_rows($all_cms);

if (isset($_GET['totalRows_cms'])) {
  $totalRows_cms = $_GET['totalRows_cms'];
} else {
  $all_cms = mysql_query($query_cms);
  $totalRows_cms = mysql_num_rows($all_cms);
}

if (($pageNum_cms * $maxRows_cms >= $totalRows_cms) || $pageNum_cms < 0) {
	$pageNum_cms = 0;
}

$startRow_cms = $pageNum_cms * $maxRows_cms;

if (isset($_GET['showAll'])) {
	$query_limit_cms= $query_cms;
} else {
	$query_limit_cms = sprintf("%s LIMIT %d, %d", $query_cms, $startRow_cms, $maxRows_cms);
}


$cms = mysql_query($query_limit_cms, $db) or die(mysql_error());
$row_cms = mysql_fetch_assoc($cms);

if (isset($_GET['showAll'])) {
	$pageNum_cms = $totalPages_cms = 0;
} else {
	$totalPages_cms = ceil($totalRows_cms/$maxRows_cms)-1;
}

$queryString_cms = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_cms") == false && 
        stristr($param, "totalRows_cms") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_cms = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_cms .= "&totalRows_cms=".$totalRows_cms;
$queryString_cms .= "&searchField=".$searchField."&EmailSearch=".$EmailSearch;
$queryString_cms .= "&cmsSearch=".$cmsSearch."&cmsDateSearch=".$cmsDateSearch;
$queryString_cms .= "&day=".$daySet."&month=".$monthSet."&year=".$yearSet;
$queryString_cms .= "&day2=".$daySet2."&month2=".$monthSet2."&year2=".$yearSet2;

// Which field is being searched?
if ($searchField == "") {
	$sField['default'] = "selected";
} else {
	$sField[$searchField] = "selected";
}

?>

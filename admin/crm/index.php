<?php
require_once('../../Connections/configuration.php');
require_once('../../Connections/db.php');
require_once('../../Connections/authenticate.php');
include('index_code.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $webSiteName; ?></title>
<!-- InstanceEndEditable -->
<link href="/css/admin-header.css" rel="stylesheet" type="text/css" />
<link href="/css/admin-left_column.css" rel="stylesheet" type="text/css" />
<link href="/css/admin-content.css" rel="stylesheet" type="text/css" />
<link href="/css/footer.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<script language="JavaScript" src="/Connections/gen_validatorv6.js" type="text/JavaScript">
</script>
<script language="JavaScript" src="/js/nav.js" type="text/JavaScript"></script>
<!-- InstanceEndEditable -->
</head>

<body>
<div id="page_wrap"> 
  
  <!--- HEADER START --->
  
  <?php include($baseFolder."/includes/admin_header.php"); ?>
  
  <!--- HEADER END ---> 
  
  <!--- CONTENT START --->
  
  <div class="content_wrap">
    <div id="left_column"> <!-- InstanceBeginEditable name="Menu" -->
      <?php include("../menu.php"); ?>
      <!-- InstanceEndEditable --> </div>
    <div id="content_column"> <!-- InstanceBeginEditable name="Main" -->
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="33" align="left"><h1 align="left">
              <div class="page_head"><img src="/images/admin_heading_left.jpg" width="17" height="33" align="left"><a name="top" id="top"></a>Admin User Control </div>
              <div class="admin_descriptiontext">
                <table height="33" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr height="33">
                    <td height="33" align="right">Below is a list of users in the system</td>
                    <td height="33" width="17"><img src="/images/admin_heading_right.jpg" width="17" height="33"></td>
                  </tr>
                </table>
              </div>
            </h1></td>
        </tr>
      </table>
      <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" class="admin_search">
        <tr>
          <td align="left" valign="top" class="mainbold"><img src="/images/spacer.gif" width="1" height="13" /></td>
        </tr>
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left"><img src="/images/spacer.gif" width="15" height="13" /><a href="addmember.php"><img src="/images/admin_btn_addUser.png" alt="Add User" width="105" height="34" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="csvexport.php"><img src="/images/admin_btn_export.png" alt="Export Users" width="105" height="34" border="0" /></a></td>
                <td align="left"></td>
                <td align="right"><table border="0" align="right" cellpadding="0" cellspacing="0" class="largewhite">
                    <tr class="admin_controlbartext">
                      <td><img src="/images/spacer.gif" width="6" height="1"></td>
                      <td><img src="/images/admin_btn_info.png" alt="Search a field that contains the item you enter" title="Search a field that contains the item you enter" width="30" height="35" /></td>
                      <td><img src="/images/spacer.gif" width="6" height="1" /></td>
                      <form action="index.php" method="post" name="form2" id="form2" style="margin:0">
                        <td valign="middle"><select name="searchField" class="admin_search_select_field" id="searchField">
                            <option>Select field</option>
                            <option <?php echo $sField['Company'] ?> value="Company">Company</option>
                            <option <?php echo $sField['First_Name'] ?> value="First_Name">Name</option>
                            <option <?php echo $sField['Surname'] ?> value="Surname">Surname</option>
                            <option <?php echo $sField['Access'] ?> value="Access">Access</option>
                          </select></td>
                        <td><img src="/images/spacer.gif" width="15" height="1" /></td>
                        <td valign="middle">for</td>
                        <td><img src="/images/spacer.gif" width="15" height="1" /></td>
                        <td valign="middle"><input name="EmailSearch" type="text" class="admin_search_field" id="EmailSearch" onfocus="javascript:EmailSearch.value='';" value="<?php echo $EmailSearch ?>" size="10" />
                          <input name="crmSearch" type="hidden" id="crmSearch" value="true" /></td>
                        <td><img src="/images/spacer.gif" width="6" height="1" /></td>
                        <td>&nbsp;</td>
                        <td><img src="/images/spacer.gif" width="8" height="31" /></td>
                      </form>
                      <td><form action="<?php echo $currentPage; ?>" method="post" name="clearSearch" style="margin:0">
                          <input name="clearSearch" type="hidden" id="clearSearch" value="true">
                          <A HREF="#" onClick="document.clearSearch.submit();"><img src="/images/admin_btn_reset.png" alt="Clear Search Results" width="105" height="34" border="0"></a><img src="/images/spacer.gif" width="15" height="13" />
                        </form></td>
                      <script language="JavaScript" type="text/javascript">
var myFormValidator2 = new Validator("form2");
myFormValidator2.addValidation("searchField", "req","Please enter the field you wish to search in");
//myFormValidator2.addValidation("EmailSearch", "req","Please enter the text you wish to search for");
  </script> 
                      <script language="JavaScript" type="text/javascript">
function submitform2()
{
	if (document.form2.onsubmit())
	{
		document.form2.submit();
	}
}
  </script> 
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="left" valign="top"><img src="/images/spacer.gif" width="1" height="13" /></td>
        </tr>
      </table>
      <table width="100%" height="35" border="0" align="center" cellpadding="0" cellspacing="0" class="admin_search_page">
        <tr>
          <td align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_controlbartext">
              <tr>
              <td width="20"><span class="tablecontent"><img src="/images/spacer.gif" alt="" width="20" height="1" /></span></td>
                <td>Search by Date:&nbsp;&nbsp;&nbsp;</td>
                <td><form action="index.php" method="post" name="dateSearch" id="dateSearch" style="margin:0">
                    <input name="day" type="text" class="admin_fields" id="day" size="2" maxlength="2" onFocus="javascript:day.value='';" value="<?php echo $daySet ?>" />
                    &nbsp;
                    <select name="month" class="admin_fields" id="month">
                      <option>Month</option>
                      <option <?php if ($monthSet == "01") { echo "SELECTED"; } ?> value="01">Jan</option>
                      <option <?php if ($monthSet == "02") { echo "SELECTED"; } ?> value="02">Feb</option>
                      <option <?php if ($monthSet == "03") { echo "SELECTED"; } ?> value="03">Mar</option>
                      <option <?php if ($monthSet == "04") { echo "SELECTED"; } ?> value="04">Apr</option>
                      <option <?php if ($monthSet == "05") { echo "SELECTED"; } ?> value="05">May</option>
                      <option <?php if ($monthSet == "06") { echo "SELECTED"; } ?> value="06">Jun</option>
                      <option <?php if ($monthSet == "07") { echo "SELECTED"; } ?> value="07">Jul</option>
                      <option <?php if ($monthSet == "08") { echo "SELECTED"; } ?> value="08">Aug</option>
                      <option <?php if ($monthSet == "09") { echo "SELECTED"; } ?> value="09">Sep</option>
                      <option <?php if ($monthSet == "10") { echo "SELECTED"; } ?> value="10">Oct</option>
                      <option <?php if ($monthSet == "11") { echo "SELECTED"; } ?> value="11">Nov</option>
                      <option <?php if ($monthSet == "12") { echo "SELECTED"; } ?> value="12">Dec</option>
                    </select>
                    &nbsp;
                    <input name="year" type="text" class="admin_fields" id="year" onFocus="javascript:year.value='';" value="<?php echo $yearSet ?>" size="4" maxlength="4" />
                    &nbsp;&nbsp; to &nbsp;&nbsp;
                    <input name="day2" type="text" class="admin_fields" id="day2" onFocus="javascript:day2.value='';" value="<?php echo $daySet2 ?>" size="2" maxlength="2" />
                    &nbsp;
                    <select name="month2" class="admin_fields" id="month2">
                      <option>Month</option>
                      <option <?php if ($monthSet2 == "01") { echo "SELECTED"; } ?> value="01">Jan</option>
                      <option <?php if ($monthSet2 == "02") { echo "SELECTED"; } ?> value="02">Feb</option>
                      <option <?php if ($monthSet2 == "03") { echo "SELECTED"; } ?> value="03">Mar</option>
                      <option <?php if ($monthSet2 == "04") { echo "SELECTED"; } ?> value="04">Apr</option>
                      <option <?php if ($monthSet2 == "05") { echo "SELECTED"; } ?> value="05">May</option>
                      <option <?php if ($monthSet2 == "06") { echo "SELECTED"; } ?> value="06">Jun</option>
                      <option <?php if ($monthSet2 == "07") { echo "SELECTED"; } ?> value="07">Jul</option>
                      <option <?php if ($monthSet2 == "08") { echo "SELECTED"; } ?> value="08">Aug</option>
                      <option <?php if ($monthSet2 == "09") { echo "SELECTED"; } ?> value="09">Sep</option>
                      <option <?php if ($monthSet2 == "10") { echo "SELECTED"; } ?> value="10">Oct</option>
                      <option <?php if ($monthSet2 == "11") { echo "SELECTED"; } ?> value="11">Nov</option>
                      <option <?php if ($monthSet2 == "12") { echo "SELECTED"; } ?> value="12">Dec</option>
                    </select>
                    &nbsp;
                    <input name="year2" type="text" class="admin_fields" id="year2" onFocus="javascript:year2.value='';" value="<?php echo $yearSet2 ?>" size="4" maxlength="4" />
                    <input name="crmDateSearch" type="hidden" id="crmDateSearch" value="true" />
                    &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onClick="submitform();"><img src="/images/icons/admin_btn_search.png" alt="Date Range Search" width="13" height="13" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </form>
                  <script language="JavaScript" type="text/javascript">
var myFormValidator = new Validator("dateSearch");
myFormValidator.addValidation("day", "req","Please enter the start day in the format of DD");
myFormValidator.addValidation("day", "num","Please enter the start day format of DD");
myFormValidator.addValidation("day", "lt=32","Please enter the start day format of DD");
myFormValidator.addValidation("day", "gt=0","Please enter the start day format of DD");
myFormValidator.addValidation("day", "len=2","Please enter the start day format of DD");

myFormValidator.addValidation("day2", "gt=0","Please enter the end day format of DD");
myFormValidator.addValidation("day2", "lt=32","Please enter the end day format of DD");
myFormValidator.addValidation("day2", "num","Please enter the end day format of DD");
myFormValidator.addValidation("day2", "req","Please enter the end day format of DD");
myFormValidator.addValidation("day2", "len=2","Please enter the start day format of DD");

myFormValidator.addValidation("month", "req","Please enter a start month");
myFormValidator.addValidation("month2", "req","Please enter the end month");

myFormValidator.addValidation("year", "req","Please enter the start year in the format of YYYY");
myFormValidator.addValidation("year", "num","Please enter the start year in the format of YYYY");
myFormValidator.addValidation("year", "gt=1999","Please enter the start year in the format of YYYY");
myFormValidator.addValidation("year", "lt=2050","Please enter the start year in the format of YYYY");

myFormValidator.addValidation("year2", "req","Please enter the end year in the format of YYYY");
myFormValidator.addValidation("year2", "num","Please enter the end year in the format of YYYY");
myFormValidator.addValidation("year2", "gt=1999","Please enter the end year in the format of YYYY");
myFormValidator.addValidation("year2", "lt=2050","Please enter the end year in the format of YYYY");

</script> 
                  <script language="JavaScript" type="text/javascript">
function submitform()
{
	if (document.dateSearch.onsubmit())
	{
		document.dateSearch.submit();
	}
}
</script></td>
                <td align="right"><?php
if ($pageNum_cms > 0) {
	// Show if not first page
?>
                  <a href="<?php printf("%s?pageNum_cms=%d%s", $currentPage, max(0, $pageNum_cms - 1), $queryString_cms); ?>"> <img src="/images/icons/admin_arrow_left.png" alt="Previous" width="8" height="9" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php } ?></td>
                <td align="center">Page <?php echo $pageNum_cms + 1 ?> of <?php echo $totalPages_cms + 1 ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="left"><?php
if ($pageNum_cms < $totalPages_cms) {
// Show if not last page
?>
                  <a href="<?php printf("%s?pageNum_cms=%d%s", $currentPage, min($totalPages_cms, $pageNum_cms + 1), $queryString_cms); ?>"> <img src="/images/icons/admin_arrow_right.png" alt="Next Page" width="8" height="9" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php } ?></td>
                <td align="right">Go to page: &nbsp;&nbsp;&nbsp;</td>
                <td align="right"><form action="<?php echo $currentPage ?>" method="post" name="goto" id="goto" style="margin:0">
                    <input name="pageNum_go" type="text" class="admin_pageno_field" id="pageNum_go" onblur="document.goto.submit()" size="5" />
                    <input name="searchField" type="hidden" value="<?php echo $searchField ?>" />
                    <input name="EmailSearch" type="hidden" value="<?php echo $EmailSearch ?>" />
                    <input name="crmSearch" type="hidden" value="<?php echo $crmSearch ?>" />
                    <input name="crmDateSearch" type="hidden" value="<?php echo $crmDateSearch ?>" />
                    <input name="day" type="hidden" value="<?php echo $daySet ?>" />
                    <input name="day2" type="hidden" value="<?php echo $daySet2 ?>" />
                    <input name="month" type="hidden" value="<?php echo $monthSet ?>" />
                    <input name="month2" type="hidden" value="<?php echo $monthSet2 ?>" />
                    <input name="year" type="hidden" value="<?php echo $yearSet ?>" />
                    <input name="year2" type="hidden" value="<?php echo $yearSet2 ?>" />
                  </form></td>
                <td align="right"><!-- <a href="index.php?pageNum_CRM=0&totalRows_CRM=<?php echo $totalRows_CRM ?>&showAll=true"> --> 
                  <a href="index.php?showAll=true"><img src="/images/admin_btn_showall.png" alt="Show All Users" width="105" height="34" border="0" /></a><img src="/images/spacer.gif" alt="spacer" width="15" height="13" /></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top"><img src="/images/spacer.gif" width="1" height="13" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="pagetext" valign="top">
        <tr align="top">
          <td valign="top">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" valign="top">
              <tr>
                <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_search">
                    <tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-left:1px solid #dfdfdf; border-right:1px solid #dfdfdf;">
                    <tr>
                      <td valign="top">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#a4ccdb">
                          <tr class="admin_columnhead">
                          <td width="20" height="20"><span class="tablecontent"><img src="/images/spacer.gif" alt="" width="20" height="1" /></span></td>
                            <td height="30" valign="middle"><a href="index.php?sortOrder=<?php if ($_GET['sortOrder'] == "date_asc") { echo "date_desc"; } else { echo "date_asc"; }?>">Date Created</a>
                              <?php if ($_GET['sortOrder'] == "date_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "date_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle"><a href="index.php?sortOrder=<?php if ($_GET['sortOrder'] == "company_asc") { echo "company_desc"; } else { echo "company_asc"; }?>">Company / Organisation</a>
                              <?php if ($_GET['sortOrder'] == "company_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "company_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle"><a href="index.php?sortOrder=<?php if ($_GET['sortOrder'] == "name_asc") { echo "name_desc"; } else { echo "name_asc"; }?>">Name</a>
                              <?php if ($_GET['sortOrder'] == "name_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "name_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle"><a href="index.php?sortOrder=<?php if ($_GET['sortOrder'] == "surname_asc") { echo "surname_desc"; } else { echo "surname_asc"; }?>">Surname</a>
                              <?php if ($_GET['sortOrder'] == "surname_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "surname_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle"><?php if ($enableCountries) { ?>
                              <a href="/index.php?sortOrder=<?php if ($_GET['sortOrder'] == "country_asc") { echo "country_desc"; } else { echo "country_asc"; }?>">Country</a>
                              <?php if ($_GET['sortOrder'] == "country_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "country_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?>
                              <?php } else { echo "&nbsp;"; } ?></td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle"><a href="/index.php?sortOrder=<?php if ($_GET['sortOrder'] == "access_asc") { echo "access_desc"; } else { echo "access_asc"; }?>">Access</a>
                              <?php if ($_GET['sortOrder'] == "access_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "access_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                            <td valign="middle">&nbsp;</td>
                            <td width="30" valign="middle">&nbsp;</td>
                            <td width="30" valign="middle">&nbsp;</td>
                          </tr>
                          
                          <!-- Start of Dynamic area -->
                          <?php
if ($totalRows_CRM > 0) {
	$rowCounter = 0;
	do {
?>
                          <tr bgcolor="#ffffff" onmouseover="switchtableBGColour(this, 'Over');" onmouseout="switchtableBGColour(this, 'Out');">
                          <td align="left" valign="middle" class="tablecontent"><img src="/images/spacer.gif" width="20" height="1" /></td>
                            <td height="30" align="left"><?php
if ($row_CRM['Date_Created'] == "") {
  	echo "&nbsp;";
} else {
	echo substr($row_CRM['Date_Created'],8,2)."/".substr($row_CRM['Date_Created'],5,2)."/".substr($row_CRM['Date_Created'],0,4);
} 
?></td>
                            <td align="center">&nbsp;</td>
                            <td align="left"><?php echo $row_CRM['Company']; ?></td>
                            <td align="center">&nbsp;</td>
                            <td align="left"><?php echo $row_CRM['First_Name']; ?></td>
                            <td align="center">&nbsp;</td>
                            <td align="left"><?php echo $row_CRM['Surname']; ?></td>
                            <td align="center">&nbsp;</td>
                            <td align="left"><?php if ($enableCountries) { echo $row_CRM['Content_Type']; } else { echo "&nbsp;"; } ?></td>
                            <td align="center">&nbsp;</td>
                            <td align="left"><?php echo $row_CRM['Access_Level'].". ".$row_CRM['Description']; ?></td>
                            <td align="center">&nbsp;</td>
                            <td width="30" align="center"><?php if ($row_CRM['System'] != "1") { ?>
                              <a href="editmember.php?Email=<?php echo $row_CRM['Email']; ?>"><img src="/images/icons/edit.gif" alt="Edit" width="15" height="15" border="0"></a>
                              <?php } ?></td>
                            <td width="30" align="center"><?php if ($row_CRM['System'] != "1" AND $GLOBALS['MM_Username'] != $row_CRM['Email']) { ?>
                              <a href="deletemember.php?Email=<?php echo $row_CRM['Email']; ?>"><img src="/images/icons/bin.gif" alt="Delete" width="15" height="15" border="0"></a>
                              <?php } ?></td>
                          </tr>
                          <tr>
                            <td height="1" colspan="12" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1"></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1"></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1"></td>
                          </tr>
                          <?php
		$rowCounter++;
	} while ($row_CRM = mysql_fetch_assoc($CRM)); 
} else {
// No entries found
?>
                          <tr bgcolor="#ffffff">
                            <td height="30" colspan="8" align="center" valign="middle"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No records found that match your search</div></td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td width="30" align="center" valign="middle">&nbsp;</td>
                            <td width="30" align="center" valign="middle">&nbsp;</td>
                          </tr>
                        </table>
                        <?php
}
?>
                        
                        <!-- End of dynamic Area --> 
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="Text table">
                          <tr>
                            <td width="95" valign="top" class="main">&nbsp;</td>
                            <td valign="middle" class="copyright">&nbsp;</td>
                            <td valign="middle" class="copyright">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="18"><img src="/images/admin_main_bottomLeft2.jpg" width="18" height="30" /></td>
          <td><div style="background-color:#a4ccdb; width:100%; height:30px; text-align:right; line-height:28px;"><a style="color:#ffffff;" href="#top">Back to top</a></div></td>
          <td width="18"><img src="/images/admin_main_bottomRight2.jpg" width="18" height="30" /></td>
        </tr>
      </table>
      <!-- InstanceEndEditable --> </div>
  </div>
  
  <!--- CONTENT END ---> 
  
  <!--- FOOTER START --->
  
  <?php include($baseFolder."/includes/admin_footer.php"); ?>
  
  <!--- FOOTER END ---> 
  
</div>

</body>
<!-- InstanceEnd -->
</html>

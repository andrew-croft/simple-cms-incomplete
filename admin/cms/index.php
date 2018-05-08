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
        <tr height="33">
          <td height="33" valign="top"><h1 align="left">
              <div class="page_head"><img src="/images/admin_heading_left.jpg" width="17" height="33" align="left"><a name="top" id="top"></a>Page Control </div>
              <div class="admin_descriptiontext">
                <table height="33" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr height="33">
                    <td height="33" align="right">Listed below are the pages contained in the system</td>
                    <td height="33" width="17"><img src="/images/admin_heading_right.jpg" width="17" height="33"></td>
                  </tr>
                </table>
              </div>
            </h1></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="page_text">
        <tr>
          <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="pagetext">
              <tr>
                <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_search">
                    <tr>
                      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="left" valign="top" class="mainbold"><img src="/images/spacer.gif" width="1" height="13" /></td>
                          </tr>
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left"><img src="/images/spacer.gif" width="15" height="13" /><a href="addnewpage.php"><img src="/images/admin_btn_addItem.png" width="105" height="34" border="0" /></a></td>
                                <td align="right">
                                <table border="0" align="right" cellpadding="0" cellspacing="0" class="largewhite">
                          <tr class="admin_controlbartext">
                            <td><img src="/images/spacer.gif" width="6" height="1"></td>
                            <td><img src="/images/admin_btn_info.png" alt="Search a field that contains the item you enter" title="Search a field that contains the item you enter" width="30" height="35" /></td>
                            <td><img src="/images/spacer.gif" width="6" height="1" /></td>
                            <form action="<?php echo $currentPage; ?>" method="post" name="form2" id="form2" style="margin:0">
                              <td valign="middle"><select name="searchField" class="admin_search_select_field" id="searchField">
                                  <option>Select field</option>
                                  <option <?php echo $sField['Page'] ?>  value="Page">Page</option>
                                  <option <?php echo $sField['ID'] ?>  value="ID">Page ID</option>
                                  <!-- <option <?php echo $sField['Content'] ?>  value="Content">Content</option> -->
                                  <option <?php echo $sField['Active'] ?>  value="Active">Active</option>
                                  <option <?php echo $sField['Inactive'] ?>  value="Inactive">Inactive</option>
                                </select></td>
                              <td><img src="/images/spacer.gif" width="15" height="1" /></td>
                              <td valign="middle">for</td>
                              <td><img src="/images/spacer.gif" width="15" height="1" /></td>
                              <td valign="middle"><input name="EmailSearch" type="text" class="admin_search_field" id="EmailSearch" onfocus="javascript:EmailSearch.value='';" value="<?php echo $EmailSearch ?>" size="10" />
                                <input name="cmsSearch" type="hidden" id="cmsSearch" value="true" /></td>
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
                            </table>
                            </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="mainbold"><img src="/images/spacer.gif" width="1" height="13" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                  </table>
                  
                  
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-left:1px solid #dfdfdf; border-right:1px solid #dfdfdf;">
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#a4ccdb">
                          <tr align="left"class="admin_columnhead">
                            <td width="20" height="20"><span class="tablecontent"><img src="/images/spacer.gif" alt="" width="20" height="1" /></span></td>
                            <td><a href="<?php echo $currentPage; ?>?sortOrder=<?php if ($_GET['sortOrder'] == "page_asc") { echo "page_desc"; } else { echo "page_asc"; }?>">Page</a>
                              <?php if ($_GET['sortOrder'] == "page_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "page_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                              <td><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td><a href="index.php?sortOrder=<?php if ($_GET['sortOrder'] == "id_asc") { echo "id_desc"; } else { echo "id_asc"; }?>">ID</a>
                              <?php if ($_GET['sortOrder'] == "id_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "id_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                              <td><img src="/images/spacer.gif" width="30" height="30" /></td>
                            <td><a href="<?php echo $currentPage; ?>?sortOrder=<?php if ($_GET['sortOrder'] == "filename_asc") { echo "filename_desc"; } else { echo "filename_asc"; }?>">Filename</a>
                              <?php if ($_GET['sortOrder'] == "filename_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "filename_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                              <td><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="20"><a href="<?php echo $currentPage; ?>?sortOrder=<?php if ($_GET['sortOrder'] == "section_asc") { echo "section_desc"; } else { echo "section_asc"; }?>">Navigation</a>
                              <?php if ($_GET['sortOrder'] == "section_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "section_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                              <td><img src="/images/spacer.gif" width="20" height="1" /></td>
                            <td>Menu Option</td>
                            <td><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td>Order</td>
                            <td><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td><a href="<?php echo $currentPage; ?>?sortOrder=<?php if ($_GET['sortOrder'] == "status_asc") { echo "status_desc"; } else { echo "status_asc"; }?>">Status</a>
                              <?php if ($_GET['sortOrder'] == "status_asc") { ?>
                              <img src="/images/icons/s_asc.png" width="11" height="9" border="0">
                              <?php }
	if ($_GET['sortOrder'] == "status_desc") {
?>
                              <img src="/images/icons/s_desc.png" width="11" height="9" border="0">
                              <?php } ?></td>
                            <td width="30" valign="middle"><img src="/images/spacer.gif" alt="" width="30" height="1" /></td>
                            <td width="30" valign="middle"><img src="/images/spacer.gif" alt="" width="30" height="1" /></td>
                            <td width="30" valign="middle"><img src="/images/spacer.gif" alt="" width="30" height="1" /></td>
                            <td width="30" valign="middle"><img src="/images/spacer.gif" alt="" width="30" height="1" /></td>
                            <td valign="middle">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="1" colspan="9" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#ffffff"><img src="/images/spacer.gif" width="10" height="1" /></td>
                          </tr>
                          <!-- Start of Dynamic area -->
                          <?php 
if ($totalRows_cms > 0) {
	$rowCounter = 0;
	do {
		if ($row_cms['Page'] == "Home") {
			$URL = "/index.php";
			if ($_SESSION['MM_UserSection2'] > 1) {
				$URL = "/index-inx-".$_SESSION['MM_UserSection2'].".php";
			}
		} else {
			$URL = generateURL($row_cms['Title']);
			$URL = "/".$URL."-pa-".$row_cms['ID'].".php";
		}

		// If Top Menu, how many items does it have
		if ($row_cms['Top_Menu'] > 0) {
			$query_topnavItems = "SELECT * FROM content WHERE Menu_Section = 't".$row_cms['ID']."'";
			$topnavItems = mysql_query($query_topnavItems, $db) or die(mysql_error());
			$row_topnavItems = mysql_fetch_assoc($topnavItems);
			$totalRows_topnavItems = mysql_num_rows($topnavItems);
		}
?>
                          <tr bgcolor="#ffffff" onmouseover="switchtableBGColour(this, 'Over');" onmouseout="switchtableBGColour(this, 'Out');">
                            <td align="left" valign="middle" class="tablecontent"><img src="/images/spacer.gif" width="20" height="1" /></td>
                            <td align="left" valign="middle" class="tablecontent"><?php echo stripslashes($row_cms['Page']); ?></td>
                            <td valign="middle" class="tablecontent" align="left">&nbsp;</td>
                            <td align="left" valign="middle" class="tablecontent"><?php echo $row_cms['ID'];  ?></td>
                            <td valign="middle" class="tablecontent" align="left">&nbsp;</td>
                            <td height="30" align="left" valign="middle" class="tablecontent"><?php
                          if ($row_cms['Filename'] == "home") {
						  	echo $indexURL;
						  } else {
						  	echo stripslashes($row_cms['Filename'])."-pa-".$row_cms['ID'].".php";
						  }
						  ?></td>
                          <td valign="middle" class="tablecontent" align="left">&nbsp;</td>
                            <td height="20" valign="middle" class="tablecontent" align="left"><?php
if ($row_cms['Top_Menu'] > 0) { 
	echo "<strong>";
}

if (substr($row_cms['Menu_Section'],0,1) == "c") {
	// Find the category Name
	$query_cms_cat = "SELECT * FROM cms_content WHERE ID = '".substr($row_cms['Menu_Section'],1,strlen($row_cms['Menu_Section'])-1)."'";
	$cms_cat = mysql_query($query_cms_cat, $db) or die(mysql_error());
	$row_cms_cat = mysql_fetch_assoc($cms_cat);
	echo "Cat - ".$row_cms_cat['Content_Type'];
} else if (substr($row_cms['Menu_Section'],0,1) == "p") {
	// Fine the page Name
	$query_cms_cat = "SELECT * FROM content WHERE ID = '".substr($row_cms['Menu_Section'],1,strlen($row_cms['Menu_Section'])-1)."'";
	$cms_cat = mysql_query($query_cms_cat, $db) or die(mysql_error());
	$row_cms_cat = mysql_fetch_assoc($cms_cat);
	echo "Page - ".$row_cms_cat['Page'];	
} else if (substr($row_cms['Menu_Section'],0,1) == "s") {
	// Fine the section Name
	$query_cms_cat = "SELECT * FROM section WHERE ID = '".substr($row_cms['Menu_Section'],1,strlen($row_cms['Menu_Section'])-1)."'";
	$cms_cat = mysql_query($query_cms_cat, $db) or die(mysql_error());
	$row_cms_cat = mysql_fetch_assoc($cms_cat);
	echo "LHM of ".$row_cms_cat['Content_Type'];	
} else if (substr($row_cms['Menu_Section'],0,1) == "t") {
	// Fine the Top Menu name
	$query_cms_cat = "SELECT * FROM content WHERE ID = '".substr($row_cms['Menu_Section'],1,strlen($row_cms['Menu_Section'])-1)."'";
	$cms_cat = mysql_query($query_cms_cat, $db) or die(mysql_error());
	$row_cms_cat = mysql_fetch_assoc($cms_cat);
	echo "Top Menu - ".$row_cms_cat['Menu_Name'];	

} else {
	echo $row_cms['Menu_Section'];
}

if ($row_cms['Top_Menu'] > 0) { 
	echo "</strong>";
}

?></td>
                            <td valign="middle" class="tablecontent" align="left">&nbsp;</td>
                            <td valign="middle" class="tablecontent" align="left"><?php echo $row_cms['Menu_Name']; ?>&nbsp;</td>
                            <td valign="middle" class="tablecontent" align="left">&nbsp;</td>
                            <td valign="middle" class="tablecontent" align="left"><?php echo $row_cms['Menu_Order']; ?>&nbsp;</td>
                            <td valign="middle" class="tablecontent" align="left">&nbsp;</td>
                            <td valign="middle" class="tablecontent" align="left"><?php if ($row_cms['Active'] == "Yes") { echo "Active"; } else { echo "Inactive"; } ?>
                              &nbsp; </td>
                            <td width="30" align="center" valign="middle"><?php
if ($row_cms['Checked_Out'] > 0) { 
	// Find out who has checked out an item
	$query_checked_out = "SELECT * FROM crm WHERE ID = '".$row_cms['Checked_Out']."'";
	$checked_out = mysql_query($query_checked_out, $db) or die(mysql_error());
	$row_checked_out = mysql_fetch_assoc($checked_out);
?>
                              <img src="/images/icons/locked.gif" title="Checked Out By: <?php echo $row_checked_out['First_Name']." ".$row_checked_out['Surname']; ?>" alt="Checked Out By: <?php echo $row_checked_out['First_Name']." ".$row_checked_out['Surname']; ?>" width="13" height="17" border="0" />
                              <?php
} else {
	echo "&nbsp;";
}
?></td>
                            <td width="30" align="center" valign="middle"><?php if ($row_cms['Checked_Out'] == 0 OR $GLOBALS['MM_UserGroup'] >= 500 OR $GLOBALS['MM_UID'] ==  $row_cms['Checked_Out'] ) { ?>
                              <a href="<?php echo $URL; ?>" class="paneltxt" target="_blank"><img src="/images/icons/view.gif" alt="View Page" title="View Page" width="16" height="14" border="0" /></a>
                              <?php
} else {
	echo "&nbsp;";
}
?></td>
                            <td width="30" align="center" valign="middle"><?php if ($row_cms['Checked_Out'] == 0 OR $GLOBALS['MM_UserGroup'] >= 500 OR $GLOBALS['MM_UID'] ==  $row_cms['Checked_Out'] ) { ?>
                              <a href="editpage.php?ID=<?php echo $row_cms['ID']; ?>" class="paneltxt"><img src="/images/icons/edit.gif" alt="Edit Document" title="Edit Document" width="15" height="15" border="0" /></a>
                              <?php
} else {
	echo "&nbsp;";
}
?></td>
                            <td width="30" align="center" valign="middle"><?php if ($row_cms['System'] > 0 OR ($row_cms['Top_Menu'] > 0 AND $totalRows_topnavItems > 1)) { ?>
                              &nbsp;
                              <?php
} else if ($row_cms['Checked_Out'] == 0 OR $GLOBALS['MM_UserGroup'] >= 500 OR $GLOBALS['MM_UID'] ==  $row_cms['Checked_Out'] ) {
?>
                              <a href="deletepage.php?ID=<?php echo $row_cms['ID']; ?>" class="paneltxt"><img src="/images/icons/bin.gif" alt="Delete Document" title="Delete Document"width="15" height="15" border="0" /></a>
                              <?php
} else {
	echo "&nbsp;";
}
?></td><td align="center" valign="middle"><img src="/images/spacer.gif" width="10" height="1" /></td>
                          </tr>
                          <tr>
                            <td height="1" colspan="9" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                            <td height="1" bgcolor="#dfdfdf"><img src="/images/spacer.gif" width="10" height="1" /></td>
                          </tr>
                          <?php
		$rowCounter++;
	} while ($row_cms = mysql_fetch_assoc($cms)); 
} else {
// No entries found
?>
                          <tr bgcolor="#ffffff">
                            <td height="30" colspan="19" align="center" valign="middle"><div align="left" class="tablecontent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No
                                records found that match your search</div></td>
                          </tr>
                          <?php
}
?>
                          <!-- End of dynamic Area -->
                        </table>
                        <table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                          <tr>
                            <td>
                            
                            </td>
                          </tr>
                        </table>
                      </td>
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

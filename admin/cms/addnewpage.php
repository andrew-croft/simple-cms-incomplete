<?php
require_once('../../Connections/configuration.php');
require_once('../../Connections/db.php');
require_once('../../Connections/authenticate.php');
include('addnewpage_code.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin</title>
<!-- InstanceEndEditable -->
<link href="/css/admin-header.css" rel="stylesheet" type="text/css" />
<link href="/css/admin-left_column.css" rel="stylesheet" type="text/css" />
<link href="/css/admin-content.css" rel="stylesheet" type="text/css" />
<link href="/css/footer.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<script language="JavaScript" src="/Connections/gen_validatorv6.js" type="text/JavaScript">
</script>
<!-- tinyMCE -->
<script language="javascript" type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "exact",
		elements : "heading, headercode, content1, secondarybannercode",
		content_css : "/css/cms.css",
 		plugins : "imagemanager, filemanager, advimage, table, paste",	
		plugins : "filemanager",
		theme : "advanced",
		theme_advanced_buttons1_add : "|,fontsizeselect,|,insertfile",
		theme_advanced_buttons3_add : "copy,paste,pastetext,pasteword,selectall",
		theme_advanced_buttons4 : "tablecontrols",
		paste_auto_cleanup_on_paste : true,
		theme_advanced_disable  : "help",
		extended_valid_elements : /* "img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]," */
			"div[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
  				+"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
  				+"|onmouseout|onmouseover|onmouseup|style|title],"
			+"iframe[align<bottom?left?middle?right?top|class|frameborder|height|id"
				+"|longdesc|marginheight|marginwidth|name|scrolling<auto?no?yes|src|style"
				+"|title|width],"
			+"object[align<bottom?left?middle?right?top|archive|border|class|classid"
			  +"|codebase|codetype|data|declare|dir<ltr?rtl|height|hspace|id|lang|name"
			  +"|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
			  +"|onmouseout|onmouseover|onmouseup|standby|style|tabindex|title|type|usemap"
			  +"|vspace|width],"
			+"param[id|name|type|value|valuetype<DATA?OBJECT?REF],",
		relative_urls : false
		/* convert_urls : false */

	});
</script>
<!-- /tinyMCE -->

<!-- InstanceEndEditable -->
</head>

<body>

<div id="page_wrap">

<!--- HEADER START --->

<?php include($baseFolder."/includes/admin_header.php"); ?>

<!--- HEADER END --->
  
<!--- CONTENT START --->

<div class="content_wrap">

<div id="left_column">

<!-- InstanceBeginEditable name="Menu" -->
		  <?php include("../menu.php");?>
	  <!-- InstanceEndEditable -->

</div>



<div id="content_column">
<!-- InstanceBeginEditable name="Main" -->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="33" align="left"><h1 align="left">
              <div class="page_head"><img src="/images/admin_heading_left.jpg" width="17" height="33" align="left"><a name="top" id="top"></a>Page Control - Add Page</div>
              <div class="admin_descriptiontext">
                <table height="33" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr height="33">
                    <td height="33" align="right">Add a new page below</td>
                    <td height="33" width="17"><img src="/images/admin_heading_right.jpg" width="17" height="33"></td>
                  </tr>
                </table>
              </div>
            </h1></td>
        </tr>
      </table>
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="pagetext">
            <tr>
              <td valign="top">
			    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #dfdfdf; border-right:1px solid #dfdfdf; background-image:url(/images/left_nav_box_bg.jpg); background-repeat:repeat-x; background-position:top; background-color:#F4F9FC;">
                    <tr>
                      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php if ( $errorMessage != "") { ?>
                        <tr>
                        <td><img src="/images/spacer.gif" alt="spacer" width="10" height="40" /></td>
                 <td><table width="95%"  border="0" align="center" valign="middle" cellpadding="0" cellspacing="0" class="category_head" style="color:#478aa4;">
                   <tr>
                     <td align="center"><?php echo $errorMessage; ?></td>
                   </tr>
                 </table>
                   </td>
                   <td>&nbsp;</td>
                  </tr>
                        
<?php } ?>		
<tr>
                          <td height="32">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                </tr>				
                      </table>
                        <form method="post" action="<?php echo $editFormAction; ?>" enctype="multipart/form-data" name="upload" id="upload">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tablecontent">
<?php
if (isset($totalRows_files) && $totalRows_files > 0) { ?>
              <tr>
                <td height="32" align="right">&nbsp;</td>
                <td height="32" align="center">&nbsp;</td>
                <td height="32" align="left" class="admin_descriptiontext">
The image with the name "<?php echo $_FILES['filename']['name'] ?>" already
exists. The page was therefore not added.
</td>
              </tr>
              <tr>
                <td height="32" align="right">&nbsp;</td>
                <td height="32" align="center">&nbsp;</td>
                <td height="32" align="left" class="mainbold">&nbsp;</td>
              </tr>
<?php
}
?>
            <tr>
              <td width="141" height="32" align="right">* Page</td>
              <td height="32" align="center"><img src="/images/spacer.gif" alt="spacer" width="15" height="20" /></td>
              <td height="32" align="left"><input name="page" type="text" class="admin_fields" id="page" value="<?php echo $_POST['page']; ?>" size="40" maxlength="100" /></td>
            </tr>
<!--             <tr>
                <td height="32" align="right">Filename</td>
                <td width="12" height="32" align="center">&nbsp;</td>
                <td height="32" align="left">
                    <input name="filename" type="text" class="tablecontent" id="filename" value="<?php echo $_POST['filename']; ?>" size="50" maxlength="100" />
                    .php</td>
                <td width="17" height="32" align="center" valign="middle">*</td>
                <td height="32">&nbsp;</td>
              </tr> -->
            <tr>
              <td height="32" align="right">* Title</td>
              <td height="32" align="center">&nbsp;</td>
              <td height="32" align="left"><input name="title" type="text" class="admin_fields" id="title" value="<?php echo $_POST['title']; ?>" size="40" maxlength="100" /></td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="32" align="right">Keywords</td>
              <td height="32" align="center">&nbsp;</td>
              <td height="32" align="left"><textarea name="keywords" class="admin_fields" cols="60" id="keywords"><?php echo $_POST['keywords']; ?></textarea></td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="32" align="right">Description</td>
              <td height="32" align="center">&nbsp;</td>
              <td height="32" align="left"><textarea name="description" cols="60" class="admin_fields" id="description"><?php echo $_POST['description']; ?></textarea></td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="32" align="right">* Menu Section&nbsp;</td>
              <td height="32" align="center">&nbsp;</td>
              <td height="32" align="left"><select class="admin_fields" name="menusection" id="menusection" <?php if ($row_cms['System'] == 1) { echo "DISABLED"; } ?>>
			<option value="">-------- Please Select ---------</option>
<?php
if ($totalRows_navoptions > 0) {
	if ($totalRows_navoptions < $maxTopMenuItems) {
		// Only if there x or less items, allo an item to be set to be a top menu item.
?>
			<option value="TopMenu">Top Menu Item</option>
<?php } ?>
			<option value="">---------- Top Menu Items ------</option>	
<?php
	do {
?>
                <option value="<?php echo $row_navoptions['Menu_Section']; ?>" <?php if ($row_cms['Menu_Section'] == $row_navoptions['Menu_Section']) { echo "SELECTED"; } ?>><?php echo $row_navoptions['Menu_Name']; ?></option>
<?php 
	} while ($row_navoptions = mysql_fetch_assoc($navoptions));
?>
				<option value="">--------------------------------</option>
<?php } ?>
                <option value="Standalone" <?php if ($row_cms['Menu_Section'] == "Standalone") { echo "SELECTED"; } ?>>Standalone Page</option>
<?php
if (!$enableSections) { ?>
				 <option value="LHM" <?php if ($row_cms['Menu_Section'] == "LHM") { echo "SELECTED"; } ?>>Left Hand Menu</option> 
<?php
} else {
	if ($totalRows_cms_cat3 > 0) { ?>
				<option value="">---------- Section (LHM) -------</option>	
<?php
		do {
?>
				<option value="<?php echo "s".$row_cms_cat3['ID']?>" <?php if ($row_cms_cat3['ID'] == $row_cms['Related_Section']) {echo "SELECTED";} ?>><?php echo $row_cms_cat3['Content_Type']?></option>
<?php
		} while ($row_cms_cat3 = mysql_fetch_assoc($cms_cat3));
	}
}
?>

				<option value="">---------- Categories ----------</option>			 
				 <?php
do {
?>
				<option value="<?php echo "c".$row_cms_cat['ID']?>" <?php if ($row_cms_cat['ID'] == $row_cms['Related_Category']) {echo "SELECTED";} ?>><?php echo $row_cms_cat['Content_Type']?></option>
<?php
} while ($row_cms_cat = mysql_fetch_assoc($cms_cat));
if ($totalRows_cms_cat2 > 0) {
?>
<option value="">---------- Pages ----------</option>
<?php
	do {
?>
                                          <option value="<?php echo "p".$row_cms_cat2['ID']?>" <?php if ($row_cms_cat2['ID'] == $row_cms['Related_Page']) {echo "SELECTED";} ?>><?php echo $row_cms_cat2['Page']?></option>
<?php
	} while ($row_cms_cat2 = mysql_fetch_assoc($cms_cat2));
}
?>
							  
                                </select>	</td>
            </tr>
            <tr>
              <td height="32" align="right">Menu Name </td>
              <td height="32" align="center">&nbsp;</td>
              <td height="32" align="left"><input name="menuname" type="text" class="admin_fields" id="menuname" value="<?php echo $_POST['menuname']; ?>" size="40" maxlength="100" /></td>
            </tr>
            <tr>
              <td height="32" align="right">Menu Order </td>
              <td height="32" align="center">&nbsp;</td>
              <td height="32" align="left"><input name="menuorder" type="text" class="admin_fields" id="menuorder" value="<?php echo $_POST['menuorder']; ?>" size="40" maxlength="100" /></td>
            </tr>
			<tr>
			  <td height="32" align="right">URL</td>
			  <td height="32" align="center">&nbsp;</td>
			  <td height="32" align="left"><input name="url" type="text" class="admin_fields" id="url" value="<?php echo $_POST['url']; ?>" size="40" maxlength="255" /></td>
			  </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="right">* Active</td>
                <td width="12" height="32" align="center">&nbsp;</td>
                <td height="32" align="left"><select name="active" id="active" class="admin_fields">
                  <option value="No" selected="selected">No</option>
                  <option value="Yes">Yes</option>
                </select></td>
              </tr>
              <tr>
                <td height="32" align="right">Country</td>
                <td height="32" align="center">&nbsp;</td>
                <td height="32" align="left">
<select name="section" class="admin_fields" id="section">
<?php
if ($totalRows_sections > 0) {
	do {  
?>
                        <option value="<?php echo $row_sections['ID']?>"><?php echo $row_sections['Content_Type'] ?></option>
<?php
	} while ($row_sections = mysql_fetch_assoc($sections));
}
?>
                      </select>
				</td>
              </tr>
              <tr>
                <td height="32" align="right">Access To </td>
                <td height="32" align="center">&nbsp;</td>
                <td height="32" align="left">
<select name="group" class="admin_fields" id="group">
<?php
if ($totalRows_groups > 0) {
	do {  
?>
                        <option value="<?php echo $row_groups['ID']?>"><?php echo $row_groups['Name'] ?></option>
<?php
	} while ($row_groups = mysql_fetch_assoc($groups));
}
?>
                      </select>
				</td>
              </tr>
            <tr>
              <td height="32" align="right">&nbsp;</td>
              <td height="32" align="center">&nbsp;</td>
              <td height="32" align="left">&nbsp;</td>
            </tr>
<!--             <tr>
              <td height="32" align="right">Path to Header Image</td>
              <td height="32" align="center">&nbsp;</td>
              <td height="32" align="left"><input name="filename" type="file" class="tablecontent" id="filename" value="Add local path / URL" /></td>
              <td height="32" align="center" valign="middle">&nbsp;</td>
              <td height="32">&nbsp;</td>
            </tr> -->

<?php if ($enableCountries AND $GLOBALS['MM_UserGroup'] >=500 AND 1 == 2) { ?>
<?php } else { ?>
<input name="section" type="hidden" value="<?php echo $GLOBALS['MM_UserSection2']; ?>" />
<?php } ?>
				</table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
              <tr bgcolor="#a4ccdb">
    <td width="30" height="32" align="left"><img src="/images/spacer.gif" alt="spacer" width="30" height="18" /></td>
    <td width="122" height="32" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;">Content</td>
    <td width="724" height="32" align="left">&nbsp;</td>
  </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" align="left" valign="top">&nbsp;</td>
                <td height="32" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" align="left" valign="top">Primary Banner Area</td>
                <td height="32" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" colspan="2" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;"><textarea name="headercode" cols="100" rows="1" id="headercode"><?php echo $_POST['headercode']; ?></textarea></td>
                </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" colspan="2" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" align="left" valign="top">Heading</td>
                <td height="32" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" colspan="2" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;"><textarea name="heading" id="heading" cols="100" class="tablecontent"><?php echo $_POST['heading']; ?></textarea></td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" align="left" valign="top">Main Content</td>
                <td height="32" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" colspan="2" align="left"><textarea name="content1" cols="100" rows="30" class="tablecontent" id="content1"><?php echo $_POST['content1']; ?></textarea></td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" colspan="2" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;"></td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" align="left" valign="top">Secondary Banner Code</td>
                <td height="32" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" colspan="2" align="left"><textarea name="secondarybannercode" cols="100" rows="1" id="secondarybannercode"><?php echo $_POST['Secondary_Banner']; ?></textarea></td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" colspan="2" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;"></td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" align="left">Additional Code</td>
                <td height="32" align="left" style="font-weight:bold; color:#ffffff; font-size:15px;">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="40" colspan="2" align="left" valign="top"><textarea name="JavaScript" cols="100" rows="5" class="admin_fields" id="JavaScript"><?php echo stripslashes($row_cms['JavaScript']); ?></textarea></td>
                </tr>
              <tr>
                <td width="30" height="32" align="left">&nbsp;</td>
                <td height="30" colspan="2" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" align="left">&nbsp;</td>
                <td height="30" colspan="2" align="left" valign="top">* Required Fields</td>
              </tr>
				</table>
				<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-image:url(/images/admin_gradient_short.jpg); background-repeat:repeat-x; background-position:bottom; background-color:#F4F9FC;">
                      <tr>
                        <td align="left" style="background-color:#ffffff; border-top:1px solid #dfdfdf;">&nbsp;</td>
                      </tr>
                      <tr>
                      <td height="28" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: submitform()" ><img src="/images/admin_btn_add.png" alt="Add" width="105" height="34" border="0" /></a>&nbsp;&nbsp;<a href="index.php"><img src="/images/admin_btn_cancel.png" alt="Cancel" width="105" height="34" border="0" /><br />
                      </a>&nbsp;</td>
                    </tr>
                  </table>
						  <input type="hidden" name="MM_insert" value="upload" />
		  </form>
<script language="JavaScript" type="text/javascript">
var myFormValidator = new Validator("upload");
myFormValidator.addValidation("page", "req","Please enter the page name");
myFormValidator.addValidation("title", "req","Please enter the title of the page");
myFormValidator.addValidation("menusection", "req","Please enter the menu section this page belongs to");
//myFormValidator.addValidation("heading", "req","Please enter the heading for the page");
</script>
<script language="JavaScript" type="text/javascript">
function submitform() {
	if (document.upload.onsubmit())	{
		var errorText = "";
		if (tinyMCE.get('content1').getContent().length < 1 && document.upload.url.value.length < 1) {
			errorText = "Please enter the main content for the page";
		}
		if (tinyMCE.get('heading').getContent().length < 1 && document.upload.url.value.length < 1) {
			errorText = "Please enter the heading for the page";
		}
		if (errorText == "") {
			document.upload.submit();
		} else {
			alert (errorText);
		}

	}
}
</script>         
                      </td></tr>
                </table>
              </td>
            </tr>
          </table>
		  		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="18"><img src="/images/admin_main_bottomLeft2.jpg" width="18" height="30" /></td>
    <td><div style="background-color:#a4ccdb; width:100%; height:30px; text-align:right; line-height:28px;"><a style="color:#ffffff;" href="#top">Back to top</a></div></td>
    <td width="18"><img src="/images/admin_main_bottomRight2.jpg" width="18" height="30" /></td>
  </tr>
</table>
	<!-- InstanceEndEditable -->
</div>


</div>

<!--- CONTENT END --->

<!--- FOOTER START --->

<?php include($baseFolder."/includes/admin_footer.php"); ?>

<!--- FOOTER END --->

</div>




</body>
<!-- InstanceEnd --></html>

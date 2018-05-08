<?php
require_once('../../Connections/configuration.php');
require_once('../../Connections/db.php');
require_once('../../Connections/authenticate.php');
include("deletemember_code.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->
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
<script src="/Connections/gen_validatorv6.js" language="JavaScript">
</script>
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
            <?php include("../menu.php"); ?>
	  <!-- InstanceEndEditable -->

</div>



<div id="content_column">
<!-- InstanceBeginEditable name="Main" -->
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="33" align="left"><h1 align="left">
              <div class="page_head"><img src="/images/admin_heading_left.jpg" width="17" height="33" align="left"><a name="top" id="top"></a>Admin User Control - Delete User</div>
              <div class="admin_descriptiontext">
                <table height="33" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr height="33">
                    <td height="33" align="right">Click on the Delete button to delete this user</td>
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
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-left:1px solid #dfdfdf; border-right:1px solid #dfdfdf; background-image:url(/images/left_nav_box_bg.jpg); background-repeat:repeat-x; background-position:top; background-color:#F4F9FC;">
                    <tr>
                      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #dfdfdf; background-color:#F4F9FC;">
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
                      </table>
                        <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" style="margin:0">
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="32" align="right">&nbsp;</td>
                      <td height="32" align="center">&nbsp;</td>
                      <td height="32" align="left">&nbsp;</td>
                      <td height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">First name</td>
                      <td width="12" height="32" align="center">&nbsp;</td>
                      <td width="231" height="32" align="left"><div align="right" class="MainBody">
                          <div align="left" ><?php echo $row_crm['First_Name']; ?></div>
                      </div></td>
                      <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">Last name</td>
                      <td width="12" height="32" align="center">&nbsp;</td>
                      <td width="231" height="32" align="left" >
                          <div align="left"><?php echo $row_crm['Surname']; ?>
                        </div></td>
                      <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">Email Address</td>
                      <td width="12" height="32" align="center">&nbsp;</td>
                      <td width="231" height="32" align="left"><?php echo $row_crm['Email']; ?></td>
                      <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">Company name</td>
                      <td height="32" align="center">&nbsp;</td>
                      <td width="231" height="32" align="left"><?php echo $row_crm['Company']; ?></td>
                      <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">Job Description</td>
                      <td height="32" align="center">&nbsp;</td>
                      <td width="231" height="32" align="left" ><?php echo $row_crm['Job_Title']; ?></td>
                      <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">Password</td>
                      <td height="32" align="center">&nbsp;					  </td>
                      <td height="32" align="left"><?php echo $row_crm['Password']; ?></td>
                      <td height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32" valign="bottom">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">Access Level</td>
                      <td height="32" align="center">&nbsp;			  					    </td>
                      <td height="32" align="left" >
<?php
// Access Levels
mysql_select_db($database_db, $db);
$query_CRM_access = sprintf ("SELECT * FROM crm_access WHERE Access_Level = '%s'", $row_crm['Access_Level']);
$CRM_access = mysql_query($query_CRM_access, $db) or die(mysql_error());
$row_CRM_access = mysql_fetch_assoc($CRM_access);
echo $row_crm['Access_Level'].". ".$row_CRM_access['Description'];
?>
</td>
                      <td height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32" valign="bottom">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" align="right">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="left" >&nbsp;</td>
                      <td align="center" valign="top">&nbsp;</td>
                      <td valign="bottom">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">Transfer Ownership to</td>
                      <td height="32" align="center">&nbsp;</td>
                      <td height="32" align="left" >
					  <select name="newowner" class="admin_fields" id="newowner">
                        <option value="">Please Select</option>
<?php
if ($totalRows_newusers > 0) {
	do {
?>
<option value="<?php echo $row_newusers['ID']; ?>"><?php echo $row_newusers['First_Name']." ".$row_newusers['Surname']; ?></option>
<?php
	} while ($row_newusers = mysql_fetch_assoc($newusers));
}
?>						
                      </select>
					  </td>
                      <td height="32" align="center" valign="top">&nbsp;</td>
                      <td height="32" valign="bottom">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" align="right">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td height="32" align="left" >&nbsp;</td>
                      <td align="center" valign="top">&nbsp;</td>
                      <td valign="bottom">&nbsp;</td>
                    </tr>
					  </table>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr bgcolor="#F4F9FC">
                      <td height="28" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: submitform()" ><img src="/images/admin_btn_delete.png" alt="Delete User" width="105" height="34" border="0" /></a>&nbsp;&nbsp;<a href="index.php"><img src="/images/admin_btn_cancel.png" alt="Cancel" width="105" height="34" border="0" /><br />
                      </a>&nbsp;</td>
                    </tr>
                  </table>
          <input name="MM_delete" type="hidden" id="MM_delete" value="form1" />
          <input name="Email" type="hidden" id="Email" value="<?php echo $row_crm['Email']; ?>" />
		  		  <input name="ID" type="hidden" id="ID" value="<?php echo $row_crm['ID']; ?>">
</form>
<script language="JavaScript" type="text/JavaScript">
var myFormValidator = new Validator("form1");
myFormValidator.addValidation("newowner", "req","Please select the person you wish to transfer any files owned by the person you are removing");
</script>
<script language="JavaScript" type="text/JavaScript">
function submitform() {
	if (document.form1.onsubmit()) {
		document.form1.submit();
	}
}
</script>

                      </td>
                    </tr>
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

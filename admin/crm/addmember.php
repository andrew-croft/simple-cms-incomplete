<?php
require_once('../../Connections/configuration.php');
require_once('../../Connections/db.php');
require_once('../../Connections/authenticate.php');
include('addmember_code.php');
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
<script language="JavaScript" src="/Connections/gen_validatorv6.js" type="text/JavaScript"></script>
<script type="text/javascript">
var lastDiv = "";
function whichEntry(divName) {
	if (divName > 99 && divName < 500) {
		document.getElementById(8888).className = "visibleDiv";
	} else {
		document.getElementById(8888).className = "hiddenDiv";
	}
}

</script>
<style type="text/css" media="screen">
<!--
.hiddenDiv {
	display: none;
}
.visibleDiv {
	display: block;
}

-->
</style>
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
              <div class="page_head"><img src="/images/admin_heading_left.jpg" width="17" height="33" align="left"><a name="top" id="top"></a>Admin User Control - Add User</div>
              <div class="admin_descriptiontext">
                <table height="33" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr height="33">
                    <td height="33" align="right">Fill in the users details below and click on the Add button</td>
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
                      <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #dfdfdf; background-color:#F4F9FC;">
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
                      <td width="200" height="32" align="right">&nbsp;</td>
                      <td width="12" height="32" align="center">&nbsp;</td>
                      <td width="240" height="32" align="left">&nbsp;</td>
                      <td width="17" height="32" align="center">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">* First name</td>
                      <td width="12" height="32" align="center">&nbsp;</td>
                      <td width="240" height="32" align="left">
                        <input name="First_Name" class="admin_fields" type="text" id="First_Name" value="<?php if (isset($_POST['First_Name'])) { echo $_POST['First_Name']; } ?>" size="40" maxlength="30" /></td>
                      <td width="17" height="32" align="center">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">* Last name</td>
                      <td width="12" height="32" align="center">&nbsp;</td>
                      <td width="240" height="32" align="left">
                          <input name="Surname" class="admin_fields" type="text" id="Surname" value="<?php if (isset($_POST['Surname'])) { echo $_POST['Surname']; } ?>" size="40" maxlength="30" />
                      </td>
                      <td width="17" height="32" align="center">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">* Email Address</td>
                      <td width="12" height="32" align="center">&nbsp;</td>
                      <td width="240" height="32" align="left"><input name="Email" class="admin_fields" type="text" id="Email" value="<?php if (isset($_POST['Email'])) { echo $_POST['Email']; } ?>" size="40" maxlength="40" /></td>
                      <td width="17" height="32" align="center">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">Company / Organisation</td>
                      <td height="32" align="center">&nbsp;</td>
                      <td width="240" height="32" align="left"><input name="Company" class="admin_fields" type="text" id="Company" value="<?php if (isset($_POST['Company'])) { echo $_POST['Company']; } ?>" size="40" maxlength="30" /></td>
                      <td width="17" height="32" align="center">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">* Telephone</td>
                      <td height="32" align="center">&nbsp;</td>
                      <td width="240" height="32" align="left"><input name="Job_Title" class="admin_fields" type="text" id="Job_Title" value="<?php if (isset($_POST['Job_Title'])) { echo $_POST['Job_Title']; } ?>" size="40" maxlength="30" /></td>
                      <td width="17" height="32" align="center">&nbsp;</td>
                      <td height="32">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">* Password&nbsp;</td>
                      <td height="32" align="center">&nbsp;					  </td>
                      <td width="240" height="32" align="left"><input name="Password" class="admin_fields" type="text" id="Password" size="40" maxlength="10" /></td>
                      <td width="17" height="32" align="center">&nbsp;</td>
                      <td height="32" valign="bottom">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="32" align="right">* Access Level&nbsp; </td>
                      <td height="32" align="center">&nbsp;			  					    </td>
                      <td width="240" height="32" align="left">
					  <select name="Access_Level" class="admin_fields" id="Access_Level" onChange="whichEntry(this.value);">
					    <?php
$query_CRM_access = "SELECT * FROM crm_access WHERE Access_Level >= 100 ORDER BY Access_Level ASC";
$CRM_access = mysql_query($query_CRM_access, $db) or die(mysql_error());
$row_CRM_access = mysql_fetch_assoc($CRM_access);
$totalRows_CRM_access = mysql_num_rows($CRM_access);
do {  
?>
					    <option value="<?php echo $row_CRM_access['Access_Level']?>"><?php echo $row_CRM_access['Access_Level'].". ".$row_CRM_access['Description']?></option>
					    <?php
} while ($row_CRM_access = mysql_fetch_assoc($CRM_access));
  $rows = mysql_num_rows($CRM_access);
  if($rows > 0) {
      mysql_data_seek($CRM_access, 0);
	  $row_CRM_access = mysql_fetch_assoc($CRM_access);
  }
?>
                      </select>
					</td>
                      <td width="17" height="32" align="center">&nbsp;</td>
                      <td height="32" valign="bottom">&nbsp;</td>
                    </tr>
</table>
<?php if ($enableCountries) { ?>
<div id="8888" class="hiddenDiv">  
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="200" align="right">Country</td>
                      <td width="12" height="32" align="center">&nbsp;</td>
                      <td width="240" height="32" align="left"><select name="Country" id="Country">
<?php
if ($totalRows_countries > 0) {
	do {
?>
						<option value="<?php echo $row_countries['ID']; ?>"><?php echo $row_countries['Content_Type']; ?></option>
<?php
	} while ($row_countries = mysql_fetch_assoc($countries));
}
?>
                      </select></td>
                      <td width="17" height="32" align="center">*</td>
                      <td height="32" valign="bottom">&nbsp;</td>
                    </tr>
</table>
</div>
 <?php } ?>
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="32" align="right">Groups</td>
                      <td height="32" align="center">&nbsp;</td>
                      <td width="240" height="32" align="left"><select name="Group[]" class="admin_fields" size="5" multiple="multiple" id="Group[]">
<?php
if ($totalRows_section > 0) {
	do {
?>
						<option value="<?php echo $row_section['ID']; ?>"><?php echo $row_section['Name']; ?></option>
<?php
	} while ($row_section = mysql_fetch_assoc($section));
}
?>
                      </select></td>
                      <td height="32" align="center">&nbsp;</td>
                      <td height="32" valign="bottom">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td width="240" align="left">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td valign="bottom">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="200" height="28" align="right">&nbsp;</td>
                      <td width="12" height="28" align="center">&nbsp;</td>
                      <td width="240" height="28" align="left" valign="middle">* Required Fields
					  
					  </td>
                      <td width="17" height="28" align="center">&nbsp;</td>
                      <td height="28" align="left" valign="bottom">&nbsp;</td>
                    </tr>
                                         <tr>
                                            <td colspan="5" align="right">&nbsp;</td>
                            </tr>
					</table>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr bgcolor="#F4F9FC">
                      <td height="28" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: submitform()" ><img src="/images/admin_btn_add.png" alt="Add User" width="105" height="34" border="0" /></a>&nbsp;&nbsp;<a href="index.php"><img src="/images/admin_btn_cancel.png" alt="Cancel" width="105" height="34" border="0" /><br />
                      </a>&nbsp;</td>
                    </tr>
                  </table>
	<input type="hidden" name="MM_insert" value="form1" />
</form>
<script language="JavaScript" type="text/javascript">
var myFormValidator = new Validator("form1");
myFormValidator.addValidation("First_Name", "req","Please enter your first name");
myFormValidator.addValidation("Surname", "req","Please enter your last name");
myFormValidator.addValidation("Email", "req","Please enter a valid email address");
myFormValidator.addValidation("Email", "email","Please enter a valid email address");
myFormValidator.addValidation("Job_Title", "req","Please enter a telephone number");
myFormValidator.addValidation("Password", "req","Please enter a password with a minimum of 6 characters");
myFormValidator.addValidation("Password", "minlen=6","Please enter a password with a minimum of 6 characters");
</script>
<script language="JavaScript" type="text/javascript">
function submitform()
{
	if (document.form1.onsubmit())
	{
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

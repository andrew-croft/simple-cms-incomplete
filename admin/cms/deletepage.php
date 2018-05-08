<?php
require_once('../../Connections/configuration.php');
require_once('../../Connections/db.php');
require_once('../../Connections/authenticate.php');
include('deletepage_code.php');
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
              <div class="page_head"><img src="/images/admin_heading_left.jpg" width="17" height="33" align="left"><a name="top" id="top"></a>Page Control - Delete Page</div>
              <div class="admin_descriptiontext">
                <table height="33" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr height="33">
                    <td height="33" align="right">Click on the Delete button to delete this page</td>
                    <td height="33" width="17"><img src="/images/admin_heading_right.jpg" width="17" height="33"></td>
                  </tr>
                </table>
              </div>
            </h1></td>
        </tr>
      </table>
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="pagetext" style="border-left:1px solid #dfdfdf; border-right:1px solid #dfdfdf; background-image:url(/images/admin_gradient_short.jpg); background-repeat:repeat-x; background-position:top; background-color:#F4F9FC;">
            <tr>
              <td valign="top">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="top">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" style="margin:0">
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="200" align="right">Page</td>
                <td width="12" height="32" align="center">&nbsp;</td>
                <td width="206" height="32" align="left">
<?php echo stripslashes($row_cms['Page']); ?>
                </td>
                <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                <td height="32">&nbsp;</td>
              </tr>
              <tr>
                <td width="200" align="right">Filename</td>
                <td height="32" align="center">&nbsp;</td>
                <td height="32" align="left"><?php echo stripslashes($row_cms['Filename'])."-pa-".$row_cms['ID'].".php"; ?></td>
                <td height="32" align="center" valign="top">&nbsp;</td>
                <td height="32">&nbsp;</td>
              </tr>
              <tr>
                <td width="200" align="right">Title</td>
                <td width="12" height="32" align="center">&nbsp;</td>
                <td width="206" height="32" align="left">
                    <?php echo $row_cms['Title']; ?>
                </td>
                <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                <td height="32">&nbsp;</td>
              </tr>
              <tr>
                <td width="200" align="right">Heading</td>
                <td width="12" height="32" align="center">&nbsp;</td>
                <td width="206" height="32" align="left"><?php echo $row_cms['Heading']?></td>
                <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                <td height="32">&nbsp;</td>
              </tr>
              <tr>
                <td width="200" align="right">Language</td>
                <td width="12" height="32" align="center">&nbsp;</td>
                <td width="206" height="32" align="left"><?php echo $row_cms['Language']?></td>
                <td width="17" height="32" align="center" valign="top">&nbsp;</td>
                <td height="32">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td height="32" align="center">&nbsp;</td>
                <td height="32" align="left">&nbsp;</td>
                <td height="32" align="center" valign="top">&nbsp;</td>
                <td height="32">&nbsp;</td>
              </tr>
			</table>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                      <td height="28" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: document.form1.submit()" ><img src="/images/admin_btn_delete.png" alt="Delete" width="105" height="34" border="0" /></a>&nbsp;&nbsp;<a href="<?php
echo "index.php"; ?>"><img src="/images/admin_btn_cancel.png" alt="Cancel" width="105" height="34" border="0" /><br />
                      </a>&nbsp;</td>
                    </tr>
                  </table>
			    <input name="MM_delete" type="hidden" id="MM_delete" value="form1" />
			<input name="ID" type="hidden" id="ID" value="<?php echo $row_cms['ID']; ?>" />
  </form>
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

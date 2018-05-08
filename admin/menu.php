<?php
// Categories
mysql_select_db($database_db, $db);
$query_CMS_content = "SELECT * FROM cms_content ORDER BY `Order` ASC";
$CMS_content = mysql_query($query_CMS_content, $db) or die(mysql_error());
$row_CMS_content = mysql_fetch_assoc($CMS_content);
$totalRows_CMS_content = mysql_num_rows($CMS_content);

// Point back to self with the correct string
$self = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
	$self .= (strpos($self, '?')) ? "&" : "?";
	$self .= $_SERVER['QUERY_STRING'];
}

?>
<div class="left_menu_title"><img src="/images/left_nav_admin_control.jpg" width="189" height="33" /></div>
<div class="left_menu_box">
<div style="height:10px;"></div>
	<div class="leftnav">
<?php
if ($GLOBALS['MM_UserGroup'] >= 500) {
?>
		<a href="/admin/crm/index.php">Admin User Control</a>
		<a href="/admin/users/index.php">End User Control</a>
		<a href="/admin/crmgroups/index.php">Group Control</a>
		<?php if($membershipControl){ ?> 
        <a href="/admin/membership/index.php">Membership Control</a> 
		<?php }?>
<!--	<a href="/admin/tracker/index.php">Tracker Control</a> -->
<?php } ?>
<div style="height:10px;"></div>
</div>
</div>
<div class="left_menu_box_bottom"><img src="/images/left_nav_box_bottom.jpg" width="189" height="8" /></div>
<div class="left_menu_title"><img src="/images/left_nav_content_control.jpg" width="189" height="32" /></div>
<div class="left_menu_box">
<div style="height:10px;"></div>
	<div class="leftnav">
    <?php
if (($GLOBALS['MM_UserGroup'] > 100 AND $GLOBALS['MM_UserGroup'] < 200) OR $GLOBALS['MM_UserGroup'] >=300) {
?>
		<a href="/admin/cat/index.php">Category Control</a>
<?php
}
if (($GLOBALS['MM_UserGroup'] >= 100 AND $GLOBALS['MM_UserGroup'] < 200) OR $GLOBALS['MM_UserGroup'] >=300) {
?>
		<a href="/admin/ecm/index.php">Content Control</a>	
        <a href="/admin/casestudy/index.php">Case Study Control</a>
<?php
}
if (($GLOBALS['MM_UserGroup'] >= 100 AND $GLOBALS['MM_UserGroup'] < 200) OR $GLOBALS['MM_UserGroup'] >=300) {
?>
<?php if ($enableProducts) { ?>
		<a href="/admin/product/index.php">Product Control</a>
       <!-- <a href="/admin/product-import/index.php">Product Import/Export</a>-->
<?php } ?>



		<a href="/admin/comment/index.php">Comments Control</a>

<?php	
}
if ($GLOBALS['MM_UserGroup'] >= 500 & 1 == 2) { // Language control disabled
?>
		<a href="/admin/language/index.php">Language Control</a>
<?php
}
if ($GLOBALS['MM_UserGroup'] >= 200 AND $enableSections) { ?>
		<a href="/admin/home/index.php">Section Control</a>
<?php
}
if ($GLOBALS['MM_UserGroup'] >= 200) { 
	if (!$enableFixedMenu OR ($enableFixedMenu AND $GLOBALS['MM_UserSection2'] == 1)) {
?>
		<a href="/admin/cms/index.php">Page Control</a>

<?php
	}
}
if (($GLOBALS['MM_UserGroup'] > 100 AND $GLOBALS['MM_UserGroup'] < 200) OR $GLOBALS['MM_UserGroup'] >=300) {
	if ($enableProducts) { 
    	if($enableOrigin == 1){?>
			<a href="/admin/flags/index.php">Origin Control</a>
<?php   }
	} ?>
		<a href="/admin/prefs/index.php">Preferences</a>
<?php
} 
if ($enableCountries AND $GLOBALS['MM_UserGroup'] >= 500) {
		// Countires/section code
?>
		<a href="/admin/countries/index.php">Section Control</a>
<?php } ?>
<?php // --------------------------------------------------------------------------------------------------------------------------- ?>

<script language="javascript" type="text/javascript" src="/js/imagemanager/js/mcimagemanager.js"></script>
<script language="javascript" type="text/javascript" src="/js/filemanager/js/mcfilemanager.js"></script>
<a href="javascript:mcImageManager.browse({remember_last_path : false, path : '/images/content'});">Images Manager</a>
<a href="javascript:mcFileManager.browse({remember_last_path : false, path : '/pages/files'});">File Manager</a>

<?php // --------------------------------------------------------------------------------------------------------------------------- ?>
<?php if (isset($_SESSION['MM_Username']) AND $_SESSION['MM_Username'] != "") { ?>
		<a href="<?php echo $logoutAction ?>">Logout</a>
<?php } ?>
    <div style="height:10px;"></div>
    </div>
</div>
<div class="left_menu_box_bottom"><img src="/images/left_nav_box_bottom.jpg" width="189" height="8" /></div>
	<?php
if ($enableCountries AND 1 == 2) { // DISABLED
	// Get the country/section
	$query_topnav2 = "SELECT * FROM section WHERE ID = ".$GLOBALS['MM_UserSection2'];
	$topnav2 = mysql_query($query_topnav2, $db) or die(mysql_error());
	$row_topnav2 = mysql_fetch_assoc($topnav2);
	$totalRows_topnav2 = mysql_num_rows($topnav2);
?>
<hr>
<p class="search_title">
	<?php echo $row_topnav2['Content_Type']; ?>
</p>
<hr>
<?php } ?>




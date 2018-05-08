
<link href="/css/admin-footer.css" rel="stylesheet" type="text/css" />

<div id="footer_wrap">

<div class="footer_separator"></div>

<div id="footer_container">
	
		<div class="footeradmin">

<?php
	if ($totalRows_topnav > 0) {
		$menuCounter = 0;
		do {
			// If the index page, change the URL
			if ($row_topnav['Menu_Section'] == "Home") {
				$row_topnav['URL'] = "/".$indexURL;
			}
	
			if ($row_topnav['URL'] != "") {
				$menuItems = '<a href="'.$row_topnav['URL'].'" id="topnavitem'.$menuCounter.'">'.$row_topnav['Menu_Name'].'</a>';
			} else {
				$menuItems = '<a href="/'.$defaultPath.$row_topnav['Filename'].'-pa-'.$row_topnav['ID'].'.php"  id="topnavitem'.$menuCounter.'">'.$row_topnav['Menu_Name'].'</a>';
			}
			
			echo $menuItems; 

			$menuCounter++;
		} while ($row_topnav = mysql_fetch_assoc($topnav));
	}
?>


		</div>	

  </div> 
<div class="footer_separator2"></div>
	



<?php mysql_close($db); ?>
<br style="clear: both;" />
</div>


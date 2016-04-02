<?php 
	require_once "class/config/class.template.php";
	require_once "class/config/class.setting.php";
	require_once 'class/config/class.lang.php';

	define("ADMIN_TEMPLATE","OPEN");
	$getLang = getLang();
	require 'lang/lang.'.$getLang.'.php';

	function generateBanner() {
		$banner =  getBanner();
		echo "<img src=\"$banner\" width=\"100%\" alt=\"\">";
	}



 ?>


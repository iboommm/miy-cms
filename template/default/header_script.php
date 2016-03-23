<meta charset="UTF-8">
<?php 
	$js["jquery"] = "js/jquery.min.js";
	$js["bootstrap"] = "js/bootstrap.min.js";


	$css["bootstrap"] = "css/bootstrap.min.css";
	$css["admin"] = "template/default/css/admin.css";
	$css["admin2"] = "template/default/css/sb-admin.css";
	$css["font"] = "template/default/css/font-awesome.css";
	foreach ($js as $jsGenerate) {
		print "<script src='$jsGenerate'></script>\n";
	}
	foreach ($css as $cssGenerate) {
		print "<link rel='stylesheet' href='$cssGenerate'></script>\n";
	}
        
?>

<?php 
	session_start();		
	define("CLASS_ADMIN","OPEN_GATE");
	define("ROOT", __DIR__ ."/");
	require 'class/config/class.admin.php';
	//
	if(isset($_POST['data'])) {
		$data =  $_POST['data'];
		print login($data);
	}
	if(isset($_SESSION["ses_login_user"])) {
		print $_SESSION["ses_login_user"];
	}else {
		print 0;
	}
?>
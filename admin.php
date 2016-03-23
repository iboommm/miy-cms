<?php 
	define("CLASS_ADMIN","OPEN_GATE");
	define("ROOT", __DIR__ ."/");
	require 'class/config/class.admin.php';
	//
	session_start();	
	if(isset($_SESSION["ses_login_user"]) && $_SESSION["ses_login_user"] != ""){
		include "template/".getTheme()."/admin/index.tem.php";
	}else {
		include "template/".getTheme()."/admin/login.tem.php";	
	}
?>
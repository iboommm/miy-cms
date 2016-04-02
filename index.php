<?php 
	define("CLASS_ADMIN","OPEN_GATE");
	define("ROOT", __DIR__ ."/");
	require 'class/config/class.admin.php';
	//
	session_start();	
		require_once "template/".getTheme()."/index.tem.php";


?>
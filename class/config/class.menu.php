<?php 
	require_once 'class.db.php';

	class Menu	{
		function getMenu() {
			$db = new DB();
			$string = $db->queryExecute("menu");
			$result = unserialize($string);
			return $result["setting_value"];
		}
	}
 ?>

<?php 
	require_once 'class.db.php';


	function getSetting($variable)	{
		$db = new DB();
		$string = $db->queryExecute("setting","`setting_variable` = '$variable'");
		$result = unserialize($string);
		return $result["setting_value"];
	}

 ?>

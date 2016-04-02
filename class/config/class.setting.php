
<?php 
	require_once 'class.db.php';


	function getSetting($variable)	{
		$db = new DB();
		$string = $db->queryExecute("setting","`setting_variable` = '$variable'");
		$result = unserialize($string);
		return $result["setting_value"];
	}

	function getBanner() {
		$db = new DB();
		$string = $db->queryExecute("banner","`status` = 1");
		$result = unserialize($string);
		return $result["url"];
	}

	function getLayout() {
		$db = new DB();
		$string = $db->queryExecute("layout","`name` LIKE 'content'");
		return $string;
	}
 ?>

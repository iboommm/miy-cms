<?php 
	require_once 'class.db.php';

	function getLang()	{
		$db = new DB();
		$string = $db->queryExecute("setting_lang","`lang_available` = 1");
		$langGen = unserialize($string);
		return $langGen['lang_name'];
	}


?>
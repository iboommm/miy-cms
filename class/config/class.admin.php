<?php 

	define("CLASS_DB","OPEN_GATE");
	require_once 'class.db.php';
	if(!defined("CLASS_ADMIN")) 
		exit("Access Denied");
	function getTheme()	{
		$db = new DB();
		$string = $db->queryExecute("setting_theme","`theme_available` = 1");
		$themeGen = unserialize($string);
		return $themeGen['theme_name'];
	}
	function login($data) {
		$login = explode(",",$data);
		$generateLogin = serialize($login);
		$username  = base64_decode($login[0]);
		$password  = base64_decode($login[1]);
		$password = md5($password);

		$db = new DB();
		$login = $db->queryExecute("member","`username` LIKE '$username' AND `password` LIKE '$password'","number");
		if($login == 1) {
			setLogin($generateLogin);
		}
		return $login;
	}
	function setLogin($login) {
		$decodeData = unserialize($login);
		$_SESSION["ses_login_user"] = base64_decode($decodeData[0]);
	}

	function addMember($data) {
		$member = explode(",",$data);
		$deUsername = base64_decode($member[0]);
		$dePassword = md5(base64_decode($member[1]));
		$deEmail = base64_decode($member[2]);
		$deLevel = base64_decode($member[3]);

		$db = new DB();
		return $db->insertExecute("member","'','$deUsername','$dePassword','$deEmail','1','$deLevel'");
	}

	function editMember($data) {
		$member = explode(",",$data);
		$deUsername = base64_decode($member[0]);
		$dePassword = base64_decode($member[1]);
		$deEmail = base64_decode($member[2]);
		$deLevel = base64_decode($member[3]);
		$deID = base64_decode($member[4]);

		$db = new DB();
		if($dePassword != "") {
			$dePassword = md5($dePassword);
			return $db->updateExecute("member","`username`='$deUsername',`password`='$dePassword',`email`='$deEmail',`level`='$deLevel'","id","$deID");	
		}else {
			return $db->updateExecute("member","`username`='$deUsername',`email`='$deEmail',`level`='$deLevel'","id","$deID");	
		}
		
	}
	function removeMember($data) {
		$member = explode(",",$data);
		$deID = base64_decode($member[0]);
		$db = new DB();
		return $db->removeExecute("member",$deID);
	}

	function updateSetting($data){
		$setting = explode(",",$data);
		$setting[0] = base64_decode($setting[0]);
		$setting[1] = base64_decode($setting[1]);
		$setting[2] = base64_decode($setting[2]);
		$setting[3] = base64_decode($setting[3]);
		$setting[4] = base64_decode($setting[4]);
		$db = new DB();
		$db->updateExecute("setting","`setting_value` = '$setting[0]'","id",1);	
		$db->updateExecute("setting","`setting_value` = '$setting[1]'","id",3);	
		$db->updateExecute("setting","`setting_value` = '$setting[2]'","id",2);	
		$db->updateExecute("setting","`setting_value` = '$setting[3]'","id",4);	
		return $db->updateExecute("setting","`setting_value` = '$setting[4]'","id",5);	

	}

?>
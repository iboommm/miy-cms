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
	function getMemberID() {
		$db = new DB();
		$id = $_SESSION["ses_login_user"];
		$string = $db->queryExecute("member","`username` LIKE '$id'");
		$id = unserialize($string);
		return $id['id'];
		
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

	function addMenu($data) {
		$menu = explode(",",$data);
		$decodeName = $menu[0];
		$decodeLink = $menu[1];
		$decodeDes = $menu[2];

		$db = new DB();
		return $db->insertExecute("menu","'','$decodeName','$decodeLink','99','','$decodeDes','0'");
	}
	function editMenu($data) {
		$menu = explode(",",$data);
		$decodeName = $menu[0];
		$decodeLink = $menu[1];
		$decodeDes = $menu[2];
		$decodeNum = $menu[3];
		$decodeSub = $menu[4];
		$deID = $menu[5];

		$db = new DB();
		return $db->updateExecute("menu","`name`='$decodeName',`link`='$decodeLink',`description`='$decodeDes',`num`='$decodeNum',`sub`='$decodeSub'","id","$deID");	
	}
	function removeMenu($data) {
		$member = explode(",",$data);
		$deID = base64_decode($member[0]);
		$db = new DB();
		return $db->removeExecute("menu",$deID);
	}
	function addModule($data){
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modData = base64_decode($mod[1]);
		$db = new DB();
		return $db->insertExecute("module","'','$modName','$modData','1'");
	}
	function editModule($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modData = base64_decode($mod[1]);
		$modID = base64_decode($mod[2]);
		$db = new DB();
		return $db->updateExecute("module","`name`='$modName',`data`='$modData'","id","$modID");	
	}
	function removeModule($data) {
		$mod = explode(",",$data);
		$modID = base64_decode($mod[0]);
		$db = new DB();
		return $db->removeExecute("module",$modID);
	}
	function removeArticle($data) {
		$mod = explode(",",$data);
		$modID = base64_decode($mod[0]);
		$db = new DB();
		return $db->removeExecute("article",$modID);
	}
	function addArticle($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modData = base64_decode($mod[1]);
		$modTime = date("Y-m-d H:i:s");
		$db = new DB();
		return $db->insertExecute("article","'','$modName','$modData','$modTime','0'");
	}
	function editArticle($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modData = base64_decode($mod[1]);
		$modTime = date("Y-m-d H:i:s");
		$modID = base64_decode($mod[2]);
		$db = new DB();
		return $db->updateExecute("article","`name`='$modName',`data`='$modData',`time`='$modTime'","id","$modID");	
	}
	function editBoard($data) {
		$setting = explode(",",$data);
		$setting[0] = base64_decode($setting[0]);
		$setting[1] = base64_decode($setting[1]);
		$db = new DB();
		$db->updateExecute("board_setting","`data` = '$setting[0]'","id",1);	
		return $db->updateExecute("board_setting","`data` = '$setting[1]'","id",2);	

	}
	function addGroup($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$db = new DB();
		return $db->insertExecute("shop_group","'','$modName'");
	}
	function editGroup($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modID = base64_decode($mod[1]);
		$db = new DB();
		return $db->updateExecute("shop_group","`name`='$modName'","id","$modID");	
	}
	function removeGroup($data) {
		$mod = explode(",",$data);
		$modID = base64_decode($mod[0]);
		$db = new DB();
		return $db->removeExecute("shop_group",$modID);
	}
	function addBrand($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$db = new DB();
		return $db->insertExecute("shop_brand","'','$modName'");
	}
	function addEMS($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modCode = base64_decode($mod[1]);
		$modUser = base64_decode($mod[2]);
		$modTime = date("Y-m-d H:i:s");
		$db = new DB();
		return $db->insertExecute("ems","'','$modName','$modUser','$modTime','$modCode'");
	}
	function editBrand($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modID = base64_decode($mod[1]);
		$db = new DB();
		return $db->updateExecute("shop_brand","`name`='$modName'","id","$modID");	
	}
	function removeBrand($data) {
		$mod = explode(",",$data);
		$modID = base64_decode($mod[0]);
		$db = new DB();
		return $db->removeExecute("shop_brand",$modID);
	}
	function addItem($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modGroup = base64_decode($mod[1]);
		$modBrand = base64_decode($mod[2]);
		$modPrice = base64_decode($mod[3]);
		$modURL = base64_decode($mod[4]);
		$modStock = base64_decode($mod[5]);
		$modData = base64_decode($mod[6]);
		$db = new DB();
		return $db->insertExecute("shop_item","'','$modName','$modData','$modGroup','$modBrand','$modURL','$modPrice','$modStock','','1'");
	}
	function editItem($data) {
		$mod = explode(",",$data);
		$modName = base64_decode($mod[0]);
		$modGroup = base64_decode($mod[1]);
		$modBrand = base64_decode($mod[2]);
		$modPrice = base64_decode($mod[3]);
		$modURL = base64_decode($mod[4]);
		$modStock = base64_decode($mod[5]);
		$modData = base64_decode($mod[6]);
		$modID = base64_decode($mod[7]);
		$db = new DB();
		return $db->updateExecute("shop_item","`name`='$modName',`data`='$modData',`group`='$modGroup',`brand`='$modBrand',`pic`='$modURL',`price`='$modPrice',`stock`='$modStock'","id","$modID");	
	}
	function removeItem($data) {
		$mod = explode(",",$data);
		$modID = base64_decode($mod[0]);
		$db = new DB();
		return $db->removeExecute("shop_item",$modID);
	}
	function editLayout($data) {
		$mod = explode(",",$data);
		$modTop = base64_decode($mod[0]);
		$modContent = base64_decode($mod[1]);
		$db = new DB();
		$db->updateExecute("layout","`data`='$modTop'","id","1");	
		return $db->updateExecute("layout","`data`='$modContent'","id","4");	
	}
	function updateMod($data) {
		$mod = explode(",",$data);
		$modLeft = base64_decode($mod[0]);
		$modCenter = base64_decode($mod[1]);
		$modRight = base64_decode($mod[2]);
		$db = new DB();
		$db->updateExecute("layout","`data`='$modLeft'","id","2");	
		$db->updateExecute("layout","`data`='$modRight'","id","3");	
		return $db->updateExecute("layout","`data`='$modCenter'","id","6");	
	}
?>
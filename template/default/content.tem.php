<?php 
	require_once "class/config/class.setting.php";
    require_once "class/config/class.menu.php";
	require_once 'class/config/class.lang.php';

	define("ADMIN_TEMPLATE","OPEN");
	$getLang = getLang();
	require 'lang/lang.'.$getLang.'.php';

    function generateContent($mode="index")
    {
            $layout = unserialize(getLayout());
            $unlayout = explode(',',$layout['data']);
            if($unlayout[0] == "{side_left}" && $unlayout[2] != "{side_right}") {
                generateLeft();
            }else if($unlayout[1] === "{content}") {
                generateAllSide();
            }else {
                generateRight();
            }
    }

    function generateRight() {
       require_once "template/".getTheme()."/sideRight.tem.php";
       getTemplate();
    }

    function generateAllSide() {
        require_once "template/".getTheme()."/sideAll.tem.php";
        getTemplate();
    }

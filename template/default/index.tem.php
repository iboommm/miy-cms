<?php 
	require_once "class/config/class.template.php";
	require_once "class/config/class.setting.php";
    require_once "class/config/class.admin.php";
	require_once 'class/config/class.lang.php';
    require_once "template/".getTheme()."/menu.tem.php";
    require_once "template/".getTheme()."/banner.tem.php";
    require_once "template/".getTheme()."/content.tem.php";

	define("ADMIN_TEMPLATE","OPEN");
	$getLang = getLang();
	require 'lang/lang.'.$getLang.'.php';

	ob_start();
?>
	<style>
	.fb-page, 
.fb-page span, 
.fb-page span iframe[style] { 
    width: 100% !important; 
}
</style>
   	<?php 
   		generateBanner();
   		generateMenu();
   		generateContent();
   	?>
<?php
	
	$render = ob_get_clean(); 
	$login = new Template();
	$login->setTitle(getSetting("title"));
	$login->setKeyword("testKeyword");
	$login->setDescription("testDescription");
	$login->setAuthor("testAuthor");
	$login->setRender($render);
	$login->setTheme(getTheme());
	$login->renderPage();

 ?>


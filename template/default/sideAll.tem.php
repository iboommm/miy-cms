<?php 
	require_once "class/config/class.setting.php";
    require_once "class/config/class.admin.php";
	require_once 'class/config/class.lang.php';


	define("ADMIN_TEMPLATE","OPEN");
	function getTemplate(){
		
		ob_start();
?> 

                 
		<div class="col-lg-12">
			<div class="col-lg-2" ng-app="app3">

				<?php include "template/".getTheme()."/left.tem.php"; ?>
			</div>
			<div class="col-lg-8">

				<?php include "template/".getTheme()."/center.tem.php"; ?>
			</div>
			<div class="col-lg-2">
				<?php include "template/".getTheme()."/right.tem.php"; ?>
			</div>


		</div>
<?php
		$render = ob_get_clean(); 
		echo $render;
	}
 ?>


<?php 
	require_once "class/config/class.setting.php";
  require_once "class/config/class.menu.php";
	require_once 'class/config/class.lang.php';

	define("ADMIN_TEMPLATE","OPEN");
	$getLang = getLang();
	require 'lang/lang.'.$getLang.'.php';

	function generateMenu() {
			ob_start();
?>

                <script src='js/angular.min.js'></script>
                 <script>
                var app = angular.module('myApp', []);
                app.controller('menuLoad', function($scope, $http) {
                  $http.get("genJSON/menu").then(function (response) {
                      $scope.menu = response.data.menu;
                  });
                   var app2 = angular.module('leftApp', []);
                    app2.controller('XX', function($scope, $http) {
                      $http.get("genJSON/module").then(function (response) {
                          $scope.myData = response.data.module;
                          console.log("123");
                      });
                    });

                });
                </script>


<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-bar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu-bar" ng-app="myApp">
                <ul class="nav navbar-nav navbar-left" ng-controller="menuLoad">
                    <li ng-repeat="item in menu | orderBy:'+num'">
                        <a href="{{item.link}}">{{item.name}}</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php
		$render = ob_get_clean(); 
		echo $render;
	}



 ?>


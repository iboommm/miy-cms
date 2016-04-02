                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>
                <?php  
                    require_once "class/config/class.template.php";
                    require_once "class/config/class.setting.php";
                    require_once "class/config/class.admin.php";
                    require_once 'class/config/class.lang.php';
                ?>
                <script src='js/angular.min.js'></script>
                 <script>
                var app = angular.module('myApp', []);
                app.controller('customersCtrl', function($scope, $http) {
                  $http.get("genJSON/article").then(function (response) {
                      $scope.myData = response.data.article;
                  });
                });
                </script>

                <div ng-app="myApp" ng-controller="customersCtrl"> 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            List Item
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> List Item
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <style type="text/css">

                </style>
                <div class="row">
                    <div class="col-xs-12">

                        <form role="form">
                            <div class="col-xs-12 container">
                                <div class="col-xs-12 container list-group">
                                    <div class="col-xs-2 ">Number</div>
                                    <div class="col-xs-2 ">Name</div>
                                    <div class="col-xs-2 ">Brand</div>
                                    <div class="col-xs-2 ">Price</div>
                                    <div class="col-xs-3 ">&nbsp;</div>
                                </div>
                                <div class="col-xs-12 container list-group " ng-repeat="group in myData | orderBy:'+num' " >
                                <div class="col-xs-2 ">{{ group.id }}</div>
                                <div class="col-xs-2 ">{{ group.name }}</div>
                                <div class="col-xs-2 ">{{ group.group }}</div>
                                <div class="col-xs-2 ">{{ group.price }}</div>
                                <div class="col-xs-3 "><a href="admin.php?mode=edit-article&id={{ group.id }}"><i class="fa fa-pencil-square-o"></i> <?php echo $lang["Admin-edit"]; ?></a> </div>
                                
                           </div>
                            </div>
                            <div class="col-xs-12 container list-group">
 
                        </form>

                        </div>
 
                    </div>
                </div>

                <script>
                    $(function () {
                      $('[data-toggle="popover"]').popover()
                    })

                </script>
                

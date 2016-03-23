                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

                <script src='js/angular.min.js'></script>
                 <script>
                var app = angular.module('myApp', []);
                app.controller('customersCtrl', function($scope, $http) {
                  $http.get("genJSON/menu").then(function (response) {
                      $scope.myData = response.data.menu;
                  });
                });
                </script>
                
                <div ng-app="myApp" ng-controller="customersCtrl"> 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $lang["Admin-menu"]; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> <?php echo $lang["Admin-menu"]; ?>
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
                                    <div class="col-xs-2 ">Link</div>
                                    <div class="col-xs-1 hidden-xs">Icon</div>
                                    <div class="col-xs-2 hidden-xs">Description</div>
                                    <div class="col-xs-3 ">&nbsp;</div>
                                </div>
                                <div class="col-xs-12 container list-group " ng-repeat="menu in myData | orderBy:'num' | filter:{sub:0}" >
                                <div class="col-xs-2 ">{{ menu.num }}</div>
                                <div class="col-xs-2 ">{{ menu.name }}</div>
                                <div class="col-xs-2 ">{{ menu.link }}</div>
                                <div class="col-xs-1 hidden-xs">{{ menu.icon }}&nbsp;</div>
                                <div class="col-xs-2 hidden-xs">{{ menu.description }}</div>
                                <div class="col-xs-3 "><a href="javascript:;;"><?php echo $lang["Admin-edit"]; ?></a> || <a href="javascript:;;"><?php echo $lang["Admin-remove"]; ?></a></div>
                                <div style="right:-13px;position: relative;" class="col-xs-12 container list-group " ng-repeat="menu in myData | orderBy:'num' | filter:{sub:menu.id}" >                <div ng-if="menu.num == 1"> <br /></div>
                                <div class="col-xs-2 "> -> {{ menu.num }}</div>
                                <div class="col-xs-2 ">{{ menu.name }}</div>
                                <div class="col-xs-2 ">{{ menu.link }}</div>
                                <div class="col-xs-1 hidden-xs">{{ menu.icon }}&nbsp;</div>
                                <div class="col-xs-2 hidden-xs">{{ menu.description }}</div>
                                <div class="col-xs-3 "><a href="javascript:;;"><?php echo $lang["Admin-edit"]; ?></a> || <a href="javascript:;;"><?php echo $lang["Admin-remove"]; ?></a></div>
                           </div>
                           </div>
                            </div>
                            <div class="col-xs-12 container list-group">
                            <button class="btn btn-primary"><?php echo $lang["Admin-Update"]; ?></button>
                             </div>   
                        </form>

                        </div>
 
                    </div>
                </div>
                <!-- /.row -->
                 <?php 
                    //echo $json->genJSON("setting");
                    //$updateSetting = new DB();
                    //$updateSetting->updateExecute("setting","`setting_variable` LIKE 'title'","setting_id","`setting_value` = 'TEST'");
                 ?>
                <script>
                    $(function () {
                      $('[data-toggle="popover"]').popover()
                    })

                </script>
                

                
                </div>

               
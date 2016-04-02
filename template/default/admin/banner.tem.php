                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

                <script src='js/angular.min.js'></script>
                <script>
                var app = angular.module('myApp', []);
                app.controller('customersCtrl', function($scope, $http) {
                  $http.get("genJSON/banner").then(function (response) {
                      $scope.myData = response.data.banner;
                  });
                    $scope.myFilter = function (item) { 
                        return item.sub === 0; 
                    };
                });
                </script>
                
                <div ng-app="myApp" ng-controller="customersCtrl"> 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $lang["Admin-banner"]; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> <?php echo $lang["Admin-banner"]; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <form role="form">
                            <table class="table" width="100%">
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Link</td>
                                    <td></td>
                                </tr>
                            <tr ng-repeat="banner in myData">
                                <td width="10%">{{ banner.id }}</td>
                                <td width="20%">{{ banner.name }}</td>
                                <td width="50%"><img src="{{ banner.url }}" style="max-width: 100%;" /></td>
                                <td width="20%"><a href="javascript:;;"><?php echo $lang["Admin-choose"]; ?></a> || <a href="javascript:;;"><?php echo $lang["Admin-remove"]; ?></a></td>
                           </tr>
                            </table>

                            <button class="btn btn-primary"><?php echo $lang["Admin-Update"]; ?></button>

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

               
                <script src='js/angular.min.js'></script>
                 <script>
                var app = angular.module('myApp', []);
                app.controller('customersCtrl', function($scope, $http) {
                  $http.get("genJSON/shop_group").then(function (response) {
                      $scope.shop_group = response.data.shop_group;
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
                                </div>
                                <div class="col-xs-12 container list-group " ng-repeat="group in myData | orderBy:'+num' " >
                                <div class="col-xs-2 ">{{ group.name }}</div>
                                
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
                

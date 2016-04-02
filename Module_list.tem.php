                <script src='js/angular.min.js'></script>
                <script src='js/jquery.min.js'></script>
                 <script>
                var app = angular.module('myApp', []);
                app.controller('customersCtrl', function($scope, $http) {
                  $http.get("genJSON/shop_group").then(function (response) {
                      $scope.shop_group = response.data.shop_group;
                  });
                });
                </script>

                    <div class="col-xs-12">

                        <form role="form">
                            <div class="col-xs-12 container">
                                <div class="col-xs-12 container list-group">
                                    <div class="col-xs-2 ">Number</div>
                                </div>
                                <div class="col-xs-12 container list-group " ng-repeat="group in myData | orderBy:'+num' " >
                                <div class="col-xs-2 ">{{ shop_group.name }}</div>
                                
                           </div>
                            </div>
 
                        </form>

                        </div>
 
                    </div>
                </div>



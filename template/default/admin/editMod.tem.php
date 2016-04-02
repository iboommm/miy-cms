                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>
                <?php  
                    require_once "class/config/class.template.php";
                    require_once "class/config/class.setting.php";
                    require_once "class/config/class.admin.php";
                    require_once 'class/config/class.lang.php';
                ?>
                <script>
                    function del(id) {
                        alert(id);
                    }
                </script>
                <script src='js/angular.min.js'></script>
                 <script>
                var app = angular.module('myApp', []);
                app.controller('customersCtrl', function($scope, $http) {
                  $http.get("genJSON/layout").then(function (response) {
                      $scope.layout = response.data.layout;
                  });
                  $http.get("genJSON/module").then(function (response) {
                      $scope.modules = response.data.module;
                  });
                });
                </script>

                <div ng-app="myApp" ng-controller="customersCtrl" id="status"> 
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
                    <div class="col-lg-6" id="add-module-form" ng-controller="customersCtrl" >

                        <form role="form">
                              <div class="form-group">
                                <label>Side Left</label>
                                <input name="admin[username]" id="left" class="form-control" value="{{layout[1].data}}" >
                            </div>

                             <div class="form-group">
                                <label>Center </label>
                                <input value="{{layout[5].data}}" name="admin[password]" id="center" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label>Side Right</label>
                                <input value="{{layout[2].data}}" name="admin[email]" id="right" class="form-control">
                            </div>

                        </form>


                        </div>
 						 <div class="col-lg-6" id="add-module-form" ng-controller="customersCtrl">

                        <div class="col-xs-12 container list-group">
                                    <div class="col-xs-4 ">Number</div>
                                    <div class="col-xs-4 ">Name</div>
                                    <div class="col-xs-3 ">&nbsp;</div>
                                </div>
                                <div class="col-xs-12 container list-group " ng-repeat="module in modules">
                                <div class="col-xs-4 ">{{ module.id }}</div>
                                <div class="col-xs-4 ">{{ module.name }}</div>
                                <div class="col-xs-3 "><a href="admin.php?mode=edit-module&id={{ module.id }}"><i class="fa fa-pencil-square-o"></i> <?php echo $lang["Admin-edit"]; ?></a> </div>
                                
                           </div>
                            </div>
                            <div class="col-xs-12 container list-group">
                            <button id="confirm" class="btn btn-primary">Update Module</button>
                             </div>   
                        </form>
                        </div>
                    </div>
                </div>

                <script>
                    $(function () {
                      $('[data-toggle="popover"]').popover()
                    })

                     $('#confirm').click(function(event) {

                           var left = btoa($('#left').val());
                           var center = btoa($('#center').val());
                           var right = btoa($('#right').val());
                           var genData = left + "," + center + "," + right;	
                       $.post('admin.php?mode=update-mod', {data: genData,sending: 'update-mod'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                $('#status').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> Update Success');
                            }
                        });
                    });
                </script>
                
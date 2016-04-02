                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

      
                <script src='js/angular.min.js'></script>
                <script>
                var app2 = angular.module('myApp2', []);
                app2.controller('groupList', function($scope, $http) {
                  $http.get("genJSON/member/").then(function (response) {
                      $scope.member = response.data.member;
                  });
                });
                </script>
                
                <div ng-app="myApp2" ng-controller="groupList"> 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Add EMS Code
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> Add EMS Code
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12" id="add-module-form">

                        <form class="form-horizontal">
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" placeholder="Title">
                            </div>
                          </div>
                          <form class="form-horizontal">
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">EMS Code</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="code" placeholder="EMS code">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10 form-inline">
                              <input ng-model='memberSearch' type="text" class="form-control" id="search" placeholder="Search">
                              <select class="form-control" id="user" ng-controller="groupList">
                                  <option ng-repeat="a in member | filter:memberSearch" value="{{ a.id }}">{{ a.username }}</option>
                              </select>
                            </div>
                          </div>
                            

                            <button id="confirm" type="button" class="btn btn-primary">Add EMS </button>

                        </form>

                        </div>
 
                    </div>
                </div>
                <!-- /.row -->

                <script>
                    $(function () {
                      $('[data-toggle="popover"]').popover()
                    })

                    $(document).ready(function() {

                    });
                    $('#confirm').click(function(event) {
                        var name = btoa(unescape(encodeURIComponent($('#name').val())));
                        var code = btoa(unescape(encodeURIComponent($('#code').val())));
                        var user = btoa(unescape(encodeURIComponent($('#user').val())));
                        var genData = name + "," + code + "," + user;
                        $.post('admin.php?mode=add-ems', {data: genData,sending: "add-ems"}, function(data){
                          if(data == 1) {
                                var name = $('#name').val();
                                $('#add-module-form').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> Add ' + name + ' Complete</div>');
                          }
                        });                        
                    });
                    

                </script>
                
            
                
                </div>

               
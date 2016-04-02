                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

                <script src='js/angular.min.js'></script>
                 <script>

                var app = angular.module('myApp', []);
                app.controller('setting', function($scope, $http) {
                  $http.get("genJSON/board_setting").then(function (response) {
                      $scope.setting = response.data.board_setting;
                  });
                });
                </script>
                
                <div ng-app="myApp" > 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $lang["Admin-general"]; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> <?php echo $lang["Admin-general"]; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6" id="status">

                        <form role="form" ng-controller="setting">
                            <div>
                                <label>Switch for Webboard </label>
                                <select class="form-control" name="switch" id="switch">
                                    <option value="1" ng-if="(setting[0].data)-0 == 1" selected>On</option>
                                    <option value="0" ng-if="(setting[0].data)-0 == 0" selected>Off</option>
                                    <option value="1" ng-if="(setting[0].data)-0 == 0">On</option>
                                    <option value="0" ng-if="(setting[0].data)-0 == 1">Off</option>
                                </select>
                                
                            </div>

                            <div>
                                <label>Announcement</label>
                                <textarea class="form-control" id="announcement" cols="30" rows="10">{{setting[1].data}}</textarea>
                                
                            </div>

                            <button type="button" id="confirm" class="btn btn-primary"><?php echo $lang["Admin-Update"]; ?></button>

                        </form>

                        </div>
 
                    </div>
                </div>
                <!-- /.row -->
        
                <script>
                    $(function () {
                      $('[data-toggle="popover"]').popover()
                    })
                     $('#confirm').click(function(event) {
                           var switchBoard = btoa($('#switch').val());
                           var announce = btoa(unescape(encodeURIComponent($('#announcement').val())));
                            var genData = switchBoard + "," + announce;
                       $.post('admin.php?mode=board-setting', {data: genData,sending: 'board-setting'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                $('#status').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-help-success6"]; ?></div>');
                            }
                        });
                    });
                </script>
                

                
                </div>

               
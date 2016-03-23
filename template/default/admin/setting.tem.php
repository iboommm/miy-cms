                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

                <script src='js/angular.min.js'></script>
                 <script>
                var app = angular.module('myApp', []);
                app.controller('customersCtrl', function($scope, $http) {
                  $http.get("genJSON/setting").then(function (response) {
                      $scope.myData = response.data.setting;
                  });
                });
                </script>
                
                <div ng-app="myApp" ng-controller="customersCtrl"> 
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

                        <form role="form">
                            
                            <div class="form-group">
                                <label><?php echo $lang["Admin-TitleName"]; ?></label>
                                <input name="admin[title]" id="title" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-TitleName"]; ?>" data-toggle="popover" data-trigger="focus" data-placement="bottom" value="{{ myData[0].setting_value }}" title="<?php echo $lang["Admin-Help"]; ?>" data-content="<?php echo $lang["Admin-Help-TitleName"]; ?>" required>
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Admin-Sitename"]; ?></label>
                                <input name="admin[sitename]" id="sitename"  class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-Sitename"]; ?>" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="<?php echo $lang["Admin-Help"]; ?>" value="{{ myData[2].setting_value }}" data-content="<?php echo $lang["Admin-Help-Sitename"]; ?>" required>
                              
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Admin-Email"]; ?></label>
                                <input name="admin[email]" id="email"  class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-Email"]; ?>" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="<?php echo $lang["Admin-Help"]; ?>" value="{{ myData[1].setting_value }}"  data-content="<?php echo $lang["Admin-Help-Email"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo $lang["Admin-Status"]; ?></label>
                                <select class="form-control" id="switch" >
                                  <option ng-if="myData[3].setting_value == 1" value="1" selected><?php echo $lang["Admin-Status-on"]; ?></option>
                                  <option ng-if="myData[3].setting_value == 1" value="0"><?php echo $lang["Admin-Status-off"]; ?></option>
                                   <option ng-if="myData[3].setting_value == 0" value="1"><?php echo $lang["Admin-Status-on"]; ?></option>
                                  <option ng-if="myData[3].setting_value == 0" value="0" selected><?php echo $lang["Admin-Status-off"]; ?></option>
                                </select>
                            </div>
                

                        <div class="form-group">
                                <label><?php echo $lang["Admin-Codestat"]; ?></label>
                                <textarea name="admin[codestat]" id="code"  class="form-control" rows="3" data-toggle="popover" data-trigger="focus" data-placement="top" title="<?php echo $lang["Admin-Help"]; ?>" data-content="<?php echo $lang["Admin-Help-Codestat"]; ?>" >{{ myData[4].setting_value }}</textarea>
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
                           var title = btoa($('#title').val());
                           var sitename = btoa($('#sitename').val());
                           var email = btoa($('#email').val());
                           var swit = btoa($('#switch').val());
                           var code = btoa($('#code').val());
                            var genData = title + "," + sitename + "," + email + "," + swit + "," + code;
                       $.post('admin.php?mode=setting', {data: genData,sending: 'setting'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                $('#status').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-help-success6"]; ?></div>');
                            }
                        });
                    });
                </script>
                

                
                </div>

               
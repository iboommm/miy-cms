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
                    <div class="col-lg-6">

                        <form role="form">
                            
                            <div class="form-group">
                                <label><?php echo $lang["Admin-TitleName"]; ?></label>
                                <input name="admin[title]" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-TitleName"]; ?>" data-toggle="popover" data-trigger="focus" data-placement="bottom" value="{{ myData[0].setting_value }}" title="<?php echo $lang["Admin-Help"]; ?>" data-content="<?php echo $lang["Admin-Help-TitleName"]; ?>" required>
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Admin-Sitename"]; ?></label>
                                <input name="admin[sitename]" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-Sitename"]; ?>" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="<?php echo $lang["Admin-Help"]; ?>" value="{{ myData[2].setting_value }}" data-content="<?php echo $lang["Admin-Help-Sitename"]; ?>" required>
                              
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Admin-Email"]; ?></label>
                                <input name="admin[email]" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-Email"]; ?>" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="<?php echo $lang["Admin-Help"]; ?>" value="{{ myData[1].setting_value }}"  data-content="<?php echo $lang["Admin-Help-Email"]; ?>" required>
                            </div>

                           <div class="form-group">
                               
                                <label><?php echo $lang["Admin-Status"]; ?></label>
                                <div class="radio" ng-if="myData[3].setting_value  == 1">
                                    <label>
                                        <input type="radio" name="switch_on" id="switch1" value="1" checked><?php echo $lang["Admin-Status-on"]; ?>
                                        <br />
                                        <input type="radio" name="switch_on" id="switch2" value="0" ><?php echo $lang["Admin-Status-off"]; ?>
                                    </label>
                                </div>
                                <div class="radio" ng-if="myData[3].setting_value  == 0">
                                    <label>
                                        <input type="radio" name="switch_off" id="switch1" value="1" ><?php echo $lang["Admin-Status-on"]; ?>
                                        <br />
                                        <input type="radio" name="switch_off" id="switch2" value="0" checked><?php echo $lang["Admin-Status-off"]; ?>
                                    </label>
                                </div>
                            </div>

                        <div class="form-group">
                                <label><?php echo $lang["Admin-Codestat"]; ?></label>
                                <textarea name="admin[codestat]"  class="form-control" rows="3" data-toggle="popover" data-trigger="focus" data-placement="top" title="<?php echo $lang["Admin-Help"]; ?>" data-content="<?php echo $lang["Admin-Help-Codestat"]; ?>" >{{ myData[4].setting_value }}</textarea>
                        </div>

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

               
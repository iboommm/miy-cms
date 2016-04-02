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
                                    <div class="col-xs-2 hidden-xs">Description</div>
                                    <div class="col-xs-3 ">&nbsp;</div>
                                </div>
                                <div class="col-xs-12 container list-group " ng-repeat="menu in myData | orderBy:'+num' " >
                                <div class="col-xs-2 ">{{ menu.num }}</div>
                                <div class="col-xs-2 ">{{ menu.name }}</div>
                                <div class="col-xs-2 ">{{ menu.link }}</div>
                                <div class="col-xs-2 hidden-xs">{{ menu.description }}</div>
                                <div class="col-xs-3 "><a href="admin.php?mode=edit-menu&id={{ menu.id }}"><i class="fa fa-pencil-square-o"></i> <?php echo $lang["Admin-edit"]; ?></a>  </div>
                                
                           </div>
                            </div>
                            <div class="col-xs-12 container list-group">
                            <button data-toggle="modal" data-target="#add-menu" class="btn btn-primary"><?php echo $lang["Admin-add-menu"]; ?></button>
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


                <!-- Modal -->
                <div class="modal fade" id="add-menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $lang["Admin-add-menu"]; ?></h4>
                      </div>
                      <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo $lang["Admin-menu-name"]; ?></label>
                                <input  id="addMenuName" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-menu-name"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo $lang["Admin-menu-link"]; ?></label>
                                <input id="addMenuLink" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-menu-link"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo $lang["Admin-menu-description"]; ?></label>
                                <input id="addMenuDescription" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-menu-description"]; ?>" required>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang["Admin-cancel"]; ?></button>
                        <button id="addMenuButton" type="button" class="btn btn-primary"><?php echo $lang["Admin-confirm"]; ?></button>
                      </div>
                    </div>
                  </div>
                </div>

                

                <script>
                    $('#addMenuButton').click(function(event) {
                        var eName = $('#addMenuName').val();
                        var eLink = $('#addMenuLink').val();
                        var eDesc = $('#addMenuDescription').val();
                        var genData = eName + "," + eLink + "," + eDesc;
                        alert(genData);
                        $.post('admin.php?mode=menu', {data: genData,sending: 'add-menu'}, function(data, textStatus, xhr) {
                            alert(data);
                            location.reload();
                        });
                    });

                </script>
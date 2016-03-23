                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>
                <?php
                        require_once "/class/config/class.template.php";
                        require_once "/class/config/class.setting.php";
                        require_once "/class/config/class.admin.php";
                        require_once '/class/config/class.lang.php';
                ?>
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $lang["Admin-edit-menu"]; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> <?php echo $lang["Admin-edit-menu"]; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <script>


                    $(document).ready(function() {
                        $(document).keypress(function (e) {
                          if (e.which == 13) {
                          }
                        });
                    });
                    

                </script>
                <?php if(isset($_GET['id']))  {
                    ?> 
                    <script src='js/angular.min.js'></script>
                 <script>

                var app = angular.module('myApp', []);

                app.controller('customersCtrl', function($scope, $http) {
                    var id = <?php echo $_GET['id'] ?>;

                    var gid = btoa("`id` = " + id);
                    $http.get("genJSON/menu/" + gid).then(function (response) {
                      $scope.myData = response.data.menu;
                      });
                     $http.get("genJSON/menu/").then(function (response) {
                      $scope.allMenu = response.data.menu;
                      });


                });
                </script>
                <script>
                    function deleteUser(id) {
                        var genData = btoa(id);

                        $.post('admin.php?mode=edit-member',{data: genData,sending: 'remove-member'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                $('#status-delete').html("<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-help-success5"]; ?> <?php echo $lang["Admin-help-success4"]; ?></div>");
                                location.href = "admin.php?mode=edit-member";
                            }
                        });
                    }
                    $(document).ready(function() {
                        $('#confirmDelete').click(function(event) {
                            var id = $('#confirmDelete').val();
                            deleteUser(id);
                        });
                    });
                </script>
                <div ng-app="myApp" >
                <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" ng-controller="customersCtrl">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body" id="status-delete">
                                <h3><?php echo $lang["Admin-remove"]; ?> {{ myData[0].username }} ?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang["Admin-cancel"]; ?></button>
                                <button type="button" id="confirmDelete" value=" {{ myData[0].id }}" class="btn btn-danger" ><?php echo $lang["Admin-confirm"]; ?></button>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-lg-6" id="add-member-form" >

                        <form role="form" ng-controller="customersCtrl">
                             <div class="form-group">
                                <label><?php echo $lang["Admin-menu-name"]; ?></label>
                                <input  id="addMenuName" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-menu-name"]; ?>" value="{{ myData[0].name }}" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo $lang["Admin-menu-link"]; ?></label>
                                <input id="addMenuLink" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-menu-link"]; ?>" value="{{ myData[0].link }}" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo $lang["Admin-menu-description"]; ?></label>
                                <input id="addMenuDescription" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-menu-description"];  ?>" value="{{ myData[0].description }}" required>
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Admin-menu-num"]; ?></label>
                                <input id="addMenuDescription" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-menu-num"];  ?>" value="{{ myData[0].num }}" required>
                            </div>

                            <div class="form-group" >
                                <label><?php echo $lang["Admin-menu-sub"]; ?></label>
                                <select  class="form-control" id="sub"  >
                                    <option value="0" ng-if="myData[0].sub == 0" selected>-- Top ---</option>
                                    <option value="0" ng-if="myData[0].sub != 0" >-- Top ---</option>
                                    <option  ng-repeat="menu in allMenu | filter:{sub:0}" ng-if="myData[0].sub == menu.id" value="{{menu.id}}" selected>{{ menu.name }}</option>
                                    <option  ng-repeat="menu in allMenu | filter:{sub:0}" ng-if="myData[0].sub != menu.id" value="{{menu.id}}" >{{ menu.name }}</option>
                                </select>
                            </div>

                            <button id="confirm" type="button" class="btn btn-primary"><?php echo $lang["Admin-Update"]; ?></button>
                            <button id="remove" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-danger"><?php echo $lang["Admin-remove"]; ?> {{ myData[0].username }} </button>
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
                        
                    });

                </script>
                    <?php
                }else {?>
                
                <div > 
                

                <div class="row">
                    <div class="col-lg-6">


                            
                            <div class="form-inline">
                                <input ng-model="inputUser" id="inputUser" name="admin[title]" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Username"]; ?>" required>
                                <button onclick="loadJSON()" type="button" class="btn btn-primary"><?php echo $lang["Search"]; ?></button>
                            </div>
                            <div class="form-group" id='result'>
                            </div>


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

               <?php } ?>
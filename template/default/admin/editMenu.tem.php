                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>
                <?php
                        require_once "class/config/class.template.php";
                        require_once "class/config/class.setting.php";
                        require_once "class/config/class.admin.php";
                        require_once 'class/config/class.lang.php';
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

                        $.post('admin.php?mode=edit-member',{data: genData,sending: 'remove-menu'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                $('#status-delete').html("<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-help-success7"]; ?> <?php echo $lang["Admin-help-success4"]; ?></div>");
                                setTimeout(function() {
                                    location.href = "admin.php?mode=menu";
                                }, 1000);
                                
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
                                <h3><?php echo $lang["Admin-remove"]; ?> {{ myData[0].name }} ?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang["Admin-cancel"]; ?></button>
                                <button type="button" id="confirmDelete" value=" {{ myData[0].id }}" class="btn btn-danger" ><?php echo $lang["Admin-confirm"]; ?></button>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-lg-6" id="edit-menu-s" >

                        <form role="form" ng-controller="customersCtrl">
                            <input type="hidden" id="id" value="{{ myData[0].id }}">
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
                                <input id="addMenuNum" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Admin-menu-num"];  ?>" value="{{ myData[0].num }}" required>
                            </div>

                            <button id="confirm" type="button" class="btn btn-primary"><?php echo $lang["Admin-Update"]; ?></button>
                            <button id="remove" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-danger"><?php echo $lang["Admin-remove"]; ?> {{ myData[0].name }} </button>
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
                        var name = $('#addMenuName').val();
                        var link = $('#addMenuLink').val();
                        var description = $('#addMenuDescription').val();
                        var sub = $('#addMenuSub').val();
                        var num = $('#addMenuNum').val();
                        var id = $('#id').val();

                        var genData = name + "," + link + "," + description + "," + num + "," + sub + "," + id ;
                        $.post('admin.php?mode=edit-menu', {data: genData , sending: "edit-menu"}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                $('#edit-menu-s').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-edit"]; ?> '+ name +' <?php echo $lang["Admin-help-success4"]; ?></div>');
                            }
                        });
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
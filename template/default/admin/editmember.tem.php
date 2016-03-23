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
                            <?php echo $lang["Admin-edit-member"]; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> <?php echo $lang["Admin-edit-member"]; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <script>


                    function editUser(id) {
                            location.href = "admin.php?mode=edit-member&id=" + id;
                        }
                    $(document).ready(function() {
                        $(document).keypress(function (e) {
                          if (e.which == 13) {
                            loadJSON();
                          }
                        });
                    });
                    function loadJSON() {
                        $('.list-group').html("");
                        var usr = $('input#inputUser').val();
                        if(usr != "") {
                            var guser = btoa("`username` LIKE '%" + usr + "%'");
                        }else {
                            guser = "";
                        }
                        
                        $.getJSON( "genJSON/member/"+guser, function( data ) {
                            var items = [];

                            $.each(data.member, function(index,val) {
                                 items.push( "<div class='list-group-item' id='" + val.id + "'><a href='javascript:;;;' onclick='editUser("+ val.id + ")'><i class=\"fa fa-pencil-square-o\"></i> <?php echo $lang["Admin-edit"]; ?></a> <i class=\"fa fa-user\"></i> " + val.username + " </div>" );
                            });
                                $( "<div/>", {
                                    "class": "list-group",
                                    html: items.join( "" )
                                  }).appendTo( "#result" );
                        });

                        

                    }

                </script>
                <?php if(isset($_GET['id']))  {
                    ?> 
                    <script src='js/angular.min.js'></script>
                 <script>

                var app = angular.module('myApp', []);

                app.controller('customersCtrl', function($scope, $http) {
                    var id = <?php echo $_GET['id'] ?>;

                    var gid = btoa("`id` = " + id);
                    $http.get("genJSON/member/" + gid).then(function (response) {
                      $scope.myData = response.data.member;
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
                                <label><?php echo $lang["Username"]; ?></label>
                                <input disabled name="admin[username]" id="addUsername" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Username"]; ?>" value="{{ myData[0].username }}" required>
                            </div>

                             <div class="form-group">
                                <label><?php echo $lang["Password"]; ?></label>
                                <input name="admin[password]" id="addPassword" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Password"]; ?>"  required>
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Email"]; ?></label>
                                <input name="admin[email]" id="addEmail" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Email"]; ?>" value="{{ myData[0].email }}" required>
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Level"]; ?></label>
                                <select class="form-control" id="addLevel" >
                                  <option ng-if="myData[0].level == 1" value="1" selected>Admin</option>
                                  <option ng-if="myData[0].level == 3" value="3" selected>Moderator</option>
                                  <option ng-if="myData[0].level == 2" value="2" selected>Member</option>
                                  <option ng-if="myData[0].level != 1" value="1" >Admin</option>
                                  <option ng-if="myData[0].level != 3" value="3">Moderator</option>
                                  <option ng-if="myData[0].level != 2" value="2" >Member</option>
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
                        var username = btoa($('#addUsername').val());
                        var password = btoa($('#addPassword').val());
                        var email = btoa($('#addEmail').val());
                        var level = btoa($('#addLevel').val());
                        var id = btoa(<?php echo $_GET['id'] ?>);
                        

                        var genData = username + "," + password + "," + email + "," + level +"," + id;
                        $.post('admin.php?mode=edit-member', {data: genData,sending: 'edit-member'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                var username = $('#addUsername').val();
                                $('#add-member-form').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-help-success3"]; ?>' + username + ' <?php echo $lang["Admin-help-success4"]; ?></div>');

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
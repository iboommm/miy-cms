                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

                <script src='js/angular.min.js'></script>
                
                <div ng-app="myApp" ng-controller="customersCtrl"> 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $lang["Admin-add-member"]; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> <?php echo $lang["Admin-add-member"]; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6" id="add-member-form">

                        <form role="form">
                            
                             <div class="form-group">
                                <label><?php echo $lang["Username"]; ?></label>
                                <input name="admin[username]" id="addUsername" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Username"]; ?>"  required>
                            </div>

                             <div class="form-group">
                                <label><?php echo $lang["Password"]; ?></label>
                                <input name="admin[password]" id="addPassword" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Password"]; ?>" required>
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Email"]; ?></label>
                                <input name="admin[email]" id="addEmail" class="form-control" placeholder="<?php echo $lang["Admin-Enter"]." ".$lang["Email"]; ?>" required>
                            </div>

                            <div class="form-group">
                                <label><?php echo $lang["Level"]; ?></label>
                                <select class="form-control" id="addLevel" >
                                  <option value="1">Admin</option>
                                  <option value="3">Moderator</option>
                                  <option value="2" selected>Member</option>
                                </select>
                            </div>

                            <button id="confirm" type="button" class="btn btn-primary"><?php echo $lang["Admin-add-member"]; ?></button>

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
                        

                        var genData = username + "," + password + "," + email + "," + level;
                        $.post('admin.php?mode=add-member', {data: genData,sending: 'add-member'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                var username = $('#addUsername').val();
                                $('#add-member-form').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-help-success1"]; ?>' + username + ' <?php echo $lang["Admin-help-success2"]; ?></div>');

                                $('#addUsername').val() = "";
                                $('#addPassword').val() = "";
                                $('#addEmail').val() = "";
                                $('#addLevel').val() = "";

                            }
                        });
                    });

                </script>
                
            
                
                </div>

               
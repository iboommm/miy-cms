                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

                <script src='js/angular.min.js'></script>
                 <script>
                var app = angular.module('myApp', []);
                app.controller('layoutController', function($scope, $http) {
                  $http.get("genJSON/layout").then(function (response) {
                      $scope.layout = response.data.layout;
                  });
                });
                </script>
                
                <div ng-app="myApp" > 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $lang["Admin-layout"]; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> <?php echo $lang["Admin-layout"]; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12" id="status" ng-controller="layoutController" >

                        <div>
                        Now <br>
                        TOP = {{ layout[0].data }} <br>
                        CONTENT = {{ layout[3].data }}
                        <h3>Top</h3>
                            <div class="form-inline" >
                            <div class="radio">
                              <label>
                                <input type="radio" name="top" value="{menu},{banner}" >
                                <img src="<?php echo 'template/'.getTheme().'/images/layout/mode1.png'; ?>" alt="">
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="top" value="{banner},{menu}">
                                <img src="<?php echo 'template/'.getTheme().'/images/layout/mode2.png'; ?>" alt="">
                              </label>
                            </div>
                            </div>
                            <div>
                        <h3>Content</h3>
                            <div class="form-inline">
                            <div class="radio">
                              <label>
                                <input type="radio" name="content" value="{side_left},{content},{side_right}" >
                                <img src="<?php echo 'template/'.getTheme().'/images/layout/content1.png'; ?>" alt="">
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="content" value="{side_left},{content}">
                                <img src="<?php echo 'template/'.getTheme().'/images/layout/content2.png'; ?>" alt="">
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="content" value="{content},{side_right}">
                                <img src="<?php echo 'template/'.getTheme().'/images/layout/content3.png'; ?>" alt="">
                              </label>
                            </div>
                            </div>
                            <div>
                        

                            <button type="button" id="confirm" class="btn btn-primary"><?php echo $lang["Admin-Update"]; ?></button>

                        </div>

                        </div>
 
                    </div>
                </div>
                <!-- /.row -->
        
                <script>
                    $(function () {
                      $('[data-toggle="popover"]').popover()
                    })
                     $('#confirm').click(function(event) {

                           var top = btoa($('input[name="top"]:checked').val());
                           var content = btoa($('input[name="content"]:checked').val());
                           var genData = top + "," + content;
                       $.post('admin.php?mode=setting', {data: genData,sending: 'layout'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                $('#status').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-help-success6"]; ?></div>');
                            }
                        });
                    });
                </script>
                

                
                </div>

               
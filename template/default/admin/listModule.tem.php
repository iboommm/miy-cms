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
                            Edit Module
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> Edit Module
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <script>


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
                            var guser = btoa("`name` LIKE '%" + usr + "%'");
                        }else {
                            guser = "";
                        }
                        $.getJSON( "genJSON/module/"+guser, function( data ) {
                            var items = [];

                            $.each(data.module, function(index,val) {
                                 items.push( "<div class='list-group-item' id='" + val.id + "'><a href='admin.php?mode=edit-module&id=" + val.id + "' ><i class=\"fa fa-pencil-square-o\"></i> <?php echo $lang["Admin-edit"]; ?></a> <i class=\"fa fa-user\"></i> " + val.name + " ></div>" );
                            });
                                $( "<div/>", {
                                    "class": "list-group",
                                    html: items.join( "" )
                                  }).appendTo( "#result" );
                        });

                        

                    }

                </script>
                
                <div > 
                

                <div class="row">
                    <div class="col-lg-6">


                            
                            <div class="form-inline">
                                <input ng-model="inputUser" id="inputUser" name="admin[title]" class="form-control" placeholder="Enter Module name" required>
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


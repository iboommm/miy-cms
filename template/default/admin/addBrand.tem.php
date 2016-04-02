                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>


                </script>
                
                <div ng-app="myApp" ng-controller="customersCtrl"> 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Brand
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> Add Brand
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12" id="add-module-form">

                        <form role="form">
                            <input type="name" id="name" class="form-control" placeholder="Enter Brand name">

                            <button id="confirm" type="button" class="btn btn-primary">Add Brand</button>

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
                        if($('#name').val() == "") {
                            return 0;
                        }
                        var name = btoa(unescape(encodeURIComponent($('#name').val())));
                        
                        var genData = name;
                        $.post('admin.php?mode=add-brand', {data: genData,sending: "add-brand"}, function(data){
                          if(data == 1) {
                                var name = $('#name').val();
                                $('#add-module-form').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> Add ' + name + ' Complete</div>');
                                $('#name').val() ="";
                          }
                        });                        
                    });
                    

                </script>
                
            
                
                </div>

               
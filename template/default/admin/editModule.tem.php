                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

                 <script src="js/editor/tinymce/tinymce.min.js"></script>
                <script>
                    
                    tinyMCE.init({
                        selector: 'textarea',
                        height: 500,
                        theme: 'modern',
                        mode : "textareas",
                        plugins: [
                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime media nonbreaking save table contextmenu directionality',
                            'emoticons template paste textcolor colorpicker textpattern imagetools'
                          ],
                          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                          toolbar2: 'print preview media | forecolor backcolor emoticons',
                          image_advtab: true,
                        theme_advanced_buttons3_add : "fullpage"
                     });
                      function get_content() {
                        var content = tinyMCE.activeEditor.getContent();
                        return content;
                    }  
                    function set_content(data) {
                        var content = tinyMCE.activeEditor.setContent(json.module[0].data);
                        return content;
                    }  
                    $(document).ready(function() {
                        var id = <?php echo $_GET['id']; ?>;
                        id = btoa(" `id` = " + id + "");
                        $.getJSON('genJSON/module/'+id, function(json, textStatus) {
                               $('#name').val(json.module[0].name);
                               $('#editor').val(json.module[0].data);
                               
                        });
                    }); 
                    
                </script>
                <script>
                    function deleteUser(id) {
                        var genData = btoa(id);

                        $.post('admin.php?mode=remove-module',{data: genData,sending: 'remove-module'}, function(data, textStatus, xhr) {
                            if(data == 1) {
                                $('#status-delete').html("<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> <?php echo $lang["Admin-help-success7"]; ?> <?php echo $lang["Admin-help-success4"]; ?></div>");
                                setTimeout(function() {
                                    location.href = "admin.php?mode=list-module";
                                }, 1000);
                                
                            }
                        });
                    }
                    $(document).ready(function() {
                        $('#confirmDelete').click(function(event) {
                            var id = $('#idUser').val();
                            deleteUser(id);
                        });
                    });
                </script>
                <div ng-app="myApp" >
                <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" ng-controller="customersCtrl">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body" id="status-delete">
                                <h3>Confirm ?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang["Admin-cancel"]; ?></button>
                                <button type="button" id="confirmDelete" class="btn btn-danger" ><?php echo $lang["Admin-confirm"]; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div ng-app="myApp" ng-controller="customersCtrl"> 
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

                <div class="row">
                    <div class="col-lg-12" id="add-module-form">

                        <form role="form">
                            <input type="hidden" id="idUser" value="<?php echo $_GET['id']; ?>">
                            <input type="name" id="name" class="form-control" placeholder="Enter Module name">
                            <textarea name="edit" id="editor" cols="30" rows="10"></textarea>

                            <button id="confirm" type="button" class="btn btn-primary">Update Module</button>
                            <button data-toggle="modal" data-target="#confirm-delete" id="removeX" type="button" class="btn btn-danger">Remove</button>

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
                        var data = btoa(unescape(encodeURIComponent(get_content())));
                        var id = btoa(unescape(encodeURIComponent($('#idUser').val())));
                        var genData = name + "," + data + "," + id;
                        $.post('admin.php?mode=edit-module', {data: genData,sending: "edit-module"}, function(data){
                          if(data == 1) {
                                var name = $('#name').val();
                                $('#add-module-form').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> Add ' + name + ' Complete</div>');
                          }
                        });                        
                    });
                    

                </script>
                
            
                
                </div>

               
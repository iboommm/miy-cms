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
                            'emoticons template paste textcolor colorpicker textpattern imagetools bbcode'
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


                </script>
                
                <div ng-app="myApp" ng-controller="customersCtrl"> 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Module
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> Add Module
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12" id="add-module-form">

                        <form role="form">
                            <input type="name" id="name" class="form-control" placeholder="Enter Module name">
                            <textarea name="edit" id="editor" cols="30" rows="10"></textarea>

                            <button id="confirm" type="button" class="btn btn-primary">Add Module</button>

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
                        
                        var genData = name + "," + data;
                        $.post('admin.php?mode=add-module', {data: genData,sending: "add-module"}, function(data){
                          if(data == 1) {
                                var name = $('#name').val();
                                $('#add-module-form').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> Add ' + name + ' Complete</div>');
                          }
                        });                        
                    });
                    

                </script>
                
            
                
                </div>

               
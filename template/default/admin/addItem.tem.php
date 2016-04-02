                <?php if(!defined("ADMIN_TEMPLATE")) 
                        exit("Access Denied"); 
                ?>

                 <script src="js/editor/tinymce/tinymce.min.js"></script>
                <script>

                    tinyMCE.init({
                        selector: 'textarea',
                        height: 250,
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


                </script>
                <script src='js/angular.min.js'></script>
                <script>
                var app2 = angular.module('myApp2', []);
                app2.controller('groupList', function($scope, $http) {
                  $http.get("genJSON/shop_group").then(function (response) {
                      $scope.group = response.data.shop_group;
                      console.log(group.name)
                  });
                  $http.get("genJSON/shop_brand").then(function (response) {
                      $scope.brand = response.data.shop_brand;
                      console.log(brand.name)
                  });
                });
                </script>
                
                <div ng-app="myApp2" ng-controller="groupList"> 
                <div class="row" >
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Item
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php"><?php echo $lang["Admin-dashboard"]; ?></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> Add Item
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12" id="add-module-form">

                        <form class="form-horizontal">
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" placeholder="Item name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Group</label>
                            <div class="col-sm-10">
                              <select class="form-control"  id="group" ng-controller="groupList">
                                  <option ng-repeat="a in group" value="{{ a.id }}">{{ a.name }}</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Brand</label>
                            <div class="col-sm-10">
                              <select class="form-control"  id="brand" ng-controller="groupList">
                                  <option ng-repeat="a in brand" value="{{ a.id }}">{{ a.name }}</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="price" placeholder="Price">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">URL Thumbnail</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="url" placeholder="URL Thumbnail">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Stock</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="stock" placeholder="Stock">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <textarea name="edit" id="editor" rows="10"></textarea>
                                </label>
                              </div>
                            </div>
                          </div>


                            

                            <button id="confirm" type="button" class="btn btn-primary">Add Item</button>

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
                        var name = btoa(unescape(encodeURIComponent($('#name').val())));
                        var group = btoa(unescape(encodeURIComponent($('#group').val())));
                        var brand = btoa(unescape(encodeURIComponent($('#brand').val())));
                        var price = btoa(unescape(encodeURIComponent($('#price').val())));
                        var stock = btoa(unescape(encodeURIComponent($('#stock').val())));
                        var url = btoa(unescape(encodeURIComponent($('#url').val())));
                        var data = btoa(unescape(encodeURIComponent(get_content())));
                        
                        var genData = name + "," + group+ "," + brand+ ","+ price + "," + url+ "," + stock+ "," + data;
                       
                        $.post('admin.php?mode=add-item', {data: genData,sending: "add-item"}, function(data){
                          alert(data);
                          if(data == 1) {
                                var name = $('#name').val();
                                $('#add-module-form').append('<div class=\"alert alert-success\"><strong><?php echo $lang["Admin-success"]; ?>!</strong> Add ' + name + ' Complete</div>');
                                $('input').val() = "";
                          }
                        });                        
                    });
                    

                </script>
                
            
                
                </div>

               
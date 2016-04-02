<?php 
	require_once "class/config/class.setting.php";
    require_once "class/config/class.admin.php";
	require_once 'class/config/class.lang.php';

	$getLang = getLang();
	require 'lang/lang.'.$getLang.'.php';
?>
      <?php 
            if(!$_GET['mode'] && !$_GET['itemid']) {
       ?>
	<script src="js/explode.js"></script>
       <script>

       		$.getJSON('genJSON/layout/YG5hbWVgIExJS0UgJ2NlbnRlcic=', function(json, textStatus) {
                        $.ajaxSetup({'async': false});
       			var test = explode(",",json.layout[0].data);
       			var all = test.length;
       			$.each(test, function(input,val) {
       				 var id = btoa("`id` = " +  val);
       				$.getJSON('genJSON/module/' + id, function(data, textStatus) {
       					$('#dataCenter').append("<div class='col-lg-12 module-header'>" + data.module[0].name + "</div><div class='col-lg-12 module-content'>" + data.module[0].data + "</div>");
       				});
       			});
       		});
       </script>

       <div id="dataCenter">

  
       </div>

	<?php } elseif($_GET['mode'] == "shop" && $_GET['itemid']) {
            $id = $_GET['itemid'];
                  ?> 
            <script src="js/explode.js"></script>
                   <script>
                              $(document).ready(function() {
                                    var id = <?php echo $id;?>;
                                    id = btoa("`id` = " + id);
                                    $.getJSON('genJSON/shop_item/' + id, function(data, textStatus) {
                                          var id = btoa("`id` = " + data.shop_item[0].brand);
                                          $.getJSON('genJSON/shop_brand/' + id, function(data, textStatus) {
                                                $('#brand').html("<h4>Brand : " + data.shop_brand[0].name + "</h4>");
                                          });
                                          id = btoa("`id` = " + data.shop_item[0].group);
                                          $.getJSON('genJSON/shop_group/' + id, function(data, textStatus) {
                                                $('#group').html("<h6>Group : " + data.shop_group[0].name + "</h6>");
                                          });
                                          

                                          $('#headerView').html(data.shop_item[0].name);
                                          $('#price').html("<h2>Price : " + data.shop_item[0].price + "</h2>");
                                          $('#name').html("<h4>" + data.shop_item[0].name + "</h4>");
                                          
                                          
                                          $('#pic').html("<img style='width:100%' src=" + data.shop_item[0].pic + ">");
                                          $('#dataView').html(data.shop_item[0].data);

                                    });
                              });

                              
                   </script>

                   <div id="dataCenter">
                        <div class='col-lg-12 module-header' id="headerView"></div>
                        <div class="module-content">
                        <div class='col-lg-12 'id="specView">
                              <div class='col-lg-12' style="padding:10px;">
                                          <div class="col-md-6" id="pic" ></div>
                                          <div class="col-md-6"  >
                                                <div class="module-header">Specification</div>
                                                <div class="module-content" style="padding:30px;">
                                                      <div id="name"></div>
                                                      <div id="group"></div>
                                                      <div id="brand"></div>
                                                      <div id="price"></div>
                                                      <div>
                                                            <button onclick="location.href= 'index.php?mode=shop-add&itemid=<?php echo $_GET['itemid']; ?>' " class='btn btn-primary'>Add to Cart</button>
                                                      </div>
                                          </div>
                                          </div>
                              </table>
                        </div>      
                        <div class='col-lg-12'>
                              <div class="module-header">About</div>
                              <div class="module-content"  id="dataView" style="padding:30px;"></div>
                        </div>
                  </div>
              
                   </div>
                    </div>
                  <?php
            } elseif($_GET['mode'] == "article" && $_GET['arID']) {
            $id = $_GET['arID'];
                  ?> 
            <script src="js/explode.js"></script>
                   <script>
                              $(document).ready(function() {
                                    var id = <?php echo $id;?>;
                                    id = btoa("`id` = " + id);
                                    $.getJSON('genJSON/article/' + id, function(data, textStatus) {
                                         
                                          $('#headerView').html(data.article[0].name);
                                          $('#dataView').html(data.article[0].data + "<br>Time : " + data.article[0].time);

                                    });
                              });

                              
                   </script>

                   <div id="dataCenter">
                        <div class='col-lg-12 module-header' id="headerView"></div>
                        <div class="module-content">
                        <div class='col-lg-12' id="dataView">

                        </div>
                  </div>
              
                   </div>

                  <?php
            }  elseif($_GET['mode'] == "list-article") {
            $id = $_GET['arID'];
                  ?> 
            <script src="js/explode.js"></script>
                   <script>
                              $(document).ready(function() {
                                    $.getJSON('genJSON/article', function(data, textStatus) {
                                          $.each(data.article, function(index, val) {
                                                var sub = val.data.substring(0, 40);
                                                 $('#dataView').append("<div class=\"list-group\"><a href=\"index.php?mode=article&arID=" + val.id+ "\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + val.name + "</h4><p class=\"list-group-item-text\">" + sub + "</p></a></div>");
                                          });
                                          
                                    });
                              });

                              
                   </script>

                   <div id="dataCenter">
                        <div class='col-lg-12 module-header' id="headerView"></div>
                        <div class="module-content">
                        <div class='col-lg-12' id="dataView">
                              
                        </div>
                  </div>
              
                   </div>

                  <?php
            }elseif($_GET['mode'] == "article" && $_GET['arID']) {
            $id = $_GET['arID'];
                  ?> 
            <script src="js/explode.js"></script>
                   <script>
                              $(document).ready(function() {
                                    var id = <?php echo $id;?>;
                                    id = btoa("`id` = " + id);
                                    $.getJSON('genJSON/article/' + id, function(data, textStatus) {
                                         
                                          $('#headerView').html(data.article[0].name);
                                          $('#dataView').html(data.article[0].data + "<br>Time : " + data.article[0].time);

                                    });
                              });

                              
                   </script>

                   <div id="dataCenter">
                        <div class='col-lg-12 module-header' id="headerView"></div>
                        <div class="module-content">
                        <div class='col-lg-12' id="dataView">

                        </div>
                  </div>
              
                   </div>

                  <?php
            }  elseif($_GET['mode'] == "list-brand") {
            $id = $_GET['arID'];
                  ?> 
            <script src="js/explode.js"></script>
                   <script>
                              $(document).ready(function() {
                                    $.getJSON('genJSON/shop_brand', function(data, textStatus) {
                                          $.each(data.shop_brand, function(index, val) {
                                                 $('#dataView').append("<div class=\"list-group\"><a href=\"index.php?mode=brandView&bid=" + val.id+ "\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + val.name + "</h4></a></div>");
                                          });
                                          
                                    });
                              });

                              
                   </script>

                   <div id="dataCenter">
                        <div class='col-lg-12 module-header' id="headerView">List Brand</div>
                        <div class="module-content">
                        <div class='col-lg-12' id="dataView">

                        </div>
                  </div>
              
                   </div>

                  <?php
            }  elseif($_GET['mode'] == "list-group") {
            $id = $_GET['arID'];
                  ?> 
            <script src="js/explode.js"></script>
                   <script>
                              $(document).ready(function() {
                                    $.getJSON('genJSON/shop_group', function(data, textStatus) {
                                          $.each(data.shop_group, function(index, val) {
                                                 $('#dataView').append("<div class=\"list-group\"><a href=\"index.php?mode=groupView&gid=" + val.id+ "\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + val.name + "</h4></a></div>");
                                          });
                                          
                                    });
                              });

                              
                   </script>

                   <div id="dataCenter">
                        <div class='col-lg-12 module-header' id="headerView">List Brand</div>
                        <div class="module-content">
                        <div class='col-lg-12' id="dataView">
                              
                        </div>
                  </div>
              
                   </div>

                  <?php
            } elseif($_GET['mode'] == "brandView" && $_GET['bid'] != "") {
                  $id = $_GET['bid'];
                  ?> 
            <script src="js/explode.js"></script>
                   <script>
                        $(document).ready(function() {
                              $.getJSON('genJSON/shop_item', function(json, textStatus) {
                                    var id =0 ;
                                    $.each(json.shop_item, function(index, val) {
                                    if(val.brand == <?php echo $_GET['bid']; ?>) {
                                           $('div[data=list-item]').append("<div style=\"max-height:150px;margin-bottom:10px;\" class='col-xs-6 col-md-3' id='item-"+ id + "'><a href='index.php?mode=shop&itemid=" + val.id + "' class='thumbnail'> <img style=\"max-height:130px;\" src="+val.pic+">" +  val.name + "</a></div>");
                                            id++;
                                      }
                                      if(id==0) {
                                           $('div[data=list-item]').append("<div style=\"max-height:150px;margin-bottom:10px;\" class='col-xs-6 col-md-3' id='item-"+ id + "'>Item not Found.</a></div>");
                                            id++;
                                      }
                              });
                                    

                                          
                                });
                              });    
                              
                   </script>

                   <div id="dataCenter">
                   <div class='col-lg-12 module-header' id="headerView"><a href="index.php?mode=list-brand">List Brand</a></div></div>
                        <div class="module-content">
                        <div >
                              <div class="row" data="list-item" style="padding:30px;">
                                      
                                    </div>
                                    </div>
              
                   </div>
                  </div>
                  <?php
             } elseif($_GET['mode'] == "groupView" && $_GET['gid'] != "") {
                  $id = $_GET['gid'];
                  ?> 
            <script src="js/explode.js"></script>
                   <script>
                        $(document).ready(function() {
                              $.getJSON('genJSON/shop_item', function(json, textStatus) {
                                    var id =0 ;
                                    $.each(json.shop_item, function(index, val) {
                                    if(val.group == <?php echo $id ?>) {
                                           $('div[data=list-item]').append("<div style=\"max-height:150px;margin-bottom:10px;\" class='col-xs-6 col-md-3' id='item-"+ id + "'><a href='index.php?mode=shop&itemid=" + val.id + "' class='thumbnail'> <img style=\"max-height:130px;\" src="+val.pic+">" +  val.name + "</a></div>");
                                            id++;
                                      }
                                      
                              });
                                    
                                    if(id==0) {
                                           $('div[data=list-item]').append("<div style=\"max-height:150px;margin-bottom:10px;\" class='col-xs-6 col-md-3' id='item-"+ id + "'>Item not Found.</a></div>");
                                      }      
                                          
                                });
                              });    
                              
                   </script>

                   <div id="dataCenter">
                   <div class='col-lg-12 module-header' id="headerView"><a href="index.php?mode=list-group">List Group</a></div>
                        <div class="module-content">
                        <div >
                              <div class="row" data="list-item" style="padding:30px;">
                                      
                                    </div>
                                    </div>
              
                   </div>
                  </div>
                  <?php
            }elseif($_GET['mode'] == "login") {
                  $username = $_POST['user'];
                  $password = $_POST['pass'];

                  $data = base64_encode($username).",".base64_encode($password);
                  ?> 
            <script src="js/explode.js"></script>


                   <div id="dataCenter">
                   <div class='col-lg-12 module-header' id="headerView">Signing in..</div></div>
                        <div class="module-content">
                        <div >
                              <div class="row" data="list-item" style="padding:30px;">
                                      <?php 
                                                if(login($data) == 1) {
                                                      echo "Login success. Redirecting to Home Page in 3 Second";
                                                      echo "<script>
                  setTimeout(function() {
                        location.href = \"index.php\";
                  }, 3000);
            </script>";
                                                }else {
                                                      echo "Username or Password has invalid. Redirecting to Home Page in 3 Second";
                                                       echo "<script>
                  setTimeout(function() {
                        location.href = \"index.php\";
                  }, 3000);
            </script>";
                                                }
                                       ?>
                                    </div>
                                    </div>
              
                   </div>
                  </div>
                  <?php
             }elseif($_GET['mode'] == "logout") {
                  unset($_SESSION["ses_login_user"]);
                  ?> 
            <script src="js/explode.js"></script>


                   <div id="dataCenter">
                   <div class='col-lg-12 module-header' id="headerView">Signing in..</div></div>
                        <div class="module-content">
                        <div >
                              <div class="row" data="list-item" style="padding:30px;">
                                      <?php 
                                                
                       echo "Log out Complete. Redirecting to Home Page in 3 Second";
                       echo "<script>
                  setTimeout(function() {
                        location.href = \"index.php\";
                  }, 3000);
            </script>";
                                                
                                       ?>
                                    </div>
                                    </div>
              
                   </div>
                  </div>
                  <?php
             } elseif($_GET['mode'] == "ems") {
                  
                  ?> 

            <script src="js/explode.js"></script>
                   <script>
                        $(document).ready(function() {
                              var id = <?php echo getMemberID(); ?>;
                               id = btoa("`user` = " + id);
                              $.getJSON('genJSON/ems/'+ id, function(json, textStatus) {
                                    $.each(json.ems, function(index, val) {
                                           $('#dataView').append("<div class=\"panel-heading\" role=\"tab\" id=\"headingOne\"><h4 class=\"panel-title\"><a role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#ems-"+ val.id+"\" aria-expanded=\"true\" aria-controls=\"ems-"+ val.id+"\"><i class=\"fa fa-shopping-bag\"></i> "+ val.name + "</a></h4></div><div id=\"ems-"+ val.id+"\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingOne\"><div class=\"panel-body\"><iframe src=\"http://emsbot.com/#/?s="+ val.code +"\" height=\"400px;\" width=\"100%\"></iframe></div></div>");
                                          });
                                    });
                                    
                        });    
                              
                   </script>

                   <div id="dataCenter">
                   <div class='col-lg-12 module-header' id="headerView">Chect EMS Status </div>
                  <div class="module-content" id="dataView">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                           </div>
                        </div>
                   </div>
                  </div>
                  <?php
             } ?>
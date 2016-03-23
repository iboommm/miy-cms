<?php 
	require_once "/class/config/class.template.php";
	require_once "/class/config/class.setting.php";
    require_once "/class/config/class.admin.php";
	require_once '/class/config/class.lang.php';

	define("ADMIN_TEMPLATE","OPEN");
	$getLang = getLang();
	require 'lang/lang.'.$getLang.'.php';

    if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "add-member") {
        echo addMember($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "edit-member") {
        echo editMember($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "remove-member") {
        echo removeMember($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "setting") {
        echo updateSetting($_POST['data']);
        exit();
    }

	ob_start();
?>
<div id="wrapper">
	
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php echo $lang['Admin-title'] ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php print $_SESSION["ses_login_user"]; ?> </strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php print $_SESSION["ses_login_user"]; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php print $_SESSION["ses_login_user"]; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php print $_SESSION["ses_login_user"]; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="admin.php?mode=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           <?php include "template/".getTheme()."/admin/menu.tem.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

               <?php if(!$_GET['mode']) {
               			include "template/".getTheme()."/admin/dashboard.tem.php";
               		}elseif ($_GET['mode'] == "setting") {
               			include "template/".getTheme()."/admin/setting.tem.php";
               		}elseif ($_GET['mode'] == "menu") {
               			include "template/".getTheme()."/admin/menuSet.tem.php";
               		}elseif ($_GET['mode'] == "banner") {
                        include "template/".getTheme()."/admin/banner.tem.php";
                    }elseif ($_GET['mode'] == "add-member") {
                            include "template/".getTheme()."/admin/addMember.tem.php";
                    }elseif ($_GET['mode'] == "edit-member") {
                            include "template/".getTheme()."/admin/editMember.tem.php";
                    }elseif ($_GET['mode'] == "logout") {
                        session_destroy();
                        ?> 
                            <script>
                                $(document).ready(function() {
                                    location.href = "index.php";
                                });
                            </script>
                        <?php
                    }

                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php
	
	$render = ob_get_clean(); 
	$login = new Template();
	$login->setTitle("Administration Zone - ".getSetting("title"));
	$login->setKeyword("testKeyword");
	$login->setDescription("testDescription");
	$login->setAuthor("testAuthor");
	$login->setRender($render);
	$login->setTheme(getTheme());
	$login->renderPage();

 ?>


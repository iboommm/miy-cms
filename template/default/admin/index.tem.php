<?php 
	require_once "class/config/class.template.php";
	require_once "class/config/class.setting.php";
    require_once "class/config/class.admin.php";
	require_once 'class/config/class.lang.php';

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
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "add-menu") {
        echo addMenu($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "edit-menu") {
        echo editMenu($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "remove-menu") {
        echo removeMenu($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "add-module") {
        echo addModule($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "edit-module") {
        echo editModule($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "remove-module") {
        echo removeModule($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "add-article") {
        echo addArticle($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "edit-article") {
        echo editArticle($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "remove-article") {
        echo removeArticle($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "board-setting") {
        echo editBoard($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "add-group") {
        echo addGroup($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "edit-group") {
        echo editGroup($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "remove-group") {
        echo removeGroup($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "add-item") {
        echo addItem($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "edit-item") {
        echo editItem($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "remove-item") {
        echo removeItem($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "add-brand") {
        echo addBrand($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "edit-brand") {
        echo editBrand($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "remove-brand") {
        echo removeBrand($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "add-ems") {
        echo addEMS($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "remove-ems") {
        echo removeEMS($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "layout") {
        echo editLayout($_POST['data']);
        exit();
    }else if(isset($_POST['data']) && isset($_POST['sending']) && $_POST['sending'] == "update-mod") {
        echo updateMod($_POST['data']);
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php print $_SESSION["ses_login_user"]; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
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
                    }elseif ($_GET['mode'] == "layout") {
                            include "template/".getTheme()."/admin/layout.tem.php";
                    }elseif ($_GET['mode'] == "edit-menu") {
                            include "template/".getTheme()."/admin/editMenu.tem.php";
                    }elseif ($_GET['mode'] == "add-module") {
                            include "template/".getTheme()."/admin/addModule.tem.php";
                    }elseif ($_GET['mode'] == "edit-module") {
                            include "template/".getTheme()."/admin/editModule.tem.php";
                    }elseif ($_GET['mode'] == "list-module") {
                            include "template/".getTheme()."/admin/listModule.tem.php";
                    }elseif ($_GET['mode'] == "add-article") {
                            include "template/".getTheme()."/admin/addArticle.tem.php";
                    }elseif ($_GET['mode'] == "edit-article") {
                            include "template/".getTheme()."/admin/editArticle.tem.php";
                    }elseif ($_GET['mode'] == "list-article") {
                            include "template/".getTheme()."/admin/listArticle.tem.php";
                    }elseif ($_GET['mode'] == "webboard-setting") {
                            include "template/".getTheme()."/admin/webboard.tem.php";
                    }elseif ($_GET['mode'] == "list-group") {
                            include "template/".getTheme()."/admin/listGroup.tem.php";
                    }elseif ($_GET['mode'] == "add-group") {
                            include "template/".getTheme()."/admin/addGroup.tem.php";
                    }elseif ($_GET['mode'] == "edit-group") {
                            include "template/".getTheme()."/admin/editGroup.tem.php";
                    }elseif ($_GET['mode'] == "add-item") {
                            include "template/".getTheme()."/admin/addItem.tem.php";
                    }elseif ($_GET['mode'] == "edit-item") {
                            include "template/".getTheme()."/admin/editItem.tem.php";
                    }elseif ($_GET['mode'] == "add-brand") {
                            include "template/".getTheme()."/admin/addBrand.tem.php";
                    }elseif ($_GET['mode'] == "edit-brand") {
                            include "template/".getTheme()."/admin/editBrand.tem.php";
                    }elseif ($_GET['mode'] == "list-brand") {
                            include "template/".getTheme()."/admin/listBrand.tem.php";
                    }elseif ($_GET['mode'] == "list-item") {
                            include "template/".getTheme()."/admin/listItem.tem.php";
                    }elseif ($_GET['mode'] == "add-ems") {
                            include "template/".getTheme()."/admin/addEMS.tem.php";
                    }elseif ($_GET['mode'] == "list-ems") {
                            include "template/".getTheme()."/admin/listEMS.tem.php";
                    }elseif ($_GET['mode'] == "mod-module") {
                            include "template/".getTheme()."/admin/editMod.tem.php";
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
    $login->setScript("admin");
	$login->setRender($render);
	$login->setTheme(getTheme());
	$login->renderPage();

 ?>


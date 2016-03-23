 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> <?php echo $lang["Admin-dashboard"]; ?></a>
                    </li>
                    <li>
                        <a href="admin.php?mode=setting"><i class="fa fa-fw fa-cog"></i> <?php echo $lang["Admin-general"]; ?></a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#index"><i class="fa fa-fw fa-desktop"></i> <?php echo $lang["Admin-indexSetting"]; ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="index" class="collapse">
                            <li>
                                <a href="admin.php?mode=menu"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-menu"]; ?></a>
                            </li>
                            <li>
                                <a href="admin.php?mode=banner"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-banner"]; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#member"><i class="fa fa-fw fa-user"></i> <?php echo $lang["Admin-Member"]; ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="member" class="collapse">
                            <li>
                                <a href="admin.php?mode=add-member"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-add-member"]; ?></a>
                            </li>
                            <li>
                                <a href="admin.php?mode=edit-member"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-edit-member"]; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#webboard"><i class="fa fa-fw fa-comments-o "></i> <?php echo $lang["Admin-webboard"]; ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="webboard" class="collapse">
                            <li>
                                <a href="admin.php?mode=menu"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-webboard-forum"]; ?></a>
                            </li>
                            <li>
                                <a href="admin.php?mode=banner"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-webboard-topic"]; ?></a>
                            </li>
                        </ul>
                    </li>    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
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
                            <li>
                                <a href="admin.php?mode=layout"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-layout"]; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li> 
                        <a href="javascript:;" data-toggle="collapse" data-target="#module"><i class="fa fa-fw fa-object-group "></i> <?php echo $lang["Admin-module"]; ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="module" class="collapse">
                            <li>
                                <a href="admin.php?mode=add-module"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-add-module"]; ?></a>
                            </li>
                            <li>
                                <a href="admin.php?mode=list-module"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-edit-module"]; ?></a>
                            </li>
                            <li>
                                <a href="admin.php?mode=mod-module"><i class="fa fa-fw fa-circle"></i> Manage Content</a>
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
                                <a href="admin.php?mode=webboard-setting"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-webboard-setting"]; ?></a>
                            </li>
                            <li>
                                <a href="admin.php?mode=banner"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-webboard-topic"]; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#market"><i class="fa fa-fw fa-shopping-bag"></i> <?php echo $lang["Admin-market"]; ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="market" class="collapse">
                            <li>
                                <a href="admin.php?mode=list-group"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-group-item"]; ?></a>
                            </li>
                            <li>
                                <a href="admin.php?mode=list-brand"><i class="fa fa-fw fa-circle"></i> Manage Brand</a>
                            </li>
                            <li>
                                <a href="admin.php?mode=add-item"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-add-item"]; ?></a>
                            </li>
                            <li>
                                <a href="admin.php?mode=list-item"><i class="fa fa-fw fa-circle"></i> <?php echo $lang["Admin-edit-item"]; ?></a>
                            </li>
                        </ul>
                    </li>    
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#blog"><i class="fa fa-fw fa-edit "></i> <?php echo $lang["Admin-blog"]; ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="blog" class="collapse">
                            <li>
                                <a href="admin.php?mode=add-article"><i class="fa fa-fw fa-circle"></i> Add Article</a>
                            </li>
                            <li>
                                <a href="admin.php?mode=list-article"><i class="fa fa-fw fa-circle"></i> Edit Article</a>
                            </li>
                        </ul>
                    </li>    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#ems"><i class="fa fa-shopping-bag"> </i> Manage EMS<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ems" class="collapse">
                            <li>
                                <a href="admin.php?mode=add-ems"><i class="fa fa-fw fa-circle"></i> Add EMS Code</a>
                            </li>
                            <li>
                                <a href="admin.php?mode=list-ems"><i class="fa fa-fw fa-circle"></i> Remove EMS Code</a>
                            </li>
                        </ul>
                    </li>  

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
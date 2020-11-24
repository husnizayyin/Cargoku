	
		<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">

                        <!-- Logo text -->
                        
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
					 
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  <?php if ($core->language == "en"){ ?>	
								<i class="flag-icon flag-icon-us"></i>
							  <?php }else if($core->language == "es"){ ?>
								<i class="flag-icon flag-icon-es"></i>
							  <?php }else if($core->language == "fr"){ ?>
							    <i class="flag-icon flag-icon-fr"></i>
							  <?php }else if($core->language == "ru"){ ?>
							    <i class="flag-icon flag-icon-ru"></i>
							  <?php }else{ ?>
								<i class="flag-icon flag-icon-it"></i>
							  <?php } ?>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-bell font-24"></i><span class="badge badge-notify badge-sm up bg-danger pull-top-xs"><?php echo countEntries(Core::cTable, "status_courier", "Pending");?></span></a>
							
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow"><span class="bg-danger"></span></span>
									<div class="drop-title bg-danger text-white">
										<h4 class="m-b-0 m-t-5"><?php echo countEntries(Core::cTable, "status_courier", "Pending");?> <?php echo $lang['notinew'] ?></h4>
										<span class="font-light"><?php echo $lang['notiapprove'] ?></span>
									</div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="31" /></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class=""><img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1"  width="60" /></div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $user->username;?></h4>
                                        <p class=" m-b-0"><?php echo $user->email;?></p>
                                    </div>
                                </div>
									
										<a class="dropdown-item" href="user.php?do=main&amp;action=edit&amp;id=<?php echo $user->uid;?>"><i class="ti-user m-r-5 m-l-5"></i> <?php echo $lang['miprofile'] ?></a>
								
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="user.php?do=main"><i class="ti-settings m-r-5 m-l-5"></i> <?php echo $lang['accountset'] ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> <?php echo $lang['logoouts'] ?></a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
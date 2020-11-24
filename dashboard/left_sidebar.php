
	   <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">
									<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="40" />
								</div>
								<?php
									date_default_timezone_set("".$core->timezone."");
									$t = date("H");

									if($t < 12){
									$mensaje = ''.$lang['message1'].'';
									}
									else if($t < 18){
									$mensaje = ''.$lang['message2'].'';
									} 
									else{
									$mensaje = ''.$lang['message3'].'';
									}
								?> 
								
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php echo $mensaje; ?>,&nbsp;&nbsp;</h5>
                                        <span class="op-5 user-email"><?php echo $row->fname;?></span>
                                    </a>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                       
                        <!-- User Profile-->
                        <li class="nav-small-cap"> <span class="hide-menu"></span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"><?php echo $lang['dashboard'] ?> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index.php" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> <?php echo $lang['home'] ?> </span></a></li>
                            </ul>
                        </li>

						 <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cube-send"></i><span class="hide-menu"><?php echo $lang['shipment'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="courier.php?do=list_courier" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipmentlist'] ?> </span></a></li>
								<li class="sidebar-item"><a href="customer_list.php" class="sidebar-link"><i class="mdi mdi-cube-send"></i><span class="hide-menu"> <?php echo $lang['createshipment'] ?> </span></a></li>
							</ul>
                        </li>	
						 
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-week"></i><span class="hide-menu"><?php echo $lang['container'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="container.php?do=list_container" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['contalist'] ?> </span></a></li>
								<li class="sidebar-item"><a href="client_container.php" class="sidebar-link"><i class="mdi mdi-view-week"></i><span class="hide-menu"> <?php echo $lang['createcontainer'] ?> </span></a></li>
							</ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti ti-gift" style="color:#7460ee"></i><span class="hide-menu"><?php echo $lang['conso-lidate'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="add_packages.php" class="sidebar-link"><i class="fas fa-cubes" style="color:#fb8c00"></i><span class="hide-menu"> <?php echo $lang['langs_01034'] ?> </span></a></li>
								<li class="sidebar-item"><a href="consolidate.php?do=list_consolidate" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['langs_01031'] ?> </span></a></li>
								
							</ul>
                        </li>
						 
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-multiple" style="color:#fb8c00"></i><span class="hide-menu"><?php echo $lang['manageshipment'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="shipping.php?do=shipment" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['all'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=pending" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['pending'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=rejected" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['rejected'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=delivered" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['delivered'] ?> </span></a></li>
								<li class="sidebar-item"><a href="shipping.php?do=delivered_consolidated" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['langs_01032'] ?> </span></a></li>								
                            </ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customer.php?do=main_client" aria-expanded="false"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu"><?php echo $lang['customerlist'] ?> </span></a></li>

						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="driver.php?do=main_driver" aria-expanded="false"><i class="mdi mdi-car"></i><span class="hide-menu"><?php echo $lang['driver-list'] ?></span></a></li>	

						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="tools.php?do=ship_rates" aria-expanded="false"><i class="mdi mdi-package" style="color:#20c997"></i><span class="hide-menu"><?php echo $lang['shiprates'] ?> </span></a></li>						
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-hand-holding-usd" style="color:#2962FF"></i><span class="hide-menu"><?php echo $lang['transaction'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="shipping.php?do=billings" aria-expanded="false"><i class="mdi mdi-credit-card-plus" style="color:#7460ee"></i><span class="hide-menu"><?php echo $lang['billing'] ?> </span></a></li>
								<li class="sidebar-item"><a href="paymentlist_online.php" class="sidebar-link"><i class="fas fa-donate"></i><span class="hide-menu"> <?php echo $lang['payment'] ?> </span></a></li>
							</ul>
                        </li>	
						<?php if (!$user->levelCheck("2")) : ?>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"><?php echo $lang['configutarions'] ?></span></li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"><?php echo $lang['accountt'] ?> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="user.php?do=main" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['usermanage'] ?> </span></a></li>
								<li class="sidebar-item"><a href="user.php?do=main&amp;action=edit&amp;id=<?php echo $user->uid;?>" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['profiles'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="user.php?do=newsletter" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['newsletter'] ?> </span></a></li>
                            </ul>
                        </li>
						 
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu"><?php echo $lang['tool'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="tools.php?do=config" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['setcompany'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=config_taxes" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['langs_01033'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=offices" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['officegroup'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=courier_company" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['couriercompany'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=shipping_mode" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipmode'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=status_courier" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['stylestatus'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=payment_method" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['paymode'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=packaging" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['packatype'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=category" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['itemcategory'] ?> </span></a></li>
								<hr />
								<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"><strong><?php echo $lang['container'] ?></strong></span></li>
                                <li class="sidebar-item"><a href="tools.php?do=shipline" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipline'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=incoterms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['incoterms'] ?> </span></a></li>
								<hr />
								<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"><strong><?php echo $lang['template'] ?></strong></span></li>
								<li class="sidebar-item"><a href="tools.php?do=news" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['newmanage'] ?> </span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=templates" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"><?php echo $lang['emailtemplate'] ?> </span></a></li>
								<hr />
								<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"><strong><?php echo $lang['setsms'] ?></strong></span></li>
								<li class="sidebar-item"><a href="tools.php?do=sms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"><?php echo $lang['smsc'] ?></span></a></li>
								<li class="sidebar-item"><a href="tools.php?do=templates_sms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['smstemplate'] ?> </span></a></li>
								<hr />
								<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"><strong><?php echo $lang['backup'] ?></strong></span></li>
								<li class="sidebar-item"><a href="tools.php?do=backup" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['restorbackup'] ?> </span></a></li>
                            </ul>
                        </li>
                        </li>
						<?php endif;?>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"></span></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false"><i class="fa fa-power-off m-r-5 m-l-5"></i><span class="hide-menu"><?php echo $lang['wout'] ?></span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
	
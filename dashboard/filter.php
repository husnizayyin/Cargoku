<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>
<?php
  switch (Filter::$do) {
      case "main";

		switch (Filter::$action) {
			case "edit":
				echo '<i class="icon-group"></i> '.$lang['filter1'].'';
			break;
			case "add":
				echo '<i class="icon-group"></i> '.$lang['filter2'].'';
			break;
			default:
				echo '<i class="icon-group"></i> '.$lang['filter3'].'';
			break;
		}

		break;
		  
		case "main_client";

		switch (Filter::$action) {
			case "edit":
					echo '<i class="icon-group"></i> '.$lang['filter4'].'';
				break;
			case "add":
					echo '<i class="icon-group"></i> '.$lang['filter5'].'';
				break;
			default:
					echo '<i class="icon-group"></i> '.$lang['filter6'].'';
				break;
		}

		break;  
		
		case "main_driver";

		switch (Filter::$action) {
			case "edit":
					echo '<i class="mdi mdi-car"></i> '.$lang['filter79'].'';
				break;
			case "add":
					echo '<i class="mdi mdi-car"></i> '.$lang['filter80'].'';
				break;
			default:
					echo '<i class="mdi mdi-car"></i> '.$lang['filter81'].'';
				break;
		}

		break;  

		case "config":

			default:
				echo '<i class="icon-cog"></i> '.$lang['filter7'].'';
			break;

		case "backup":

		default:
			echo '<i class="icon-hdd"></i> '.$lang['filter8'].'';
			break;

		case "maintenance":

		default:
			echo '<i class="icon-cog"></i> '.$lang['filter9'].'';
			break;
		  
		case "gateways":

			switch (Filter::$action) {
				case "edit":
					echo '<i class="icon-credit-card"></i> '.$lang['filter10'].'';
				break;
				default:
					echo '<i class="icon-credit-card"></i> '.$lang['filter11'].'';
				break;
			}

		break;

		case "news":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="fas fa-comment-alt"></i> '.$lang['filter12'].'';
					break;
				case "add":
						echo '<i class="fas fa-comment-alt"></i> '.$lang['filter13'].'';
					break;
				default:
						echo '<i class="fas fa-comment-alt"></i> '.$lang['filter14'].'';
					break;
			}

		break;
		
		
		case "offices":

			switch (Filter::$action) {
				case "edit-office":
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter15'].'';
					break;
				case "add_office":
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter16'].'';
					break;				
				default:
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter17'].'';
					break;
			}

		break;
		
		case "add_courier":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="ti-package"></i> '.$lang['filter18'].'';
					break;				
				default:
						echo '<i class="ti-package"></i> '.$lang['filter19'].'';
					break;
			}

		break;
		
		case "add_container":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter20'].'';
					break;				
				default:
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter21'].'';
					break;
			}

		break;
		
		case "list_container":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="mdi mdi-view-week"></i>'.$lang['filter22'].'';
					break;				
				default:
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter23'].'';
					break;
			}

		break;
		
		case "list_courier":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="fas fa-cubes"></i> '.$lang['filter24'].'';
					break;				
				default:
						echo '<i class="fas fa-cubes"></i> '.$lang['filter25'].'';
					break;
			}

		break;
		
		case "list_consolidate":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="fas fa-cubes"></i> Consolidate List';
					break;				
				default:
						echo '<i class="fas fa-cubes"></i> Consolidate List';
					break;
			}

		break;
		
		case "edit_courier":

			switch (Filter::$action) {				
				case "ship":
						echo '<i class="ti-package"></i> '.$lang['filter26'].'';
					break;				
				default:
						echo '<i class="ti-package"></i> '.$lang['filter26'].'';
					break;
			}

		break;
		
		case "edit_container":

			switch (Filter::$action) {				
				case "edit":
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter27'].'';
					break;				
				default:
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter27'].'';
					break;
			}

		break;
		
		case "edit_consolidate":

			switch (Filter::$action) {				
				case "ship":
						echo '<i class="ti ti-gift"></i> '.$lang['langs_01029'].'';
					break;				
				default:
						echo '<i class="ti ti-gift"></i> '.$lang['langs_01029'].'';
					break;
			}

		break;
		
		case "status_shipment":

			switch (Filter::$action) {				
				case "status":
						echo '<i class="ti-package"></i> '.$lang['filter28'].'';
					break;				
				default:
						echo '<i class="ti-package"></i> '.$lang['filter28'].'';
					break;
			}

		break;
		
		case "courier_company":

			switch (Filter::$action) {
				case "edit-courier_company":
						echo '<i class="fas fa-globe"></i> '.$lang['filter29'].'';
					break;
				case "add-courier_company":
						echo '<i class="fas fa-globe"></i> '.$lang['filter30'].'';
					break;				
				default:
						echo '<i class="fas fa-globe"></i> '.$lang['filter31'].'';
					break;
			}

		break;
		
		case "ship_rates":

			switch (Filter::$action) {
				case "edit-ship_rates":
						echo '<i class="fas fa-cube"></i> '.$lang['filter32'].'';
					break;
				case "add-ship_rates":
						echo '<i class="fas fa-cube"></i> '.$lang['filter33'].'';
					break;				
				default:
						echo '<i class="fas fa-cube"></i> '.$lang['filter34'].'';
					break;
			}

		break;
		
		case "status_courier":

			switch (Filter::$action) {
				case "edit-status":
						echo '<i class="fas fa-paint-brush"></i> '.$lang['filter35'].'';
					break;
				case "add-status":
						echo '<i class="fas fa-paint-brush"></i> '.$lang['filter36'].'';
					break;				
				default:
						echo '<i class="fas fa-paint-brush"></i> '.$lang['filter37'].'';
					break;
			}

		break;
		
		case "payment_method":

			switch (Filter::$action) {
				case "edit-payment":
						echo '<i class="fas fa-donate"></i> '.$lang['filter38'].'';
					break;
				case "add-Payment":
						echo '<i class="fas fa-donate"></i> '.$lang['filter39'].'';
					break;				
				default:
						echo '<i class="fas fa-donate"></i> '.$lang['filter40'].'';
					break;
			}

		break;
		
		case "shipping_mode":

			switch (Filter::$action) {
				case "edit-shipmode":
						echo '<i class="ti-truck"></i> '.$lang['filter41'].'';
					break;
				case "add-shipmode":
						echo '<i class="ti-truck"></i> '.$lang['filter42'].'';
					break;				
				default:
						echo '<i class="ti-truck"></i> '.$lang['filter43'].'';
					break;
			}

		break;
		
		case "shipline":

			switch (Filter::$action) {
				case "edit-shipline":
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter44'].'';
					break;
				case "add-shipline":
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter45'].'';
					break;				
				default:
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter46'].'';
					break;
			}

		break;
		
		case "incoterms":

			switch (Filter::$action) {
				case "edit-incoterms":
						echo '<i class="ti-briefcase"></i> '.$lang['filter47'].'';
					break;
				case "add-incoterms":
						echo '<i class="ti-briefcase"></i> '.$lang['filter48'].'';
					break;				
				default:
						echo '<i class="ti-briefcase"></i> '.$lang['filter49'].'';
					break;
			}

		break;
		
		case "packaging":

			switch (Filter::$action) {
				case "edit-packaging":
						echo '<i class="fas fa-dolly-flatbed"></i> '.$lang['filter50'].'';
					break;
				case "add-packaging":
						echo '<i class="fas fa-dolly-flatbed"></i> '.$lang['filter51'].'';
					break;				
				default:
						echo '<i class="fas fa-dolly-flatbed"></i> '.$lang['filter52'].'';
					break;
			}

		break;
		
		case "category":

			switch (Filter::$action) {
				case "edit-category":
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter53'].'';
					break;
				case "add-category":
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter54'].'';
					break;				
				default:
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter56'].'';
					break;
			}

		break;

		case "templates":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="ti-email"></i> '.$lang['filter57'].'';
					break;
				case "add":
						echo '<i class="ti-email"></i> '.$lang['filter57'].'';
					break;
				default:
						echo '<i class="ti-email"></i> '.$lang['filter57'].'';
					break;
			}

		break;
		
		case "websites":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-content-copy"></i> '.$lang['filter58'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-content-copy"></i> '.$lang['filter58'].'';
					break;
				default:
						echo '<i class="mdi mdi-content-copy"></i> '.$lang['filter58'].'';
					break;
			}

		break;
		
		case "about":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-briefcase-check"></i> '.$lang['filter59'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-briefcase-check"></i> '.$lang['filter59'].'';
					break;
				default:
						echo '<i class="mdi mdi-briefcase-check"></i> '.$lang['filter59'].'';
					break;
			}

		break;
		
		case "rates":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-package"></i> '.$lang['filter60'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-package"></i> '.$lang['filter60'].'';
					break;
				default:
						echo '<i class="mdi mdi-package"></i> '.$lang['filter60'].'';
					break;
			}

		break;
		
		case "contact":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="ti-location-pin"></i> '.$lang['filter61'].'';
					break;
				case "add":
						echo '<i class="ti-location-pin"></i> '.$lang['filter61'].'';
					break;
				default:
						echo '<i class="ti-location-pin"></i> '.$lang['filter61'].'';
					break;
			}

		break;
		
		case "log_in":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-account-key"></i> '.$lang['filter62'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-account-key"></i> '.$lang['filter62'].'';
					break;
				default:
						echo '<i class="mdi mdi-account-key"></i> '.$lang['filter62'].'';
					break;
			}

		break;
		
		case "register":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-account"></i> '.$lang['filter63'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-account"></i> '.$lang['filter63'].'';
					break;
				default:
						echo '<i class="mdi mdi-account"></i>'.$lang['filter63'].'';
					break;
			}

		break;
		
		case "menu":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-menu"></i> '.$lang['filter64'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-menu"></i> '.$lang['filter64'].'';
					break;
				default:
						echo '<i class="mdi mdi-menu"></i> '.$lang['filter64'].'';
					break;
			}

		break;
		
		case "templates_sms":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="ti-comments-smiley"></i> '.$lang['filter52'].'';
					break;
				case "add":
						echo '<i class="ti-comments-smiley"></i> '.$lang['filter65'].'';
					break;
				default:
						echo '<i class="ti-comments-smiley"></i> '.$lang['filter65'].'';
					break;
			}

		break;
		
		case "smstwilio":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="fas fa-envelope"></i> '.$lang['filter66'].'';
					break;
				case "add":
						echo '<i class="fas fa-envelope"></i> '.$lang['filter66'].'';
					break;
				default:
						echo '<i class="fas fa-envelope"></i> '.$lang['filter66'].'';
					break;
			}

		break;
		
		case "smsnexmo":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="fas fa-envelope"></i> '.$lang['filter67'].'';
					break;
				case "add":
						echo '<i class="fas fa-envelope"></i> '.$lang['filter67'].'';
					break;
				default:
						echo '<i class="fas fa-envelope"></i> '.$lang['filter67'].'';
					break;
			}

		break;
		
		case "inv_ship":

			switch (Filter::$action) {				
				case "ship":
						echo '<i class="ti-package"></i> '.$lang['filter68'].'';
					break;				
				default:
						echo '<i class="ti-package"></i> '.$lang['filter68'].'';
					break;
			}

		break;
		
		case "label_ship":

			switch (Filter::$action) {				
				case "label":
						echo '<i class="ti-package"></i> '.$lang['filter69'].'';
					break;				
				default:
						echo '<i class="ti-package"></i> '.$lang['filter69'].'';
					break;
			}

		break;
		
		case "shipment":

			switch (Filter::$action) {				
				case "ship_list":
						echo '<i class="ti-package"></i>'.$lang['filter70'].'';
					break;
					default:
						echo '<i class="ti-package"></i>'.$lang['filter70'].'';
					break;
			}

		break;
		
		case "pending":

			switch (Filter::$action) {				
				case "pending":
						echo '<i class="ti-timer"></i> '.$lang['filter71'].'';
					break;
					default:
						echo '<i class="ti-timer"></i> '.$lang['filter71'].'';
					break;
			}

		break;
		
		case "rejected":

			switch (Filter::$action) {				
				case "pending":
						echo '<i class="ti-face-sad"></i> '.$lang['filter72'].'';
					break;
					default:
						echo '<i class="ti-face-sad"></i> '.$lang['filter72'].'';
					break;
			}

		break;
		
		case "delivered":

			switch (Filter::$action) {				
				case "delivered":
						echo '<i class="ti-truck"></i> '.$lang['filter73'].'';
					break;
					default:
						echo '<i class="ti-truck"></i> '.$lang['filter73'].'';
					break;
			}

		break;
		
		case "deliver_shipment":

			switch (Filter::$action) {				
				case "status":
						echo '<i class="ti-package"></i> '.$lang['filter74'].'';
					break;
					default:
						echo '<i class="ti-package"></i> '.$lang['filter74'].'';
					break;
			}

		break;
		
		case "billings":

			switch (Filter::$action) {				
				case "billings":
						echo '<i class="ti-money"></i> '.$lang['filter75'].'';
					break;
					default:
						echo '<i class="ti-money"></i> '.$lang['filter75'].'';
					break;
			}

		break;
		
		case "sales_customer":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="ti-money"></i> '.$lang['filter76'].'';
					break;
				case "add":
						echo '<i class="ti-money"></i> '.$lang['filter76'].'';
					break;
				default:
						echo '<i class="ti-money"></i> '.$lang['filter76'].'';
					break;
			}

		break;
		

		case "newsletter":

		default:
				echo '<i class="icon-envelope"></i> '.$lang['filter77'].'';
			break;

		default:
			echo '<i class="icon-microphone"></i> '.$lang['filter78'].'';
		break;
  }
?>
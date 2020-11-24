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

  define("_VALID_PHP", true);
  
  require_once("../init.php");
  if (!$user->is_Admin())
   redirect_to("../login.php");
?>
<?php
  /* Proccess Configuration */
  if (isset($_POST['processConfig'])):
      $core->processConfig();
  endif;
  
  /* Proccess Configuration */
  if (isset($_POST['processConfig_taxes'])):
      $core->processConfig_taxes();
  endif;
  
  /* == Proccess Courier == */
  if (isset($_POST['processCourier'])):
      $courier->processCourier();
  endif;
  
  /* == Proccess Container == */
  if (isset($_POST['processContainer'])):
      $courier->processContainer();
  endif;
  
   /* == Proccess Consolidate == */
  if (isset($_POST['processConsolidate'])):
      $courier->processConsolidate();
  endif;
  
  /* == Proccess Container update == */
  if (isset($_POST['processContainer_update'])):
      $courier->processContainer_update();
  endif;
  
  /* == Proccess Container update == */
  if (isset($_POST['processConsolidate_update'])):
      $courier->processConsolidate_update();
  endif;
  
  /* == Proccess Update Courier == */
  if (isset($_POST['processUCourier'])):
      $courier->processUCourier();
  endif;
  
  /* == Proccess Rejected Courier == */
  if (isset($_POST['processCourierrejected'])):
      $courier->processCourierrejected();
  endif;
  
  /* == Proccess Update Courier Status == */
  if (isset($_POST['processStatusCourier'])):
      $courier->processStatusCourier();
  endif;
  
   /* == Proccess Update Consolidate Status == */
  if (isset($_POST['processStatusConsolidate'])):
      $courier->processStatusConsolidate();
  endif;
  
   /* == Proccess Deliver shipment == */
  if (isset($_POST['processDelivershipment'])):
      $courier->processDelivershipment();
  endif;
  
   /* == Proccess Deliver shipment == */
  if (isset($_POST['processDelivershipmentconsolidate'])):
      $courier->processDelivershipmentconsolidate();
  endif;

  /* Proccess Newsletter */
  if (isset($_POST['processNewsletter'])):
      $core->processNewsletter();
  endif;

  /* == Proccess Email Template == */
  if (isset($_POST['processEmailTemplate'])):
      $core->processEmailTemplate();
  endif;
  
  /* == Proccess Web Template == */
  if (isset($_POST['processWebpageTemplate'])):
      $core->processWebpageTemplate();
  endif;
  
  /* == Proccess About Template == */
  if (isset($_POST['processWebpageAbout'])):
      $core->processWebpageAbout();
  endif;
  
   /* == Proccess Rate Template == */
  if (isset($_POST['processWebpageRate'])):
      $core->processWebpageRate();
  endif;
  
  /* == Proccess Contact Template == */
  if (isset($_POST['processWebpageContact'])):
      $core->processWebpageContact();
  endif;
  
  /* == Proccess Login Template == */
  if (isset($_POST['processWebpageLogin'])):
      $core->processWebpageLogin();
  endif;
  
  /* == Proccess Register Template == */
  if (isset($_POST['processWebpageReg'])):
      $core->processWebpageReg();
  endif;
  
  /* == Proccess Nav menu Template == */
  if (isset($_POST['processWebpageMenu'])):
      $core->processWebpageMenu();
  endif;
  
  /* == Proccess Privacy Template == */
  if (isset($_POST['processWebpagePrivacy'])):
      $core->processWebpagePrivacy();
  endif;
  
  /* == Proccess Term Use Template == */
  if (isset($_POST['processWebpageTermuse'])):
      $core->processWebpageTermuse();
  endif;
  
  /* == Proccess SMS Template == */
  if (isset($_POST['processSmsTemplate'])):
      $core->processSmsTemplate();
  endif;

  /* == Proccess News == */
  if (isset($_POST['processNews'])):
      $core->processNews();
  endif;
  
  /* == Proccess SMS Twilio == */
  if (isset($_POST['processSmstwilio'])):
      $core->processSmstwilio();
  endif;
  
  /* == Proccess SMS Nexmo == */
  if (isset($_POST['processSmsnexmo'])):
      $core->processSmsnexmo();
  endif;
  
  /* == Proccess Offices == */
  if (isset($_POST['processOffices'])):
      $core->processOffices();
  endif;
  
  /* == Proccess Courier Company == */
  if (isset($_POST['processCouriercom'])):
      $core->processCouriercom();
  endif;
  
  /* == Proccess Packaging Type == */
  if (isset($_POST['processPack'])):
      $core->processPack();
  endif;
  
  /* == Proccess Category Item == */
  if (isset($_POST['processItem'])):
      $core->processItem();
  endif;
  
  /* == Proccess Status == */
  if (isset($_POST['processStatus'])):
      $core->processStatus();
  endif;
  
  
  /* == Proccess Payment == */
  if (isset($_POST['processPayment'])):
      $core->processPayment();
  endif;
  
  /* == Proccess Shipping Mode == */
  if (isset($_POST['processShipmode'])):
      $core->processShipmode();
  endif;
  
  /* == Proccess Incoterms == */
  if (isset($_POST['processIncoterms'])):
      $core->processIncoterms();
  endif;
  
   /* == Proccess Shipping Line == */
  if (isset($_POST['processShipline'])):
      $core->processShipline();
  endif;
  
  /* == Proccess Shipping Rates == */
  if (isset($_POST['processShiprates'])):
      $core->processShiprates();
  endif;
  
  /* == Proccess Incoterms == */
  if (isset($_POST['Traslate'])):
      $core->Traslate();
  endif;

  /* == Delete News == */
  if (isset($_POST['deleteNews'])):
      $id = intval($_POST['deleteNews']);
      $db->delete(Core::nTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('News <strong>News</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Officce == */
  if (isset($_POST['deleteOffice'])):
      $id = intval($_POST['deleteOffice']);
      $db->delete(Core::oTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Office</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Courier Company == */
  if (isset($_POST['deleteCouriercom'])):
      $id = intval($_POST['deleteCouriercom']);
      $db->delete(Core::ccTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>Courier Company</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Packaging == */
  if (isset($_POST['deletePack'])):
      $id = intval($_POST['deletePack']);
      $db->delete(Core::ptTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>Courier Packaging Type</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Category Item == */
  if (isset($_POST['deleteItem'])):
      $id = intval($_POST['deleteItem']);
      $db->delete(Core::ciTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>Category Item Type</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Status == */
  if (isset($_POST['deleteStatus'])):
      $id = intval($_POST['deleteStatus']);
      $db->delete(Core::yTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Status</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  
   /* == Delete Payment == */
  if (isset($_POST['deletePayment'])):
      $id = intval($_POST['deletePayment']);
      $db->delete(Core::pmTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Method Payment</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete Shipping mode == */
  if (isset($_POST['deleteShipmode'])):
      $id = intval($_POST['deleteShipmode']);
      $db->delete(Core::smTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Shipping Mode</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Shipping line == */
  if (isset($_POST['deleteShipline'])):
      $id = intval($_POST['deleteShipline']);
      $db->delete(Core::slineTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Shipping Line</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Incoterms == */
  if (isset($_POST['deleteIncoterms'])):
      $id = intval($_POST['deleteIncoterms']);
      $db->delete(Core::incoTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Name Incoterms</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete Shipping Rates == */
  if (isset($_POST['deleteShiprates'])):
      $id = intval($_POST['deleteShiprates']);
      $db->delete(Core::raTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Shipping Rates</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete Courier == */
  if (isset($_POST['deleteCourier'])):
      $id = intval($_POST['deleteCourier']);
      $db->delete(Core::cTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>Shipment</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete Container == */
  if (isset($_POST['deleteCouriercontainer'])):
      $id = intval($_POST['deleteCouriercontainer']);
      $db->delete(Core::ctmpTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>item container</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Consolidate == */
  if (isset($_POST['deleteConsolidate'])):
      $con_tmp = intval($_POST['deleteConsolidate']);
      $db->delete(Core::contmpTable, "con_tmp='" . $con_tmp . "'");
	  $db->delete(Core::addcontaTable, "con_tmp='" . $con_tmp . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>item consolidate</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Container == */
  if (isset($_POST['deleteListcontainer'])):
      $id = intval($_POST['deleteListcontainer']);
	  $db->delete(Core::contaTable, "id='" . $id . "'");
      $db->delete(Core::cdetailTable, "idcon='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>item container</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Consolidate List == */
  if (isset($_POST['deleteListconsolidate'])):
      $idcon = intval($_POST['deleteListconsolidate']);
	  $db->delete(Core::consolTable, "idcon='" . $idcon . "'");
      $db->delete(Core::consproductTable, "idcon='" . $idcon . "'");
	  $db->delete(Core::addcontaTable, "idcon='" . $idcon . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>item container</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;

  /* == Proccess User == */
  if (isset($_POST['processUser'])):
      $user->processUser();
  endif;
  
  /* == Proccess Customer == */
  if (isset($_POST['processCustomer'])):
      $user->processCustomer();
  endif;
  /* == Proccess Customer == */
  if (isset($_POST['processDriver'])):
      $user->processDriver();
  endif;

  /* == Acctivate User == */
  if (isset($_POST['activateAccount'])):
      $user->activateAccount();
  endif;
  
  /* == Acctivate SMS Twilio == */
  if (isset($_POST['activateTwilio'])):
      $core->activateTwilio();
  endif;
  
  /* == Acctivate SMS Nexmo == */
  if (isset($_POST['activateNexmo'])):
      $core->activateNexmo();
  endif;
  
  /* == Acctivate SMS TEMPLATE == */
  if (isset($_POST['activateSMS'])):
      $core->activateSMS();
  endif;
  
  /* == Delete User == */
  if (isset($_POST['deleteUser'])):
      $id = intval($_POST['deleteUser']);
      if ($id == 1):
          Filter::msgError("<span>Error!</span>You cannot delete main Super Admin account!");
      else:
          $db->delete("users", "id='" . $id . "'");
          $username = sanitize($_POST['title']);
          print ($db->affected()) ? Filter::msgOk('User <strong>' . $username . '</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
      endif;
  endif;

  /* == User Search == */
  if (isset($_POST['userSearch'])):
      $string = sanitize($_POST['userSearch'], 15);

      if (strlen($string) > 3):
          $sql = "SELECT id, username, email, CONCAT(fname,' ',lname) as name" 
		  . "\n FROM users" 
		  . "\n WHERE MATCH (username) AGAINST ('" . $db->escape($string) . "*' IN BOOLEAN MODE)" 
		  . "\n ORDER BY username LIMIT 10";
          $display = '';
          if ($result = $db->fetch_all($sql)):
              $display .= '<ul id="searchresults">';
              foreach ($result as $row):
                  $link = 'index.php?do=users&amp;action=edit&amp;id=' . (int)$row->id;
                  $display .= '<li> <a href="' . $link . '"><p><i class="icon-chevron-sign-right"></i> ' . $row->username . ' - ' . $row->name . '</p>' . $row->email . '</a></li>';
              endforeach;
              $display .= '</ul>';
              print $display;
          endif;
      endif;
  endif;

  /* == Site Maintenance == */
  if (isset($_POST['processMaintenance'])):
      if (isset($_POST['inactive'])):
          $now = date('Y-m-d H:i:s');
          $diff = intval($_POST['days']);
          $expire = date("Y-m-d H:i:s", strtotime($now . -$diff . " days"));
          $db->delete("users", "lastlogin < '" . $expire . "' AND active = 'y' AND userlevel !=9");

          print ($db->affected()) ? Filter::msgOk('All (' . $db->affected() . ') inactive user(s) deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');

      elseif (isset($_POST['banned'])):
          $db->delete("users", "active = 'b'");
          print ($db->affected()) ? Filter::msgOk('All banned users deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
      endif;
  endif;
  
  /* == Delete SQL Backup == */
  if (isset($_POST['deleteBackup'])):
      $action = @unlink(BASEPATH . 'dashboard/backups/' . sanitize($_POST['deleteBackup']));

      print ($action) ? Filter::msgOk('<span>Success!</span>Backup deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;

  /* == Latest Sales Stats == */
  if (isset($_GET['getSaleStats'])):
      if (intval($_GET['getSaleStats']) == 0 || empty($_GET['getSaleStats'])):
          die();
      endif;

      $range = (isset($_GET['timerange'])) ? sanitize($_GET['timerange']) : 'month';
      $data = array();
      $data['order'] = array();
      $data['xaxis'] = array();
      $data['order']['label'] = '&nbsp;&nbsp;User Statistics';

      switch ($range) {
          case 'day':
              $date = date('Y-m-d');
              for ($i = 0; $i < 24; $i++) {
                  $query = $db->first("SELECT COUNT(*) AS total FROM users" 
				  . "\n WHERE DATE(created) = '" . $db->escape($date) . "'" 
				  . "\n AND HOUR(created) = '" . (int)$i . "'" 
				  . "\n GROUP BY HOUR(created) ORDER BY created ASC");

                  ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                  $data['xaxis'][] = array($i, date('H', mktime($i, 0, 0, date('n'), date('j'), date('Y'))));
              }
              break;
          case 'week':
              $date_start = strtotime('-' . date('w') . ' days');

              for ($i = 0; $i < 7; $i++) {
                  $date = date('Y-m-d', $date_start + ($i * 86400));
                  $query = $db->first("SELECT COUNT(*) AS total FROM users" 
				  . "\n WHERE DATE(created) = '" . $db->escape($date) . "'" 
				  . "\n GROUP BY DATE(created)");

                  ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                  $data['xaxis'][] = array($i, date('D', strtotime($date)));
              }

              break;
          default:
          case 'month':
              for ($i = 1; $i <= date('t'); $i++) {
                  $date = date('Y') . '-' . date('m') . '-' . $i;
                  $query = $db->first("SELECT COUNT(*) AS total FROM users" 
				  . "\n WHERE (DATE(created) = '" . $db->escape($date) . "')" 
				  . "\n GROUP BY DAY(created)");

                  ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                  $data['xaxis'][] = array($i, date('j', strtotime($date)));
              }
              break;
          case 'year':
              for ($i = 1; $i <= 12; $i++) {
                  $query = $db->first("SELECT COUNT(*) AS total FROM users" 
				  . "\n WHERE YEAR(created) = '" . date('Y') . "'" 
				  . "\n AND MONTH(created) = '" . $i . "'" 
				  . "\n GROUP BY MONTH(created)");

                  ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                  $data['xaxis'][] = array($i, date('M', mktime(0, 0, 0, $i, 1, date('Y'))));
              }
              break;
      }

      print json_encode($data);
  endif;
?>
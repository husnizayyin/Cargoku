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

  class Courier
  {
	  const cTable = "add_courier";
	  const contaTable = "add_container";
	  const cdetailTable = "detail_container";
	  const ctmpTable = "detail_container_tmp";
	  const contmpTable = "cons_tmp";
	  const consolTable = "consolidate";
	  const eTable = "email_templates";
	  const smsTable = "sms_templates";
	  const traTable = "courier_track";
	  const tTable = "settings";
	  const uTable = "users";
	  const oTable = "offices";
      const twTable = "textsms";
	  const tnxTable = "textsmsnexmo";
	  const sTable = "settings";
	  public $logged_in = null;
	  public $uid = 0;
	  public $userid = 0;
	  public $email;
	  public $name;
	  private static $db;
      

      /**
       * Users::__construct()
       */
	   
      function __construct()
      {
		  self::$db = Registry::get("Database");
		  $this->startSession();
      }
	  
	  
      /**
       * Users::startSession()
       */
	   
      private function startSession()
      {
          if (strlen(session_id()) < 1)
              session_start();

          $this->logged_in = $this->loginCheck();

          if (!$this->logged_in) {
              $this->username = $_SESSION['username'] = "Guest";
              $this->sesid = md5(session_id());
              $this->userlevel = 0;
          }
      }

	  /**
	   * Users::loginCheck()
	   */
	   
      private function loginCheck()
      {
          if (isset($_SESSION['username']) && $_SESSION['username'] != "Guest") {
			  
              $row = $this->getUserInfo($_SESSION['username']);
              $this->uid = $row->id;
              $this->username = $row->username;
              $this->email = $row->email;
              $this->name = $row->fname . ' ' . $row->lname;
              $this->userlevel = $row->userlevel;
			  $this->last = $row->lastlogin;
              return true;
          } else {
              return false;
          }
      }

	  /**
	   * Users::is_Admin()
	   */
	   
	  public function is_Admin()
	  {
		 if ($this->userlevel == 9) {	 
			return($this->userlevel == 9);
		} else {  
			return($this->userlevel == 2);
		}
	  }

	  /**
	   * Users::login()
	   */
	  public function login($username, $pass)
	  {

		  if ($username == "" && $pass == "") {
			  Filter::$msgs['username'] = 'Please enter valid username and password.';
		  } else {
			  $status = $this->checkStatus($username, $pass);
			  
              switch ($status) {
                  case 0:
                      Filter::$msgs['username'] = 'Login and/or password did not match to the database.';
                      break;

                  case 1:
                      Filter::$msgs['username'] = 'Your account has been banned.';
                      break;

                  case 2:
                      Filter::$msgs['username'] = 'Your account it\'s not activated.';
                      break;

                  case 3:
                      Filter::$msgs['username'] = 'You need to verify your email address.';
                      break;
              }
		  }
          if (empty(Filter::$msgs) && $status == 5) {
              $row = $this->getUserInfo($username);
              $this->uid = $_SESSION['userid'] = $row->id;
              $this->username = $_SESSION['username'] = $row->username;
              $this->email = $_SESSION['email'] = $row->email;
              $this->name = $_SESSION['name'] = $row->fname . ' ' . $row->lname;
              $this->userlevel = $_SESSION['userlevel'] = $row->userlevel;
			  $this->last = $_SESSION['last'] = $row->lastlogin;

			  $data = array(
					'lastlogin' => $this->lastlogin, 
					'lastip' => sanitize($_SERVER['REMOTE_ADDR'])
			  );

			  self::$db->update(self::uTable, $data, "username='" . $this->username . "'");
				  
			  return true;
		  } else
			  Filter::msgStatus();
	  }

      /**
       * Users::logout()
       */
	   
      public function logout()
      {
          unset($_SESSION['username']);
		  unset($_SESSION['email']);
		  unset($_SESSION['name']);
          unset($_SESSION['userid']);
          session_destroy();
		  session_regenerate_id();
          
          $this->logged_in = false;
          $this->username = "Guest";
          $this->userlevel = 0;
      }
	  
	   /**
	   * Users::getUserInfo()
	   */
	   
      private function getUserInfo($username)
      {
          $username = sanitize($username);
          $username = self::$db->escape($username);

          $sql = "SELECT * FROM " . self::uTable . " WHERE username = '" . $username . "'";
          $row = self::$db->first($sql);
          if (!$username)
              return false;

          return ($row) ? $row : 0;
      }
	  
	  /**
	   * Users::checkStatus()
	   */
	   
      public function checkStatus($username, $pass)
      {

          $username = sanitize($username);
          $username = self::$db->escape($username);
          $pass = sanitize($pass);

          $sql = "SELECT password, active FROM " . self::uTable 
		  . "\n WHERE username = '" . $username . "'";
          $result = self::$db->query($sql);

          if (self::$db->numrows($result) == 0)
              return 0;

          $row = self::$db->fetch($result);
          $entered_pass = md5($pass);

          switch ($row->active) {
              case "b":
                  return 1;
                  break;

              case "n":
                  return 2;
                  break;

              case "t":
                  return 3;
                  break;

              case "y" && $entered_pass == $row->password:
                  return 5;
                  break;
          }
      }
	  

	  /**
	   * Users::getUsers()
	   */
	   
	  public function getUsers($from = false)
	  {
		  
          $pager = Paginator::instance();
          $pager->items_total = countEntries(self::uTable);
          $pager->default_ipp = Registry::get("Core")->perpage;
          $pager->paginate();

		  $clause = (isset($clause)) ? $clause : null;

          if (isset($_GET['sort'])) {
              list($sort, $order) = explode("-", $_GET['sort']);
              $sort = sanitize($sort);
              $order = sanitize($order);
              if (in_array($sort, array(
                  "username",
                  "fname",
                  "lname",
                  "email"))
				  ) {
                  $ord = ($order == 'DESC') ? " DESC" : " ASC";
                  $sorting = $sort . $ord;
              } else {
                  $sorting = "created DESC";
              }
          } else {
              $sorting = "created DESC";
          }
		  
          if (isset($_POST['fromdate']) && $_POST['fromdate'] <> "" || isset($from) && $from != '') {
              $enddate = date("Y-m-d");
              $fromdate = (empty($from)) ? $_POST['fromdate'] : $from;
              if (isset($_POST['enddate']) && $_POST['enddate'] <> "") {
                  $enddate = $_POST['enddate'];
              }
              $clause .= " WHERE created BETWEEN '" . trim($fromdate) . "' AND '" . trim($enddate) . " 23:59:59'";
          } 
		  
          $sql = "SELECT *, CONCAT(fname,' ',lname) as name,"
		  . "\n DATE_FORMAT(created, '%d. %b. %Y %H:%i') as cdate,"
		  . "\n DATE_FORMAT(lastlogin, '%d. %b. %Y %H:%i') as adate"
		  . "\n FROM users WHERE (userlevel=2 OR userlevel=9)"
		  . "\n " . $clause
		  . "\n ORDER BY " . $sorting . $pager->limit;
          $row = self::$db->fetch_all($sql);
          
		  return ($row) ? $row : 0;
	  }
	  
	  
	  public function getCustomers($from = false)
	  {
		  
          $pager = Paginator::instance();
          $pager->items_total = countEntries(self::uTable);
          $pager->default_ipp = Registry::get("Core")->perpage;
          $pager->paginate();

		  $clause = (isset($clause)) ? $clause : null;

          if (isset($_GET['sort'])) {
              list($sort, $order) = explode("-", $_GET['sort']);
              $sort = sanitize($sort);
              $order = sanitize($order);
              if (in_array($sort, array(
                  "username",
                  "fname",
                  "lname",
                  "email"))
				  ) {
                  $ord = ($order == 'DESC') ? " DESC" : " ASC";
                  $sorting = $sort . $ord;
              } else {
                  $sorting = "created DESC";
              }
          } else {
              $sorting = "created DESC";
          }
		  
          if (isset($_POST['fromdate']) && $_POST['fromdate'] <> "" || isset($from) && $from != '') {
              $enddate = date("Y-m-d");
              $fromdate = (empty($from)) ? $_POST['fromdate'] : $from;
              if (isset($_POST['enddate']) && $_POST['enddate'] <> "") {
                  $enddate = $_POST['enddate'];
              }
              $clause .= " WHERE created BETWEEN '" . trim($fromdate) . "' AND '" . trim($enddate) . " 23:59:59'";
          } 
		  
          $sql = "SELECT *, CONCAT(fname,' ',lname) as name,"
		  . "\n DATE_FORMAT(created, '%d. %b. %Y %H:%i') as cdate,"
		  . "\n DATE_FORMAT(lastlogin, '%d. %b. %Y %H:%i') as adate"
		  . "\n FROM users WHERE userlevel=1"
		  . "\n " . $clause
		  . "\n ORDER BY " . $sorting . $pager->limit;
          $row = self::$db->fetch_all($sql);
          
		  return ($row) ? $row : 0;
	  }
	  
	  
		/**
	   * Courier::order_track()
	   */  
	   
		public function order_track()
		{
		//Prefix tracking	
		$sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql);
			$digits = $row->track_digit;
			
		$sql = "SELECT MAX(tracking) as tracking FROM " . self::cTable;//1
		
		$result = self::$db->query($sql);
			if(self::$db->numrows($result) > 0)
			{
				$row=mysqli_fetch_array($result);
				$cod=$row[0];
				$sig=$cod+1;				
				$Strsig = (string)$sig;
				$formato = str_pad($Strsig, "".$digits."", "0", STR_PAD_LEFT); 
			  
			}else{ 
				$sig=1;
				$Strsig = (string)$sig;
				$formato= str_pad($Strsig, "4", "0", STR_PAD_LEFT); 
			}
			return $formato;
		}
		
		public function order_prefix()
		{
			//Prefix tracking
			$sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql); 
			 
			$caracteres = $row->prefix; //posibles caracteres a usar
			$numerodeletras=1; //numero de letras para generar el texto
			$cadena = ""; //variable para almacenar la cadena generada
			for($i=1;$i<=$numerodeletras;$i++){
				$cadena .=($caracteres); /*Extraemos 1 caracter de los caracteres 
				entre el rango 0 a Numero de letras que tiene la cadena */
				
			}
			return $cadena;
		}

		
		
		/**
	   * Courier::container_track()
	   */  
	   
		public function container_track()
		{
		//Prefix tracking	
		$sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql);
			$digitc = $row->track_container;
			
		$sql = "SELECT MAX(tracking) as tracking FROM " . self::contaTable;//1
		
		$result = self::$db->query($sql);
			if(self::$db->numrows($result) > 0)
			{
				$row=mysqli_fetch_array($result);
				$cod=$row[0];
				$sig=$cod+1;				
				$Strsig = (string)$sig;
				$formato = str_pad($Strsig, "".$digitc."", "0", STR_PAD_LEFT); 
			  
			}else{ 
				$sig=1;
				$Strsig = (string)$sig;
				$formato= str_pad($Strsig, "4", "0", STR_PAD_LEFT); 
			}
			return $formato;
		}
		
		public function container_prefix()
		{
			//Prefix tracking
			$sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql); 
			 
			$caracteres = $row->prefix_con; //posibles caracteres a usar
			$numerodeletras=1; //numero de letras para generar el texto
			$cadena = ""; //variable para almacenar la cadena generada
			for($i=1;$i<=$numerodeletras;$i++){
				$cadena .=($caracteres); /*Extraemos 1 caracter de los caracteres 
				entre el rango 0 a Numero de letras que tiene la cadena */
				
			}
			return $cadena;
		}
		
	   /**
	   * Courier::order_track_consolidate()
	   */  
	   
		public function ordertrack_consolidate()
		{
		//Prefix tracking	
		$sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql);
			$digit_con = $row->track_consolidate;
			
		$sql = "SELECT MAX(tracking) as tracking FROM " . self::consolTable;//1
		
		$result = self::$db->query($sql);
			if(self::$db->numrows($result) > 0)
			{
				$row=mysqli_fetch_array($result);
				$cod=$row[0];
				$sig=$cod+1;				
				$Strsig = (string)$sig;
				$formato = str_pad($Strsig, "".$digit_con."", "0", STR_PAD_LEFT); 
			  
			}else{ 
				$sig=1;
				$Strsig = (string)$sig;
				$formato= str_pad($Strsig, "4", "0", STR_PAD_LEFT); 
			}
			return $formato;
		}
		
		public function order_prefix_consolidate()
		{
			//Prefix tracking
			$sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql); 
			 
			$caracteres = $row->prefix_consolidate; //posibles caracteres a usar
			$numerodeletras=1; //numero de letras para generar el texto
			$cadena = ""; //variable para almacenar la cadena generada
			for($i=1;$i<=$numerodeletras;$i++){
				$cadena .=($caracteres); /*Extraemos 1 caracter de los caracteres 
				entre el rango 0 a Numero de letras que tiene la cadena */
			}
			return $cadena;
		}	
		

		
	  /**
	   * Users::processCourier()
	   */
	   
	  
	  public function processCourier()
	  {		
		  if (!Filter::$id) {
			  if (empty($_POST['r_name']))
				  Filter::$msgs['r_name'] = 'Please enter the full name Sender';
		  }
		  
		  if (!Filter::$id) {
			  if (empty($_POST['s_name']))
				  Filter::$msgs['s_name'] = 'Please enter the full name';
		  }

		  //Prefix tracking
		  $sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql);
		  
		  if (!Filter::$id) {
			  if ($this->trackExists($_POST['tracking']))
				  Filter::$msgs['tracking'] = 'The tracking number entered is already in use.. <b>"'.$row->prefix.''.$_POST['tracking'].'"</b>';
		  }
			  
		  if (empty($_POST['r_address']))
			  Filter::$msgs['r_address'] = 'Please Enter Address'; 

		  if (empty($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Please Enter Valid Email Address';
		  if (!$this->isValidEmail($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Entered Email Address Is Not Valid.';	
		  
		  if (empty($_POST['r_phone']))
			  Filter::$msgs['r_phone'] = 'Please Enter Code Phone';		  
		  if (empty($_POST['rc_phone']))
			  Filter::$msgs['rc_phone'] = 'Please Enter Cell Phone';
		  if (empty($_POST['r_dest']))
			  Filter::$msgs['r_dest'] = 'Please Enter Destination';
		  if (empty($_POST['r_city']))
			  Filter::$msgs['r_city'] = 'Please Enter City';
		  if (empty($_POST['r_postal']))
			  Filter::$msgs['r_postal'] = 'Please Enter Postal Code';		  
		  if (empty($_POST['collection_courier']))
			  Filter::$msgs['collection_courier'] = 'Please Enter Date Collection';
		  if (empty($_POST['r_qnty']))
			  Filter::$msgs['r_qnty'] = 'Please Enter Quantity';
		  if (empty($_POST['r_weight']))
			  Filter::$msgs['r_weight'] = 'Please Enter Weight Package';
		  if (empty($_POST['r_description']))
			  Filter::$msgs['r_description'] = 'Please Enter Description Package';
		  if (empty($_POST['length']))
			  Filter::$msgs['length'] = 'Please Enter Box Length';
		  if (empty($_POST['width']))
			  Filter::$msgs['width'] = 'Please Enter Box Width';
		  if (empty($_POST['height']))
			  Filter::$msgs['height'] = 'Please Enter Box Height';
		  if (empty($_POST['r_custom']))
			  Filter::$msgs['r_custom'] = 'Please Enter Custom Value';

		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'tracking' => sanitize($_POST['tracking']),			  
				  's_name' => sanitize($_POST['s_name']), 
				  'address' => sanitize($_POST['address']), 
				  'phone' => sanitize($_POST['phone']),
				  'country' => sanitize($_POST['country']),				  
				  'city' => sanitize($_POST['city']),
				  'postal' => sanitize($_POST['postal']),
				  'email' => sanitize($_POST['email']),
				  'username' => sanitize($_POST['username']),
				  'r_name' => sanitize($_POST['r_name']),
				  'r_email' => sanitize($_POST['r_email']),
				  'r_address' => sanitize($_POST['r_address']),
				  'r_phone' => sanitize($_POST['r_phone']),
				  'rc_phone' => sanitize($_POST['rc_phone']), 
				  'r_dest' => sanitize($_POST['r_dest']),
				  'r_city' => sanitize($_POST['r_city']), 
				  'r_postal' => sanitize($_POST['r_postal']), 
				  'origin_off' => sanitize($_POST['origin_off']), 
				  'package' => sanitize($_POST['package']), 				  
				  'deli_time' => sanitize($_POST['deli_time']),				  
				  'courier' => sanitize($_POST['courier']),
				  'service_options' => sanitize($_POST['service_options']),
				  'collection_courier' => sanitize($_POST['collection_courier']),
				  'r_tax' => sanitize($_POST['r_tax']),
				  'r_insurance' => sanitize($_POST['r_insurance']),
				  'itemcat' => sanitize($_POST['itemcat']),
				  'r_qnty' => sanitize($_POST['r_qnty']),
				  'r_weight' => sanitize($_POST['r_weight']),
				  'v_weight' => sanitize($_POST['v_weight']),
				  'r_description' => sanitize($_POST['r_description']), 
				  'length' => sanitize($_POST['length']),
				  'width' => sanitize($_POST['width']),
				  'height' => sanitize($_POST['height']),
				  'r_custom' => sanitize($_POST['r_custom']),
				  'pay_mode' => sanitize($_POST['pay_mode']),
				  'r_curren' => sanitize($_POST['r_curren']),
				  'r_costtotal' => sanitize($_POST['r_costtotal']),
				  'c_driver' => sanitize($_POST['c_driver']),
				  'status_courier' => sanitize($_POST['status_courier'])
			  );

              if (!Filter::$id)
                  $data['created'] = "NOW()";
			  
			  if (!Filter::$id)
                  $data['r_hour'] = "NOW()";
			  
			  if (!Filter::$id)
                  $data['act_status'] = 1;
			  
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
			  //Prefix tracking
			  $sql = "SELECT * FROM " . self::tTable;
				$row = self::$db->first($sql);
				
			  if (!Filter::$id)
                  $data['letter_or'] = "".$row->prefix."";

			  if (!Filter::$id)
                  $data['order_inv'] = "".$row->prefix."".$_POST['tracking'].""; 
			  
			  //Calculate weight Volumetric
				$l=$_POST['length']; 
				$w=$_POST['width']; 
				$h=$_POST['height'];
				$z=$l*$w*$h/$row->meter;
				
				if (!Filter::$id)
                  $data['v_weight'] = "".$z."";
			  
			  //Calculate percentage Tax
			   $t_tax = $_POST['r_costtotal']*$row->tax/100;
				
				if (!Filter::$id)
                  $data['total_tax'] = "".$t_tax."";
			  
			  //Calculate percentage Insurance
			   $t_insu = $_POST['r_custom']*$row->insurance/100;
				
				if (!Filter::$id)
                  $data['total_insurance'] = "".$t_insu."";
			  
			
			  
				//database update and insert  
              (Filter::$id) ? self::$db->update(self::cTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::cTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>User updated successfully!' : '<span>Success!</span>Courier added successfully! | your tracking is # <b>"'.$data['letter_or'].''.$data['tracking'].'"</b>';
			  
			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
				  require_once (BASEPATH . "lib/class_mailer.php");
				  
				  $actlink = Registry::get("Core")->site_url . "/track_shipment.php";
				  $row = Registry::get("Core")->getRowById("email_templates", 16);
				  
                  $body = str_replace(array(
					  '[SNAME]',
					  '[NAME]',
					  '[DESTINATION]',
					  '[ADDRESS]',
					  '[DELIVERY_TIME]',
					  '[COURIER]',
					  '[TRACKING]',
					  '[COLLECTION_COURIER]',
					  '[DESCRIPTION]',
					  '[URL]',
                      '[LINK]',
					  '[SITE_NAME]'), array(
					  $data['s_name'],
					  $data['r_name'],
					  $data['r_dest'],
					  $data['r_address'],
					  $data['deli_time'],
					  $data['status_courier'],
					  $data['order_inv'],
					  $data['collection_courier'],
					  $data['r_description'],
                      Registry::get("Core")->site_url,
					  $actlink,
                      Registry::get("Core")->site_name), $row->body);
						
				 $newbody = cleanOut($body);	

				  $mailer = $mail->sendMail();
                  $message = Swift_Message::newInstance()
							->setSubject($row->subject)
							->setTo(array($data['r_email'] => $data['r_name']))
							->setFrom(array(Registry::get("Core") ->site_email => Registry::get("Core")->site_name))
							->setBody($newbody, 'text/html');
							
				 $mailer->send($message); 
				
				require_once (BASEPATH . "lib/NexmoMessage.php");
					require __DIR__ . '/twilio/Twilio/autoload.php';

					include 'notifysms.php';
					//create object of PayPalExpress
					$smsnotify = new NotifySms();
					$items = $smsnotify->get_listsms();
					
					$sql_2 = "SELECT * FROM " . self::twTable;
					$twi = self::$db->first($sql_2);
					
					$sql_3 = "SELECT * FROM " . self::tnxTable;
					$nexmo = self::$db->first($sql_3);
					
					$sql_5 = "SELECT * FROM " . self::sTable;
					$settings = self::$db->first($sql_5);
				  
				    while ($item = $items->fetch_assoc()):
						if ($item['active'] == 1){
							if ($twi->active_twi == 1){ 
								
								// new Twilio.
								$account_sid = ''.$twi->account_sid.'';
								$auth_token = ''.$twi->auth_token.'';
								$twilio_number = "".$twi->twilio_number."";
								$client = new Twilio\Rest\Client($account_sid, $auth_token);
								$client->messages->create(
									'+'.$data['rc_phone'].'',
									array(
										'from' => $twilio_number,
										'body' => ''.$data['r_name'].', '.$item['body1'].' '.$data['order_inv'].', '.$item['body2'].' '.$data['collection_courier'].', '.$item['body3'].' '.$settings->site_url.''
									)
								);
								
							}else if ($nexmo->active_nex == 1){
								// new NexmoMessage.
								$nexmo_sms = new NexmoMessage(''.$nexmo->api_key.'', ''.$nexmo->api_secret.'');
								$info = $nexmo_sms->sendText( ''.$data['rc_phone'].'', 'DEPRIXA PRO', ''.$data['r_name'].', '.$item['body1'].' '.$data['order_inv'].', '.$item['body2'].', '.$data['collection_courier'].', '.$item['body3'].', '.$settings->site_url.'' );
							}else{
								// echo 'success'.
							}	
						}	
					endwhile;	
				    

              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	  /**
	   * Users::processContainer()
	   */
	   
	  
	  public function processContainer()
	  {
		  
		  if (!Filter::$id) {
			  if (empty($_POST['r_name']))
				  Filter::$msgs['r_name'] = 'Please enter the full name Sender';
		  }
		  
		  //Prefix tracking
		  $sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql);
		  
		  if (!Filter::$id) {
			  if ($this->trackcontainerExists($_POST['tracking']))
				  Filter::$msgs['tracking'] = 'The tracking number entered is already in use.. <b>"'.$row->prefix_con.''.$_POST['tracking'].'"</b>';
		  }
			  
		  if (empty($_POST['r_address']))
			  Filter::$msgs['r_address'] = 'Please Enter Address'; 

		  if (empty($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Please Enter Valid Email Address';		 
		  
		  if (empty($_POST['r_phone']))
			  Filter::$msgs['r_phone'] = 'Please Enter Code Phone';		  
		  if (empty($_POST['r_dest']))
			  Filter::$msgs['r_dest'] = 'Please Enter Destination';
		  if (empty($_POST['r_city']))
			  Filter::$msgs['r_city'] = 'Please Enter City';
		  if (empty($_POST['r_postal']))
			  Filter::$msgs['r_postal'] = 'Please Enter Postal Code';		  
		  if (empty($_POST['expiration_date']))
			  Filter::$msgs['expiration_date'] = 'Please Enter expiration date';
		  if (empty($_POST['s_week']))
			  Filter::$msgs['s_week'] = 'Please Enter Week';
		  if (empty($_POST['incoterms']))
			  Filter::$msgs['incoterms'] = 'Please Enter Incoterms';
		  if (empty($_POST['pay_mode']))
			  Filter::$msgs['pay_mode'] = 'Please Enter pay mode';
		  
		  if (empty($_POST['length']))
			  Filter::$msgs['length'] = 'Please Enter Box Length';
		  if (empty($_POST['width']))
			  Filter::$msgs['width'] = 'Please Enter Box Width';
		  if (empty($_POST['height']))
			  Filter::$msgs['height'] = 'Please Enter Box Height';
		  if (empty($_POST['n_weight']))
			  Filter::$msgs['n_weight'] = 'Please Enter Nett weight';
		  if (empty($_POST['g_weight']))
			  Filter::$msgs['g_weight'] = 'Please Enter Gross weight';

		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'tracking' => sanitize($_POST['tracking']),
				  'idcon' => sanitize($_POST['idcon']),
				  'username' => sanitize($_POST['username']),
				  'r_name' => sanitize($_POST['r_name']),
				  'r_email' => sanitize($_POST['r_email']),
				  'r_address' => sanitize($_POST['r_address']),
				  'r_phone' => sanitize($_POST['r_phone']),
				  'r_dest' => sanitize($_POST['r_dest']),
				  'r_city' => sanitize($_POST['r_city']), 
				  'r_postal' => sanitize($_POST['r_postal']), 
				  'origin_port' => sanitize($_POST['origin_port']), 
				  'destination_port' => sanitize($_POST['destination_port']), 
				  's_week' => sanitize($_POST['s_week']),
				  'expiration_date' => sanitize($_POST['expiration_date']),
				  'package' => sanitize($_POST['package']),				  
				  'courier' => sanitize($_POST['courier']),
				  'ship_mode' => sanitize($_POST['ship_mode']),
				  'deli_time' => sanitize($_POST['deli_time']),
				  'status_courier' => sanitize($_POST['status_courier']),
				  'incoterms' => sanitize($_POST['incoterms']),
				  'pay_mode' => sanitize($_POST['pay_mode']),
				  'r_curren' => sanitize($_POST['r_curren']),
				  'r_tax' => sanitize($_POST['r_tax']),
				  'r_insurance' => sanitize($_POST['r_insurance']),
				  's_description' => sanitize($_POST['s_description']),
				  'length' => sanitize($_POST['length']),
				  'width' => sanitize($_POST['width']),
				  'height' => sanitize($_POST['height']),
				  'n_weight' => sanitize($_POST['n_weight']),
				  'g_weight' => sanitize($_POST['g_weight'])
			  );
			  

              if (!Filter::$id)
                  $data['created'] = "NOW()";
			  
			  
			  if (!Filter::$id)
                  $data['r_hour'] = "NOW()";
			  
			  if (!Filter::$id)
                  $data['act_status'] = 3;
			  
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
			  //Prefix tracking
			  $sql = "SELECT * FROM " . self::tTable;
				$row = self::$db->first($sql);
				
			  if (!Filter::$id)
                  $data['letter_or'] = "".$row->prefix_con."";

			  if (!Filter::$id)
                  $data['order_inv'] = "".$row->prefix_con."".$_POST['tracking'].""; 
				
				//database update and insert
	
              (Filter::$id) ? self::$db->update(self::contaTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::contaTable, $data );
              $message = (Filter::$id) ? '<span>Success!</span>Conatiner updated successfully!' : '<script type="text/javascript"> window.location="client_container.php";</script> <span>Success!</span>Container  added successfully! | your tracking is # <b>"'.$data['letter_or'].''.$data['tracking'].'"</b>';

			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
					self::$db->query("INSERT INTO detail_container SELECT * FROM detail_container_tmp WHERE level = '".$_SESSION['username']."'");
					
				
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
			
			self::$db->delete(self::ctmpTable);
      }
	  
	  
	  /**
	   * Users::processContainer_update()
	   */
	   
	  
	  public function processContainer_update()
	  {
		  
		  if (empty($_POST['expiration_date']))
			  Filter::$msgs['expiration_date'] = 'Please Enter expiration date';
		  if (empty($_POST['s_week']))
			  Filter::$msgs['s_week'] = 'Please Enter Week';
		  if (empty($_POST['incoterms']))
			  Filter::$msgs['incoterms'] = 'Please Enter Incoterms';
		  if (empty($_POST['pay_mode']))
			  Filter::$msgs['pay_mode'] = 'Please Enter pay mode';
		  
		  if (empty($_POST['length']))
			  Filter::$msgs['length'] = 'Please Enter Box Length';
		  if (empty($_POST['width']))
			  Filter::$msgs['width'] = 'Please Enter Box Width';
		  if (empty($_POST['height']))
			  Filter::$msgs['height'] = 'Please Enter Box Height';
		  if (empty($_POST['n_weight']))
			  Filter::$msgs['n_weight'] = 'Please Enter Nett weight';
		  if (empty($_POST['g_weight']))
			  Filter::$msgs['g_weight'] = 'Please Enter Gross weight';

		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'origin_port' => sanitize($_POST['origin_port']), 
				  'destination_port' => sanitize($_POST['destination_port']), 
				  's_week' => sanitize($_POST['s_week']),
				  'expiration_date' => sanitize($_POST['expiration_date']),
				  'package' => sanitize($_POST['package']),				  
				  'courier' => sanitize($_POST['courier']),
				  'ship_mode' => sanitize($_POST['ship_mode']),
				  'deli_time' => sanitize($_POST['deli_time']),
				  'status_courier' => sanitize($_POST['status_courier']),
				  'incoterms' => sanitize($_POST['incoterms']),
				  'pay_mode' => sanitize($_POST['pay_mode']),
				  'r_curren' => sanitize($_POST['r_curren']),
				  'r_tax' => sanitize($_POST['r_tax']),
				  'r_insurance' => sanitize($_POST['r_insurance']),
				  's_description' => sanitize($_POST['s_description']),
				  'length' => sanitize($_POST['length']),
				  'width' => sanitize($_POST['width']),
				  'height' => sanitize($_POST['height']),
				  'n_weight' => sanitize($_POST['n_weight']),
				  'g_weight' => sanitize($_POST['g_weight'])
			  );
			  
             
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
				
				//database update and insert
	
              (Filter::$id) ? self::$db->update(self::contaTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::contaTable, $data );
              $message = (Filter::$id) ? '<script type="text/javascript"> window.location="container.php?do=list_container";</script><span>Success!</span>Conatiner updated successfully!' : '';

			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	   /**
	   * Users::processCourier_online()
	   */
	   
	  
	  public function processCourier_online()
	  {
		  
		  if (!Filter::$id) {
			  if (empty($_POST['r_name']))
				  Filter::$msgs['r_name'] = 'Please enter the full name Sender';
		  }
		  
		  if (!Filter::$id) {
			  if (empty($_POST['s_name']))
				  Filter::$msgs['s_name'] = 'Please enter the full name';
		  }
		  
		  //Prefix tracking
		  $sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql);
		  
		  if (!Filter::$id) {
			  if ($this->trackExists($_POST['tracking']))
				  Filter::$msgs['tracking'] = 'The tracking number entered is already in use.. <b>"'.$row->prefix.''.$_POST['tracking'].'"</b>';
		  }
			  
		  if (empty($_POST['r_address']))
			  Filter::$msgs['r_address'] = 'Please Enter Address'; 

		  if (empty($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Please Enter Valid Email Address';
		  if (!$this->isValidEmail($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Entered Email Address Is Not Valid.';	
		  
		  if (empty($_POST['r_phone']))
			  Filter::$msgs['r_phone'] = 'Please Enter Code Phone';		  
		  if (empty($_POST['rc_phone']))
			  Filter::$msgs['rc_phone'] = 'Please Enter Cell Phone';
		  if (empty($_POST['r_dest']))
			  Filter::$msgs['r_dest'] = 'Please Enter Destination';
		  if (empty($_POST['r_city']))
			  Filter::$msgs['r_city'] = 'Please Enter City';
		  if (empty($_POST['r_postal']))
			  Filter::$msgs['r_postal'] = 'Please Enter Postal Code';		  
		  if (empty($_POST['r_qnty']))
			  Filter::$msgs['r_qnty'] = 'Please Enter Quantity';
		  if (empty($_POST['r_weight']))
			  Filter::$msgs['r_weight'] = 'Please Enter Weight Package';
		  if (empty($_POST['r_description']))
			  Filter::$msgs['r_description'] = 'Please Enter Description Package';
		  if (empty($_POST['length']))
			  Filter::$msgs['length'] = 'Please Enter Box Length';
		  if (empty($_POST['width']))
			  Filter::$msgs['width'] = 'Please Enter Box Width';
		  if (empty($_POST['height']))
			  Filter::$msgs['height'] = 'Please Enter Box Height';
		  if (empty($_POST['r_custom']))
			  Filter::$msgs['r_custom'] = 'Please Enter Custom Value';
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'tracking' => sanitize($_POST['tracking']),			  
				  's_name' => sanitize($_POST['s_name']), 
				  'address' => sanitize($_POST['address']), 
				  'phone' => sanitize($_POST['phone']),
				  'country' => sanitize($_POST['country']),				  
				  'city' => sanitize($_POST['city']),
				  'postal' => sanitize($_POST['postal']),
				  'email' => sanitize($_POST['email']),
				  'username' => sanitize($_POST['username']),
				  'r_name' => sanitize($_POST['r_name']),
				  'r_email' => sanitize($_POST['r_email']),
				  'r_address' => sanitize($_POST['r_address']),
				  'r_phone' => sanitize($_POST['r_phone']),
				  'rc_phone' => sanitize($_POST['rc_phone']), 
				  'r_dest' => sanitize($_POST['r_dest']),
				  'r_city' => sanitize($_POST['r_city']), 
				  'r_postal' => sanitize($_POST['r_postal']), 
				  'package' => sanitize($_POST['package']), 
				  'deli_time' => sanitize($_POST['deli_time']),	
				  'courier' => sanitize($_POST['courier']),
				  'service_options' => sanitize($_POST['service_options']),
				  'r_tax' => sanitize($_POST['r_tax']),
				  'r_insurance' => sanitize($_POST['r_insurance']),
				  'itemcat' => $_POST['itemcat'],
				  'r_qnty' => sanitize($_POST['r_qnty']),
				  'r_weight' => sanitize($_POST['r_weight']),
				  'v_weight' => sanitize($_POST['v_weight']),
				  'r_description' => sanitize($_POST['r_description']), 
				  'length' => sanitize($_POST['length']),
				  'width' => sanitize($_POST['width']),
				  'height' => sanitize($_POST['height']),
				  'r_custom' => sanitize($_POST['r_custom']),
				  'pay_mode' => sanitize($_POST['pay_mode']),
				  'r_curren' => sanitize($_POST['r_curren']),
				  'r_costtotal' => sanitize($_POST['r_costtotal']),
				  'status_courier' => sanitize($_POST['status_courier']) 
			  );

              if (!Filter::$id)
                  $data['created'] = "NOW()";
			  
			  if (!Filter::$id)
                  $data['r_hour'] = "NOW()";

			  
			  //Prefix tracking
			  $sql = "SELECT * FROM " . self::tTable;
				$row = self::$db->first($sql);
				
			  if (!Filter::$id)
                  $data['letter_or'] = "".$row->prefix."";

			  if (!Filter::$id)
                  $data['order_inv'] = "".$row->prefix."".$_POST['tracking'].""; 
			  
			  //Calculate weight Volumetric
				$l=$_POST['length']; 
				$w=$_POST['width']; 
				$h=$_POST['height'];
				$z=$l*$w*$h/$row->meter;
				
				if (!Filter::$id)
                  $data['v_weight'] = "".$z."";
			  
			  //Calculate percentage Tax
			   $t_tax = $_POST['r_costtotal']*$row->tax/100;
				
				if (!Filter::$id)
                  $data['total_tax'] = "".$t_tax."";
			  
			  //Calculate percentage Insurance
			   $t_insu = $_POST['r_custom']*$row->insurance/100;
				
				if (!Filter::$id)
                  $data['total_insurance'] = "".$t_insu."";
			  
			  if (!Filter::$id)
                  $data['act_status'] = 0;
			  
				//database update and insert  
              (Filter::$id) ? self::$db->update(self::cTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::cTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>User updated successfully!' : '<span>Success!</span>Courier added Online successfully! | your tracking is # <b>"'.$data['letter_or'].''.$data['tracking'].'"</b>';
			  
			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	  /**
       * User::Update Courier()
       */
	  
	  public function processUCourier()
	  {
		  
		  if (!Filter::$id) {
			  if (empty($_POST['r_name']))
				  Filter::$msgs['r_name'] = 'Please enter the full name Sender';
		  }
		  
		  if (!Filter::$id) {
			  if (empty($_POST['s_name']))
				  Filter::$msgs['s_name'] = 'Please enter the full name';
		  }
		  		  
			  
		  if (empty($_POST['r_address']))
			  Filter::$msgs['r_address'] = 'Please Enter Address'; 

		  if (empty($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Please Enter Valid Email Address';
		  if (!$this->isValidEmail($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Entered Email Address Is Not Valid.';	
		  
		  if (empty($_POST['r_phone']))
			  Filter::$msgs['r_phone'] = 'Please Enter Code Phone';		  
		  if (empty($_POST['rc_phone']))
			  Filter::$msgs['rc_phone'] = 'Please Enter Cell Phone';
		  if (empty($_POST['r_dest']))
			  Filter::$msgs['r_dest'] = 'Please Enter Destination';
		  if (empty($_POST['r_city']))
			  Filter::$msgs['r_city'] = 'Please Enter City';
		  if (empty($_POST['r_postal']))
			  Filter::$msgs['r_postal'] = 'Please Enter Postal Code';		  
		  if (empty($_POST['collection_courier']))
			  Filter::$msgs['collection_courier'] = 'Please Enter Date Collection';
		  if (empty($_POST['r_qnty']))
			  Filter::$msgs['r_qnty'] = 'Please Enter Quantity';
		  if (empty($_POST['r_weight']))
			  Filter::$msgs['r_weight'] = 'Please Enter Weight Package';
		  if (empty($_POST['r_description']))
			  Filter::$msgs['r_description'] = 'Please Enter Description Package';
		  if (empty($_POST['length']))
			  Filter::$msgs['length'] = 'Please Enter Box Length';
		  if (empty($_POST['width']))
			  Filter::$msgs['width'] = 'Please Enter Box Width';
		  if (empty($_POST['height']))
			  Filter::$msgs['height'] = 'Please Enter Box Height';
		  if (empty($_POST['r_custom']))
			  Filter::$msgs['r_custom'] = 'Please Enter Custom Value';

		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(			  
				  's_name' => sanitize($_POST['s_name']), 
				  'address' => sanitize($_POST['address']), 
				  'phone' => sanitize($_POST['phone']),
				  'country' => sanitize($_POST['country']),				  
				  'city' => sanitize($_POST['city']),
				  'postal' => sanitize($_POST['postal']),
				  'email' => sanitize($_POST['email']),
				  'r_name' => sanitize($_POST['r_name']),
				  'r_email' => sanitize($_POST['r_email']),
				  'r_address' => sanitize($_POST['r_address']),
				  'r_phone' => sanitize($_POST['r_phone']),
				  'rc_phone' => sanitize($_POST['rc_phone']), 
				  'r_dest' => sanitize($_POST['r_dest']),
				  'r_city' => sanitize($_POST['r_city']), 
				  'r_postal' => sanitize($_POST['r_postal']), 
				  'origin_off' => sanitize($_POST['origin_off']), 
				  'package' => sanitize($_POST['package']), 				  
				  'deli_time' => sanitize($_POST['deli_time']),				  
				  'courier' => sanitize($_POST['courier']),
				  'order_inv' => sanitize($_POST['order_inv']),
				  'service_options' => sanitize($_POST['service_options']),
				  'collection_courier' => sanitize($_POST['collection_courier']),
				  'r_tax' => sanitize($_POST['r_tax']),
				  'r_insurance' => sanitize($_POST['r_insurance']),
				  'itemcat' => sanitize($_POST['itemcat']),
				  'r_qnty' => sanitize($_POST['r_qnty']),
				  'r_weight' => sanitize($_POST['r_weight']),
				  'v_weight' => sanitize($_POST['v_weight']),
				  'r_description' => sanitize($_POST['r_description']), 
				  'length' => sanitize($_POST['length']),
				  'width' => sanitize($_POST['width']),
				  'height' => sanitize($_POST['height']),
				  'r_custom' => sanitize($_POST['r_custom']),
				  'r_curren' => sanitize($_POST['r_curren']),
				  'r_costtotal' => sanitize($_POST['r_costtotal']),
				  'status_courier' => sanitize($_POST['status_courier'])
			  );
			  
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";

			  //Prefix tracking
			  $sql = "SELECT * FROM " . self::tTable;
				$row = self::$db->first($sql);
			  
				$l=$_POST['length']; 
				$w=$_POST['width']; 
				$h=$_POST['height'];
				$z=$l*$w*$h/$row->meter;
				
				if (!Filter::$id)
                  $data['v_weight'] = "".$z."";

			  if (!Filter::$id)
                  $data['letter_or'] = "".$row->prefix."";

			  if (!Filter::$id)
                  $data['order_inv'] = "".$row->prefix."".$_POST['tracking'].""; 
			  
			  
				//database update and insert  
              (Filter::$id) ? self::$db->update(self::cTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::cTable, $data);
              $message = (Filter::$id) ? ' <span>Success!</span>Shipping updated successfully!' : '';
			  
			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
				   require_once (BASEPATH . "lib/class_mailer.php");
				  
				  $actlink = Registry::get("Core")->site_url . "/login.php";
				  $row = Registry::get("Core")->getRowById("email_templates", 18);
				  
                  $body = str_replace(array(
					  '[NAME]',
					  '[TRACKING]',
					  '[COURIER]',					  
					  '[URL]',
                      '[LINK]',
					  '[SITE_NAME]'), array(
					  $data['s_name'],
					  $data['order_inv'],
					  $data['status_courier'],					  
                      Registry::get("Core")->site_url,
					  $actlink,
                      Registry::get("Core") ->site_name), $row->body);
						
				 $newbody = cleanOut($body);	

				  $mailer = $mail->sendMail();
                  $message = Swift_Message::newInstance()
							->setSubject($row->subject)
							->setTo(array($data['email'] => $data['s_name']))
							->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
							->setBody($newbody, 'text/html');
							
				 $mailer->send($message); 
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	  	  /**
       * User::Update Courier()
       */
	  
	  public function processCourierrejected()
	  {
		  
		  if (!Filter::$id) {
			  if (empty($_POST['status_courier']))
				  Filter::$msgs['status_courier'] = 'Please enter the status courier';
		  }
		  
		  if (!Filter::$id) {
			  if (empty($_POST['reasons']))
				  Filter::$msgs['reasons'] = 'Please enter Reasons';
		  }

		  if (empty(Filter::$msgs)) {
			  
			  $data = array(			  
				  'status_courier' => sanitize($_POST['status_courier']), 				  
				  'act_status' => sanitize($_POST['act_status']),
				  'reasons' => sanitize($_POST['reasons'])
			  );

			  
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			 
			  
				//database update and insert  
              (Filter::$id) ? self::$db->update(self::cTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::cTable, $data);
              $message = (Filter::$id) ? ' <span>Success!</span>Shipping Rejected successfully!' : '';
			  
			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	   /**
	   * Users::processConsolidate()
	   */
	   
	  
	  public function processConsolidate()
	  {
		  
		  //Prefix tracking
		  $sql = "SELECT * FROM " . self::tTable;
			$row = self::$db->first($sql);
		  
		  if (!Filter::$id) {
			  if ($this->trackconsolidateExists($_POST['tracking']))
				  Filter::$msgs['tracking'] = 'The tracking number entered is already in use.. <b>"'.$row->prefix_con.''.$_POST['tracking'].'"</b>';
		  }
			  
		  if (empty($_POST['r_address']))
			  Filter::$msgs['r_address'] = 'Please Enter Address'; 

		  if (empty($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Please Enter Valid Email Address';		 
		  
		  if (empty($_POST['r_phone']))
			  Filter::$msgs['r_phone'] = 'Please Enter Code Phone';		  
		  if (empty($_POST['r_dest']))
			  Filter::$msgs['r_dest'] = 'Please Enter Destination';
		  if (empty($_POST['c_driver']))
			  Filter::$msgs['c_driver'] = 'Please Enter Driver';
		  if (empty($_POST['pay_mode']))
			  Filter::$msgs['pay_mode'] = 'Please Enter payment mode';
		  if (empty($_POST['code_off']))
			  Filter::$msgs['code_off'] = 'Please Enter Code Office';
		  if (empty($_POST['status_courier']))
			  Filter::$msgs['status_courier'] = 'Please Enter Status Courier';
		  if (empty($_POST['courier']))
			  Filter::$msgs['courier'] = 'Please Enter Company Courier';
		  if (empty($_POST['r_declarate']))
			  Filter::$msgs['r_declarate'] = 'Please Enter Value Declarate';

		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'tracking' => sanitize($_POST['tracking']),
				  'idcon' => sanitize($_POST['idcon']),
				  'seals' => sanitize($_POST['seals']),				  
				  'username' => sanitize($_POST['username']),
				  'r_name' => sanitize($_POST['r_name']),
				  'r_email' => sanitize($_POST['r_email']),
				  'r_address' => sanitize($_POST['r_address']),
				  'r_phone' => sanitize($_POST['r_phone']),
				  'r_dest' => sanitize($_POST['r_dest']),
				  'c_address' => sanitize($_POST['c_address']), 
				  'r_declarate' => sanitize($_POST['r_declarate']), 
				  'r_qnty' => sanitize($_POST['r_qnty']), 
				  'r_weight' => sanitize($_POST['r_weight']), 
				  'code_off' => sanitize($_POST['code_off']), 
				  'c_add_pound' => sanitize($_POST['c_add_pound']),
				  'reexpedition' => sanitize($_POST['reexpedition']),
				  'r_costtotal' => sanitize($_POST['r_costtotal']),				  
				  'deli_time' => sanitize($_POST['deli_time']),
				  'courier' => sanitize($_POST['courier']),
				  'service_options' => sanitize($_POST['service_options']),
				  'c_driver' => sanitize($_POST['c_driver']),
				  'pay_mode' => sanitize($_POST['pay_mode']),
				  'status_courier' => sanitize($_POST['status_courier']),
				  'comments' => sanitize($_POST['comments'])
			  );
			  

              if (!Filter::$id)
                  $data['created'] = "NOW()";
			  
			  if (!Filter::$id)
                  $data['r_hour'] = "NOW()";
			  
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
			  //Prefix tracking
			  $sql = "SELECT * FROM " . self::tTable;
				$row = self::$db->first($sql);
				
			  if (!Filter::$id)
                  $data['letter_or'] = "".$row->prefix_consolidate."";

			  if (!Filter::$id)
                  $data['order_inv'] = "".$row->prefix_consolidate."".$_POST['tracking'].""; 
				
				//database update and insert
	
              (Filter::$id) ? self::$db->update(self::consolTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::consolTable, $data );
              $message = (Filter::$id) ? '<span>Success!</span>Consolidate updated successfully!' : '<script type="text/javascript"> window.location="consolidate.php?do=list_consolidate";</script> <span>Success!</span>Consolidate  added successfully! | your tracking is # <b>"'.$data['letter_or'].''.$data['tracking'].'"</b>';

			  if (self::$db->affected()) {
                  Filter::msgOk($message);
					
					self::$db->query("INSERT INTO cons_products SELECT * FROM cons_tmp WHERE levels = '".$_SESSION['username']."'");
					
				
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
			
			self::$db->delete(self::contmpTable);
      }
	  
	  
	  /**
	   * Users::process Consolidate update()
	   */
	   
	  
	  public function processConsolidate_update()
	  {
		  
		  if (empty($_POST['r_address']))
			  Filter::$msgs['r_address'] = 'Please Enter Address'; 

		  if (empty($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Please Enter Valid Email Address';		 
		  
		  if (empty($_POST['r_phone']))
			  Filter::$msgs['r_phone'] = 'Please Enter Code Phone';		  
		  if (empty($_POST['r_dest']))
			  Filter::$msgs['r_dest'] = 'Please Enter Destination';
		  if (empty($_POST['c_driver']))
			  Filter::$msgs['c_driver'] = 'Please Enter Driver';
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'order_inv' => sanitize($_POST['order_inv']),
				  'username' => sanitize($_POST['username']),
				  'r_name' => sanitize($_POST['r_name']),
				  'r_email' => sanitize($_POST['r_email']),
				  'r_address' => sanitize($_POST['r_address']),
				  'r_phone' => sanitize($_POST['r_phone']),
				  'r_dest' => sanitize($_POST['r_dest']),
				  'c_address' => sanitize($_POST['c_address']), 
				  'r_qnty' => sanitize($_POST['r_qnty']), 
				  'r_weight' => sanitize($_POST['r_weight']), 
				  'code_off' => sanitize($_POST['code_off']), 
				  'c_add_pound' => sanitize($_POST['c_add_pound']),
				  'reexpedition' => sanitize($_POST['reexpedition']),
				  'r_costtotal' => sanitize($_POST['r_costtotal']),				  
				  'deli_time' => sanitize($_POST['deli_time']),
				  'courier' => sanitize($_POST['courier']),
				  'service_options' => sanitize($_POST['service_options']),
				  'c_driver' => sanitize($_POST['c_driver']),
				  'status_courier' => sanitize($_POST['status_courier']),
				  'comments' => sanitize($_POST['comments'])
			  );
			  
             
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
				
				//database update and insert
	
              (Filter::$id) ? self::$db->update(self::consolTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::consolTable, $data );
              $message = (Filter::$id) ? '<script type="text/javascript"> window.location="consolidate.php?do=list_consolidate";</script><span>Success!</span>Conatiner updated successfully!' : '';

			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  

	  
	  /**
       * User::Update Courier Online Booking()
       */
	  
	  public function processCourier_booking_update()
	  {
		  
		  if (!Filter::$id) {
			  if (empty($_POST['r_name']))
				  Filter::$msgs['r_name'] = 'Please enter the full name Sender';
		  }
	  
		  if (empty($_POST['r_address']))
			  Filter::$msgs['r_address'] = 'Please Enter Address'; 

		  if (empty($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Please Enter Valid Email Address';
		  if (!$this->isValidEmail($_POST['r_email']))
			  Filter::$msgs['r_email'] = 'Entered Email Address Is Not Valid.';	
		  
		  if (empty($_POST['r_phone']))
			  Filter::$msgs['r_phone'] = 'Please Enter Code Phone';		  
		  if (empty($_POST['rc_phone']))
			  Filter::$msgs['rc_phone'] = 'Please Enter Cell Phone';
		  if (empty($_POST['r_dest']))
			  Filter::$msgs['r_dest'] = 'Please Enter Destination';
		  if (empty($_POST['r_city']))
			  Filter::$msgs['r_city'] = 'Please Enter City';
		  if (empty($_POST['r_postal']))
			  Filter::$msgs['r_postal'] = 'Please Enter Postal Code';		  
		  if (empty($_POST['r_qnty']))
			  Filter::$msgs['r_qnty'] = 'Please Enter Quantity';
		  if (empty($_POST['r_weight']))
			  Filter::$msgs['r_weight'] = 'Please Enter Weight Package';
		  if (empty($_POST['r_description']))
			  Filter::$msgs['r_description'] = 'Please Enter Description Package';
		  if (empty($_POST['length']))
			  Filter::$msgs['length'] = 'Please Enter Box Length';
		  if (empty($_POST['width']))
			  Filter::$msgs['width'] = 'Please Enter Box Width';
		  if (empty($_POST['height']))
			  Filter::$msgs['height'] = 'Please Enter Box Height';
		  if (empty($_POST['r_custom']))
			  Filter::$msgs['r_custom'] = 'Please Enter Custom Value';

		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(			  				  
				  'r_name' => sanitize($_POST['r_name']),
				  'r_email' => sanitize($_POST['r_email']),
				  'r_address' => sanitize($_POST['r_address']),
				  'r_phone' => sanitize($_POST['r_phone']),
				  'rc_phone' => sanitize($_POST['rc_phone']), 
				  'r_dest' => sanitize($_POST['r_dest']),
				  'r_city' => sanitize($_POST['r_city']), 
				  'r_postal' => sanitize($_POST['r_postal']), 
				  'package' => sanitize($_POST['package']), 				  
				  'deli_time' => sanitize($_POST['deli_time']),				  
				  'courier' => sanitize($_POST['courier']),
				  'service_options' => sanitize($_POST['service_options']),
				  'r_tax' => sanitize($_POST['r_tax']),
				  'r_insurance' => sanitize($_POST['r_insurance']),
				  'itemcat' => sanitize($_POST['itemcat']),
				  'r_qnty' => sanitize($_POST['r_qnty']),
				  'r_weight' => sanitize($_POST['r_weight']),
				  'v_weight' => sanitize($_POST['v_weight']),
				  'r_description' => sanitize($_POST['r_description']), 
				  'length' => sanitize($_POST['length']),
				  'width' => sanitize($_POST['width']),
				  'height' => sanitize($_POST['height']),
				  'r_custom' => sanitize($_POST['r_custom']),
				  'r_curren' => sanitize($_POST['r_curren']),
				  'r_costtotal' => sanitize($_POST['r_costtotal']),
				  'status_courier' => sanitize($_POST['status_courier']) 
			  );

			  
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
			  //Prefix tracking
			  $sql = "SELECT * FROM " . self::tTable;
				$row = self::$db->first($sql);
			  
				$l=$_POST['length']; 
				$w=$_POST['width']; 
				$h=$_POST['height'];
				$z=$l*$w*$h/$row->meter;
				
				if (!Filter::$id)
                  $data['v_weight'] = "".$z."";
			  
				//database update and insert  
              (Filter::$id) ? self::$db->update(self::cTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::cTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>Booking updated successfully!' : '<span>Success!</span>Booking updated successfully!' ;
			  
			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	  /**
       * User::Update Courier Status()
       */
	  
	  public function processStatusCourier()
	  {		  
		  		  
		  if (empty($_POST['t_dest']))
			  Filter::$msgs['t_dest'] = 'Please Enter New Destination'; 
		  if (empty($_POST['t_city']))
			  Filter::$msgs['t_city'] = 'Please Enter New Address';
		  
		  if (empty($_POST['t_date']))
			  Filter::$msgs['t_date'] = 'Please Enter Date';
		  
		  if (empty($_POST['t_hour']))
			  Filter::$msgs['t_hour'] = 'Please Enter Hour';
		  
		  if (empty($_POST['comments']))
			  Filter::$msgs['comments'] = 'Please Enter Comments';
		  
		  if (empty($_POST['status_courier']))
			  Filter::$msgs['status_courier'] = 'Please Enter New Status';
		  
		  if (empty($_POST['code_offnew']))
			  Filter::$msgs['code_offnew'] = 'Please Enter Code Office';
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(			  
				  't_dest' => sanitize($_POST['t_dest']),
				  't_city' => sanitize($_POST['t_city']),				  
				  'comments' => sanitize($_POST['comments']),
				  'rc_phone' => sanitize($_POST['rc_phone']),
				  't_date' => sanitize($_POST['t_date']),
				  't_hour' => sanitize($_POST['t_hour'])
			  );
			  
			  if (!Filter::$id)
                  $data['t_id'] = "".$_POST['t_id']."";

			  if (!Filter::$id)
                  $data['t_level'] = "".$_SESSION['username']."";
			  
			  if (!Filter::$id)
                  $data['status_courier'] = "".$_POST['status_courier']."";
			  
			  if (!Filter::$id)
                  $data['code_offnew'] = "".$_POST['code_offnew']."";
			  
			   if (!Filter::$id)
                  $data['order_track'] = "".$_POST['order_track'].""; 
			  
			  $sql = self::$db->query("UPDATE add_courier SET status_courier='".$_POST['status_courier']."', code_offnew='".$_POST['code_offnew']."' WHERE id='".$_POST['t_id']."'");
			  
			  
				//database update and insert  
              (Filter::$id) ?  	: self::$db->insert(self::traTable, $data);
              $message = (Filter::$id) ? '' : '<script type="text/javascript"> window.location="index.php";</script> <span>Success!</span>Shipping update status change successfully!';
			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
				  require_once (BASEPATH . "lib/NexmoMessage.php");
					require __DIR__ . '/twilio/Twilio/autoload.php';

					include 'notifysmsupcourier.php';
					//create object of PayPalExpress
					$smsnotifyupcourier = new NotifySmsupdatecourier();
					$items = $smsnotifyupcourier->get_updatecouriersms();
					
					$sql_2 = "SELECT * FROM " . self::twTable;
					$twi = self::$db->first($sql_2);
					
					$sql_3 = "SELECT * FROM " . self::tnxTable;
					$nexmo = self::$db->first($sql_3);
				  
				    while ($item = $items->fetch_assoc()):
						if ($item['active'] == 1){
							if ($twi->active_twi == 1){ 
								
								// new Twilio.
								$account_sid = ''.$twi->account_sid.'';
								$auth_token = ''.$twi->auth_token.'';
								$twilio_number = "".$twi->twilio_number."";
								$client = new Twilio\Rest\Client($account_sid, $auth_token);
								$client->messages->create(
									'+'.$data['rc_phone'].'',
									array(
										'from' => $twilio_number,
										'body' => ''.$item['body1'].' '.$data['status_courier'].', '.$item['body2'].' '.$data['t_dest'].', '.$item['body3'].' '.$data['order_track'].', '.$data['t_date'].'-'.$data['t_hour'].''
									)
								);
								
							}else if ($nexmo->active_nex == 1){
								// new NexmoMessage.
								$nexmo_sms = new NexmoMessage(''.$nexmo->api_key.'', ''.$nexmo->api_secret.'');
								$info = $nexmo_sms->sendText( ''.$data['rc_phone'].'', 'DEPRIXA PRO', ''.$item['body1'].' '.$data['status_courier'].', '.$item['body2'].' '.$data['t_dest'].', '.$item['body3'].' '.$data['order_track'].', '.$data['t_date'].'-'.$data['t_hour'].'' );
							}else{
								// echo 'success'.
							}	
						}	
					endwhile;
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	  /**
       * User::Update Consolidate Status()
       */
	  
	  public function processStatusConsolidate()
	  {		  
		  		  
		  if (empty($_POST['t_dest']))
			  Filter::$msgs['t_dest'] = 'Please Enter New Destination'; 
		  if (empty($_POST['t_city']))
			  Filter::$msgs['t_city'] = 'Please Enter New Address';
		  
		  if (empty($_POST['t_date']))
			  Filter::$msgs['t_date'] = 'Please Enter Date';
		  
		  if (empty($_POST['t_hour']))
			  Filter::$msgs['t_hour'] = 'Please Enter Hour';
		  
		  if (empty($_POST['comments']))
			  Filter::$msgs['comments'] = 'Please Enter Comments';
		  
		  if (empty($_POST['status_courier']))
			  Filter::$msgs['status_courier'] = 'Please Enter New Status';
		  
		  if (empty($_POST['code_offnew']))
			  Filter::$msgs['code_offnew'] = 'Please Enter Code Office';
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(			  
				  't_dest' => sanitize($_POST['t_dest']),
				  't_city' => sanitize($_POST['t_city']),				  
				  'comments' => sanitize($_POST['comments']),
				  'rc_phone' => sanitize($_POST['rc_phone']),
				  't_date' => sanitize($_POST['t_date']),
				  't_hour' => sanitize($_POST['t_hour'])
			  );
			  
			  if (!Filter::$id)
                  $data['t_id'] = "".$_POST['t_id']."";

			  if (!Filter::$id)
                  $data['t_level'] = "".$_SESSION['username']."";
			  
			  if (!Filter::$id)
                  $data['status_courier'] = "".$_POST['status_courier']."";
			  
			  if (!Filter::$id)
                  $data['code_offnew'] = "".$_POST['code_offnew']."";
			  
			   if (!Filter::$id)
                  $data['order_track'] = "".$_POST['order_track'].""; 
			  
			  $sql = self::$db->query("UPDATE consolidate SET status_courier='".$_POST['status_courier']."', code_offnew='".$_POST['code_offnew']."' WHERE id='".$_POST['t_id']."'");
			  
			  
				//database update and insert  
              (Filter::$id) ?  	: self::$db->insert(self::traTable, $data);
              $message = (Filter::$id) ? '' : '<script type="text/javascript"> window.location="consolidate.php?do=list_consolidate";</script> <span>Success!</span>Shipping update status change successfully!';
			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
				  require_once (BASEPATH . "lib/NexmoMessage.php");
					require __DIR__ . '/twilio/Twilio/autoload.php';

					include 'notifysmsupcourier.php';
					//create object of PayPalExpress
					$smsnotifyupcourier = new NotifySmsupdatecourier();
					$items = $smsnotifyupcourier->get_updatecouriersms();
					
					$sql_2 = "SELECT * FROM " . self::twTable;
					$twi = self::$db->first($sql_2);
					
					$sql_3 = "SELECT * FROM " . self::tnxTable;
					$nexmo = self::$db->first($sql_3);
				  
				    while ($item = $items->fetch_assoc()):
						if ($item['active'] == 1){
							if ($twi->active_twi == 1){ 
								
								// new Twilio.
								$account_sid = ''.$twi->account_sid.'';
								$auth_token = ''.$twi->auth_token.'';
								$twilio_number = "".$twi->twilio_number."";
								$client = new Twilio\Rest\Client($account_sid, $auth_token);
								$client->messages->create(
									'+'.$data['rc_phone'].'',
									array(
										'from' => $twilio_number,
										'body' => ''.$item['body1'].' '.$data['status_courier'].', '.$item['body2'].' '.$data['t_dest'].', '.$item['body3'].' '.$data['order_track'].', '.$data['t_date'].'-'.$data['t_hour'].''
									)
								);
								
							}else if ($nexmo->active_nex == 1){
								// new NexmoMessage.
								$nexmo_sms = new NexmoMessage(''.$nexmo->api_key.'', ''.$nexmo->api_secret.'');
								$info = $nexmo_sms->sendText( ''.$data['rc_phone'].'', 'DEPRIXA PRO', ''.$item['body1'].' '.$data['status_courier'].', '.$item['body2'].' '.$data['t_dest'].', '.$item['body3'].' '.$data['order_track'].', '.$data['t_date'].'-'.$data['t_hour'].'' );
							}else{
								// echo 'success'.
							}	
						}	
					endwhile;
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	  /**
       * User::Update deliver shipment()
       */
	  
	  public function processDelivershipment()
	  {		  
		  		  
		  if (empty($_POST['deliver_date']))
			  Filter::$msgs['deliver_date'] = 'Please Enter Date'; 
		  if (empty($_POST['delivery_hour']))
			  Filter::$msgs['delivery_hour'] = 'Please Enter Hour';
		  
		  if (empty($_POST['person_receives']))
			  Filter::$msgs['person_receives'] = 'Please Enter Person who receives';
		  
		  if (empty($_POST['name_employee']))
			  Filter::$msgs['name_employee'] = 'Please Enter Name Employee';
		  
		  if (empty($_POST['status_courier']))
			  Filter::$msgs['status_courier'] = 'Please Enter Status courier';
		  
		  if (empty($_POST['act_status']))
			  Filter::$msgs['act_status'] = 'Please Enter Status';
		 
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(			  
				  'deliver_date' => sanitize($_POST['deliver_date']),
				  'delivery_hour' => sanitize($_POST['delivery_hour']),				  
				  'person_receives' => sanitize($_POST['person_receives']),
				  'name_employee' => sanitize($_POST['name_employee']),
				  'status_courier' => sanitize($_POST['status_courier']),
				  'act_status' => sanitize($_POST['act_status'])
			  );
			  
			  if (!Filter::$id)
                  $data['id'] = "".$_POST['id']."";
				
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
				//database update  
				(Filter::$id) ? self::$db->update(self::cTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::cTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>the shipment was delivered successfully!' : '<span>Success!</span>the shipment was delivered successfully!' ;

			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	  /**
       * User::Update deliver shipment Consolidate()
       */
	  
	  public function processDelivershipmentconsolidate()
	  {		  
		  		  
		  if (empty($_POST['deliver_date']))
			  Filter::$msgs['deliver_date'] = 'Please Enter Date'; 
		  if (empty($_POST['delivery_hour']))
			  Filter::$msgs['delivery_hour'] = 'Please Enter Hour';
		  
		  if (empty($_POST['person_receives']))
			  Filter::$msgs['person_receives'] = 'Please Enter Person who receives';
		  
		  if (empty($_POST['name_employee']))
			  Filter::$msgs['name_employee'] = 'Please Enter Name Employee';
		  
		  if (empty($_POST['status_courier']))
			  Filter::$msgs['status_courier'] = 'Please Enter Status courier';
		  
		  if (empty($_POST['act_status']))
			  Filter::$msgs['act_status'] = 'Please Enter Status';
		 
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(			  
				  'deliver_date' => sanitize($_POST['deliver_date']),
				  'delivery_hour' => sanitize($_POST['delivery_hour']),				  
				  'person_receives' => sanitize($_POST['person_receives']),
				  'name_employee' => sanitize($_POST['name_employee']),
				  'status_courier' => sanitize($_POST['status_courier']),
				  'act_status' => sanitize($_POST['act_status'])
			  );
			  
			  if (!Filter::$id)
                  $data['id'] = "".$_POST['id']."";
				
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
				//database update  
				(Filter::$id) ? self::$db->update(self::consolTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::consolTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>the shipment was delivered successfully!' : '<span>Success!</span>the shipment was delivered successfully!' ;

			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }
	  
	  
	   
	  /**
       * User::Update deliver package()
       */
	  
	  public function processDeliverpackage()
	  {		  
		  		  
		  if (empty($_POST['deliver_date']))
			  Filter::$msgs['deliver_date'] = 'Please Enter Date'; 
		  if (empty($_POST['delivery_hour']))
			  Filter::$msgs['delivery_hour'] = 'Please Enter Hour';
		  
		  if (empty($_POST['person_receives']))
			  Filter::$msgs['person_receives'] = 'Please Enter Person who receives';
		  
		  if (empty($_POST['name_employee']))
			  Filter::$msgs['name_employee'] = 'Please Enter Name Employee';
		  
		  if (empty($_POST['status_courier']))
			  Filter::$msgs['status_courier'] = 'Please Enter Status courier';
		  
		  if (empty($_POST['act_status']))
			  Filter::$msgs['act_status'] = 'Please Enter Status';
		 
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(			  
				  'deliver_date' => sanitize($_POST['deliver_date']),
				  'delivery_hour' => sanitize($_POST['delivery_hour']),				  
				  'person_receives' => sanitize($_POST['person_receives']),
				  'name_employee' => sanitize($_POST['name_employee']),
				  'status_courier' => sanitize($_POST['status_courier']),
				  'act_status' => sanitize($_POST['act_status'])
			  );
			  
			  if (!Filter::$id)
                  $data['id'] = "".$_POST['id']."";
				
			  if (!Filter::$id)
                  $data['level'] = "".$_SESSION['username']."";
			  
				//database update  
				(Filter::$id) ? self::$db->update(self::consolTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::consolTable, $data);
              $message = (Filter::$id) ? '<script type="text/javascript"> window.location="tools.php?do=sms";</script><span>Success!</span>the deliver package was delivered successfully!' : '<span>Success!</span>the shipment was delivered successfully!' ;

			  if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');

          } else
              print Filter::msgStatus();
      }




	 /**
       * User::activateAccount()
       */
      public function activateAccount()
      {

          $data['active'] = "y";
		  self::$db->update(self::uTable, $data, "id = '" . Filter::$id . "'");
		  
		  require_once (BASEPATH . "lib/class_mailer.php");
		  $row = Registry::get("Core")->getRowById("email_templates", 15);
		  $roww = Registry::get("Core")->getRowById(self::uTable, Filter::$id);

		  $body = str_replace(array(
			  '[NAME]',
			  '[URL]',
			  '[SITE_NAME]'), array(
			  $roww->fname . ' ' .$roww->lname,
			  Registry::get("Core")->site_url,
			  Registry::get("Core")->site_name), $row->body);

		  $newbody = cleanOut($body);

		  $mailer = $mail->sendMail();
		  $message = Swift_Message::newInstance()
					->setSubject($row->subject)
					->setTo(array($roww->email => $roww->username))
					->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
					->setBody($newbody, 'text/html');

		  (self::$db->affected() && $mailer->send($message)) ? Filter::msgOk('<span>Success!</span>User have been successfully activated and email has been sent.', false) : Filter::msgError('<span>Error!</span>There was an error while sending email.');

      }
	  
      /**
       * User::activateUser()
       */
	  public function activateUser()
	  {		  
		  if (empty($_POST['email']))
			  Filter::$msgs['email'] = 'Please Enter Valid Email Address';
		  
		  if (!$this->emailExists($_POST['email']))
			  Filter::$msgs['email'] = 'Entered Email Address Does Not Exists.';
		  
		  if (empty($_POST['token']))
			  Filter::$msgs['token'] = 'The token code is not valid';
		  
		  if (!$this->validateToken($_POST['token']))
			  Filter::$msgs['token'] = 'This account has been already activated!';
		  
		  if (empty(Filter::$msgs)) {
			  $email = sanitize($_POST['email']);
			  $token = sanitize($_POST['token']);
              $message = (Registry::get("Core")->auto_verify == 1) ? '<span>Success!</span>You have successfully activated your account!' : '<span>Success!</span>Your account is now active. However you still need to wait for administrative approval.';

              $data = array('token' => 0, 'active' => (Registry::get("Core")->auto_verify) ? "y" : "n");
			  
              self::$db->update(self::uTable, $data, "email = '" . $email . "' AND token = '" . $token . "'");
              (self::$db->affected()) ? Filter::msgOk($message, false) : Filter::msgError('<span>Error!</span>There was an error during the activation process. Please contact the administrator.', false);
          } else
              print Filter::msgStatus();
      }

	  /**
	   * Users::getUserData()
	   */
	  public function getUserData()
	  {
		  
          $sql = "SELECT *, DATE_FORMAT(created, '%a. %d, %M %Y') as cdate," 
		  . "\n DATE_FORMAT(lastlogin, '%a. %d, %M %Y') as ldate" 
		  . "\n FROM " . self::uTable 
		  . "\n WHERE id = " . $this->uid;
          $row = self::$db->first($sql);

		  return ($row) ? $row : 0;
	  }
	  	  	  	  
	  /**
	   * Users::usernameExists()
	   */
	  private function usernameExists($username)
	  {
          $username = sanitize($username);
          if (strlen(self::$db->escape($username)) < 4)
              return 1;

          //Username should contain only alphabets, numbers, underscores or hyphens.Should be between 4 to 15 characters long
		  $valid_uname = "/^[a-z0-9_-]{4,15}$/"; 
          if (!preg_match($valid_uname, $username))
              return 2;

          $sql = self::$db->query("SELECT username" 
		  . "\n FROM " . self::uTable 
		  . "\n WHERE username = '" . $username . "'" 
		  . "\n LIMIT 1");

          $count = self::$db->numrows($sql);

          return ($count > 0) ? 3 : false;
	  }  	
	  
	  /**
	   * User::emailExists()
	   */
	  private function emailExists($email)
	  {
		  
          $sql = self::$db->query("SELECT email" 
		  . "\n FROM " . self::uTable 
		  . "\n WHERE email = '" . sanitize($email) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidTrack()
	   */
	  private function trackExists($tracking)
	  {
		  
          $sql = self::$db->query("SELECT tracking" 
		  . "\n FROM " . self::cTable 
		  . "\n WHERE tracking = '" . sanitize($tracking) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidTrackcontainer()
	   */
	  private function trackcontainerExists($tracking)
	  {
		  
          $sql = self::$db->query("SELECT tracking" 
		  . "\n FROM " . self::contaTable 
		  . "\n WHERE tracking = '" . sanitize($tracking) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	   /**
	   * Courier::isValidTrackconsolidate()
	   */
	  private function trackconsolidateExists($tracking)
	  {
		  
          $sql = self::$db->query("SELECT tracking" 
		  . "\n FROM " . self::consolTable 
		  . "\n WHERE tracking = '" . sanitize($tracking) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * User::isValidEmail()
	   */
	  private function isValidEmail($email)
	  {
		  if (function_exists('filter_var')) {
			  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  return true;
			  } else
				  return false;
		  } else
			  return preg_match('/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $email);
	  } 	

      /**
       * User::validateToken()
       */
     private function validateToken($token)
      {
          $token = sanitize($token, 40);
          $sql = "SELECT token" 
		  . "\n FROM " . self::uTable 
		  . "\n WHERE token ='" . self::$db->escape($token) . "'" 
		  . "\n LIMIT 1";
          $result = self::$db->query($sql);

          if (self::$db->numrows($result))
              return true;
      }
	  
	  /**
	   * Users::getUniqueCode()
	   */
	  private function getUniqueCode($length = "")
	  {
		  $code = md5(uniqid(rand(), true));
		  if ($length != "") {
			  return substr($code, 0, $length);
		  } else
			  return $code;
	  }

	  /**
	   * Users::generateRandID()
	   */
	  private function generateRandID()
	  {
		  return md5($this->getUniqueCode(24));
	  }

	  /**
	   * Users::levelCheck()
	   */
	  public function levelCheck($levels)
	  {
		  $m_arr = explode(",", $levels);
		  reset($m_arr);
		  
		  if ($this->logged_in and in_array($this->userlevel, $m_arr))
		  return true;
	  }
	  
      /**
       * Users::getUserLevels()
       */
      public function getUserLevels($level = false)
	  {
		  $arr = array(
				 9 => 'Super Admin',
				 2 => 'Registered Manager'
		  );
		  
		  $list = '';
		  foreach ($arr as $key => $val) {
				  if ($key == $level) {
					  $list .= "<option selected=\"selected\" value=\"$key\">$val</option>\n";
				  } else
					  $list .= "<option value=\"$key\">$val</option>\n";
		  }
		  unset($val);
		  return $list;
	  } 
	  
	  public function getCustomerLevels($level = false)
	  {
		  $arr = array(
				 1 => 'Registered Customer'
		  );
		  
		  $list = '';
		  foreach ($arr as $key => $val) {
				  if ($key == $level) {
					  $list .= "<option selected=\"selected\" value=\"$key\">$val</option>\n";
				  } else
					  $list .= "<option value=\"$key\">$val</option>\n";
		  }
		  unset($val);
		  return $list;
	  } 
	  	  	  
	  	  	  
      /**
       * Users::getUserFilter()
       */
      public static function getUserFilter()
	  {
		  $arr = array(
				 'username-ASC' => 'Username &uarr;',
				 'username-DESC' => 'Username &darr;',
				 'fname-ASC' => 'First Name &uarr;',
				 'fname-DESC' => 'First Name &darr;',
				 'lname-ASC' => 'Last Name &uarr;',
				 'lname-DESC' => 'Last Name &darr;',
				 'email-ASC' => 'Email Address &uarr;',
				 'email-DESC' => 'Email Address &darr;',
				 'created-ASC' => 'Registered &uarr;',
				 'created-DESC' => 'Registered &darr;',
		  );
		  
		  $filter = '';
		  foreach ($arr as $key => $val) {
				  if ($key == get('sort')) {
					  $filter .= "<option selected=\"selected\" value=\"$key\">$val</option>\n";
				  } else
					  $filter .= "<option value=\"$key\">$val</option>\n";
		  }
		  unset($val);
		  return $filter;
	  } 	  	  	  	   
  }
?>
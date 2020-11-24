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

  class Users
  {
	  const uTable = "users";
	  const cTable = "add_courier";
	  const consolTable = "consolidate";
	  public $logged_in = null;
	  public $uid = 0;
	  public $userid = 0;
      public $username;
	  public $email;
	  public $name;
      public $userlevel;
	  public $last;
	  private $lastlogin = "NOW()";
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
       * Core::getCourier Online Booking()
       */
      public function getCourier_list_booking()
      {
          $sql = "SELECT * FROM " . self::cTable . " WHERE username = '" .  $this->username  . "' ";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getCourier Online Deliveries list()
       */
      public function getCourier_deliveries_list()
      {
          $sql = "SELECT a.id, a.order_inv, a.c_driver, a.c_address, a.created, a.r_hour, a.status_courier, a.act_status, s.mod_style, s.color  FROM consolidate a, styles s  WHERE a.status_courier=s.mod_style AND a.c_driver = '" .  $this->username  . "' AND a.act_status=1  ORDER BY a.id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	  /**
       * Core::getDeliver Package list()
       */
      public function getDeliverpackage_list()
      {
          $sql = "SELECT a.id, a.order_inv, a.c_driver, a.r_address, a.created, a.r_hour, a.status_courier, a.act_status, s.mod_style, s.color  FROM add_courier a, styles s  WHERE a.status_courier=s.mod_style AND a.c_driver = '" .  $this->username  . "' AND a.act_status=1  ORDER BY a.id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	   /**
       * Core::getConsolidateonline_liste()
       */
      public function getConsolidateonline_list()
      {
		  
	  $sql = "SELECT a.id, a.idcon,a.order_inv, a.tracking,a.r_name, a.r_dest, a.username,a.c_address, a.r_qnty, a.pay_mode, a.payment_status, a.r_costtotal, a.r_weight, a.c_driver,a.created, a.status_courier, a.code_off, a.act_status, s.mod_style, s.color, b.order_invs, b.order_cons, b.idcon, b.trackings, b.r_descriptions  
			  FROM consolidate a, styles s, cons_products b WHERE a.status_courier=s.mod_style AND a.tracking=b.trackings AND a.act_status='0' AND a.username='" .  $this->username  . "' GROUP BY a.tracking";
          $row = self::$db->fetch_all($sql);
          
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
	  public function getUsers()
	  {
		  

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
		  . "\n ORDER BY " . $sorting;
          $row = self::$db->fetch_all($sql);
          
		  return ($row) ? $row : 0;
	  }
	  
	  
	  public function getCustomers($from = false)
	  {
		  

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
		  . "\n FROM users WHERE userlevel=1 AND active='y'"
		  . "\n " . $clause
		  . "\n ORDER BY " . $sorting;
          $row = self::$db->fetch_all($sql);
          
		  return ($row) ? $row : 0;
	  }
	  
	  
	  public function getDrivers($from = false)
	  {
		  

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
		  . "\n FROM users WHERE userlevel=3 AND active='y'"
		  . "\n " . $clause
		  . "\n ORDER BY " . $sorting;
          $row = self::$db->fetch_all($sql);
          
		  return ($row) ? $row : 0;
	  }
	  
	  /**
       * Core::getCount()
       */
      public function getCounton()
      {
		  $pager->items_total = countEntries(self::cTable);
          $sql = "SELECT COUNT(id) as total FROM add_courier WHERE username = '" . $username . "'";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	  /**
       * Core::getCourierlist_user()
       */
      public function getCourierlist_user()
      {
		  
	  $sql = "SELECT a.id, a.order_inv, a.r_name, a.username, a.r_qnty, a.itemcat, a.r_description, a.created, a.status_courier, a.v_weight, a.r_weight, a.pay_mode, a.r_costtotal, u.username, u.id, u.fname, u.lname 
			 FROM add_courier a, users u WHERE a.username=u.username AND u.id= ".Filter::$id."  ORDER BY s_name ASC";
        $row = self::$db->fetch_all($sql);
          
        return ($row) ? $row : 0;

      }
	  

	  /**
	   * Users::processUser()
	   */
	  public function processUser()
	  {

		  if (!Filter::$id) {
			  if (empty($_POST['username']))
				  Filter::$msgs['username'] = 'Please Enter Valid Username';
			  
			  if ($value = $this->usernameExists($_POST['username'])) {
				  if ($value == 1)
					  Filter::$msgs['username'] = 'Username Is Too Short (less Than 4 Characters Long).';
				  if ($value == 2)
					  Filter::$msgs['username'] = 'Invalid Characters Found In Username.';
				  if ($value == 3)
					  Filter::$msgs['username'] = 'Sorry, This Username Is Already Taken';
			  }
		  }

		  if (empty($_POST['fname']))
			  Filter::$msgs['fname'] = 'Please Enter First Name';
			  
		  if (empty($_POST['lname']))
			  Filter::$msgs['lname'] = 'Please Enter Last Name';
			  
		  if (!Filter::$id) {
			  if (empty($_POST['password']))
				  Filter::$msgs['password'] = 'Please Enter Valid Password.';
		  }

		  if (empty($_POST['email']))
			  Filter::$msgs['email'] = 'Please Enter Valid Email Address';
		  if (!Filter::$id) {
			  if ($this->emailExists($_POST['email']))
				  Filter::$msgs['email'] = 'Entered Email Address Is Already In Use.';
		  }
		  if (!$this->isValidEmail($_POST['email']))
			  Filter::$msgs['email'] = 'Entered Email Address Is Not Valid.';
		  
		  if (empty($_POST['code_phone']))
			  Filter::$msgs['code_phone'] = 'Please Enter Code Phone';
		  if (empty($_POST['phone']))
			  Filter::$msgs['phone'] = 'Please Enter Phone';
		  if (empty($_POST['address']))
			  Filter::$msgs['address'] = 'Please Enter Address';

          if (!empty($_FILES['avatar']['name'])) {
              if (!preg_match("/(\.jpg|\.png)$/i", $_FILES['avatar']['name'])) {
                  Filter::$msgs['avatar'] = "Illegal file type. Only jpg and png file types allowed.";
              }
              $file_info = getimagesize($_FILES['avatar']['tmp_name']);
              if (empty($file_info))
                  Filter::$msgs['avatar'] = "Illegal file type. Only jpg and png file types allowed.";
          }
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'username' => sanitize($_POST['username']), 
				  'email' => sanitize($_POST['email']), 
				  'lname' => sanitize($_POST['lname']), 
				  'fname' => sanitize($_POST['fname']),
				  'country' => sanitize($_POST['country']),				  
				  'city' => sanitize($_POST['city']),
				  'postal' => sanitize($_POST['postal']),
				  'newsletter' => intval($_POST['newsletter']),
				  'notes' => sanitize($_POST['notes']),
				  'code_phone' => sanitize($_POST['code_phone']),
				  'phone' => sanitize($_POST['phone']),
				  'address' => sanitize($_POST['address']),
				  'gender' => sanitize($_POST['gender']),
				  'userlevel' => intval($_POST['userlevel']), 
				  'active' => sanitize($_POST['active'])
			  );

              if (!Filter::$id)
                  $data['created'] = "NOW()";
				   
              if (Filter::$id)
                  $userrow = Registry::get("Core")->getRowById(self::uTable, Filter::$id);
			  
			  if ($_POST['password'] != "") {
				  $data['password'] = md5($_POST['password']);
			  } else {
				  $data['password'] = $userrow->password;
			  }

              // Procces Avatar
              if (!empty($_FILES['avatar']['name'])) {
                  $thumbdir = UPLOADS;
                  $tName = "AVT_" . randName();
                  $text = substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], '.') + 1);
                  $thumbName = $thumbdir . $tName . "." . strtolower($text);
                  if (Filter::$id && $thumb = getValueById("avatar", self::uTable, Filter::$id)) {
                      @unlink($thumbdir . $thumb);
                  }
                  move_uploaded_file($_FILES['avatar']['tmp_name'], $thumbName);
                  $data['avatar'] = $tName . "." . strtolower($text);
              }
			  
				  
              (Filter::$id) ? self::$db->update(self::uTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::uTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>User updated successfully!' : '<span>Success!</span>User added successfully!';

              if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
                  if (isset($_POST['notify']) && intval($_POST['notify']) == 1) {
                      require_once (BASEPATH . "lib/class_mailer.php");
                      $mailer = $mail->sendMail();

                      $row = Registry::get("Core")->getRowById("email_templates", 3);

                      $body = str_replace(array(
                          '[USERNAME]',
                          '[PASSWORD]',
                          '[NAME]',
                          '[SITE_NAME]',
                          '[URL]'), array(
                          $data['username'],
                          $_POST['password'],
                          $data['fname'] . ' ' . $data['lname'],
                          Registry::get("Core")->site_name,
                          Registry::get("Core")->site_url), $row->body);

                      $msg = Swift_Message::newInstance()
								->setSubject($row->subject)
								->setTo(array($data['email'] => $data['fname'] . ' ' . $data['lname']))
								->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
								->setBody(cleanOut($body), 'text/html');

                      $numSent = $mailer->send($msg);
                  }
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
          } else
              print Filter::msgStatus();
      }
	  
	  /**
	   * Users::processCustomer()
	   */
	  public function processCustomer()
	  {

		  if (!Filter::$id) {
			  if (empty($_POST['username']))
				  Filter::$msgs['username'] = 'Please Enter Valid Username';
			  
			  if ($value = $this->usernameExists($_POST['username'])) {
				  if ($value == 1)
					  Filter::$msgs['username'] = 'Username Is Too Short (less Than 4 Characters Long).';
				  if ($value == 2)
					  Filter::$msgs['username'] = 'Invalid Characters Found In Username.';
				  if ($value == 3)
					  Filter::$msgs['username'] = 'Sorry, This Username Is Already Taken';
			  }
		  }

		  if (empty($_POST['fname']))
			  Filter::$msgs['fname'] = 'Please Enter First Name';
		  if (empty($_POST['lname']))
			  Filter::$msgs['lname'] = 'Please Enter Last Name';
		  if (!Filter::$id) {
			  if (empty($_POST['password']))
				  Filter::$msgs['password'] = 'Please Enter Valid Password.';
		  }

		  if (empty($_POST['email']))
			  Filter::$msgs['email'] = 'Please Enter Valid Email Address';
		  if (!Filter::$id) {
			  if ($this->emailExists($_POST['email']))
				  Filter::$msgs['email'] = 'Entered Email Address Is Already In Use.';
		  }
		  if (!$this->isValidEmail($_POST['email']))
			  Filter::$msgs['email'] = 'Entered Email Address Is Not Valid.';
		  if (empty($_POST['code_phone']))
			  Filter::$msgs['code_phone'] = 'Please Enter Code Phone';
		  if (empty($_POST['phone']))
			  Filter::$msgs['phone'] = 'Please Enter Phone';
		  if (empty($_POST['address']))
			  Filter::$msgs['address'] = 'Please Enter Address';
		  if (empty($_POST['country']))
			  Filter::$msgs['country'] = 'Please Enter Country';
		  if (empty($_POST['city']))
			  Filter::$msgs['city'] = 'Please Enter City';
		  if (empty($_POST['postal']))
			  Filter::$msgs['postal'] = 'Please Enter Postal Code';

          if (!empty($_FILES['avatar']['name'])) {
              if (!preg_match("/(\.jpg|\.png)$/i", $_FILES['avatar']['name'])) {
                  Filter::$msgs['avatar'] = "Illegal file type. Only jpg and png file types allowed.";
              }
              $file_info = getimagesize($_FILES['avatar']['tmp_name']);
              if (empty($file_info))
                  Filter::$msgs['avatar'] = "Illegal file type. Only jpg and png file types allowed.";
          }
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'username' => sanitize($_POST['username']), 
				  'email' => sanitize($_POST['email']), 
				  'lname' => sanitize($_POST['lname']), 
				  'fname' => sanitize($_POST['fname']),
				  'country' => sanitize($_POST['country']),				  
				  'city' => sanitize($_POST['city']),
				  'postal' => sanitize($_POST['postal']),
				  'newsletter' => intval($_POST['newsletter']),
				  'notes' => sanitize($_POST['notes']),
				  'code_phone' => sanitize($_POST['code_phone']),
				  'phone' => sanitize($_POST['phone']),
				  'address' => sanitize($_POST['address']),
				  'gender' => sanitize($_POST['gender']),
				  'userlevel' => intval($_POST['userlevel']), 
				  'active' => sanitize($_POST['active'])
			  );

              if (!Filter::$id)
                  $data['created'] = "NOW()";
				   
              if (Filter::$id)
                  $userrow = Registry::get("Core")->getRowById(self::uTable, Filter::$id);
			  
			  if ($_POST['password'] != "") {
				  $data['password'] = md5($_POST['password']);
			  } else {
				  $data['password'] = $userrow->password;
			  }

              // Procces Avatar
              if (!empty($_FILES['avatar']['name'])) {
                  $thumbdir = UPLOADS;
                  $tName = "AVT_" . randName();
                  $text = substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], '.') + 1);
                  $thumbName = $thumbdir . $tName . "." . strtolower($text);
                  if (Filter::$id && $thumb = getValueById("avatar", self::uTable, Filter::$id)) {
                      @unlink($thumbdir . $thumb);
                  }
                  move_uploaded_file($_FILES['avatar']['tmp_name'], $thumbName);
                  $data['avatar'] = $tName . "." . strtolower($text);
              }
			  
				  
              (Filter::$id) ? self::$db->update(self::uTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::uTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>User updated successfully!' : '<span>Success!</span>User added successfully!';

              if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
                  if (isset($_POST['notify']) && intval($_POST['notify']) == 1) {
                      require_once (BASEPATH . "lib/class_mailer.php");
                      $mailer = $mail->sendMail();

                      $row = Registry::get("Core")->getRowById("email_templates", 3);

                      $body = str_replace(array(
                          '[USERNAME]',
                          '[PASSWORD]',
                          '[NAME]',
                          '[SITE_NAME]',
                          '[URL]'), array(
                          $data['username'],
                          $_POST['password'],
                          $data['fname'] . ' ' . $data['lname'],
                          Registry::get("Core")->site_name,
                          Registry::get("Core")->site_url), $row->body);

                      $msg = Swift_Message::newInstance()
								->setSubject($row->subject)
								->setTo(array($data['email'] => $data['fname'] . ' ' . $data['lname']))
								->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
								->setBody(cleanOut($body), 'text/html');

                      $numSent = $mailer->send($msg);
                  }
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
          } else
              print Filter::msgStatus();
      }
	  
	  
	  /**
	   * Users::processDriver()
	   */
	  public function processDriver()
	  {

		  if (!Filter::$id) {
			  if (empty($_POST['username']))
				  Filter::$msgs['username'] = 'Please Enter Valid Username';
			  
			  if ($value = $this->usernameExists($_POST['username'])) {
				  if ($value == 1)
					  Filter::$msgs['username'] = 'Username Is Too Short (less Than 4 Characters Long).';
				  if ($value == 2)
					  Filter::$msgs['username'] = 'Invalid Characters Found In Username.';
				  if ($value == 3)
					  Filter::$msgs['username'] = 'Sorry, This Username Is Already Taken';
			  }
		  }

		  if (empty($_POST['fname']))
			  Filter::$msgs['fname'] = 'Please Enter First Name';
		  if (empty($_POST['lname']))
			  Filter::$msgs['lname'] = 'Please Enter Last Name';
		  if (!Filter::$id) {
			  if (empty($_POST['password']))
				  Filter::$msgs['password'] = 'Please Enter Valid Password.';
		  }

		  if (empty($_POST['email']))
			  Filter::$msgs['email'] = 'Please Enter Valid Email Address';
		  if (!Filter::$id) {
			  if ($this->emailExists($_POST['email']))
				  Filter::$msgs['email'] = 'Entered Email Address Is Already In Use.';
		  }
		  if (!$this->isValidEmail($_POST['email']))
			  Filter::$msgs['email'] = 'Entered Email Address Is Not Valid.';
		  if (empty($_POST['code_phone']))
			  Filter::$msgs['code_phone'] = 'Please Enter Code Phone';
		  if (empty($_POST['phone']))
			  Filter::$msgs['phone'] = 'Please Enter Phone';
		  if (empty($_POST['address']))
			  Filter::$msgs['address'] = 'Please Enter Address';
		  
		  if (empty($_POST['enrollment']))
			  Filter::$msgs['enrollment'] = 'Please Enter Enrollment';
		  if (!Filter::$id) {
			  if ($this->enrollmentExists($_POST['enrollment']))
				  Filter::$msgs['enrollment'] = 'Entered Enrollment Is Already In Use.';
		  }
		  
		  if (empty($_POST['vehiclecode']))
			  Filter::$msgs['vehiclecode'] = 'Please Enter Vehicle code';
		  if (!Filter::$id) {
			  if ($this->vehiclecodeExists($_POST['vehiclecode']))
				  Filter::$msgs['vehiclecode'] = 'Entered vehicle code Is Already In Use.';
		  }
		  
		  
		  if (empty($_POST['country']))
			  Filter::$msgs['country'] = 'Please Enter Country';
		  if (empty($_POST['city']))
			  Filter::$msgs['city'] = 'Please Enter City';
		  if (empty($_POST['postal']))
			  Filter::$msgs['postal'] = 'Please Enter Postal Code';

          if (!empty($_FILES['avatar']['name'])) {
              if (!preg_match("/(\.jpg|\.png)$/i", $_FILES['avatar']['name'])) {
                  Filter::$msgs['avatar'] = "Illegal file type. Only jpg and png file types allowed.";
              }
              $file_info = getimagesize($_FILES['avatar']['tmp_name']);
              if (empty($file_info))
                  Filter::$msgs['avatar'] = "Illegal file type. Only jpg and png file types allowed.";
          }
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'username' => sanitize($_POST['username']), 
				  'email' => sanitize($_POST['email']), 
				  'lname' => sanitize($_POST['lname']), 
				  'fname' => sanitize($_POST['fname']),
				  'country' => sanitize($_POST['country']),				  
				  'city' => sanitize($_POST['city']),
				  'postal' => sanitize($_POST['postal']),
				  'newsletter' => intval($_POST['newsletter']),
				  'notes' => sanitize($_POST['notes']),
				  'code_phone' => sanitize($_POST['code_phone']),
				  'phone' => sanitize($_POST['phone']),
				  'address' => sanitize($_POST['address']),
				  'enrollment' => sanitize($_POST['enrollment']),
				  'vehiclecode' => sanitize($_POST['vehiclecode']),
				  'gender' => sanitize($_POST['gender']),
				  'userlevel' => intval($_POST['userlevel']), 
				  'active' => sanitize($_POST['active'])
			  );

              if (!Filter::$id)
                  $data['created'] = "NOW()";
				   
              if (Filter::$id)
                  $userrow = Registry::get("Core")->getRowById(self::uTable, Filter::$id);
			  
			  if ($_POST['password'] != "") {
				  $data['password'] = md5($_POST['password']);
			  } else {
				  $data['password'] = $userrow->password;
			  }

              // Procces Avatar
              if (!empty($_FILES['avatar']['name'])) {
                  $thumbdir = UPLOADS;
                  $tName = "AVT_" . randName();
                  $text = substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], '.') + 1);
                  $thumbName = $thumbdir . $tName . "." . strtolower($text);
                  if (Filter::$id && $thumb = getValueById("avatar", self::uTable, Filter::$id)) {
                      @unlink($thumbdir . $thumb);
                  }
                  move_uploaded_file($_FILES['avatar']['tmp_name'], $thumbName);
                  $data['avatar'] = $tName . "." . strtolower($text);
              }
			  
				  
              (Filter::$id) ? self::$db->update(self::uTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::uTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>Driver User updated successfully!' : '<span>Success!</span>Driver User added successfully!';

              if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
                  if (isset($_POST['notify']) && intval($_POST['notify']) == 1) {
                      require_once (BASEPATH . "lib/class_mailer.php");
                      $mailer = $mail->sendMail();

                      $row = Registry::get("Core")->getRowById("email_templates", 3);

                      $body = str_replace(array(
                          '[USERNAME]',
                          '[PASSWORD]',
                          '[NAME]',
                          '[SITE_NAME]',
                          '[URL]'), array(
                          $data['username'],
                          $_POST['password'],
                          $data['fname'] . ' ' . $data['lname'],
                          Registry::get("Core")->site_name,
                          Registry::get("Core")->site_url), $row->body);

                      $msg = Swift_Message::newInstance()
								->setSubject($row->subject)
								->setTo(array($data['email'] => $data['fname'] . ' ' . $data['lname']))
								->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
								->setBody(cleanOut($body), 'text/html');

                      $numSent = $mailer->send($msg);
                  }
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
          } else
              print Filter::msgStatus();
      }

	  /**
	   * Users::updateProfile()
	   */
	  public function updateProfile()
	  {

		  if (empty($_POST['fname']))
			  Filter::$msgs['fname'] = 'Please Enter First Name';
			  
		  if (empty($_POST['lname']))
			  Filter::$msgs['lname'] = 'Please Enter Last Name';
		  
		  if (empty($_POST['code_phone']))
			  Filter::$msgs['code_phone'] = 'Please Enter Code Phone';
		  
		  if (empty($_POST['phone']))
			  Filter::$msgs['phone'] = 'Please Enter Phone';
		  if (empty($_POST['address']))
			  Filter::$msgs['address'] = 'Please Enter Address';
		  
		  if (empty($_POST['country']))
			  Filter::$msgs['country'] = 'Please Enter Country';
		  
		  if (empty($_POST['city']))
			  Filter::$msgs['city'] = 'Please Enter City';
		  
		  if (empty($_POST['postal']))
			  Filter::$msgs['postal'] = 'Please Enter Postal Code';

		  if (empty($_POST['email']))
			  Filter::$msgs['email'] = 'Please Enter Valid Email Address';

		  if (!$this->isValidEmail($_POST['email']))
			  Filter::$msgs['email'] = 'Entered Email Address Is Not Valid.';
	

          if (!empty($_FILES['avatar']['name'])) {
              if (!preg_match("/(\.jpg|\.png)$/i", $_FILES['avatar']['name'])) {
                  Filter::$msgs['avatar'] = "Illegal file type. Only jpg and png file types allowed.";
              }
              $file_info = getimagesize($_FILES['avatar']['tmp_name']);
              if (empty($file_info))
                  Filter::$msgs['avatar'] = "Illegal file type. Only jpg and png file types allowed.";
          }
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'email' => sanitize($_POST['email']), 
				  'lname' => sanitize($_POST['lname']), 
				  'fname' => sanitize($_POST['fname']), 
				  'country' => sanitize($_POST['country']),				  
				  'city' => sanitize($_POST['city']),
				  'postal' => sanitize($_POST['postal']),
				  'newsletter' => intval($_POST['newsletter']),
				  'code_phone' => sanitize($_POST['code_phone']),
				  'phone' => sanitize($_POST['phone']),
				  'address' => sanitize($_POST['address']),
				  'gender' => sanitize($_POST['gender'])
			  );

              // Procces Avatar
              if (!empty($_FILES['avatar']['name'])) {
                  $thumbdir = UPLOADS;
                  $tName = "AVT_" . randName();
                  $text = substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], '.') + 1);
                  $thumbName = $thumbdir . $tName . "." . strtolower($text);
                  if (Filter::$id && $thumb = getValueById("avatar", self::uTable, Filter::$id)) {
                      @unlink($thumbdir . $thumb);
                  }
                  move_uploaded_file($_FILES['avatar']['tmp_name'], $thumbName);
                  $data['avatar'] = $tName . "." . strtolower($text);
              }
			     
			  $userpass = getValueById("password", self::uTable, $this->uid);
			  
			  if ($_POST['password'] != "") {
				  $data['password'] = md5($_POST['password']);
			  } else
				  $data['password'] = $userpass;
			  
              self::$db->update(self::uTable, $data, "id='" . $this->uid . "'");

              (self::$db->affected()) ? Filter::msgOk('<span>Success!</span> You have successfully updated your profile.') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
          } else
              print Filter::msgStatus();
      }

      /**
       * User::register()
       */
	  public function register()
	  {		  
		  if (empty($_POST['username']))
			  Filter::$msgs['username'] = 'Please Enter Valid Username';
		  
		  if ($value = $this->usernameExists($_POST['username'])) {
			  if ($value == 1)
				  Filter::$msgs['username'] = 'Username Is Too Short (less Than 4 Characters Long).';
			  if ($value == 2)
				  Filter::$msgs['username'] = 'Invalid Characters Found In Username.';
			  if ($value == 3)
				  Filter::$msgs['username'] = 'Sorry, This Username Is Already Taken';
		  }

		  if (empty($_POST['fname']))
			  Filter::$msgs['fname'] = 'Please Enter First Name';
			  
		  if (empty($_POST['lname']))
			  Filter::$msgs['lname'] = 'Please Enter Last Name';
		  
		  if (empty($_POST['code_phone']))
			  Filter::$msgs['code_phone'] = 'Please Enter Code Phone';
		  
		  if (empty($_POST['phone']))
			  Filter::$msgs['phone'] = 'Please Enter Phone';
		  if (empty($_POST['address']))
			  Filter::$msgs['address'] = 'Please Enter Address';
		  
		  if (empty($_POST['country']))
			  Filter::$msgs['country'] = 'Please Enter Country';
		  
		  if (empty($_POST['city']))
			  Filter::$msgs['city'] = 'Please Enter City';
		  
		  if (empty($_POST['postal']))
			  Filter::$msgs['postal'] = 'Please Enter Postal Code';
			  
		  if (empty($_POST['pass']))
			  $this->msgs['pass'] = 'Please Enter Valid Password.';
		  
		  if (strlen($_POST['pass']) < 6)
			  Filter::$msgs['pass'] = 'Password is too short (less than 6 characters long)';		  
		  if ($_POST['pass'] != $_POST['pass2'])
			  Filter::$msgs['pass'] = 'Your password did not match the confirmed password!.';
		  
		  if (empty($_POST['email']))
			  Filter::$msgs['email'] = 'Please Enter Valid Email Address';
		  
		  if ($this->emailExists($_POST['email']))
			  Filter::$msgs['email'] = 'Entered Email Address Is Already In Use.';
		  
		  if (!$this->isValidEmail($_POST['email']))
			  Filter::$msgs['email'] = 'Entered Email Address Is Not Valid.';
			  		  
		  if (empty($_POST['captcha']))
			  Filter::$msgs['captcha'] = 'Please enter captcha code!';
		  
		  if ($_SESSION['captchacode'] != $_POST['captcha'])
			  Filter::$msgs['captcha'] = "Entered captcha code is incorrect";
		  
		  if (empty($_POST['terms']))
			  Filter::$msgs['terms'] = 'Please accept the terms and conditions';
		  
		  if (empty(Filter::$msgs)) {

			  $token = (Registry::get("Core")->reg_verify == 1) ? $this->generateRandID() : 0;
			  $pass = sanitize($_POST['pass']);
			  
              if (Registry::get("Core")->reg_verify == 1) {
                  $active = "t";
              } elseif (Registry::get("Core")->auto_verify == 0) {
                  $active = "n";
              } else {
                  $active = "y";
              }
				  
			  $data = array(
					  'username' => sanitize($_POST['username']), 
					  'password' => md5($_POST['pass']),
					  'email' => sanitize($_POST['email']), 
					  'fname' => sanitize($_POST['fname']),
					  'lname' => sanitize($_POST['lname']),
					  'country' => sanitize($_POST['country']),				  
					  'city' => sanitize($_POST['city']),
					  'postal' => sanitize($_POST['postal']),
					  'code_phone' => sanitize($_POST['code_phone']),
				      'phone' => sanitize($_POST['phone']),
				      'address' => sanitize($_POST['address']),
					  'token' => $token,
					  'terms' => sanitize($_POST['terms']),
					  'active' => $active, 
					  'created' => "NOW()"
			  );
			  
			  self::$db->insert(self::uTable, $data);
		
			  require_once(BASEPATH . "lib/class_mailer.php");
			  
              if (Registry::get("Core")->reg_verify == 1) {
                  $actlink = Registry::get("Core")->site_url . "/activate.php";
                  $row = Registry::get("Core")->getRowById("email_templates", 1);
				  
                  $body = str_replace(array(
                      '[NAME]',
                      '[USERNAME]',
                      '[PASSWORD]',
                      '[TOKEN]',
                      '[EMAIL]',
                      '[URL]',
                      '[LINK]',
                      '[SITE_NAME]'), array(
                      $data['fname'] . ' ' . $data['lname'],
                      $data['username'],
                      $_POST['pass'],
                      $token,
                      $data['email'],
                      Registry::get("Core")->site_url,
                      $actlink,
                      Registry::get("Core")->site_name), $row->body);
						
				 $newbody = cleanOut($body);	
					 
				  $mailer = $mail->sendMail();
                  $message = Swift_Message::newInstance()
							->setSubject($row->subject)
							->setTo(array($data['email'] => $data['username']))
							->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
							->setBody($newbody, 'text/html');

                  $mailer->send($message);
				 
              } elseif (Registry::get("Core")->auto_verify == 0) {
                  $row = Registry::get("Core")->getRowById("email_templates", 14);
				  
                  $body = str_replace(array(
                      '[NAME]',
                      '[USERNAME]',
                      '[PASSWORD]',
                      '[URL]',
                      '[SITE_NAME]'), array(
                      $data['fname'] . ' ' . $data['lname'],
                      $data['username'],
                      $_POST['pass'],
                      Registry::get("Core")->site_url,
                      Registry::get("Core") -> site_name), $row->body);
						
				 $newbody = cleanOut($body);	

				  $mailer = $mail->sendMail();
                  $message = Swift_Message::newInstance()
							->setSubject($row->subject)
							->setTo(array($data['email'] => $data['username']))
							->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
							->setBody($newbody, 'text/html');
							
				 $mailer->send($message); 
				  
			  } else {
				  $row = Registry::get("Core")->getRowById("email_templates", 7);
				  
                  $body = str_replace(array(
                      '[NAME]',
                      '[USERNAME]',
                      '[PASSWORD]',
                      '[URL]',
                      '[SITE_NAME]'), array(
                      $data['fname'] . ' ' . $data['lname'],
                      $data['username'],
                      $_POST['pass'],
                      Registry::get("Core")->site_url,
                      Registry::get("Core")->site_name), $row->body);
						
				 $newbody = cleanOut($body);	

				  $mailer = $mail->sendMail();
                  $message = Swift_Message::newInstance()
							->setSubject($row->subject)
							->setTo(array($data['email'] => $data['username']))
							->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
							->setBody($newbody, 'text/html');
							
				 $mailer->send($message);

			  }
              if (Registry::get("Core")->notify_admin) {
                  $arow = Registry::get("Core")->getRowById("email_templates", 13);
  
                  $abody = str_replace(array(
                      '[USERNAME]',
                      '[EMAIL]',
                      '[NAME]',
                      '[IP]'), array(
                      $data['username'],
                      $data['email'],
                      $data['fname'] . ' ' . $data['lname'],
                      $_SERVER['REMOTE_ADDR']), $arow->body);
						  
				   $anewbody = cleanOut($abody);	
  
				  $amailer = $mail->sendMail();
                  $amessage = Swift_Message::newInstance()
							->setSubject($arow->subject)
							->setTo(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
							->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
							->setBody($anewbody, 'text/html');
							  
				   $amailer->send($amessage);
			  }
			  
              (self::$db->affected() && $mailer) ? Filter::msgOk("<span>Success!</span>You have registered successfully! and an email with your data was sent") : Filter::msgError('<span>Error!</span>There was an error during registration process. Please contact the administrator...', false);
          } else
              print Filter::msgStatus();
      }
	  
      /**
       * User::passReset()
       */
	  public function passReset()
	  {
		  
		  if (empty($_POST['uname']))
			  Filter::$msgs['uname'] = 'Please Enter Valid Username';
		  
		  $uname = $this->usernameExists($_POST['uname']);
		  if (strlen($_POST['uname']) < 4 || strlen($_POST['uname']) > 30 || !preg_match("/^([0-9a-z])+$/i", $_POST['uname']) || $uname != 3)
			  Filter::$msgs['uname'] = 'We are sorry, selected username does not exist in our database';

		  if (empty($_POST['email']))
			  Filter::$msgs['email'] = 'Please Enter Valid Email Address';

		  if (!$this->emailExists($_POST['email']))
			  Filter::$msgs['uname'] = 'Entered Email Address Does Not Exists.';
			    
		  if (empty($_POST['captcha']))
			  Filter::$msgs['captcha'] = 'Please enter captcha code!';
		  
		  if ($_SESSION['captchacode'] != $_POST['captcha'])
			  Filter::$msgs['captcha'] = "Entered captcha code is incorrect";
		  
		  if (empty(Filter::$msgs)) {
			  
              $user = $this->getUserInfo($_POST['uname']);
			  $randpass = $this->getUniqueCode(12);
			  $newpass = md5($randpass);
			  
			  $data['password'] = $newpass;
			  
			  self::$db->update(self::uTable, $data, "username = '" . $user->username . "'");
		  
			  require_once(BASEPATH . "lib/class_mailer.php");
			  $row = Registry::get("Core")->getRowById("email_templates", 2);
			  
              $body = str_replace(array(
                  '[USERNAME]',
                  '[PASSWORD]',
                  '[URL]',
                  '[LINK]',
                  '[IP]',
                  '[SITE_NAME]'), array(
                  $user->username,
                  $randpass,
                  Registry::get("Core")->site_url,
                  Registry::get("Core")->site_url,
                  $_SERVER['REMOTE_ADDR'],
                  Registry::get("Core")->site_name), $row->body);
					
			  $newbody = cleanOut($body);

			  $mailer = $mail->sendMail();
              $message = Swift_Message::newInstance()
						->setSubject($row->subject)
						->setTo(array($user->email => $user->username))
						->setFrom(array(Registry::get("Core")->site_email => Registry::get("Core")->site_name))
						->setBody($newbody, 'text/html');
						
              (self::$db->affected() && $mailer->send($message)) ? Filter::msgOk('<span>Success!</span>You have successfully changed your password. Please check your email for further info!', false) : Filter::msgError('<span>Error!</span>There was an error during the process. Please contact the administrator.', false);

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
	   * User::enrollmentExists()
	   */
	  private function enrollmentExists($enrollment)
	  {
		  
          $sql = self::$db->query("SELECT enrollment" 
		  . "\n FROM " . self::uTable 
		  . "\n WHERE enrollment = '" . sanitize($enrollment) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * User::vehiclecodeExists()
	   */
	  private function vehiclecodeExists($vehiclecode)
	  {
		  
          $sql = self::$db->query("SELECT vehiclecode" 
		  . "\n FROM " . self::uTable 
		  . "\n WHERE vehiclecode = '" . sanitize($vehiclecode) . "'" 
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
       * 
       * @return
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
	  
	   public function getDriverLevels($level = false)
	  {
		  $arr = array(
				 3 => 'Registered Driver'
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
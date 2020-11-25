<?php

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>
<?php //error_reporting(E_ALL);
  
  $BASEPATH = str_replace("init.php", "", realpath(__FILE__));
  
  define("BASEPATH", $BASEPATH);
  
  $configFile = BASEPATH . "lib/config.ini.php";
  if (file_exists($configFile)) {
      require_once($configFile);
  } else {
      header("Location: setup/");
  }
  
  require_once(BASEPATH . "lib/class_db.php");

  require_once(BASEPATH . "lib/NexmoMessage.php"); 
  
	
  require_once(BASEPATH . "lib/class_registry.php");
  Registry::set('Database',new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE));
  $db = Registry::get("Database");
  $db->connect();
  
  //Include Functions
  require_once(BASEPATH . "lib/functions.php");
  
  require_once(BASEPATH . "lib/config.lang.php");
  
  require_once(BASEPATH . "lib/class_filter.php");
  $request = new Filter();
	
  //Start Core Class 
  require_once(BASEPATH . "lib/class_core.php");
  Registry::set('Core',new Core());
  $core = Registry::get("Core");
  
  

  //Start Paginator Class 
  require_once(BASEPATH . "lib/class_paginate.php");
  $pager = Paginator::instance();
  
  //StartUser Class 
  require_once(BASEPATH . "lib/class_user.php");
  Registry::set('Users',new Users());
  $user = Registry::get("Users");
  
  //StartUser Class 
  require_once(BASEPATH . "lib/class_courier.php");
  Registry::set('Courier',new Courier());
  $courier = Registry::get("Courier");
   
  define("SITEURL", $core->site_url);
  define("ADMINURL", $core->site_url."/dashboard");
  define("UPLOADS", BASEPATH."uploads/");
  define("UPLOADURL", SITEURL."/uploads/");
?>
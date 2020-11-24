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
?>
<?php
  //$msgs = array();
  $post = (!empty($_POST)) ? true : false;
  
  if ($post) {
      if (empty($_POST['name']))
          Filter::$msgs['name'] = 'Please enter your name';
      
      if (empty($_POST['captcha']))
          Filter::$msgs['code'] = "Please enter captcha code";
      
	  if ($_SESSION['captchacode'] != $_POST['captcha'])
          Filter::$msgs['code'] = "Entered captcha code is incorrect";
		  
      if (empty($_POST['email']))
          Filter::$msgs['email'] = 'Please enter your email address';
      
      if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $_POST['email']))
          Filter::$msgs['email'] = 'Entered email address is invalid!';
      
      if (empty($_POST['message']))
          Filter::$msgs['message'] = 'Please enter your message';
      
      if (empty(Filter::$msgs)) {
          
          $sender_email = sanitize($_POST['email']);
          $name = sanitize($_POST['name']);
          $message = strip_tags($_POST['message']);
		  $mailsubject = sanitize($_POST['subject']);
		  $ip = sanitize($_SERVER['REMOTE_ADDR']);

		  require_once(BASEPATH . "lib/class_mailer.php");
		  $mailer = $mail->sendMail();	
					  
		  $row = Core::getRowById("email_templates", 10);
		  
		  $body = str_replace(array('[MESSAGE]', '[SENDER]', '[NAME]', '[MAILSUBJECT]', '[IP]', '[SITE_NAME]', '[URL]'), 
		  array($message, $sender_email, $name, $mailsubject, $ip, $core->site_name, $core->site_url), $row->body);

		  $message = Swift_Message::newInstance()
					->setSubject($row->subject)
					->setTo(array($core->site_email => $core->site_name))
					->setFrom(array($sender_email => $name))
					->setBody(cleanOut($body), 'text/html');
	
          if($mailer->send($message)) {
			  print "OK";
		  }
		  
      } else 
          print Filter::msgStatus();
  }
?>
<?php


  define("_VALID_PHP", true);
  require_once("../init.php");
?>
<?php
  /* Registration */
  if (isset($_POST['doRegister']))
      : if (intval($_POST['doRegister']) == 0 || empty($_POST['doRegister']))
      : redirect_to("../sign-up.php");
  endif;
  $user->register();
  endif;
?>
<?php
  /* Courier Online */
  if (isset($_POST['doRegister_online']))
      : if (intval($_POST['doRegister_online']) == 0 || empty($_POST['doRegister_online']))
      : redirect_to("../booking.php");
  endif;
  $courier->processCourier_online();
  endif;
?>


<?php
  /* Password Reset */
  if (isset($_POST['passReset']))
      : if (intval($_POST['passReset']) == 0 || empty($_POST['passReset']))
      : redirect_to("../login.php");
  endif;
  $user->passReset();
  endif;
?>
<?php
  /* Account Acctivation */
  if (isset($_POST['accActivate']))
      : if (intval($_POST['accActivate']) == 0 || empty($_POST['accActivate']))
      : redirect_to("../login.php?action=activate");
  endif;
  $user->activateUser();
  endif;
?>
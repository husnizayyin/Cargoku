<?php

  define("_VALID_PHP", true);
  require_once("../init.php");

  if (!$user->logged_in)
      redirect_to("../login.php");
?>
<?php
  /* Proccess User */
  if (isset($_POST['processUser']))
      : if (intval($_POST['processUser']) == 0 || empty($_POST['processUser']))
      : redirect_to("../account.php");
  endif;
  $user->updateProfile();
  endif;
?>

<?php
  /* Courier Online Update */
  if (isset($_POST['processBooking']))
      : if (intval($_POST['processBooking']) == 0 || empty($_POST['processBooking']))
      : redirect_to("../bookings_list.php");
  endif;
  $courier->processCourier_booking_update();
  endif;
?>

<?php
  /* Update consolidated  */
  if (isset($_POST['processDeliverconsolidated']))
      : if (intval($_POST['processDeliverconsolidated']) == 0 || empty($_POST['processDeliverconsolidated']))
      : redirect_to("../consolidated_deliveries.php");
  endif;
  $courier->processDeliverpackage();
  endif;
?>

<?php
  /* Update consolidated  */
  if (isset($_POST['processDeliver']))
      : if (intval($_POST['processDeliver']) == 0 || empty($_POST['processDeliver']))
      : redirect_to("../deliveries_list.php");
  endif;
  $courier->processDelivershipment();
  endif;
?>
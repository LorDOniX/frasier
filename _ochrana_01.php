<?php
// ochrana 01 --------------------------------------------------------------
  // start session
  include "_session.php";
  // zjisteni o vytvoreni id
  if (!isset($s_id) OR !isset($s_login) OR !isset($s_admin) OR !isset($s_datum))
  {
    // ochrana presmerovanim, neautorizovany vstup
    header('Location: zpravy.php?&zprava=7');
    exit;
  }
// ------------------------------------------------------------------------
?>

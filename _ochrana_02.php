<?php
// ochrana 01 --------------------------------------------------------------
  // start session
  include "_session.php";
  // zjisteni o vytvoreni id
  if (!isset($s_id) OR !isset($s_login) OR !isset($s_admin) OR !isset($s_datum) OR $s_admin != 1)
  {
    // ochrana presmerovanim, admin vstup
    header('Location: zpravy.php?&zprava=8');
    exit;
  }
// ------------------------------------------------------------------------
?>

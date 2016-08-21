<?php
// odhlaseni
  // start session
  include "_session.php";
  // smazani session
  session_destroy();
  // presmerovani pro neprihlasene
  header('Location: zpravy.php?zprava=5');
  exit;
?>

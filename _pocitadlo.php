<?php
  // pocet pristupu
  include("_prihlaseni.php");
  @$d_vypis = MySQL_Query("SELECT * FROM pocitadlo;");
  $pocet_pristupu = mysql_num_rows($d_vypis);
?>

<?php
  // pocet pristupu
  $login = $_POST["login"];
  $heslo = $_POST["heslo"];
  if ($login != "" AND $heslo != "")
  {
    $heslo = md5($heslo);
    include("_prihlaseni.php");
    @$d_vypis = MySQL_Query("SELECT * FROM uzivatele WHERE login = '$login';");
    $pocet_jmen = mysql_num_rows($d_vypis);
    // zajisteni uzivatele pouze 1 mozne jmeno jedinecne
    if ($pocet_jmen == 0)
    {
      // zapsani
      include("_prihlaseni.php");
      @$d_zapis = MySQL_Query("INSERT INTO uzivatele VALUES(null,'$login','$heslo','0');");
      // presmerovani
      header ('Location: zpravy.php?zprava=1');
      exit;
    }
  }
  // presmerovani
  header ('Location: zpravy.php?zprava=2');
  exit;
?>

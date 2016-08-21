<?php
  // forum
  // start session
  include "_session.php";
  $jmeno = $_POST["jmeno"];
  $zprava = $_POST["zprava"];
  $kod = $_POST["kod"];
  if ($jmeno != "" AND $zprava != "" AND $kod != "" AND isset($s_forum_kod) AND isset($s_forum_chyba))
  {
    // overeni kodu
    if ($s_forum_kod == $kod)
    {
      $email = $_POST["email"];
      $stranka = $_POST["stranka"];
      $datum = Date("j/m/Y H:i:s", Time());
      include("_prihlaseni.php");
      @$d_zapsani = MySQL_Query("INSERT INTO forum VALUES(null,'$jmeno','$email','$stranka','$datum','$zprava');");
    }
    else
    {
      // chyba
      $s_forum_chyba = 1;
      $s_forum_jmeno = $jmeno;
      $s_forum_email = $email;
      $s_forum_stranka = $stranka;
      $s_forum_zprava = $zprava;
    }
  }
  // presmerovani
  header ('Location: forum.php');
  exit;
?>

<?php
  // prihlaseni
  $login = $_POST["login"];
  $heslo = $_POST["heslo"];
  if ($login != "" AND $heslo != "")
  {
    $heslo = md5($heslo);
    include("_prihlaseni.php");
    @$d_prihlaseni = MySQL_Query("SELECT * FROM uzivatele WHERE login = '$login' AND heslo = '$heslo' LIMIT 1;");
    $login = mysql_num_rows($d_prihlaseni);
    // prihlaseni
    if ($login == 1)
    {
      // uspesne
      while ($data = MySQL_Fetch_Array($d_prihlaseni))
      {
        // start session
        include "_session.php";
        // do session si ulozime id uzivatele, jmeno a zdali je admin
        $_SESSION['s_id'] = $data["id"];
        $_SESSION['s_login'] = $data["login"];
        $_SESSION['s_admin'] = $data["admin"];
        include "_cas.php";
        $_SESSION['s_datum'] = $vys_datum;
        break;
      }
      // presmerovani
      header ('Location: zpravy.php?zprava=3');
      exit;
    }
    else
    {
      // presmerovani
      header ('Location: zpravy.php?zprava=4');
      exit;
    }
  }
  // presmerovani
  header ('Location: zpravy.php?zprava=4');
  exit;
?>

<?php
  // overeni casu
  if (isset($s_datum))
  {
    $datum = Date("j/m/Y H:i:s", Time());
    if ($datum > $s_datum)
    {
      // vyprseni doby platnosti
      header ('Location: _odhlasit2.php');
      exit;
    }
    else
    {
      // prodlouzeni doby
      include "_cas.php";
      $s_datum = $vys_datum;
    }
  }
?>

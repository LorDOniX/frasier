<?php
// ochrana skriptu
include "_ochrana_02.php";
$smazat_id = $_GET["id"];
if ($smazat_id != 0)
{
  // skript
  include "_prihlaseni.php";
  @$d_smazani = MySQL_Query("DELETE FROM forum WHERE id = '$smazat_id' LIMIT 1;");
}
// presmerovani zpet
header ('Location: forum.php');
exit;
?>

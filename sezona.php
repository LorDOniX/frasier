<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
  if (!isset($_GET["sezona"]))
  {
    $sezona = 1;
  }
  else
  {
    $sezona = $_GET["sezona"];
    if ($sezona < 0 OR $sezona > 11)
    {
      $sezona = 1;
    }
  }
  // fotka
  if ($sezona < 10)
  {
    $fotka = "0".$sezona;
  }
  else
  {
    $fotka = $sezona;
  }
  // sirka podle sezony
  $sirka = 0;
  switch ($sezona)
  {
    case 1: { $sirka = 69; break; }
    case 2: { $sirka = 73; break; }
    case 3: { $sirka = 83; break; }
    case 4: { $sirka = 85; break; }
    case 5: { $sirka = 80; break; }
    case 6: { $sirka = 76; break; }
    case 7: { $sirka = 71; break; }
    case 8: { $sirka = 68; break; }
    case 9: { $sirka = 66; break; }
    case 10: { $sirka = 70; break; }
    case 11: { $sirka = 82; break; }
  }
  $rokod = 1992 + $sezona;
  $rokdo = $rokod + 1;
  $pocet_dilu = 24;
  if ($sezona == 4)
  {
    $pocet_dilu = 23;
  }
  echo "
  <div class=\"nadpis_01\">Sezóna $sezona.</div><br />
  <center>
  <table border=0 cellpadding=1 cellspacing=1 width=600 class=\"text_02\">
  <tr>
    <th align=\"center\" colspan=2 width=200 class=\"pozadi_02\">Sezóna $sezona</th>
    <td align=\"center\" width=400 class=\"pozadi_02\">&nbsp;</td>
  </tr>
    <td align=\"center\" width=100 class=\"pozadi_02\"><img src=\"obrazky/s_$fotka.jpg\" border=0 width=$sirka height=100 /></a></td>
    <td align=\"center\" width=100 class=\"pozadi_03\">$rokod - $rokdo<br />$pocet_dilu dílù</td>
    <td align=\"left\" width=400 class=\"pozadi_03\" rowspan=3><div class=\"okraj_02\">";
  echo "<table border=0 cellpadding=1 cellspacing=1 width=385 class=\"text_02\">";
  include("_prihlaseni.php");
  @$d_vypis = MySQL_Query("SELECT * FROM epizody WHERE sezona = '$sezona' ORDER BY id ASC;");
  while ($data = MySQL_Fetch_Array($d_vypis))
  {
    if ($data["dil"] < 10)
    {
      $dil = "0".$data["dil"];
    }
    else
    {
      $dil = $data["dil"];
    }
      echo "<tr class=\"pozadi_03\" onmouseover=\"this.className='pozadi_02';\" onmouseout=\"this.className='pozadi_03';\">
      <td>[$dil] <a href=\"epizoda.php?id=$data[id]\" class=\"odkaz_n_03\" 
  onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">$data[nazevcz]</a></td></tr>";
  }
  echo "</table></div></td>
    </tr>
  <tr>
    <td colspan=2 class=\"pozadi_03\" align=\"center\"><a href=\"seznam.php\" class=\"odkaz_n_03\" 
  onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Výbìr sezóny</a></td>
  </tr>
  <tr>
    <td colspan=2>&nbsp;</td>
  </tr>  
  </table>
  </center>";
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

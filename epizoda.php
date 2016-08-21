<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
  // zjisteni id
  if (!isset($_GET["id"]))
  {
    $id = 1;
  }
  else
  {
    $id = $_GET["id"];
    if ($id < 1 OR $id > 267)
    {
      $id = 1;
    }
  }
  // vypsani z databaze
  include("_prihlaseni.php");
  @$d_vypise = MySQL_Query("SELECT * FROM epizody WHERE id = '$id' LIMIT 1;");
  while ($data = MySQL_Fetch_Array($d_vypise))
  {
    // zobrazeni fotky sezony a informace --------------------------------------
    // fotka
    $sezona = $data["sezona"];
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
    // konec -------------------------------------------------------------------
    // predchozi a dalsi
    $dil = $data["dil"];
    $casti = explode ("/",$dil);
    $akt_dil = $casti[0];
    $poc_dil = $casti[1];
    // vypsani tabulky
    echo "
    <div class=\"nadpis_01\">Výpis epizody $id</div><br />
    <center>
    <table border=0 cellpadding=1 cellspacing=1 width=700 class=\"text_02\">
    <tr>
      <th align=\"left\" colspan=3 width=300 class=\"pozadi_02\">&nbsp;&nbsp;Epizoda $id.</th>
      <td class=\"pozadi_02\" align=\"center\">";
      // predchozi
      if ($akt_dil != 1)
      {
        $p_id = $id - 1;
        echo "<a href=\"epizoda.php?id=$p_id\" class=\"odkaz_n_03\" 
  onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Pøedchozí</a>";
      }
      else
      {
        echo "&nbsp";
      }
      echo "</td>
      <td class=\"pozadi_02\" align=\"center\">"; 
      // dalsi
      if ($akt_dil != $poc_dil)
      {
        $d_id = $id + 1;
        echo "<a href=\"epizoda.php?id=$d_id\" class=\"odkaz_n_03\" 
  onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Další</a>";
      }
      else
      {
        echo "&nbsp";
      }
      echo "</td>
      <th align=\"center\" colspan=2 width=200 class=\"pozadi_02\">Sezóna $sezona</th>
    </tr>
    <tr>
      <td align=\"left\" colspan=5 width=500 class=\"pozadi_03\" align=\"left\" valign=\"middle\"><div class=\"okraj_02\">
      <table border=0 cellpadding=1 cellspacing=1 width=485 class=\"text_02\">
      <tr>
        <td align=\"right\" width=125>Poøadí epizody:</td>
        <td width=2></td>
        <th align=\"left\" width=358>$data[dil]</th>
      </tr>
      <tr>
        <td align=\"right\">Sezóna:</td>
        <td width=2></td>
        <th align=\"left\">$data[sezona]</th>
      </tr>
      <tr>
        <td align=\"right\">Èeský název:</td>
        <td width=2></td>
        <th align=\"left\">$data[nazevcz]</th>
      </tr>
      <tr>
        <td align=\"right\">Originální název:</td>
        <td width=2></td>
        <th align=\"left\">$data[nazeven]</th>
      </tr>
      <tr>
        <td align=\"right\">Datum vydání:</td>
        <td width=2></td>
        <th align=\"left\">$data[datum]</th>
      </tr>
      </table>
      </div></td>
      <td align=\"center\" width=100 height=110 class=\"pozadi_02\"><img src=\"obrazky/s_$fotka.jpg\" border=0 width=$sirka height=100 /></a></td>
      <td align=\"center\" width=100 class=\"pozadi_03\">$rokod - $rokdo<br />$pocet_dilu dílù</td>
    </tr>
    <tr>
      <td class=\"pozadi_02\" width=100><a href=\"epizoda.php?id=$id&menu=popis\"><img src=\"obrazky/t_popisdilu.gif\" width=100 height=30 border=0 /></a></td>
      <td class=\"pozadi_02\" width=100><img src=\"obrazky/t_komentare.gif\" width=100 height=30 border=0 /></td>
      <td class=\"pozadi_02\" width=100><img src=\"obrazky/t_hodnoceni.gif\" width=100 height=30 border=0 /></td>
      <td class=\"pozadi_02\" width=100><img src=\"obrazky/t_galerie.gif\" width=100 height=30 border=0 /></td>
      <td class=\"pozadi_02\" width=100><img src=\"obrazky/t_vypomoc.gif\" width=100 height=30 border=0 /></td>
      <td colspan=2 align=\"center\" class=\"pozadi_02\"><a href=\"sezona.php?sezona=$data[sezona]\" class=\"odkaz_n_03\" 
  onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Vybrat epizodu</a><br />
  <a href=\"seznam.php\" class=\"odkaz_n_03\" 
  onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Vybrat sezónu</a></td>
    </tr>
    </table>";
    // podminky pro kresleni menu
    if (isset($_GET["menu"]))
    {
      switch ($_GET["menu"])
      {
        case "popis": { include "e_popis.php"; break; }
        default: { include "e_popis.php"; }
      }
    }
    else
    {
      include "e_popis.php";
    }
  }
  echo "</center>";
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

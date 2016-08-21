<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
  // vytvoreni kodu
  $forum_kod = rand(10000,99999);
  if (!isset($s_forum_kod))
  {
    $_SESSION['s_forum_kod'] = $forum_kod;
  }
  else
  {
    $s_forum_kod = $forum_kod;
  }
  if (!isset($s_forum_jmeno) AND !isset($s_forum_email) AND !isset($s_forum_stranka) AND !isset($s_forum_zprava) AND !isset($s_forum_chyba))
  {
    $_SESSION['s_forum_jmeno'] = "";
    $_SESSION['s_forum_email'] = "";
    $_SESSION['s_forum_stranka'] = "";
    $_SESSION['s_forum_zprava'] = "";
    $_SESSION['s_forum_chyba'] = 0;
  }
  // pokud se formular vratil zpet, prirazeni hodnot
  if ($s_forum_chyba == 1)
  {
    $hod_jmeno = $s_forum_jmeno;
    $hod_email = $s_forum_email;
    $hod_stranka = $s_forum_stranka;
    $hod_zprava = $s_forum_zprava;
    // vynulovani hodnot
    $s_forum_chyba = 0;
    $s_forum_jmeno = "";
    $s_forum_email = "";
    $s_forum_stranka = "";
    $s_forum_zprava = "";
  }
  else
  {
    $hod_jmeno = "";
    $hod_email = "";
    $hod_stranka = "http://";
    $hod_zprava = "";
  }
?>
<div class="nadpis_01">Fórum</div><br />
<center>
<table border=0 cellpadding=0 cellspacing=0 width=400 class="text_02">
<form name="forum" action="_forum.php" method="post" onsubmit="return kontrola_3();">
<tr class="pozadi_02">
  <th width=150>Jméno:</th>
  <td width=250 align="center"><input type="text" size=35 class="text_02 ramecek_01" name="jmeno" value="<?php echo $hod_jmeno; ?>" /></td>
</tr>
<tr><td colspan=2 height=1></td></tr>
<tr class="pozadi_03">
  <th width=150>Email:</th>
  <td width=250 align="center"><input type="text" size=35 class="text_02 ramecek_01" name="email" value="<?php echo $hod_email; ?>" /></td>
</tr>
<tr><td colspan=2 height=1></td></tr>
<tr class="pozadi_02">
  <th width=150>Stránka:</th>
  <td width=250 align="center"><input type="text" size=35 class="text_02 ramecek_01" name="stranka" value="<?php echo $hod_stranka; ?>" /></td>
</tr>
<tr><td colspan=2 height=1></td></tr>
<tr class="pozadi_03">
  <th width=150>Zpráva:</th>
  <td width=250 align="center"><textarea class="text_02 ramecek_01" name="zprava" cols=32 rows=4><?php echo $hod_zprava; ?></textarea></td>
</tr>
<tr><td colspan=2 height=1></td></tr>
<tr class="pozadi_03">
  <th width=150>&nbsp;</th>
  <td width=250 align="center"><?php 
    for ($ij = 1; $ij <= 20; $ij++)
    {
      if ($ij < 10)
      {
        $cislo = "0".$ij;
      }
      else
      {
        $cislo = $ij;
      }
      // smajlici
      switch ($ij)
      {
        case 1: { $smajlik = ":))"; break; }
        case 2: { $smajlik = "*2*"; break; }
        case 3: { $smajlik = "*3*"; break; }
        case 4: { $smajlik = "*4*"; break; }
        case 5: { $smajlik = ":)"; break; }
        case 6: { $smajlik = "*6*"; break; }
        case 7: { $smajlik = ":|"; break; }
        case 8: { $smajlik = "*8*"; break; }
        case 9: { $smajlik = ":("; break; }
        case 10: { $smajlik = "*10*"; break; }
        case 11: { $smajlik = "*11*"; break; }
        case 12: { $smajlik = "*12*"; break; }
        case 13: { $smajlik = "*13*"; break; }
        case 14: { $smajlik = "*14*"; break; }
        case 15: { $smajlik = "*15*"; break; }
        case 16: { $smajlik = "*16*"; break; }
        case 17: { $smajlik = "*17*"; break; }
        case 18: { $smajlik = "*18*"; break; }
        case 19: { $smajlik = "*19*"; break; }
        case 20: { $smajlik = "*20*"; break; }
      }
      echo "<img src=\"smajlici/$cislo.gif\" border=0 width=15 height=15 onclick=\"vloz_smajlika('$smajlik');\" class=\"kurzor_01\" />&nbsp;";
      if ($ij == 10)
      {
        echo "<br />";
      }
    }
    ?></td>
</tr>
<tr><td colspan=2 height=1></td></tr>
<tr class="pozadi_02">
  <th width=150>Kód:</th>
  <td width=250 align="center"><input type="text" size=5 class="text_02 ramecek_01" name="kod" /> <?php echo $forum_kod; ?></td>
</tr>
<tr><td colspan=2 height=1></td></tr>
<tr class="pozadi_03">
  <th width=150>&nbsp;</th>
  <td width=250 align="left"><input type="submit" class="text_02 tlacitko_02" value="Odeslat" /></td>
</tr>
</form>
</table>
<?php
  // strankovani--------------------------------------------------------------
  if (!isset($_GET["stranka"]))
  {
    $stranka = 1;
  }
  else
  {
    $stranka = $_GET["stranka"];
  }
  // pocet polozek
  include("_prihlaseni.php");
  // celkovy pocet polozek
  @$d_pocpol = MySQL_Query("SELECT * FROM forum;");
  $pocet_nastr = 10;
  $celkovy_pocet = mysql_num_rows($d_pocpol);
  $pocet_str = ceil($celkovy_pocet / $pocet_nastr);
  $od = ($pocet_nastr * $stranka) - $pocet_nastr;
  // konec strankovani--------------------------------------------------------
  // vypsani prispevku
  include("_prihlaseni.php");
  @$d_vypis = MySQL_Query("SELECT * FROM forum ORDER BY id DESC LIMIT $od,$pocet_nastr;");
  if (mysql_num_rows($d_vypis) == 0)
  {
    echo "<br />Nebyl nalezen žádný záznam";
  }
  else
  {
    // nakresleni tabulky
    echo "<table border=0 cellpadding=0 cellspacing=0 width=700 class=\"text_02\">
          <tr><td colspan=4 height=10></td></tr>
          <tr><td colspan=4 align=\"center\">";
    // strankovani vypsani
    // predchozi
    if ($stranka != 1)
    {
      $predchozi = $stranka - 1;
      echo "<a href=\"forum.php?stranka=$predchozi\" class=\"odkaz_n_03\" 
      onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Pøedchozí</a>&nbsp;";
    }
    for ($i = 1; $i <= $pocet_str; $i++)
    {
      // zvyrazneni akt. str
      if ($stranka == $i)
      {
        $napsani = "<span style=\"color: red\">$i</span>";
      }
      else
      {
        $napsani = $i;
      }
      echo "<a href=\"forum.php?stranka=$i\" class=\"odkaz_n_03\" 
      onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">$napsani</a>&nbsp;";
    }
    // dalsi
    if ($stranka != $pocet_str)
    {
      $dalsi = $stranka + 1;
      echo "<a href=\"forum.php?stranka=$dalsi\" class=\"odkaz_n_03\" 
      onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Další</a>&nbsp;";
    }
    // konec strankovani
    echo "</td></tr><tr><td colspan=4><hr noshade /></td></tr>
                <tr><td colspan=4 height=10></td></tr>";
    // vypis
    $pom = 1;
    while ($data = MySQL_Fetch_Array($d_vypis))
    {
      // stridani barev
      if ($pom == 1)
      {
        $barva_01 = "pozadi_02";
        $barva_02 = "pozadi_03";
        $pom = 2;
      }
      else
      {
        $barva_01 = "pozadi_03";
        $barva_02 = "pozadi_02";
        $pom = 1;
      }
      // smajlici
      $text_vzkaz = $data["zprava"];
      include "_smajlici.php";
      echo "<tr>
              <th class=\"$barva_01\" width=100>Jméno:</th>
              <td class=\"$barva_02\" width=250 align=\"center\">$data[jmeno]</td>
              <th class=\"$barva_01\" width=100>Email:</th>
              <td class=\"$barva_02\" width=250 align=\"center\">";
              if ($data["email"] == "")
              {
                echo "nezadáno";
              }
              else
              {
                echo "<a href=\"mailto:$data[email]\" class=\"odkaz_n_03\" onmouseover=\"this.className='odkaz_z_03';\" 
              onmouseout=\"this.className='odkaz_n_03';\">$data[email]</a>";
              }
              echo "</td>
            </tr>
            <tr><td colspan=4 height=1></td></tr>
            <tr>
              <th class=\"$barva_01\" width=100>Stránka:</th>
              <td class=\"$barva_02\" width=250 align=\"center\">";
              if ($data["stranka"] == "http://")
              {
                echo "nezadáno";
              }
              else
              {
                echo "<a href=\"$data[stranka]\" target=\"_blank\" 
              class=\"odkaz_n_03\" onmouseover=\"this.className='odkaz_z_03';\" 
              onmouseout=\"this.className='odkaz_n_03';\">$data[stranka]</a>";
              }
              echo "</td>
              <th class=\"$barva_01\" width=100>Datum:</th>
              <td class=\"$barva_02\" width=250 align=\"center\">$data[datum]</td>
            </tr>
            <tr><td colspan=4 height=1></td></tr>
            <tr>
              <th class=\"$barva_01\" width=100>Zpráva:";
              // smazani pouze adminem
              if (isset($s_admin) AND $s_admin == 1)
              {
                echo "&nbsp;<a href=\"_smazatprispevek.php?id=$data[id]\" 
                onclick=\"return window.confirm('Opravdu chcete tento pøíspìvek smazat ?');\"><img 
                src=\"obrazky/smazat.bmp\" border=0 width=12 height=12 /></a>";
              }
              echo "</th>
              <td colspan=3 class=\"$barva_02 okraj_02\" width=600>$text_vzkaz</td>
            </tr>
            <tr><td colspan=4 height=10></td></tr>";
    }
    // strankovani vypsani
    echo "<tr><td colspan=4><hr noshade /></td></tr>
          <tr><td colspan=4 align=\"center\">";
    // predchozi
    if ($stranka != 1)
    {
      $predchozi = $stranka - 1;
      echo "<a href=\"forum.php?stranka=$predchozi\" class=\"odkaz_n_03\" 
      onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Pøedchozí</a>&nbsp;";
    }
    for ($i = 1; $i <= $pocet_str; $i++)
    {
      // zvyrazneni akt. str
      if ($stranka == $i)
      {
        $napsani = "<span style=\"color: red\">$i</span>";
      }
      else
      {
        $napsani = $i;
      }
      echo "<a href=\"forum.php?stranka=$i\" class=\"odkaz_n_03\" 
      onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">$napsani</a>&nbsp;";
    }
    // dalsi
    if ($stranka != $pocet_str)
    {
      $dalsi = $stranka + 1;
      echo "<a href=\"forum.php?stranka=$dalsi\" class=\"odkaz_n_03\" 
      onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">Další</a>&nbsp;";
    }
    // konec strankovani
    echo "</td></tr></table>";
  }
?>
</center>
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

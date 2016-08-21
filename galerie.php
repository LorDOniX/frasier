<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
?>
<div class="nadpis_01">Galerie</div><br />
<center>
<table border=0 cellpadding=0 cellspacing=0 width=710 class="text_02">
<?php
// strankovani------------------------------------------------------------------
if (!isset($_GET["stranka"]))
{
  $stranka = 1;
}
else
{
  $stranka = $_GET["stranka"];
}
$pocet_nastr = 10;
$celkovy_pocet = 211;
$pocet_str = ceil($celkovy_pocet / $pocet_nastr);
$od = ($pocet_nastr * $stranka) - $pocet_nastr + 1;
$do = $od + $pocet_nastr - 1;
if ($do > $celkovy_pocet)
{
  $do = $celkovy_pocet;
}
// rozmery obrazku 170x118 ramecek, 130x98, 75x98
// konec strankovani------------------------------------------------------------
// vypsani
$pom = 1;
for ($j = $od; $j <= $do; $j++)
{
  // osetreni prom pom
  if ($pom == 5)
  {
    $pom = 1;
  }
  // vytvoreni prom. fotka
  if ($j < 10)
  {
    $fotka = "00".$j;
  }
  else
  { 
    if ($j < 100)
    {
      $fotka = "0".$j;
    }
    else
    {
      $fotka = $j;
    }
  }
  // nastavení rozmeru fotky
  list($sirka, $vyska) = getimagesize("obrazky_galerie/galerie$fotka.jpg");
  $n_sirka = 130;
  $n_vyska = 98;
  if ($sirka != $vyska)
  {
    if ($sirka > $vyska)
    {
      // obrazek formatu 4:3
      $pomer = $sirka / $n_sirka;
      $sirka = $n_sirka;
      $vyska = $vyska / $pomer;
    }
    else
    {
      // obrazek formatu 3:4
      $pomer = $vyska / $n_vyska;
      $vyska = $n_vyska;
      $sirka = $sirka / $pomer;
    }
  }
  else
  {
    $sirka = $n_sirka;
    $vyska = $n_vyska;
  }
  if ($pom == 1)
  {
    echo "<tr>";
  }
  echo "<td class=\"ramecek_01\" width=170 height=118 align=\"center\" valign=\"middle\">
  <a href=\"obrazek.php?id=$j\"><img src=\"obrazky_galerie/galerie$fotka.jpg\" border=0 width=$sirka height=$n_vyska /></a></td>";
  if (($do - $od) < 4)
  {
    echo "</tr><tr><td height=10 colspan=7>&nbsp;</td></tr>";
  }
  if ($pom == 4)
  {
    echo "</tr><tr><td height=10 colspan=7>&nbsp;</td></tr>";
  }
  else
  {
    echo "<td width=10></td>";
  }
  $pom++;
}
// strankovani
echo "
<tr><td colspan=7 height=10></td></tr>
<tr><td colspan=7><hr noshade /></td></tr>
<tr><td align=\"center\" colspan=7>";
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
  echo "<a href=\"galerie.php?stranka=$i\" class=\"odkaz_n_01\" 
  onmouseover=\"this.className='odkaz_z_01';\" onmouseout=\"this.className='odkaz_n_01';\">$napsani</a>&nbsp;";
}
echo "</td></tr>";
?>
</table>
</center>
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

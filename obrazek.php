<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
?>
<div class="nadpis_01">Zobrazení obrázku</div><br />
<center>
<table border=0 cellpadding=0 cellspacing=0 class="text_02">
<?php
// strankovani------------------------------------------------------------------
if (!isset($_GET["id"]) OR $_GET["id"] == 0 OR $_GET["id"] > 211)
{
  $id = 1;
}
else
{
  $id = $_GET["id"];
}
if ($id < 10)
{
  $fotka = "00".$id;
}
else
{ 
  if ($id < 100)
  {
    $fotka = "0".$id;
  }
  else
  {
    $fotka = $id;
  }
}
// galerie
$galerie = ceil($id / 10);
// nastavení rozmeru fotky
list($sirka, $vyska) = getimagesize("obrazky_galerie/galerie$fotka.jpg");
if ($sirka > 780 OR $vyska > 780)
{
$n_sirka = 780;
$n_vyska = 780;
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
}
if ($id == 1)
{
  $predchozi = "";
}
else
{
  $cp = $id - 1;
  $predchozi = "<a href=\"obrazek.php?id=$cp\" class=\"odkaz_n_01\" onmouseover=\"this.className='odkaz_z_01';\"
     onmouseout=\"this.className='odkaz_n_01';\"><--</a>&nbsp;";
}
if ($id == 211)
{
  $dalsi = "";
}
else
{
  $cd = $id + 1;
  $dalsi = "&nbsp;<a href=\"obrazek.php?id=$cd\" class=\"odkaz_n_01\" onmouseover=\"this.className='odkaz_z_01';\"
     onmouseout=\"this.className='odkaz_n_01';\">--></a>";
}
echo "
  <tr>
    <td class=\"ramecek_01 okraj_03\" align=\"center\" valign=\"middle\"><img 
    src=\"obrazky_galerie/galerie$fotka.jpg\" border=0 width=$sirka height=$n_vyska /></td>
  <tr>
    <td align=\"center\">$predchozi<a href=\"galerie.php?stranka=$galerie\" class=\"odkaz_n_01\" onmouseover=\"this.className='odkaz_z_01';\"
     onmouseout=\"this.className='odkaz_n_01';\">Zpìt</a>$dalsi</td>
  </tr>";
?>
</table>
</center>
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

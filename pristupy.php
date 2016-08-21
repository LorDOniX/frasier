<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
?>
<div class="nadpis_01">Pøístupy na stránky</div><br />
<center>
<table border=0 cellpadding=0 cellspacing=0 width=350 class="text_02">
<tr>
  <th width=175>IP adresa</th>
  <th width=175>Datum</th>
</tr>
<tr><td colspan=2><hr noshade /></td></tr>
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
// pocet polozek
include("_prihlaseni.php");
@$d_pocpol = MySQL_Query("SELECT * FROM pocitadlo;");
$pocet_nastr = 25;
$celkovy_pocet = mysql_num_rows($d_pocpol);
$pocet_str = ceil($celkovy_pocet / $pocet_nastr);
$od = ($pocet_nastr * $stranka) - $pocet_nastr;
// konec strankovani------------------------------------------------------------
// vypsani
include("_prihlaseni.php");
@$d_sezpri = MySQL_Query("SELECT * FROM pocitadlo ORDER BY id DESC LIMIT $od,$pocet_nastr;");
if (mysql_num_rows($d_sezpri) == 0)
{
  echo "<tr><td align=\"center\" colspan=2>Nenalezen ¾ádný záznam</td></tr>";
}
while ($data = MySQL_Fetch_Array($d_sezpri))
{
  echo "
  <tr>
    <td width=300 align=\"center\">$data[ip]</td>
    <td width=300 align=\"center\">$data[datum]</td>
  </tr>";
}
// strankovani
echo "
<tr><td colspan=2><hr noshade /></td></tr>
<tr><td width=300 align=\"center\" wrap colspan=2>";
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
  echo "<a href=\"pristupy.php?stranka=$i\" class=\"odkaz_n_01\" 
  onmouseover=\"this.className='odkaz_z_01';\" onmouseout=\"this.className='odkaz_n_01';\">$napsani</a>&nbsp;";
  // zarovnani
  if ($i % 30 == 0) break;
}
echo "</td></tr>";
?>
</table>
</center>
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

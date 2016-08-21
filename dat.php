<?php
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
  if (isset($_POST["sez"]))
  {
    $sez = $_POST["sez"];
    $dil = $_POST["dil"];
    $nazcz = $_POST["nazcz"];
    $nazen = $_POST["nazen"];
    $datum = $_POST["datum"];
    $popis = $_POST["popis"];
    include("_prihlaseni.php");
    @$d_zapsani = MySQL_Query("INSERT INTO epizody VALUES(null,'$sez','$dil','$nazcz','$nazen','$datum','$popis');");
    if ($d_zapsani)
    {
      echo "OK";
    }
    else
    {
      echo "Error";
    }
  }
?>
<div class="nadpis_01">Vkládání dat</div><br />
<center>
<table border=0 cellpadding=0 cellspacing=0 class="text_02">
<form action="dat.php" method="post">
<tr>
  <th align="left" width=100>Sezóna:</th>
  <td><input type="text" size=20 class="text_02 ramecek_01" name="sez" value="11" /></td>
</tr>
<tr>
  <th align="left">Díl:</th>
  <td><input type="text" size=20 class="text_02 ramecek_01" name="dil" value="0/24" /></td>
</tr>
<tr>
  <th align="left">Nazevcz:</th>
  <td><input type="text" size=20 class="text_02 ramecek_01" name="nazcz" /></td>
</tr>
<tr>
  <th align="left">Nazeven:</th>
  <td><input type="text" size=20 class="text_02 ramecek_01" name="nazen" /></td>
</tr>
<tr>
  <td height=2></td>
</tr>  
<tr>
  <th align="left">Datum:</th>
  <td><input type="text" size=20 class="text_02 ramecek_01" name="datum" value="2004" /></td>
</tr>
<tr>
  <th align="left">Popis:</th>
  <td><textarea cols=35 rows=5 class="text_02 ramecek_01" name="popis"></textarea></td>
</tr>
<tr>
  <td align="center" colspan=2><input type="submit" size=20 class="tlacitko_02" value="Vložit" /></td>
</tr>  
</form>
</table>
</center>
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

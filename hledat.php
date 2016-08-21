<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
  // hledany vyraz
  if (!isset($_GET["vyraz"]))
  {
    $vyraz = "";
  }
  else
  {
    $vyraz = $_GET["vyraz"];
  }
?>
<center>
<table border=0 cellpadding=1 cellspacing=1 width=600 class="text_02">
<tr>
  <th align="left" class="pozadi_02 okraj_02">&nbsp;Výsledky hledání: <?php echo $vyraz; ?></th>
</tr>
<?php
  // zobrazení výsledkù hledání
  // vyhledani v epizodach
  include("_prihlaseni.php");
  @$d_hledani = MySQL_Query("SELECT * FROM epizody WHERE sezona LIKE '%$vyraz%' OR dil LIKE '%$vyraz%'
  OR nazevcz LIKE '%$vyraz%' OR nazeven LIKE '%$vyraz%' OR popis LIKE '%$vyraz%' ORDER BY id ASC;");
  if (mysql_num_rows($d_hledani) == 0)
  {
    echo "<tr><td>Nebyl nalezen žádný záznam !</td></tr>";
  }
  else
  {
    // vypsani
    echo "<tr><td height=5></td></tr>";
    while ($data = MySQL_Fetch_Array($d_hledani))
    {
      if ($data["dil"] < 10)
      {
        $dil = "0".$data["dil"];
      }
      else
      {
        $dil = $data["dil"];
      }
      echo "<tr class=\"pozadi_06\" onmouseover=\"this.className='pozadi_03';\" onmouseout=\"this.className='pozadi_06';\">
      <td>[<span style=\"font: bold 12px Verdana\">$data[sezona]</span>] [$dil] <a href=\"epizoda.php?id=$data[id]\" class=\"odkaz_n_03\" 
  onmouseover=\"this.className='odkaz_z_03';\" onmouseout=\"this.className='odkaz_n_03';\">$data[nazevcz]</a></td></tr>";
    }
  }
?>
<tr>
  <td><hr noshade /></td>
</tr>
</table>
</center>
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>
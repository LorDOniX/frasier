<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
?>
<div class="nadpis_01">Zpr�vy</div><br />
<?php
  // seznam zprav
  if (!isset($_GET["zprava"]))
  {
    echo "Chyb� prom�nn� zpr�va !";
  }
  else
  {
    switch ($_GET["zprava"])
    {
      case 1: { echo "�sp�n� registrace !"; break; }
      case 2: { echo "Ne�p�n� registrace ! Bu� pr�zdn� hodnoty nebo je ji� vytvo�en� kontakt se stejn�m jm�nem !"; break; }
      case 3: { echo "�sp�n� p�ihl�en� !"; break; }
      case 4: { echo "Ne�sp�n� p�ihl�en� ! Bu� pr�zdn� hodnoty nebo �patn� �daje !"; break; }
      case 5: { echo "�sp�n� odhl�en� !"; break; }
      case 6: { echo "Odhl�en� po 15-ti minut�ch ne�innosti !"; break; }
      case 7: { echo "Neopr�vn�n� vstup, pouze pro p�ihl�en� u�ivatele !"; break; }
      case 8: { echo "Neopr�vn�n� vstup, pouze pro admina !"; break; }
      default: { echo "��dn� zpr�va !"; }
    }
  }
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

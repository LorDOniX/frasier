<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
?>
<div class="nadpis_01">Zprávy</div><br />
<?php
  // seznam zprav
  if (!isset($_GET["zprava"]))
  {
    echo "Chybí promìnná zpráva !";
  }
  else
  {
    switch ($_GET["zprava"])
    {
      case 1: { echo "Úspìšná registrace !"; break; }
      case 2: { echo "Neúpìšná registrace ! Buï prázdné hodnoty nebo je již vytvoøený kontakt se stejným jménem !"; break; }
      case 3: { echo "Úspìšné pøihlášení !"; break; }
      case 4: { echo "Neúspìšné pøihlášení ! Buï prázdné hodnoty nebo špatné údaje !"; break; }
      case 5: { echo "Úspìšné odhlášení !"; break; }
      case 6: { echo "Odhlášení po 15-ti minutách neèinnosti !"; break; }
      case 7: { echo "Neoprávnìný vstup, pouze pro pøihlášené uživatele !"; break; }
      case 8: { echo "Neoprávnìný vstup, pouze pro admina !"; break; }
      default: { echo "Žádná zpráva !"; }
    }
  }
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

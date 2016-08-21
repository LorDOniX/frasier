<?php
// vytvoreni datumu platnosti
  $sekunda = Date("s", Time());
  $minuta = Date("i", Time());
  $hodina = Date("H", Time());
  $den = Date("j", Time());
  // promen. doba -------------------------------------
  $doba = 900;
    // hodiny
    $p_h = floor($doba / 3600);
    $hodina = $hodina + $p_h;
    $doba = $doba - (3600 * $p_h);
    // minuty
    $p_m = floor($doba / 60);
    $minuta = $minuta + $p_m;
    $doba = $doba - (60 * $p_m);
    // sekundy
    $sekunda = $sekunda + $doba;
    // podminky
    if ($sekunda > 60)
    {
      $minuta++;
      $sekunda = $sekunda - 60;
    }
    if ($minuta > 60)
    {
      $hodina++;
      $minuta = $minuta - 60;
    }
    if ($hodina > 24)
    {
      $den++;
      $hodina = $hodina - 24;
    }
    // pridani nuly
    if ($sekunda < 10)
    {
      $sekunda = "0".$sekunda;
    }    
    if ($minuta < 10)
    {
      $minuta = "0".$minuta;
    }
    if ($hodina < 10)
    {
      $hodina = "0".$hodina;
    }
  // -------------------------------------------------
  $doc_dat = Date("/m/Y ", Time());
  $vys_datum = "$den".$doc_dat."$hodina:$minuta:$sekunda";
  // vysledek = $vys_datum;
?>

<?php
  // inkludovani session
  include "_session.php";
  // zapsani pocitadla
  include("_prihlaseni.php");
  $datum = Date("j/m/Y H:i:s", Time());
  @$d_zapis = MySQL_Query("INSERT INTO pocitadlo VALUES(null,'$REMOTE_ADDR','$datum');");
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
?>
<h1 style="font: bold 20px Verdana; text-decoration: underline;">Frasier</h1>
Frasier je americký sitcom, který navazuje na Cheers. Hlavní roli zde hraje Kelsey Grammar,
který jednu televizní postavu hrál pøes 20 let. Jedná se o situaèní komedii, která
Vás pobaví inteligentním humorem a perfektním stvárnìním všech postav.
Pokud si tedy nìkdy najdete èas, zkuste se podívat na jednu epizodu, a uvidíte,
jestli Vás to bude bavit.
<h1 style="font: bold 20px Verdana; text-decoration: underline;">O stránkách</h1>
Ahoj vítám Vás na svých stránkách o vynikajícím sitcomu Frasier. Èeká zde na Vás vše, co se týká tohoto sitcomu, bohatá galerie fotek a èeský
popis spousty epizod seriálu. Užijte si prohlížení stránek.<br />S pozdravem Roman Makudera 2010 (c)
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

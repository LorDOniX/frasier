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
Frasier je americk� sitcom, kter� navazuje na Cheers. Hlavn� roli zde hraje Kelsey Grammar,
kter� jednu televizn� postavu hr�l p�es 20 let. Jedn� se o situa�n� komedii, kter�
V�s pobav� inteligentn�m humorem a perfektn�m stv�rn�n�m v�ech postav.
Pokud si tedy n�kdy najdete �as, zkuste se pod�vat na jednu epizodu, a uvid�te,
jestli V�s to bude bavit.
<h1 style="font: bold 20px Verdana; text-decoration: underline;">O str�nk�ch</h1>
Ahoj v�t�m V�s na sv�ch str�nk�ch o vynikaj�c�m sitcomu Frasier. �ek� zde na V�s v�e, co se t�k� tohoto sitcomu, bohat� galerie fotek a �esk�
popis spousty epizod seri�lu. U�ijte si prohl�en� str�nek.<br />S pozdravem Roman Makudera 2010 (c)
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

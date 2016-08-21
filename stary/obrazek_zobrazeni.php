<?
if ( $cislo < 1 || $cislo > 211 ) // 211 pocet fotek celkem
  $cislo = '001'; // zaklad pri spatnem cisle
echo "
<img src='obrazky_galerie/galerie$cislo.jpg' border='0' alt='' />
";
?>
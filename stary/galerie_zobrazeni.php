<?
echo "
<div>
";
if ( ! IsSet ( $stranka ))
  {
  $stranka = 1;
  }
$pocet_fotek = 12; // pocet fotek na stranku
$konec = ( 211 / $pocet_fotek ) + 1; // celkem fotek 211
if ( $stranka < 1 || $stranka > $konec ) // 211 pocet fotek celkem
  $stranka = 1; // zaklad pri spatnem cisle
$index = 1;
for ( $index = 1; $index <= $konec; $index++ )
  {
  echo "<a href='galerie.php?stranka=$index' title='' class='odkaz_n' onmouseover=this.className='odkaz_z' onmouseout=this.className='odkaz_n' />";
  if ( $stranka == $index)
    {
    echo "<span style='color: red;'>$index</span>";
    }
  else
    {
    echo "$index";
    }
  echo "</a>&nbsp;";
  }
echo "
</div><br />
";
$start = ( $stranka * $pocet_fotek ) - ( $pocet_fotek - 1 );
$konec = $start + $pocet_fotek - 1;
for ( $i = $start; $i <= $konec; $i++ )
  {
  // cislo je vetsi jak 100
  $cislo_galerie = $i;
  // overeni zda je cislo do 100
  if ( $i < 100 && $i >= 10 )
    {
    $cislo_galerie = '0'.$i; // spojime nazev s 0
    }
  else
    {
    if ( $i < 10 )
      {
      $cislo_galerie = '00'.$i; // spojime nazev s 00
      }
    }
  if ( $i < 212 ) // pokud dosazeno vsech fotek nekresli ( fotek + 1 )
    {
    echo "
    <a href='obrazek.php?cislo=$cislo_galerie' title=''>
    <img src='obrazky_galerie/galerie$cislo_galerie.jpg' width='121' height='83' border='0' alt='' /></a>
    ";
    }
  }
echo "
</div>
";
?>
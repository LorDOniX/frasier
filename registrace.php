<?php
  // inkludovani session
  include "_session.php";
  // inkludovani kostry stranek 01
  include "i_kostra_01.php";
?>
<div class="nadpis_01">Registrace nového uživatele</div><br />
<center>
<table border=0 cellpadding=0 cellspacing=0 class="text_02">
<form name="registrace" action="_registrace.php" method="post" onsubmit="return kontrola_2();">
<tr>
  <th align="left" width=100>Login:</th>
</tr>
<tr>
  <td><input type="text" size=20 class="text_02 ramecek_01" name="login" /></td>
</tr>
<tr>
  <th align="left">Heslo:</th>
</tr>
<tr>
  <td><input type="password" size=20 class="text_02 ramecek_01" name="heslo" /></td>
</tr>
<tr>
  <td height=2></td>
</tr>  
<tr>
  <td align="center"><input type="submit" size=20 class="tlacitko_02" value="Registrovat" /></td>
</tr>  
</form>
</table>
</center>
<?php
  // inkludovani kostry stranek 02
  include "i_kostra_02.php";
?>

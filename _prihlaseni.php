<?php
// spojeni s databazi
//@$spojeni = mysql_connect("mysql.ic.cz","ic_frasier","FRAsiER1");
@$spojeni = mysql_connect("localhost","root","");
mysql_query("SET character_set_client=cp1250"); 
mysql_query("SET collation_connection=cp1250_general_ci"); 
mysql_query("SET character_set_connection=cp1250"); 
mysql_query("SET character_set_results=cp1250");
if (!$spojeni)
{
  echo "Chyba, nelze se pripojit k databázi !";
}
MySQL_Select_DB("ic_frasier");
?>

<?php

    $txt_login="root";
    $txt_kennwort="";
    $txt_adresse="localhost";
    $txt_datenbank="biscuit";
    
    mysql_connect($txt_adresse, $txt_login, $txt_kennwort)
    or die ("Keine Verbindung möglich");
    
    mysql_select_db($txt_datenbank)
    or die ("Datenbank nicht gefunden");


function func_a_auslesen(){
    $txt_sql_statement = "";    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getLieferanten(){
    $txt_sql_statemen = "SELECT * from tbl_lieferanten";

    $a_sql_result = mysql_query($txt_sql_statemen)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = array();
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}
?>

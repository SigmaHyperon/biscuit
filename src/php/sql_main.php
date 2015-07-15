<!-----------------------------------------------------------------
Ersteller:          Fr3d.dy                             
Erstell-Datum:      03.07.2015          
Änderungsdatum:                             
Inhalt:            Mainfile PHP / SQL
-------------------------------------------------------------------> 
<?php

    $txt_login="IT-Verwaltung";
    $txt_kennwort="X5XgY/YU6+";
    $txt_adresse="localhost";
    $txt_datenbank="biscuit";
    
    include 'sql_benutzer.php';
    include 'sql_delete.php';
    include 'sql_get.php';
    include 'sql_insert.php';
    include 'sql_update.php';
    include 'sql_search.php';
    
    mysql_connect($txt_adresse, $txt_login, $txt_kennwort)
    or die ("Keine Verbindung möglich");
    
    mysql_select_db($txt_datenbank)
    or die ("Datenbank nicht gefunden");



/**
 * 
 * @param type $s_Tabellenname - Name d. Tabelle
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_a_Lesen_von_tabelle($s_Tabellenname)
{
    $txt_sql_statement = "SELECT * FROM ".$s_Tabellenname.";";    
    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = array();
    while($a_Tabellen_eintrag = mysql_fetch_assoc($a_sql_result))
    {
	$a_Tabellen_daten[] = $a_Tabellen_eintrag;
    }
    return $a_Tabellen_daten;
}

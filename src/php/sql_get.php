<?php


 /**
  * 
  * @param $s_tabelle - Die Tabelle die Ausgegeben werden soll
  * @return Gibt die vollständige Tabelle aus
  */
function func_a_getFullTable($s_tabelle)
{
    $a_sql_ausgabe = array();
    $txt_sql_statement = "SELECT * FROM ".$s_tabelle.";";    
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt alle Lieferanten aus
 */
function func_a_getLieferanten()
{
    $txt_sql_statement = "SELECT * FROM tbl_lieferanten;";

    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = array();
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt alle Räume aus
 */
function func_a_getRaeume()
{
    $txt_sql_statement = "SELECT * FROM tbl_raeume;";
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt alle Geräte aus
 */
function func_a_getGeraete()
{
    $txt_sql_statement = "SELECT tbl_geraete.geraete_id, tbl_raeume.raum_name, tbl_lieferanten.lieferant_firmenname, tbl_geraete.geraet_name, tbl_geraete.geraet_ek_datum, tbl_geraete.geraet_notiz, tbl_geraete.geraet_hersteller, tbl_geraete.geraet_gewaehr_beginn, tbl_geraete.geraet_gewaehr_ende, tbl_geraete.geraete_seriennummer, tbl_geraete_art.geraete_art_name   "
			."FROM biscuit.tbl_geraete "
			."left join tbl_raeume on tbl_raeume.raum_id = tbl_geraete.raum_fk "
			."left join tbl_lieferanten on tbl_lieferanten.lieferant_id = tbl_geraete.lieferant_fk "
			."left join tbl_geraete_art on tbl_geraete_art.geraete_art_id = tbl_geraete.geraete_art_fk;";
    $a_sql_ausgabe = array();
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt alle Komponenten aus
 */
function func_a_getKomponenten()
{
    $txt_sql_statement = "SELECT tbl_komponenten.komponenten_id, tbl_komponenten.komponente_name, tbl_komponenten.komponente_bestand, tbl_komponenten_arten.komponenten_art_name "
			."FROM biscuit.tbl_komponenten "
			."left join tbl_komponenten_arten on tbl_komponenten_arten.komponenten_art_id = tbl_komponenten.komponenten_art_fk;";
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt alle Attribute aus
 */
function func_a_getAttribute ()
{
    $txt_sql_statement = "SELECT * FROM tbl_komponenten;";
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
        or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt alle Zusässigen Werte aus
 */
function func_a_getZulaessigeWerte()
{
    $txt_sql_statement = "SELECT * FROM tbl_zulaessige_werte;";
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt alle Komponenten-Arten aus
 */
function func_a_getKomponentenArten()
{
    $txt_sql_statement = "SELECT * FROM tbl_komponenten_arten;";
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt alle Geraete-Arten aus
 */
function func_a_getGeraeteArten()
{
    $txt_sql_statement = "SELECT * FROM tbl_geraete_art;";
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

/**
 * 
 * @return Gibt die Benutzer ohne Kennwörter zurück
 */
function func_a_getBenutzer()
{
    $txt_sql_statement = "SELECT benutzer_name FROM tbl_benutzer;";
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
        $a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

function func_a_getRaum ($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_raeume where raum_id = '".$id."';";    
    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);

    return $a_Tabellen_daten;
}

function func_a_getLieferant ($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_lieferanten where lieferant_id = '".$id."';";    
    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);

    return $a_Tabellen_daten;
}

function func_a_getGeraet ($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_geraete where geraete_id = '".$id."';";    
    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);

    return $a_Tabellen_daten;
}

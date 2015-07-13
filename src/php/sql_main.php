<?php

    $txt_login="IT-Verwaltung";
    $txt_kennwort="X5XgY/YU6+";
    $txt_adresse="localhost";
    $txt_datenbank="biscuit";
    
    mysql_connect($txt_adresse, $txt_login, $txt_kennwort)
    or die ("Keine Verbindung möglich");
    
    mysql_select_db($txt_datenbank)
    or die ("Datenbank nicht gefunden");


function func_a_auslesen($s_tabelle)
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

function func_a_getGeraete()
{
    $txt_sql_statement = "SELECT * FROM tbl_geraete;";
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
}

function func_a_getKomponenten()
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

function func_form_insertLieferant($txt_lieferant_name)
{
    $txt_sql_statement = "INSERT INTO tbl_lieferanten (lieferant_name)
                            VALUES (".$txt_lieferant_name.");";   
    
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

function func_form_insertRaum($txt_raum_name, $txt_raum_notiz)
{
    $txt_sql_statement = "INSERT INTO tbl_raueme (raum_name, raum_notiz)
                            VALUES (".$txt_raum_name.",".$txt_raum_notiz.");";
    
    mysql_query($txt_sql_statement);
}

function func_form_insertGeraet($txt_name, $int_lieferant, $int_raum_id, $txt_ek_datum, $txt_notiz, $txt_hersteller, $txt_gewaehr_beginn, $txt_gewaehr_ende)
{
    $txt_sql_statement = "INSERT INTO tbl_geraete 
                           VALUES (".$txt_name.",
                                   ".$txt_lieferant.",
                                   ".$int_raum_id.",
                                   ".$txt_ek_datum.",
                                   ".$txt_notiz.",
                                   ".$txt_hersteller.",
                                   ".$txt_gewaehr_beginn.",
                                   ".$txt_gewaehr_ende.");";
    
    mysql_query($txt_sql_statement);
}

function func_form_insertKomponente($txt_name, $int_anzahl)
{
    $txt_sql_statemnet = "INSERT INTO tbl_komponenten (komponente_name, komponente_bestand)
                           VALUES (".$txt_name.",
                                   ".$int_anzahl.");";
    
    mysql_query($txt_sql_statemnet);
}

function func_form_instertKomponentenArt($txt_name)
{
    $txt_sql_statement = "INSERT INTO tbl_komponenten_arten (komponenten_art_name)
                            VALUES (".$txt_name.");";
    
    mysql_query($txt_sql_statement);
}

function func_form_instertAttribut($txt_name)
{
    $txt_sql_statement = "INSERT INTO tbl_komponenten_attribute (koponenten_attribut_name)
                            VALUES (".$txt_name.");";
    
    mysql_query($txt_sql_statement);
}

function func_form_instertZulaessigenWert($txt_name, $int_wert)
{
    $txt_sql_statement = "INSERT INTO tbl_zulaessige_Werte (zulaessiger_wert_name, zulaessiger_wert) 
                            VALUES (".$txt_name."),
                                   (".$int_wert.");";                       
    
    mysql_query($txt_sql_statement);
}

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
<?php

    $txt_login=0;
    $txt_kennwort=0;
    $txt_adresse=0;
    $txt_datenbank=0;
    
    mysql_connect($txt_adresse, $txt_login, $txt_kennwort)
    or die ("Keine Verbindung möglich");
    
    mysql_select_db($txt_datenbank)
    or die ("Datenbank nicht gefunden");


function func_a_auslesen($tabelle)
{
    $txt_sql_statement = "SELECT * FROM ".$tabelle.";";    
    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getLieferanten()
{
    $txt_sql_statement = "SELECT * FROM tbl_lieferanten;";

    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getRaeume()
{
    $txt_sql_statement = "SELECT * FROM tbl_raeume;";
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getGeraete()
{
    $txt_sql_statement = "SELECT * FROM tbl_geraete;";
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getKomponenten()
{
    $txt_sql_statement = "SELECT * FROM tbl_komponenten;";
   
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getAttribute ()
{
        $txt_sql_statement = "SELECT * FROM tbl_komponenten;";
   
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getZulaessigeWerte()
{
        $txt_sql_statement = "SELECT * FROM tbl_zulaessige_werte;";
   
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getKomponentenArten()
{
        $txt_sql_statement = "SELECT * FROM tbl_komponenten_arten;";
   
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_form_insertLieferant($txt_lieferant_name)
{
    $txt_sql_statement = "INSERT INTO tbl_lieferanten
                            VALUES (".$txt_lieferant_name.");";   
    
    $txt_sql_statement = mysql_query();
}

function func_form_insertRaum($txt_raum_name, $txt_raum_notiz)
{
    $txt_sql_statement = "INSERT INTO tbl_raueme
                            VALUES (".$txt_raum_name.",".$txt_raum_notiz.");";
    
    mysql_query($txt_sql_statement);
}

function func_form_insertGeraet($txt_name, $txt_lieferant, $int_raum_id, $txt_ek_datum, $txt_notiz, $txt_hersteller, $txt_gewaehr_beginn, $txt_gewaehr_ende)
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

function func_form_insertKomponente($txt_name, $int_anzahl){
    $txt_sql_statemnet = "INSERT INT tbl_komponenten
                           VALUES (".$txt_name.",
                                   ".$int_anzahl.");";
    
    mysql_query($txt_sql_statemnet);
}

<?php

    $txt_login=0;
    $txt_kennwort=0;
    $txt_adresse=0;
    $txt_datenbank=0;
    
    mysql_connect($txt_adresse, $txt_login, $txt_kennwort)
    or die ("Keine Verbindung möglich");
    
    mysql_select_db($txt_datenbank)
    or die ("Datenbank nicht gefunden");


function func_a_auslesen($tabelle){
    $txt_sql_statement = "'SELECT * FROM ".$tabelle."'";    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getLieferanten(){
    $txt_sql_statement = "'SELECT * FROM tbl_lieferanten'";

    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getRaeume(){
    $text_sql_statement = "'SELECT * FROM tbl_raeume'";
    
    $a_sql_result = mysql_query($text_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getGeraete(){
    $text_sql_statement = "'SELECT * FROM tbl_geraete'";
    
    $a_sql_result = mysql_query($text_sql_statement)
            or die("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getKomponenten(){
    $text_sql_statement = "'SELECT * FROM tbl_komponenten'";
   
    $a_sql_result = mysql_query($text_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getAttribute (){
        $text_sql_statement = "'SELECT * FROM tbl_komponenten'";
   
    $a_sql_result = mysql_query($text_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getZulaessigeWerte(){
        $text_sql_statement = "'SELECT * FROM tbl_zulaessige_werte'";
   
    $a_sql_result = mysql_query($text_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}

function func_a_getKomponentenArten(){
        $text_sql_statement = "'SELECT * FROM tbl_komponenten_arten'";
   
    $a_sql_result = mysql_query($text_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_sql_ausgabe = mysql_fetch_assoc($a_sql_result);
}
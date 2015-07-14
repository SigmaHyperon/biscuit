<?php

/**
 * Funktion Suche für Benutzer
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchBenutzer($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, tbl_benutzer);
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Geräte
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchGeraete($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, tbl_geraete);
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Gerätearten
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchGeraeteArt($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, tbl_geraete_art);
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Komponenten
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchKomponenten($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, tbl_komponenten);
    return($a_ergebnisse);
}

/**
 * Funktion Suche für KomponentenArten
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchKomponentenArten($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, tbl_komponenten_arten);
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Lieferanten
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchLieferanten($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, tbl_lieferanten);
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Räume
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchRaueme($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, tbl_raueme);
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Zulässige Werte
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchZulaessigeWaerte($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, tbl_zulaessige_werte);
    return($a_ergebnisse);
}

/**
 * Eigentliche Suchfunktion, wird NICHT direkt aufgerufen.
 * Aufruf erfolgt über oben gestellte Funktionen.
 * @param txt $txt_string Übergabe Schlagwort
 * @param txt $txt_table Übergabe Table
 * @return array Rückgabe
 */
function func_s_searchEscaped($txt_string, $txt_table)
{
  $txt_escaped_search = mysql_escape_string($txt_string);
  
  $txt_sql_statement = "SELECT * FROM ".$txt_table." WHERE benutzer_name LIKE' ".$txt_escaped_search."';";
  
  $a_sql_cache = mysql_query($txt_sql_statement);
  
  $a_values = mysql_fetch_assoc($a_sql_cache)
          or die ("Ein Fehler ist aufgetreten." + mysql_error());
  
  return($a_values);
}
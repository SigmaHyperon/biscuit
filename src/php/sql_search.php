<!-----------------------------------------------------------------
Ersteller:          Fr3d.dy
Erstell-Datum:      14.07.2015 (Auslagerung)
Änderungsdatum: 
Inhalt:            Suchfunktionen PHP / SQL
-------------------------------------------------------------------> 
<?php

/**
 * Funktion Suche für Benutzer
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchBenutzer($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, 'tbl_benutzer', 'benutzer_name');
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Geräte
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchGeraete($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, 'tbl_geraete', 'geraet_name');
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Gerätearten
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchGeraeteArt($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, 'tbl_geraete_art','geraete_art_name');
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Komponenten
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchKomponenten($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, 'tbl_komponenten','komponente_name');
    return($a_ergebnisse);
}

/**
 * Funktion Suche für KomponentenArten
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchKomponentenArten($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, 'tbl_komponenten_arten','komponenten_art_name');
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Lieferanten
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchLieferanten($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, 'tbl_lieferanten','lieferanten_name');
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Räume
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchRaeume($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, 'tbl_raeume','raum_name');
    return($a_ergebnisse);
}

/**
 * Funktion Suche für Zulässige Werte
 * @param txt $txt_suche Schlagwort für Suche
 * @return array Suchergebnisse
 */
function func_a_searchZulaessigeWaerte($txt_suche)
{
    $a_ergebnisse = func_s_searchEscaped($txt_suche, 'tbl_zulaessige_werte','zulaessiger_wert_name');
    return($a_ergebnisse);
}

/**
 * Eigentliche Suchfunktion, wird NICHT direkt aufgerufen.
 * Aufruf erfolgt über oben gestellte Funktionen.
 * @param txt $txt_string Übergabe Schlagwort
 * @param txt $txt_table Übergabe Table
 * @return array Rückgabe
 */
function func_s_searchEscaped($txt_string, $txt_table, $txt_operator)
{
  $txt_escaped_search = mysql_real_escape_string($txt_string);
  
  $txt_sql_statement = "SELECT * FROM ".$txt_table." WHERE ".$txt_operator." LIKE '%".$txt_escaped_search."%';";
  
  $a_sql_cache = mysql_query($txt_sql_statement);
  
      while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    return $a_sql_ausgabe;
  
  return($a_sql_ausgabe);
}

/**
 * Aufruf mit Schlagwort für Globale Suche
 * @param type $txt_string Suchbegriff
 */
function func_s_searchGlobal($txt_string)
{
    $txt_search_escaped = mysql_real_escape_string($txt_string);
    
    $search_output = array
            (
            array("Definitionen","Benutzer","Geräte","Geräte_Arten","Komponenten","Komponenten_Attribute","Lieferanten","Räume","ZulässigeWerte"),
            array("Benutzer"),
            array("Geräte"),
            array("Geräte_Arten"),
            array("Komponenten"),
            array("Komponenten Attribute"),
            array("Lieferanten"),
            array("Räume"),
            array("Zulässige Werte")
            );
    $search_output[1]=func_a_searchBenutzer($txt_search_escaped);
    $search_output[2]=func_a_searchGeraete($txt_search_escaped);
    $search_output[3]=func_a_searchGeraeteArt($txt_search_escaped);
    $search_output[4]=func_a_searchKomponenten($txt_search_escaped);
    $search_output[5]=func_a_searchKomponentenArten($txt_search_escaped);
    $search_output[6]=func_a_searchLieferanten($txt_search_escaped);
    $search_output[7]=func_a_searchRaueme($txt_search_escaped);
    $search_output[8]=func_a_searchZulaessigeWaerte($txt_search_escaped);
    return($search_output);
}
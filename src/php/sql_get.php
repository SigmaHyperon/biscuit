<!-----------------------------------------------------------------
Ersteller:          Fr3d.dy
Erstell-Datum:      14.07.2015 (Auslagerung)
Änderungsdatum: 
Inhalt:            Funktionen zum Auslesen PHP / SQL
-------------------------------------------------------------------> 

<?php


 /**
  * Gibt eine gesamte Tabelle, gewählt bei Namen, zurück
  * @param string $s_tabelle - Die Tabelle die Ausgegeben werden soll
  * @return Array Gibt die vollständige Tabelle aus
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
 * @return Array Gibt alle Lieferanten aus
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
 * @return Array Gibt alle Räume aus
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
 * @return Array Gibt alle Geräte aus
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
 * @return Array Gibt alle Komponenten aus
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
 * @return Array Gibt alle Attribute aus
 */
function func_a_getAttribute ()
{
    $txt_sql_statement = "SELECT * FROM tbl_komponenten_attribute;";
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
 * @return Array Gibt alle Komponenten-Arten aus
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
 * @return Array Gibt alle Geraete-Arten aus
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
 * @return Array Gibt die Benutzer ohne Kennwörter zurück
 */
function func_a_getBenutzer()
{
    $txt_sql_statement = "SELECT benutzer_name, benutzer_rechte, benutzer_mail, benutzer_id FROM tbl_benutzer;";
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
 * Zeigt einen einzellnen Eintrag an
 * @param int $id Die ID des anzuzeigenden Eintrags
 * @return int Gibt information über Erfolg der Operation
 */
function func_a_getRaum ($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_raeume where raum_id = '".$id."';";    
    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);

    return $a_Tabellen_daten;
}

/**
 * Zeigt einen einzellnen Eintrag an
 * @param int $id Die ID des anzuzeigenden Eintrags
 * @return int Gibt information über Erfolg der Operation
 */
function func_a_getLieferant ($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_lieferanten where lieferant_id = '".$id."';";    
    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);

    return $a_Tabellen_daten;
}

/**
 * Zeigt einen einzellnen Eintrag an
 * @param int $id Die ID des anzuzeigenden Eintrags
 * @return int Gibt information über Erfolg der Operation
 */
function func_a_getGeraet ($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_geraete where geraete_id = '".$id."';";    
    
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);

    return $a_Tabellen_daten;
}

/**
 * Zeigt einen einzellnen Eintrag an
 * @param int $id Die ID des anzuzeigenden Eintrags
 * @return int Gibt information über Erfolg der Operation
 */
function func_a_getKomponente($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_komponenten WHERE komponenten_id='".$id."';";
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);
    
    return $a_Tabellen_daten;
}

/**
 * Zeigt einen einzellnen Eintrag an
 * @param int $id Die ID des anzuzeigenden Eintrags
 * @return int Gibt information über Erfolg der Operation
 */
function func_a_getGeraeteArt($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_geraete_art WHERE geraete_art_id = '".$id."'";
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);
    
    return $a_Tabellen_daten;
}

/**
 * Zeigt einen einzellnen Eintrag an
 * @param int $id Die ID des anzuzeigenden Eintrags
 * @return int Gibt information über Erfolg der Operation
 */
function func_a_getAttribut($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_komponenten_attribute WHERE komponenten_attribut_id ='".$id."'";
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);
    
    return $a_Tabellen_daten;
}

/**
 * Zeigt einen einzellnen Eintrag an
 * @param int $id Die ID des anzuzeigenden Eintrags
 * @return int Gibt information über Erfolg der Operation
 */
function func_a_getKomponentenArt($id)
{
    $txt_sql_statement = "SELECT * FROM tbl_komponenten_arten WHERE komponenten_art_id ='".$id."'";
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);
    
    return($a_Tabellen_daten);
}

/**
 * Zeigt einen einzellnen Eintrag an
 * @param int $id Die ID des anzuzeigenden Eintrags
 * @return int Gibt information über Erfolg der Operation
 */
function func_a_getNutzer($id)
{
    $tst_sql_statement = "SELCT * FROM tbl_benutzer WHERE benutzer_id ='".$id."'";
    
    $a_sql_result = mysql_query($tst_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    $a_Tabellen_daten = mysql_fetch_assoc($a_sql_result);
    
    return($a_Tabellen_daten);
}

/**
 * Gibt Alle Geräte und Komponenten Gejoint aus
 * @param int $id ID des Eintrags
 * @return array Tabelle
 */
function func_a_getGeraete_komponenten($id)
{
    $tst_sql_statement = "SELECT * FROM tbl_z_enthaelt left join tbl_komponenten on tbl_z_enthaelt.komponente_fk=tbl_komponenten.komponenten_id WHERE geraet_fk ='".$id."'";
    
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($tst_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    
    return($a_sql_ausgabe);
}

/**
 * Gibt den Inhalt von Geräte und Komponente gejoint aus.
 * @param int $id Benötigte ID
 * @return array
 */
function func_a_getKomponente_geraete($id)
{
    $tst_sql_statement = "SELECT * FROM tbl_z_enthaelt left join tbl_geraete on tbl_z_enthaelt.geraet_fk=tbl_geraete.geraete_id WHERE komponente_fk ='".$id."'";
//    var_dump($tst_sql_statement);
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($tst_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    
    return($a_sql_ausgabe);
}
/**
 * Gibt die Inhalte von Attribut aus.
 * @param int $id Benötigte ID
 * @return Array Ausgabe Gejoint
 */
function func_a_getAttribut_art($id)
{
    $tst_sql_statement = "SELECT * FROM tbl_z_attribut_art left join tbl_komponenten_arten on tbl_z_attribut_art.komponenten_art_fk=tbl_komponenten_arten.komponenten_art_id WHERE komponenten_attribut_fk ='".$id."'";
//    var_dump($tst_sql_statement);
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($tst_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    
    return($a_sql_ausgabe);
}

/**
 * Gibt die Inhalte von Attribute zusammen mit den Komponenten zurück
 * @param int $id Benötigte ID
 * @return array
 */
function func_a_getKomponente_attribute($id)
{
    $tst_sql_statement = "SELECT * FROM tbl_z_komponente_attribute left join tbl_komponenten_attribute on tbl_z_komponente_attribute.komponenten_attribut_fk=tbl_komponenten_attribute.komponenten_attribut_id WHERE komponenten_fk ='".$id."'";
//    var_dump($tst_sql_statement);
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($tst_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    
    return($a_sql_ausgabe);
}

/**
 * Gibt die Räume zusammen mit den Geräten zurück.
 * @param int $int_RaumID Raum-ID
 * @return array Rückgabe
 */
function func_a_getGeraeteInRaum($int_RaumID)
{
    $txt_sql_statement = "SELECT tbl_geraete.geraete_id, tbl_raeume.raum_name, tbl_lieferanten.lieferant_firmenname, tbl_geraete.geraet_name, tbl_geraete.geraet_ek_datum, tbl_geraete.geraet_notiz, tbl_geraete.geraet_hersteller, tbl_geraete.geraet_gewaehr_beginn, tbl_geraete.geraet_gewaehr_ende, tbl_geraete.geraete_seriennummer, tbl_geraete_art.geraete_art_name   "
			."FROM biscuit.tbl_geraete "
			."left join tbl_raeume on tbl_raeume.raum_id = tbl_geraete.raum_fk "
			."left join tbl_lieferanten on tbl_lieferanten.lieferant_id = tbl_geraete.lieferant_fk "
			."left join tbl_geraete_art on tbl_geraete_art.geraete_art_id = tbl_geraete.geraete_art_fk WHERE raum_fk = ".$int_RaumID;
    
    $a_sql_ausgabe = array();
    
    $a_sql_result = mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");
    
    while($a_sql_cache = mysql_fetch_assoc($a_sql_result))
    {
	$a_sql_ausgabe[] = $a_sql_cache;
    }
    
    return($a_sql_ausgabe);
}

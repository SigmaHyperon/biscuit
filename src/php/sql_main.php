<?php

    $txt_login="IT-Verwaltung";
    $txt_kennwort="X5XgY/YU6+";
    $txt_adresse="localhost";
    $txt_datenbank="biscuit";
    
    mysql_connect($txt_adresse, $txt_login, $txt_kennwort)
    or die ("Keine Verbindung möglich");
    
    mysql_select_db($txt_datenbank)
    or die ("Datenbank nicht gefunden");


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
    $txt_sql_statement = "SELECT tbl_geraete.geraete_id, tbl_raeume.raum_name, tbl_lieferanten.lieferanten_firmenname, tbl_geraete.geraet_ek_datum, tbl_geraete.geraet_notiz, tbl_geraete.geraet_hersteller, tbl_geraete.geraet_gewaehr_beginn, tbl_geraete.geraet_gewaehr_ende, tbl_geraete.geraete_seriennummer, tbl_geraete_art.geraete_art_name   "
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
			."left join tbl_komponenten_arten on tbl_komponenten_arten.komponenten_art_id = tbl_komponenten.komponenten_id;";
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

/**
 * 
 * @param type $txt_lieferant_firmenname - Name Firma
 * @param type $txt_lieferant_vorname - Vorname Kontaktperson
 * @param type $txt_lieferant_nachname - Nachname Kontaktperson
 * @param type $_int_lieferant_plz - PLZ
 * @param type $txt_lieferant_ort - Ort Lieferant
 * @param type $txt_lieferant_strasse - Straße Lieferant
 * @return Gibt zurück ob Eintragen erfolgreich (int)
 */
function func_form_insertLieferant($txt_lieferant_firmenname, $txt_lieferant_vorname, $txt_lieferant_nachname, $_int_lieferant_plz, $txt_lieferant_ort, $txt_lieferant_strasse)
{
    $txt_sql_statement = "INSERT INTO tbl_lieferanten (lieferant_firmenname, lieferant_vorname, lieferant_nachname, lieferant_plz, lieferant_ort, lieferant_strasse)
                            VALUES (
                                     ".$txt_lieferant_firmenname.",
                                     ".$txt_lieferant_vorname.",
                                     ".$txt_lieferant_nachname.",
                                     ".$int_lieferant_plz.",
                                     ".$txt_lieferant_ort.",
                                     ".$txt_lieferant_strasse.");";
    
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * 
 * @param type $txt_raum_name - Der Name des Raumes
 * @param type $txt_raum_notiz - Die Raumnotiz
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_insertRaum($txt_raum_name, $txt_raum_notiz)
{
    $txt_sql_statement = "INSERT INTO tbl_raeume (raum_name, raum_notiz)
                            VALUES ('".$txt_raum_name."','".$txt_raum_notiz."');";
    
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * 
 * @param type $txt_name - Name des Gerätes
 * @param type $int_lieferant - Name des Lieferanten
 * @param type $int_raum_id - Raum in dem sich das Gerät befindet
 * @param type $txt_ek_datum - Einkaufsdatum
 * @param type $txt_notiz - Notiz
 * @param type $txt_hersteller - Hersteller d. Geräts
 * @param type $txt_gewaehr_beginn - Zeitraum Beginn Gewähr
 * @param type $txt_gewaehr_ende - Zeitraum Ende Gewähr
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_insertGeraet($txt_name, $int_lieferant, $int_raum_id, $txt_ek_datum, $txt_notiz, $txt_hersteller, $txt_gewaehr_beginn, $txt_gewaehr_ende)
{
    $txt_sql_statement = "INSERT INTO tbl_geraete (
                           VALUES (".$txt_name.",
                                   ".$txt_lieferant.",
                                   ".$int_raum_id.",
                                   ".$txt_ek_datum.",
                                   ".$txt_notiz.",
                                   ".$txt_hersteller.",
                                   ".$txt_gewaehr_beginn.",
                                   ".$txt_gewaehr_ende.");";
    
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * 
 * @param type $txt_name - Komponentenname
 * @param type $int_anzahl - Menge d. Komponenten
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_insertKomponente($txt_name, $int_anzahl)
{
    $txt_sql_statemnet = "INSERT INTO tbl_komponenten (komponente_name, komponente_bestand)
                           VALUES (".$txt_name.",
                                   ".$int_anzahl.");";
    
    $int_response = mysql_query($txt_sql_statemnet);
    return ($int_response);
    
}

/**
 * 
 * @param type $txt_name - Name der Art
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_instertKomponentenArt($txt_name)
{
    $txt_sql_statement = "INSERT INTO tbl_komponenten_arten (komponenten_art_name)
                            VALUES (".$txt_name.");";
    
    $int_response = mysql_query($txt_sql_statement);
    return ($int_response);
}

/**
 * 
 * @param type $txt_name - Name des Attributs
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_instertAttribut($txt_name)
{
    $txt_sql_statement = "INSERT INTO tbl_komponenten_attribute (koponenten_attribut_name)
                            VALUES (".$txt_name.");";
    
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * 
 * @param type $txt_name - Name des Wertes
 * @param type $int_wert - Der eigentliche Wert
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_instertZulaessigenWert($txt_name, $int_wert)
{
    $txt_sql_statement = "INSERT INTO tbl_zulaessige_Werte (zulaessiger_wert_name, zulaessiger_wert) 
                                     VALUES (".$txt_name."),
                                   (".$int_wert.");";                       
    
    $int_response = mysql_query($txt_sql_statement);
    return($response);
}

/**
 * 
 * @param type $txt_name - Name des Benutzers
 * @param type $txt_kennwort - Kennwort des Benutzers (Wird als MD5 gespeichert!)
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_insertBenutzer($txt_name, $txt_kennwort)
{
    $txt_kennwort_md5 = CRYPT_MD5($txt_kennwort);
    
    $txt_sql_statement = "INSERT INTO tbl_benutzer (benutzer_name, benutzer_kennwort)
                                    VALUES(".$txt_name.",
                                                ".$txt_kenwort_md5.");";
    
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * 
 * @param type $txt_benutzer - Benutzernamen
 * @param type $txt_kennwort - Benutzerkennwort
 * @return int - Gibt zurück:  0: Kennwort falsch. 1: Kennwort korrekt.
 */
function func_form_login($txt_benutzer, $txt_kennwort)
{
    $txt_kennwort_md5 = CRYPT_MD5($txt_kennwort);
    
    $txt_sql_statement = "SELECT benutzer_kennwort FROM tbl_benutzer WHERE benutzer_name = ".$txt_benutzer.";";
    $txt_kennwort_cache = mysql_query($txt_sql_statement);
    
    $txt_kennwort_saved = mysql_fetch_assoc($txt_kennwort_cache);
            
    if($txt_kennwort_md5 == $txt_kennwort_saved)
    {
        return 1;
    }
    else 
    {
       return 0;
    }
}

/**
 * 
 * @param type $txt_benutzer - Der Benutzer der Kennwort ändern möchte
 * @param type $txt_kennwort - Das alte Kennwort
 * @param type $txt_kennwort_neu - Das neue Kennwort
 * @return int - Gibt wert zurück ob Erfolgreich (int)
 */
function funct_form_KennwortAendern($txt_benutzer, $txt_kennwort, $txt_kennwort_neu)
{
    $txt_kennwort_md5 = CRYPT_MD5($txt_kennwort);
    $txt_sql_statement = "SELECT benutzer_kennwort FROM tbl_benutzer WHERE benutzer_name = ".$txt_benutzer.";";
    $txt_kennwort_cache = mysql_query($txt_sql_statement);
    
    $txt_kennwort_alt = mysql_fetch_assoc($txt_kennwort_cache)
    
    if($txt_kennwort_md5 == $txt_kennwort_alt)
    {
        $txt_kennwort_neu_md5 = CRYPT_MD5($txt_kennwort_neu);
                
        $txt_sql_statement = "UPDATE tbl_benutzer SET benutzer_kennwort = ".$txt_kennwort_neu_md5."
                                        WHERE benutzer_kennwort = ".$txt_kennwort_alt.";";
        
        $int_response = mysql_query($txt_sql_statement);
        
        return ($int_response);
    }
    else
    {
        return 0;
    }
}

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


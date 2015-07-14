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
		var_dump($txt_sql_statement);
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
function func_form_insertLieferant($txt_lieferant_firmenname, $txt_lieferant_vorname, $txt_lieferant_nachname, $int_lieferant_plz, $txt_lieferant_ort, $txt_lieferant_strasse)
{
    $txt_sql_statement = "INSERT INTO tbl_lieferanten (lieferant_firmenname, 
                                                                             lieferant_vorname,
                                                                             lieferant_nachname,
                                                                             lieferant_plz, 
                                                                             lieferant_ort, 
                                                                             lieferant_strasse)
                                                            VALUES ('".$txt_lieferant_firmenname."',
                                                                           '".$txt_lieferant_vorname."',
                                                                           '".$txt_lieferant_nachname."',
                                                                           '".$int_lieferant_plz."',
                                                                           '".$txt_lieferant_ort."',
                                                                           '".$txt_lieferant_strasse."');";
    
    $int_response = mysql_query($txt_sql_statement);
    var_dump($txt_sql_statement);
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
 * @param type $int_raum - Raum Gerät
 * @param type $int_lieferant - Lieferant Gerät
 * @param type $dat_ek_datum - Einkaufsdatum Gerät
 * @param type $txt_notiz -Der Gerät wird nicht müde
 * @param type $txt_hersteller - Der Gerät schläft nie
 * @param type $dat_gewaehr_beginn - Der Gerät macht nicht schlapp
 * @param type $dat_gewaehr_ende - Gewähr Ende
 * @param type $txt_seriennummer - Seriennummer Gerät
 * @param type $int_art - Typenbeschreibung / art
 * @param type $text_name Name des Gerätes
 * @return Gibt an ob der Eintrag erfolgreich war (int)
 */
function func_form_insertGeraet($int_raum, $int_lieferant, $dat_ek_datum, $txt_notiz, $txt_hersteller, $dat_gewaehr_beginn, $dat_gewaehr_ende, $txt_seriennummer, $int_art, $text_name)
{
    $txt_sql_statement = "INSERT INTO tbl_geraete (raum_fk,
                                                                        lieferant_fk,
                                                                        geraet_ek_datum,
                                                                        geraet_notiz,
                                                                        geraet_hersteller,
                                                                        geraet_gewaehr_beginn,
                                                                        geraet_gewaehr_ende,
                                                                        geraete_seriennummer,
                                                                        geraete_art_fk,
                                                                        geraet_name)
                                                       VALUES ('".$int_raum."',
                                                                    '".$int_lieferant."',
                                                                    '".$dat_ek_datum."',
                                                                    '".$txt_notiz."',
                                                                    '".$txt_hersteller."',
                                                                    '".$dat_gewaehr_beginn."',
                                                                    '".$dat_gewaehr_ende."',
                                                                    '".$txt_seriennummer."',
                                                                    '".$int_art."',
                                                                    '".$text_name."');";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * 
 * @param type $txt_name - Komponentenname
 * @param type $int_anzahl - Menge d. Komponenten
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_insertKomponente($txt_name, $int_anzahl,$int_art_fk)
{
    $txt_sql_statemnet = "INSERT INTO tbl_komponenten (komponente_name, komponente_bestand, komponenten_art_fk)
                                    VALUES ('".$txt_name."',
                                                 '".$int_anzahl."',
                                                 '".$int_art_fk."');";
    
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
 * @param txt $txt_name - Name des Benutzers
 * @param txt $txt_kennwort - Kennwort des Benutzers (Wird als MD5 gespeichert!)
 * @param txt $txt_mail - Mailadresse
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_insertBenutzer($txt_name, $txt_kennwort, $txt_mail)
{
    $txt_kennwort_md5 = CRYPT_MD5($txt_kennwort);
    
    $txt_sql_statement = "INSERT INTO tbl_benutzer (benutzer_name, benutzer_kennwort, benutzer_mail)
                                    VALUES(".$txt_name.",
                                                ".$txt_kenwort_md5.",
                                                ".$txt_mail.");";
    
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
    
    $txt_kennwort_alt = mysql_fetch_assoc($txt_kennwort_cache);
    
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

function func_b_updateRaum ($int_id, $s_name, $s_notiz)
{
    $txt_sql_statement = "UPDATE tbl_raeume set raum_name='".$s_name."', raum_notiz='".$s_notiz."' where raum_id='".$int_id."';";    
    var_dump($txt_sql_statement);
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");

    return $a_sql_result;
}

function func_b_updateLieferant ($int_id, $s_firmenname, $s_vorname, $s_nachname, $s_plz, $s_ort, $s_strasse)
{
    $txt_sql_statement = "UPDATE tbl_lieferanten set lieferant_firmenname='".$s_firmenname."'"
	    . ", lieferant_vorname='".$s_vorname."'"
	    . ", lieferant_nachname='".$s_nachname."'"
	    . ", lieferant_plz='".$s_plz."'"
	    . ", lieferant_ort='".$s_ort."'"
	    . ", lieferant_strasse='".$s_strasse."' where lieferant_id='".$int_id."';";    
    var_dump($txt_sql_statement);
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");

    return $a_sql_result;
}

function func_form_updateGeraet($int_id, $int_raum, $int_lieferant, $dat_ek_datum, $txt_notiz, $txt_hersteller, $dat_gewaehr_beginn, $dat_gewaehr_ende, $txt_seriennummer, $int_art, $text_name)
{
    $txt_sql_statement = "UPDATE tbl_geraete SET raum_fk='".$int_raum."',
						lieferant_fk='".$int_lieferant."',
						geraet_ek_datum='".$dat_ek_datum."',
						geraet_notiz='".$txt_notiz."',
						geraet_hersteller='".$txt_hersteller."',
						geraet_gewaehr_beginn='".$dat_gewaehr_beginn."',
						geraet_gewaehr_ende='".$dat_gewaehr_ende."',
						geraete_seriennummer='".$txt_seriennummer."',
						geraete_art_fk='".$int_art."',
						geraet_name='".$text_name."'
						WHERE geraete_id='".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

function func_form_updateKomponenten($int_id, $txt_komponente_name, $int_komponente_bestand, $int_komponenten_art)
{
    $txt_sql_statement = "UPDATE tbl_komponenten SET koponente_name = '".$txt_komponente_name."',
                                                                                komponente_bestand = '".$int_komponente_bestand."',
                                                                                komponente_art_fk ='".$int_komponenten_art."',
                                                                     WHERE komponenten_id = '".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

function func_form_updateKomponentenArt($int_id, $txt_name)
{
    $txt_sql_statement = "UPDATE tbl_komponenten_arten SET komponenten_art_name = '".$txt_name."'
                                                                             WHERE komponenten_id = '".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

function func_form_updateAttribute($int_id, $txt_name)
{
    $txt_sql_statement = "UPDATE tbl_komponenten_Attribute SET komponenten_attribut_name ='".$txt_name."'
                                                                                  WHERE komponenten_:attribut_id ='".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

function func_form_updateZulaessigeWerte($int_id, $txt_wert_name, $int_wert)
{
    $txt_sql_statement = "UPDATE tbl_zulaessige_werte SET zulaessiger_wert_name ='".$txt_wert_name."',
                                                                                    zulaessiger_wert = '".$int_wert."'
                                                                         WHERE zulaessiger_wert_id ='".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

function func_form_updateBenutzer($int_id, $txt_name)
{
    $txt_sql_statement = "UPDATE tbl_benutzer SET benutzer_name = '".$txt_name."'
                                                              WHERE benutzer_id ='".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}


function func_form_delLieferantByName($txt_lieferant)
{
   $txt_sql_statement = "DELETE FROM tbl_lieferanten WHERE lieferant_name = ".$txt_lieferant.";";
   
   $int_response = mysql_query($txt_sql_statement);
   
   return($int_response);
}

function func_form_delRaumByName($txt_raum)
{
    $txt_sql_statement = "DELETE FROM tbl_raeume WHERE raum_name = ".$txt_raum.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delGeraetByName($txt_geraet)
{
    $txt_sql_statement = "DELETE FROM tbl_geraete WHERE geraet_name = ".$txt_geraet.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delKomponenteByName($txt_komponente)
{
    $txt_sql_statement = "DELETE FROM tbl_komponente WHERE komponente_name = ".$txt_komponente.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delAttributByName($txt_attribut)
{
    $txt_sql_statement = "DELETE FROM tbl_attribute WHERE attribut_name =".$txt_attribut.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delZulaessigenWertByName($txt_wert)
{
    $txt_sql_statement = "DELETE FROM tbl_zulaessigeWerte WHERE wert_name =".$txt_wert.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delKomponentenArtByName ($txt_komponentenart)
{
    $txt_sql_statement = "DELETE FROM tbl_komponenten_art WHERE komponenten_art_name =".$txt_komponentenart.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delBenutzerByName($txt_benutzer)
{
    $txt_sql_statement = "DELETE FROM tbl_benutzer WHERE benutzer_name = ".$txt_benutzer.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**/

function func_form_delLieferantByID($int_lieferant)
{
   $txt_sql_statement = "DELETE FROM tbl_lieferanten WHERE lieferant_id = ".$int_lieferant.";";
   
   $int_response = mysql_query($txt_sql_statement);
   
   return($int_response);
}

function func_form_delRaumByID($int_raum)
{
    $txt_sql_statement = "DELETE FROM tbl_raeume WHERE raum_id = ".$int_raum.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delGeraetByID($int_geraet)
{
    $txt_sql_statement = "DELETE FROM tbl_geraete WHERE geraet_id = ".$int_geraet.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delKomponenteByID($int_komponente)
{
    $txt_sql_statement = "DELETE FROM tbl_komponente WHERE komponente_id = ".$int_komponente.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delAttributByID($int_attribut)
{
    $txt_sql_statement = "DELETE FROM tbl_attribute WHERE attribut_id =".$int_attribut.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delZulaessigenWertByID($int_wert)
{
    $txt_sql_statement = "DELETE FROM tbl_zulaessigeWerte WHERE wert_id =".$int_wert.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delKomponentenArtByID ($int_komponentenart)
{
    $txt_sql_statement = "DELETE FROM tbl_komponenten_art WHERE komponenten_art_id =".$int_komponentenart.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delBenutzerByID($int_benutzer)
{
    $txt_sql_statement = "DELETE FROM tbl_benutzer WHERE benutzer_id = ".$int_benutzer.";";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

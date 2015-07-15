<!-----------------------------------------------------------------
Ersteller:          Fr3d.dy
Erstell-Datum:      14.07.2015 (Auslagerung)
Änderungsdatum: 
Inhalt:            Funktionen zum Einfügen PHP / SQL
-------------------------------------------------------------------> 
<?php

/**
 * 
 * @param type $txt_lieferant_firmenname - Name Firma
 * @param type $txt_lieferant_vorname - Vorname Kontaktperson
 * @param type $txt_lieferant_nachname - Nachname Kontaktperson
 * @param type $int_lieferant_plz - PLZ
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
 * @param txt $txt_raum_name - Der Name des Raumes
 * @param txt $txt_raum_notiz - Die Raumnotiz
 * @param txt $txt_stockwerk - Stockwerk
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_insertRaum($txt_raum_name, $txt_raum_notiz, $txt_stockwerk)
{
    $txt_sql_statement = "INSERT INTO tbl_raeume (raum_name, raum_notiz, raum_stockwerk)
                            VALUES ('".$txt_raum_name."','".$txt_raum_notiz."','".$txt_stockwerk."');";
    
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
                            VALUES ('".$txt_name."');";
    
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
    $txt_sql_statement = "INSERT INTO tbl_komponenten_attribute (komponenten_attribut_name)
                            VALUES ('".$txt_name."');";
    
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * Fügt Geräte-art ein
 * @param txt  $txt_name Name der Geräteart
 * @return int Rückgabe mit info über Erfolg
 */
function func_form_insertGeraeteArt($txt_name)
{
    $txt_sql_statement = "INSERT INTO tbl_geraete_art (geraete_art_name)
                                               VALUES ('".$txt_name."');";
                                               
    $int_response = mysql_query($txt_sql_statement); 
    return($int_response);
}

function func_form_insertGeraet_komponete($iGeraet_id,$Komponeten_id)
{
    $txt_sql_statement = "INSERT INTO tbl_z_enthaelt (geraet_fk,komponente_fk,datum)
                                               VALUES ('".$iGeraet_id."','".$Komponeten_id."',current_date());";
                                               
    $int_response = mysql_query($txt_sql_statement); 
    return($int_response);
}
function func_form_insertAttribut_art($iAttribut,$iArt)
{
    $txt_sql_statement = "INSERT INTO tbl_z_attribut_art (komponenten_art_fk,komponenten_attribut_fk)
                                               VALUES ('".$iAttribut."','".$iArt."');";
                                               
    $int_response = mysql_query($txt_sql_statement); 
    return($int_response);
}



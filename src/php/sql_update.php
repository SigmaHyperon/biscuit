<!-----------------------------------------------------------------
Ersteller:          Fr3d.dy
Erstell-Datum:      14.07.2015 (Auslagerung)
Änderungsdatum: 
Inhalt:            Update-Funktionen PHP / SQL
-------------------------------------------------------------------> 
<?php

/**
 * Funktion zum Anpassen eines Eintrags
 * @param int  $int_id
 * @param txt  $s_name
 * @param txt $s_notiz
 * @return Gibt informationn über den Erfolg der Operation zurück
 */
function func_b_updateRaum ($int_id, $s_name, $s_notiz, $txt_stockwerk)
{
    $txt_sql_statement = "UPDATE tbl_raeume set raum_name='".$s_name."', raum_stockwerk ='".$txt_stockwerk."', raum_notiz='".$s_notiz."' where raum_id='".$int_id."';";    
    var_dump($txt_sql_statement);
    $a_sql_result =  mysql_query($txt_sql_statement)
            or die ("Anfrage Fehlgeschlagen");

    return $a_sql_result;
}

/**
 * Funktion zum Anpassen eines Eintrags
 * @param int  $int_id
 * @param txt  $s_name
 * @param txt $s_notiz
 * @return Gibt informationn über den Erfolg der Operation zurück
 */
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

/**
 * Funktion zum Anpassen eines Eintrags
 * @param int  $int_id
 * @param txt  $s_name
 * @param txt $s_notiz
 * @return Gibt informationn über den Erfolg der Operation zurück
 */
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

/**
 * Funktion zum Anpassen eines Eintrags
 * @param int  $int_id
 * @param txt  $s_name
 * @param txt $s_notiz
 * @return Gibt informationn über den Erfolg der Operation zurück
 */
function func_form_updateKomponenten($int_id, $txt_komponente_name, $int_komponente_bestand, $int_komponenten_art)
{
    $txt_sql_statement = "UPDATE tbl_komponenten SET komponente_name = '".$txt_komponente_name."',
                                                                                komponente_bestand = '".$int_komponente_bestand."',
                                                                                komponenten_art_fk ='".$int_komponenten_art."'
                                                                     WHERE komponenten_id = '".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * Funktion zum Anpassen eines Eintrags
 * @param int  $int_id
 * @param txt  $s_name
 * @param txt $s_notiz
 * @return Gibt informationn über den Erfolg der Operation zurück
 */
function func_form_updateKomponentenArt($int_id, $txt_name)
{
    $txt_sql_statement = "UPDATE tbl_komponenten_arten SET komponenten_art_name = '".$txt_name."'
                                                                             WHERE komponenten_art_id = '".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * Funktion zum Anpassen eines Eintrags
 * @param int  $int_id
 * @param txt  $s_name
 * @param txt $s_notiz
 * @return Gibt informationn über den Erfolg der Operation zurück
 */
function func_form_updateAttribute($int_id, $txt_name)
{
    $txt_sql_statement = "UPDATE tbl_komponenten_attribute SET komponenten_attribut_name ='".$txt_name."'
                                                                                  WHERE komponenten_attribut_id ='".$int_id."'";
    var_dump($txt_sql_statement);
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * Funktion zum Anpassen eines Eintrags
 * @param int  $int_id
 * @param txt  $s_name
 * @param txt $s_notiz
 * @return Gibt informationn über den Erfolg der Operation zurück
 */
function func_form_updateBenutzer($int_id, $txt_name)
{
    $txt_sql_statement = "UPDATE tbl_benutzer SET benutzer_name = '".$txt_name."'
                                                              WHERE benutzer_id ='".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * 
 * @param int $int_id ID der Geräteart
 * @param txt $txt_geraeteart_name Name d. Geräteart
 * @return int Rückgabeinfo
 */
function func_form_updateGeraeteArt($int_id, $txt_geraeteart_name)
{
    $txt_sql_statement = "UPDATE tbl_geraete_art SET geraete_art_name = '".$txt_geraeteart_name."'
                                                                                  WHERE geraete_art_id ='".$int_id."'";
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}

/**
 * 
 * @param int $int_id ID der Geräteart
 * @param txt $txt_geraeteart_name Name d. Geräteart
 * @return int Rückgabeinfo
 */
function func_form_updateKomponenten_attribut($iKomponente, $iAttribut, $mWert)
{
    $txt_sql_statement = "UPDATE tbl_z_komponente_attribute SET komponenten_attribut_wert = '".$mWert."'
                                                                                  WHERE komponenten_fk ='".$iKomponente."' and komponenten_attribut_fk ='".$iAttribut."'";
    var_dump($txt_sql_statement);
    $int_response = mysql_query($txt_sql_statement);
    return($int_response);
}
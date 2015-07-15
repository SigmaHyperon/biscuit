<!-----------------------------------------------------------------
Ersteller:          Fr3d.dy
Erstell-Datum:      14.07.2015 (Auslagerung)
Änderungsdatum: 
Inhalt:            Funktionen zum Löschen PHP / SQL
-------------------------------------------------------------------> 
<?php

/**
 * 
 * @param Text $txt_lieferant Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delLieferantByName($txt_lieferant)
{
   $txt_sql_statement = "DELETE FROM tbl_lieferanten WHERE lieferant_name = '".$txt_lieferant."';";
   
   $int_response = mysql_query($txt_sql_statement);
   
   return($int_response);
}

/**
 * 
 * @param Text $txt_raum Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delRaumByName($txt_raum)
{
    $txt_sql_statement = "DELETE FROM tbl_raeume WHERE raum_name = '".$txt_raum."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $txt_geraet Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delGeraetByName($txt_geraet)
{
    $txt_sql_statement = "DELETE FROM tbl_geraete WHERE geraet_name = '".$txt_geraet."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $txt_art Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delGeraeteArtByName($txt_art)
{
    $txt_sql_statement = "DELETE FROM tbl_geraete_art WHERE geraete_art_name = '".$txt_art."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $txt_komponente Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delKomponenteByName($txt_komponente)
{
    $txt_sql_statement = "DELETE FROM tbl_komponente WHERE komponente_name = '".$txt_komponente."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $txt_attribut Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delAttributByName($txt_attribut)
{
    $txt_sql_statement = "DELETE FROM tbl_attribute WHERE attribut_name ='".$txt_attribut."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $txt_komponentenart Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delKomponentenArtByName ($txt_komponentenart)
{
    $txt_sql_statement = "DELETE FROM tbl_komponenten_art WHERE komponenten_art_name ='".$txt_komponentenart."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $txt_benutzer Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delBenutzerByName($txt_benutzer)
{
    $txt_sql_statement = "DELETE FROM tbl_benutzer WHERE benutzer_name='".$txt_benutzer."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $int_lieferant Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delLieferantByID($int_lieferant)
{
   $txt_sql_statement = "DELETE FROM tbl_lieferanten WHERE lieferant_id = '".$int_lieferant."';";
   
   $int_response = mysql_query($txt_sql_statement);
   
   return($int_response);
}

/**
 * 
 * @param Text $int_raum Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delRaumByID($int_raum)
{
    $txt_sql_statement = "DELETE FROM tbl_raeume WHERE raum_id ='".$int_raum."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $int_geraet Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delGeraetByID($int_geraet)
{
    $txt_sql_statement = "DELETE FROM tbl_geraete WHERE geraet_id =' ".$int_geraet."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $int_komponente Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delKomponenteByID($int_komponente)
{
    $txt_sql_statement = "DELETE FROM tbl_komponenten WHERE komponenten_id = '".$int_komponente."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $int_attribut Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delAttributByID($int_attribut)
{
    $txt_sql_statement = "DELETE FROM tbl_attribute WHERE attribut_id ='".$int_attribut."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}


/**
 * 
 * @param Text $int_komponentenart Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delKomponentenArtByID ($int_komponentenart)
{
    $txt_sql_statement = "DELETE FROM tbl_komponenten_arten WHERE komponenten_art_id ='".$int_komponentenart."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $int_benutzer Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delBenutzerByID($int_benutzer)
{
    $txt_sql_statement = "DELETE FROM tbl_benutzer WHERE benutzer_id = '".$int_benutzer."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

/**
 * 
 * @param Text $int_id Zu löschender Eintrag
 * @return int Information ob Query erfolgreich (0 / 1)
 */
function func_form_delGeraeteArtByID($int_id)
{
    $txt_sql_statement = "DELETE FROM tbl_geraete_art WHERE geraete_art_id ='".$int_id."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

function func_form_delGeraet_komponeten($id)
{
    $txt_sql_statement = "DELETE FROM tbl_z_enthaelt WHERE geraet_fk ='".$id."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}
function func_form_delKomponente_geraete($id)
{
    $txt_sql_statement = "DELETE FROM tbl_z_enthaelt WHERE komponente_fk ='".$id."';";
    
    $int_response = mysql_query($txt_sql_statement);
    
    return($int_response);
}

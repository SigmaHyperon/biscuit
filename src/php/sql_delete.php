<?php

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
    $txt_sql_statement = "DELETE FROM tbl_komponenten WHERE komponenten_id = ".$int_komponente.";";
    
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
<?php

/**
 * 
 * @param txt $txt_name - Name des Benutzers
 * @param txt $txt_kennwort - Kennwort des Benutzers (Wird als MD5 gespeichert!)
 * @param txt $txt_mail - Mailadresse
 * @return Gibt Information über Erfolg d. Eintragens (Int)
 */
function func_form_insertBenutzer($txt_name, $txt_kennwort, $txt_mail)
{
    $txt_kennwort_md5 = MD5($txt_kennwort);
    
    $txt_sql_statement = "INSERT INTO tbl_benutzer (benutzer_name, benutzer_kennwort, benutzer_mail)
                                    VALUES(".$txt_name.",
                                                ".$txt_kennwort_md5.",
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
    $txt_kennwort_md5 = MD5($txt_kennwort);
    
    $txt_sql_statement = "SELECT benutzer_kennwort FROM tbl_benutzer WHERE benutzer_name = '".$txt_benutzer."';";
    $txt_kennwort_cache = mysql_query($txt_sql_statement);
    
    $txt_kennwort_saved = mysql_fetch_assoc($txt_kennwort_cache);
//    var_dump($txt_kennwort_saved);
    
    if($txt_kennwort_md5 == $txt_kennwort_saved['benutzer_kennwort'])
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
    $txt_kennwort_md5 = MD5($txt_kennwort);
    $txt_sql_statement = "SELECT benutzer_kennwort FROM tbl_benutzer WHERE benutzer_name = ".$txt_benutzer.";";
    $txt_kennwort_cache = mysql_query($txt_sql_statement);
    
    $txt_kennwort_alt = mysql_fetch_assoc($txt_kennwort_cache);
    
    if($txt_kennwort_md5 == $txt_kennwort_alt['benutzer_kennwort'])
    {
        $txt_kennwort_neu_md5 = MD5($txt_kennwort_neu);
                
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
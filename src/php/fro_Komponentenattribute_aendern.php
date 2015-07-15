<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:             Komponentenarten ändern
------------------------------------------------------------------->

<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Komponentenattribut_name = \utility\forms\post("txt_Komponenten_attribut_name", false))
    {
	$s_Komponentenattribut_id = \utility\forms\post("int_id", false);
	if(func_form_updateAttribute($s_Komponentenattribut_id, $s_Komponentenattribut_name))
	{
	    
	    try {
		header("Location: fro_Auswahl.php?action=list&table=komponentenattribute");
		die();
	    } catch (Exception $ex) {}
	}
	else
	{
	    echo "An error occured!";
	}
    }
    else
    {
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
	    $aKomponentenattribut_daten = func_a_getAttribut($int_selektiert);
?>

<h2 align="center">Komponentenattribut ändern</h2>
<form action="fro_Komponentenattribute_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aKomponentenattribut_daten["komponenten_attribut_id"];?>"/>
        <table  class="formular">
            <tr>
                <td>Komponentenattribut:</td><td><input type="text" name="txt_Komponenten_attribut_name" value="<?php echo $aKomponentenattribut_daten["komponenten_attribut_name"];?>"/></td>
            </tr>
             <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr> 
        </table>        
</form>
<?php
	}
    }
?>
<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:            Geräte hinzufügen
-------------------------------------------------------------------> 
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Geraet_name = \utility\forms\post("txt_Geraetetyp", false))
    {
	$s_Geraet_typ = \utility\forms\post("txt_Vorname", "");
	$s_Geraet_hersteller = \utility\forms\post("txt_Hersteller", "");
	$s_Geraet_einkaufsdatum = \utility\forms\post("txt_Datum", "");
	$s_Geraet_gewaehrleistungsbeginn = \utility\forms\post("txt_Gewaehr_beginn", "");
	$s_Geraet_gewaehrleistungsende = \utility\forms\post("txt_Gewaehr_ende", "");
	$s_Geraet_seriennummer = \utility\forms\post("txt_Geraete_seriennummer", "");
	if(func_form_insertGeraet($int_raum, $int_lieferant, $dat_ek_datum, $txt_notiz, $txt_hersteller, $dat_gewaehr_beginn, $dat_gewaehr_ende, $txt_seriennummer, $int_art, $text_name))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=geraete");
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
?>
<form action="fro_Geraete_hinzufuegen.php" method="post">
        <table  class="formular">
            <tr>
                <td>Gerätetyp:</td>
		<td> 
		    <select name="txt_Geraetetyp_select" size="1" >
			<option>Rechner</option>
			<option>Beamer</option>
			<option>Monitor</option>
			<option>Drucker</option>
			<option>Projektor</option>
		    </select>
		</td>
            </tr>
	    <tr>
		<td>Name:</td><td><input type="text" name="txt_Name" size="20"/></td>
	    </tr>
            <tr>
                <td>Lieferanten:</td>
                <td>
                    <select name="txt_Lieferanten_select" size="1">
                        <option></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hersteller:</td><td><input type="text" name="txt_Hersteller" size="20"/></td>
            </tr>
            <tr>
                <td >Einkaufsdatum:</td><td><input type="text" name="txt_Datum" size="20"/></td>
            </tr>
            <tr>
                <td>Gewährleistungsbeginn:</td><td><input type="text" name="txt_Gewaehr_beginn" size="20"/></td>
            </tr>
            <tr>
                <td>Gewährleistungsende:</td><td><input type="text" name="txt_Gewaehr_ende" size="20"/></td>
            </tr>
            <tr>
                <td>Seriennummer:</td><td><input type="text" name="txt_Geraete_seriennummer" size="20"/></td>
            </tr>
            <tr>
                <td>Raum:</td>
                <td>
                    <select name="txt_Raum_select" size="1">
                        <option></option>
                    </select>
                </td>
            </tr>               
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
    </form>
<?php
    }
    ?>
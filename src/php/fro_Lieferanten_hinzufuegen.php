<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      12.07.2015
Änderungsdatum: 
Inhalt:             Lieferanten_Formular
------------------------------------------------------------------->
<?php
//library laden
    require_once '../lib/manager.php';
//    slq library laden
    require_once './sql_main.php';
//    formular komponente laden
    \utility\loadForms();
    
//    prüfen ,ob formualr abgeschickt wurde
    if($s_Lieferant_firmenname = \utility\forms\post("txt_Firma", false))
    {
	/**
	 * formular daten laden
	 */
	$s_Lieferant_vorname = \utility\forms\post("txt_Vorname", "");
	$s_Lieferant_nachname = \utility\forms\post("txt_Name", "");
	$s_Lieferant_plz = \utility\forms\post("txt_Plz", "");
	$s_Lieferant_ort = \utility\forms\post("txt_Ort", "");
	$s_Lieferant_strasse = \utility\forms\post("txt_Strasse", "");
//	liefernat einfügen
	if(func_form_insertLieferant($s_Lieferant_firmenname, $s_Lieferant_vorname, $s_Lieferant_nachname, $s_Lieferant_plz, $s_Lieferant_ort, $s_Lieferant_strasse))
	{
//	    wenn erfolgreich, wieterleitung auf lieferanten liste
	    try {
		header("Location: fro_Auswahl.php?action=list&table=lieferanten");
		die();
	    } catch (Exception $ex) {}
	}
	else 
	{
//	    wenn nicht erfolgreich, fehlermeldung anzeigen
	    echo "An error occured!";
	}
    }
    else
    {
	?>

<h2 align="center">Lieferant hinzufügen</h2>
    <form action="fro_Lieferanten_hinzufuegen.php" method="post">
        
        <table cellspacing="10px" class="formular">
            <tr>
                <td>Firma:</td><td><input type="text" name="txt_Firma"/></td>
            </tr>
            <tr>
                <td>Name:</td><td><input type="text" name="txt_Name"/></td>
            </tr>
            <tr>
                <td>Vorname:</td><td><input type="text" name="txt_Vorname"/></td>
            </tr>
            <tr>
                <td>Ort:</td><td><input type="text" name="txt_Ort"/></td>
            </tr>
            <tr>
                <td>PLZ:</td><td><input type="text" name="txt_Plz"/></td>
            </tr>
            <tr>
                <td>Strasse inkl. Nr.:</td><td><input type="text" name="txt_Strasse"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
    </form>
<?php
    }
    ?>

    

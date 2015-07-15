<!-----------------------------------------------------------------
Ersteller:          K!l1an
Erstell-Datum:      12.07.2015
Änderungsdatum: 
Inhalt:             Lieferanten_Formular
------------------------------------------------------------------->
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Lieferant_firmenname = \utility\forms\post("txt_Firma", false))
    {
	$s_Lieferant_id = \utility\forms\post("int_id", "");
	$s_Lieferant_vorname = \utility\forms\post("txt_Vorname", "");
	$s_Lieferant_nachname = \utility\forms\post("txt_Name", "");
	$s_Lieferant_plz = \utility\forms\post("txt_Plz", "");
	$s_Lieferant_ort = \utility\forms\post("txt_Ort", "");
	$s_Lieferant_strasse = \utility\forms\post("txt_Strasse", "");
	if(func_b_updateLieferant($s_Lieferant_id, $s_Lieferant_firmenname, $s_Lieferant_vorname, $s_Lieferant_nachname, $s_Lieferant_plz, $s_Lieferant_ort, $s_Lieferant_strasse))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=lieferanten");
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
	    $aLieferant_daten = func_a_getLieferant($int_selektiert);
	?>

<h2 align="center">Lieferant ändern</h2>
    <form action="fro_Lieferanten_aendern.php" method="post">
	<input type="hidden" name="int_id" value="<?php echo $aLieferant_daten["lieferant_id"];?>"/>
        <table border="1" class="formular">
            <tr>
                <td>Firma:</td><td><input type="text" name="txt_Firma" value="<?php echo $aLieferant_daten["lieferant_firmenname"];?>"/></td>
            </tr>
            <tr>
                <td>Name:</td><td><input type="text" name="txt_Name" value="<?php echo $aLieferant_daten["lieferant_nachname"];?>"/></td>
            </tr>
            <tr>
                <td>Vorname:</td><td><input type="text" name="txt_Vorname" value="<?php echo $aLieferant_daten["lieferant_vorname"];?>"/></td>
            </tr>
            <tr>
                <td>Ort:</td><td><input type="text" name="txt_Ort" value="<?php echo $aLieferant_daten["lieferant_ort"];?>"/></td>
            </tr>
            <tr>
                <td>PLZ:</td><td><input type="text" name="txt_Plz" value="<?php echo $aLieferant_daten["lieferant_plz"];?>"/></td>
            </tr>
            <tr>
                <td>Strasse inkl. Nr.:</td><td><input type="text" name="txt_Strasse" value="<?php echo $aLieferant_daten["lieferant_strasse"];?>"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
    </form>
<?php
	}
	else 
	{
	    echo "An error occured!";
	}
    }
    ?>

    

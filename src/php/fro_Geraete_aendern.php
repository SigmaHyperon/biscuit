<!-----------------------------------------------------------------
Ersteller:          K!l1an
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:            Geräte hinzufügen
-------------------------------------------------------------------> 
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Geraet_name = \utility\forms\post("txt_Name", false))
    {
	$s_Geraet_id = \utility\forms\post("int_id", "");
	$s_Geraet_art = \utility\forms\post("txt_Geraetetyp_select", "");
	$s_Geraet_raum = \utility\forms\post("txt_Raum_select", "");
	$s_Geraet_lieferant = \utility\forms\post("txt_Lieferanten_select", "");
	$s_Geraet_name = \utility\forms\post("txt_Name", "");
	$s_Geraet_notiz = \utility\forms\post("txt_Notiz", "");
	$s_Geraet_hersteller = \utility\forms\post("txt_Hersteller", "");
	$s_Geraet_einkaufsdatum = \utility\forms\post("txt_Datum", "");
	$s_Geraet_gewaehrleistungsbeginn = \utility\forms\post("txt_Gewaehr_beginn", "");
	$s_Geraet_gewaehrleistungsende = \utility\forms\post("txt_Gewaehr_ende", "");
	$s_Geraet_seriennummer = \utility\forms\post("txt_Geraete_seriennummer", "");
	
	if(func_form_updateGeraet($s_Geraet_id, $s_Geraet_raum, $s_Geraet_lieferant, $s_Geraet_einkaufsdatum, $s_Geraet_notiz, $s_Geraet_hersteller, $s_Geraet_gewaehrleistungsbeginn, $s_Geraet_gewaehrleistungsende, $s_Geraet_seriennummer, $s_Geraet_art, $s_Geraet_name))
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
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
	    $aGeraet_daten = func_a_getGeraet($int_selektiert);
?>
<!------------------- Geräteändernformular ------------------------------------>
<form action="fro_Geraete_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aGeraet_daten["geraete_id"];?>"/>
        <table  class="formular">
            <tr>
                <td>Gerätetyp:</td>
		<td> 
		    <select name="txt_Geraetetyp_select" size="1">
			<?php
			    $aAlle_geraete_typen = func_a_getGeraeteArten();
			    foreach ($aAlle_geraete_typen as $value) {
				echo "<option ";
				if($value["geraete_art_id"] == $aGeraet_daten["geraete_art_fk"]) echo "selected";
				echo " value='".$value["geraete_art_id"]."'>".$value["geraete_art_name"]."</option>";
			    }
			?>
		    </select>
		</td>
            </tr>
	    <tr>
		<td>Name:</td><td><input type="text" name="txt_Name" size="20" value="<?php echo $aGeraet_daten["geraet_name"];?>"/></td>
	    </tr>
	    <tr>
		<td>Notiz:</td><td><input type="text" name="txt_Notiz" size="20" value="<?php echo $aGeraet_daten["geraet_notiz"];?>"/></td>
	    </tr>
            <tr>
                <td>Lieferanten:</td>
                <td>
                    <select name="txt_Lieferanten_select" size="1">
                        <?php
			    $aAlle_lieferanten = func_a_getLieferanten();
			    foreach ($aAlle_lieferanten as $value) {
				echo "<option " ;
				if($value["lieferant_id"] == $aGeraet_daten["lieferant_fk"]) echo "selected";
				echo " value='".$value["lieferant_id"]."'>".$value["lieferant_firmenname"]."</option>";
			    }
			?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hersteller:</td><td><input type="text" name="txt_Hersteller" size="20" value="<?php echo $aGeraet_daten["geraet_hersteller"];?>"/></td>
            </tr>
            <tr>
                <td >Einkaufsdatum:</td><td><input type="text" name="txt_Datum" size="20" value="<?php echo $aGeraet_daten["geraet_ek_datum"];?>"/></td>
            </tr>
            <tr>
                <td>Gewährleistungsbeginn:</td><td><input type="text" name="txt_Gewaehr_beginn" size="20" value="<?php echo $aGeraet_daten["geraet_gewaehr_beginn"];?>"/></td>
            </tr>
            <tr>
                <td>Gewährleistungsende:</td><td><input type="text" name="txt_Gewaehr_ende" size="20" value="<?php echo $aGeraet_daten["geraet_gewaehr_ende"];?>"/></td>
            </tr>
            <tr>
                <td>Seriennummer:</td><td><input type="text" name="txt_Geraete_seriennummer" size="20" value="<?php echo $aGeraet_daten["geraete_seriennummer"];?>"/></td>
            </tr>
            <tr>
                <td>Raum:</td>
                <td>
                    <select name="txt_Raum_select" size="1">
                        <?php
			    $aAlle_raeume = func_a_getRaeume();
			    foreach ($aAlle_raeume as $value) {
				echo "<option " ;
				if($value["raum_id"] == $aGeraet_daten["raum_fk"]) echo "selected";
				echo " value='".$value["raum_id"]."'>".$value["raum_name"]."</option>";
			    }
			?>
                    </select>
                </td>
            </tr>               
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Ändern" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
    </form>
<?php
	}
    }
    ?>
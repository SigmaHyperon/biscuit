<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Komponenten ändern
------------------------------------------------------------------->
<?php
//library einbinden
    require_once '../lib/manager.php';
//    sql library einbinden
    require_once './sql_main.php';
//    formular komponente laden
    \utility\loadForms();
    
//    prüfen, ob das formular abgeschickt wurde
    if($s_Komponente_name = \utility\forms\post("txt_Komponentenname", false))
    {
	/**
	 * formuardaten laden
	 */
	$s_Komponente_id = \utility\forms\post("int_id", "");
	$s_Komponente_art = \utility\forms\post("txt_Komponentenart_select", "");
	$i_Komponente_bestand = \utility\forms\post("txt_Komponentenbestand", "");
	
//	liste aller zugewiesenen attribute für diese komponente laden
	$komponenten_attribute = func_a_getKomponente_attribute($s_Komponente_id);
//	prüfen ob attribute zugewiesen wurden
	if(count($komponenten_attribute))
	{
	    /**
	     * attribute neu beschreiben
	     */
	    foreach ($komponenten_attribute as $attribut)
	    {
//		prüfen ob wert für attribut gesetzt
		if($attribut_wert = \utility\forms\post($attribut["komponenten_attribut_fk"], false))
		{
//		    attribut wert updaten
		    func_form_updateKomponenten_attribut($s_Komponente_id, $attribut["komponenten_attribut_fk"], $attribut_wert);
		}
	    }
	}
	
//	komponente updaten
	if(func_form_updateKomponenten($s_Komponente_id, $s_Komponente_name, $i_Komponente_bestand, $s_Komponente_art))
	{
//	    wenn update erfolgreich, weiterleitung auf komponenten liste
	    try {
		header("Location: fro_Auswahl.php?action=list&table=komponenten");
		die();
	    } catch (Exception $ex) {}
	}
	else 
	{
//	    wenn nicht erfolgreich, fehler meldung anzeigen
	    echo "An error occured!";
	}
    }
    else
    {
//	prüfen, ob ein eintrag selektiert wurde
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
//	    komponentendaten laden
	    $aKomponenten_daten = func_a_getKomponente($int_selektiert);
	    /**
	     * daten werden dann unten im formular alss default werte eingetragen
	     */
?>

<h2 align="center">Komponente ändern</h2>
<form action="fro_Komponenten_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aKomponenten_daten["komponenten_id"];?>"/>

        <table border="1" class="formular">
            <tr>

                <td>Name:</td><td><input type="text" name="txt_Komponentenname" value="<?php echo $aKomponenten_daten["komponente_name"];?>"/></td>


            </tr>
            <tr>
                <td >Komponentenbestand:</td><td><input type="text" name="txt_Komponentenbestand" value="<?php echo $aKomponenten_daten["komponente_bestand"];?>"/></td>
            </tr>
            <tr>
                <td>Komponentenart:</td>
                <td>
                    <select name="txt_Komponentenart_select" size="1">
                        <?php
//			komponenten arten als auswahlliste ausgeben
			    $aAlle_komponenten_arten = func_a_getKomponentenArten();
			    foreach ($aAlle_komponenten_arten as $value) {
				echo "<option " ;
				if($value["komponenten_art_id"] == $aKomponenten_daten["komponenten_art_fk"]) echo "selected";
				echo " value='".$value["komponenten_art_id"]."'>".$value["komponenten_art_name"]."</option>";
			    }
			?>
                    </select>
                </td>
            </tr> 
	    <?php
//	    alle attribute für diese komponente laden
		$komponenten_attribute = func_a_getKomponente_attribute($int_selektiert);
//		prüfen, ob attribute gefunden wurden 
		if(count($komponenten_attribute))
		{
		    /**
		     * eingabefelder für attribute eingeben
		     */
		    echo "<tr><td colspan='2'>Attribute</td></tr>";
		    foreach ($komponenten_attribute as $attribut)
		    {
			echo "<tr>";
			echo "<td>".$attribut["komponenten_attribut_name"]."</td>";
			echo "<td><input type='text' name='".$attribut["komponenten_attribut_fk"]."' value='".$attribut["komponenten_attribut_wert"]."'></td>";
			echo "</tr>";
		    }
		}
	    ?>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Ändern" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
</form>
<?php
	}
    }
    ?>

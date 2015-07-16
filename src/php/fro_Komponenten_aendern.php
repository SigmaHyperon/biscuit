<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Komponenten ändern
------------------------------------------------------------------->
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Komponente_name = \utility\forms\post("txt_Komponentenname", false))
    {
	$s_Komponente_id = \utility\forms\post("int_id", "");
	$s_Komponente_art = \utility\forms\post("txt_Komponentenart_select", "");
	$i_Komponente_bestand = \utility\forms\post("txt_Komponentenbestand", "");
	
	$komponenten_attribute = func_a_getKomponente_attribute($s_Komponente_id);
	if(count($komponenten_attribute))
	{
	    foreach ($komponenten_attribute as $attribut)
	    {
		if($attribut_wert = \utility\forms\post($attribut["komponenten_attribut_fk"], false))
		{
		    func_form_updateKomponenten_attribut($s_Komponente_id, $attribut["komponenten_attribut_fk"], $attribut_wert);
		}
	    }
	}
	
	if(func_form_updateKomponenten($s_Komponente_id, $s_Komponente_name, $i_Komponente_bestand, $s_Komponente_art))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=komponenten");
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
	    $aKomponenten_daten = func_a_getKomponente($int_selektiert);
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
		$komponenten_attribute = func_a_getKomponente_attribute($int_selektiert);
//		var_dump($komponenten_attribute);
		if(count($komponenten_attribute))
		{
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

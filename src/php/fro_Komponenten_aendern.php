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
	$s_Komponente_art = \utility\forms\post("txt_Komponentenart_select", "");
	$s_Komponente_art = \utility\forms\post("txt_Komponentenart_select", "");
	$i_Komponente_bestand = \utility\forms\post("txt_Komponentenbestand", "");
	
	if(func_form_updateKomponenten($s_Komponente_name, $i_Komponente_bestand, $s_Komponente_art))
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
<form action="fro_Komponenten_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aKomponenten_daten["komponenten_id"];?>"/>

        <table border="1" class="formular">
            <tr>

                <td width="100px">Name:</td><td><input type="text" name="txt_Komponentenname" size="20" value="<?php echo $aKomponenten_daten["komponenten_id"];?>"/></td>
            </tr>
            <tr>

                <td >Komponentenbestand:</td><td><input type="text" name="txt_Komponentenbestand" size="20" value="<?php echo $aKomponenten_daten["komponenten_id"];?>"/></td>
            </tr>
            <tr>
                <td>Komponentenart:</td>
                <td>
                    <select name="txt_Komponentenart_select" size="1">
                        <?php
			    $aAlle_komponenten_arten = func_a_getKomponentenArten();
			    foreach ($aAlle_komponenten_arten as $value) {
				echo "<option " ;
				if($value["komponenten_art_id"] == $aGeraet_daten["komponenten_art_fk"]) echo "selected";
				echo " value='".$value["komponenten_art_id"]."'>".$value["komponenten_art_name"]."</option>";
			    }
			?>
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
    }
    ?>

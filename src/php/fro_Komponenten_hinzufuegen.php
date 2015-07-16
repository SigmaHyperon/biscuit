<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Komponenten hinzufügen
------------------------------------------------------------------->
<?php
//library laden
    require_once '../lib/manager.php';
//    sql library laden
    require_once './sql_main.php';
//    formular komponente laden
    \utility\loadForms();

//    prüfen, ob formular abgeschickt wurde
    if($s_Komponente_name = \utility\forms\post("txt_Komponentenname", false))
    {
	/**
	 * formulardaten laden
	 */
	$s_Komponente_art = \utility\forms\post("txt_Komponentenart_select", "");
	$i_Komponente_bestand = \utility\forms\post("txt_Komponentenbestand", "");
	
//	komponente einfügen
	if(func_form_insertKomponente($s_Komponente_name, $i_Komponente_bestand, $s_Komponente_art))
	{
//	    wenn erfolgreich weiterleitung auf komponentene liste
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
?>

<h2 align="center">Komponente hinzufügen</h2>
<form action="fro_Komponenten_hinzufuegen.php" method="post">
        <table  class="formular">
            <tr>
                <td>Name:</td><td><input type="text" name="txt_Komponentenname"/></td>
            </tr>
            <tr>
                <td >Komponentenbestand:</td><td><input type="text" name="txt_Komponentenbestand"/></td>
            </tr>
            <tr>
                <td>Komponentenart:</td>
                <td>
                    <select name="txt_Komponentenart_select" size="1">
                        <?php
			/**
			 * kompnenten arten als auswahlliste ausgeben
			 */
			    $aAlle_komponenten_arten = func_a_getKomponentenArten();
			    foreach ($aAlle_komponenten_arten as $value) {
				echo "<option value='".$value["komponenten_art_id"]."'>".$value["komponenten_art_name"]."</option>";
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
    ?>
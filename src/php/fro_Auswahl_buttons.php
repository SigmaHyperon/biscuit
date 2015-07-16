<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      12.07.2015
Änderungsdatum: 
Inhalt:             Buttons Hinzufügen, Ändern und Löschen
------------------------------------------------------------------->   

<?php
//definieren der tabellen die deteilbuttons haben sollen
$detail_pages = ["geraete", "komponenten","raeume"];
//abfragen der aktuell ausgewählten tabelle
$sTable = \utility\forms\get("table", false);
//prüfen ob der benutzer angemeldet ist
if(func_b_isAdmin())
{
?>
    <table border="0" class="auswahl_buttons">
        <tr>
            <td><input type="submit" name="action" value="Hinzuf&uuml;gen"/></td>
            <td><input type="submit" name="action" value="&Auml;ndern"/></td>   
	    <?php
//	    prüfen, ob die aktuelle tabelle einen detail button haben soll
	    if(in_array($sTable, $detail_pages))
	    {
//		detailbutton einblenden
	    ?>
	    <td><input type="submit" name="action" value="Details"/></td>
	    <?php
	    }
	    ?>
            <td><input type="submit" name="action" value="L&ouml;schen"/></td>
        </tr>   
    </table>
<?php
}
?>

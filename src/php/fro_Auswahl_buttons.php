<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      12.07.2015
Änderungsdatum: 
Inhalt:             Buttons Hinzufügen, Ändern und Löschen
------------------------------------------------------------------->   

<?php
$detail_pages = ["geraete", "komponenten"];
$sTable = \utility\forms\get("table", false);
if(func_b_isAdmin())
{
?>
    <table border="0" class="auswahl_buttons">
        <tr>
            <td><input type="submit" name="action" value="Hinzuf&uuml;gen"/></td>
            <td><input type="submit" name="action" value="&Auml;ndern"/></td>   
	    <?php
	    if(in_array($sTable, $detail_pages))
	    {
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

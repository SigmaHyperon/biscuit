<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      12.07.2015
Änderungsdatum: 
Inhalt:             Buttons Hinzufügen, Ändern und Löschen
------------------------------------------------------------------->   

<?php
if(func_b_isAdmin())
{
?>
    <table border="0" class="auswahl_buttons">
        <tr>
            <td><input type="submit" name="action" value="Hinzuf&uuml;gen"/></td>
            <td><input type="submit" name="action" value="&Auml;ndern"/></td>   
	    <?php
	    if(\utility\forms\get("table", false) == "geraete")
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

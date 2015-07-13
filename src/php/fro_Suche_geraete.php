<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Suchen ein oder mehreren Geräten
-------------------------------------------------------------------> 

<form action="fro_Suche_geraete.php" method="post">
        <table border="1">
            <tr>
                <td colspan="2"><b>Welches Gerät suchen Sie?</b></td>
            </tr>
            <tr>
                <td>Raum:</td><td> <input type="text" name="txt_Suche_raum" size="20"/></td>
            </tr>
            <tr>
                <td>Lieferant:</td><td> <input type="text" name="txt_Suche_lieferant" size="20"/></td>
            </tr>
            <tr>
                <td>Serienummer:</td><td> <input type="text" name="txt_Suche_seriennummer" size="20"/></td>
            </tr>
            <tr>
                <td>Art:</td><td> <input type="text" name="txt_Suche_art" size="20"/></td>
            </tr> 
            <tr>
                <td colspan="2" align="right"><input type="submit" name="action" value="Suchen"/> <input type="reset" value="Verwerfen" /></td>
            </tr>
        </table>        
</form>
<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Suchen eines oder mehrerer Lieferanten
-------------------------------------------------------------------> 

    <form action="fro_Suche_lieferant.php" method="post">
        <table class="suche">
            <tr>
                <td colspan="2"><b>Welchen Lieferanten suchen Sie?</b></td>
            </tr>
            <tr>
                <td>Firmenname:</td><td> <input type="text" name="txt_Suche_firmenname" size="20"/></td>
            </tr>
            <tr>
                <td>Ort:</td><td> <input type="text" name="txt_Suche_ort"/></td>
            </tr>
            <tr>
                <td>PLZ:</td><td> <input type="text" name="txt_Suche_plz"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="action" value="Suchen"/><input type="reset" value="Verwerfen" /></td>
            </tr>
        </table>        
    </form>

<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:             Komponentenarten hinzufügen
------------------------------------------------------------------->

form action="fro_Komponenten_hinzufuegen.php" method="post">
        <table  class="formular">
            <tr>
                <td width="100px">Name:</td><td><input type="text" name="txt_Komponentenname" size="20"/></td>
            </tr>
            <tr>
                <td >Komponentenbestand:</td><td><input type="text" name="txt_Komponentenbestand" size="20"/></td>
            </tr>
            <tr>
                <td>Komponentenart:</td>
                <td>
                    <select name="txt_Komponentenart_select" size="1">
                        <option></option>
                    </select>
                </td>
            </tr> 
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
</form>
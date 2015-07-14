<!-----------------------------------------------------------------
Ersteller:          K!l1an
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Komponenten ändern
------------------------------------------------------------------->

<form action="fro_Komponenten_aendern.php" method="post">
        <table border="1" class="formular">
            <tr>
                <td>Name:</td><td><input type="text" name="txt_Komponentenname" size="20"/></td>
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
<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      12.07.2015
Änderungsdatum: 
Inhalt:             Lieferanten_Formular
------------------------------------------------------------------->

    <form action="fro_Lieferanten_hinzufuegen.php" method="post">
        <table border="1" >
            <tr>
                <td>Id:</td><td> <input type="text" name="txt_Id" size="20"/>
            </tr>
            <tr>
                <td>Name:</td><td><input type="text" name="txt_Name" size="20"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Abschicken" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
    </form>

<?php
    require_once '../lib/manager.php';
    \utility\loadForms();
    
    if($s_Lieferant_name = \utility\forms\post("txt_Name", false))
    {
	func_form_insertLieferant($txt_lieferant_name);
    }
    
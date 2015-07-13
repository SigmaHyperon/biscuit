<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      12.07.2015
Änderungsdatum: 
Inhalt:             Lieferanten_Formular
------------------------------------------------------------------->
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Lieferant_name = \utility\forms\post("txt_Name", false))
    {
	if(func_form_insertLieferant($s_Lieferant_name))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=lieferanten");
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
	?>
    <form action="fro_Lieferanten_hinzufuegen.php" method="post">
        <table border="1" cellspacing="10px">
            <tr>
                <td>Firma:</td><td><input type="text" name="txt_Firma" size="20"/></td>
            </tr>
            <tr>
                <td width="100px">Name:</td><td><input type="text" name="txt_Name" size="20"/></td>
            </tr>
            <tr>
                <td>Vorname:</td><td><input type="text" name="txt_Vorname" size="20"/></td>
            </tr>
            <tr>
                <td>Ort:</td><td><input type="text" name="txt_Ort" size="20"/></td>
            </tr>
            <tr>
                <td>PLZ:</td><td><input type="text" name="txt_Plz" size="20"/></td>
            </tr>
            <tr>
                <td>Strasse inkl. Nr.:</td><td><input type="text" name="txt_Plz" size="20"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
    </form>
<?php
    }
    ?>

    

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
        <table border="1">
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
    }
    ?>

    

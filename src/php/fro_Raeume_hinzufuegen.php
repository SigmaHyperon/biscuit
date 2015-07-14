<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Räume hinzufügen
-------------------------------------------------------------------> 
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($sRaum_name = \utility\forms\post("txt_Raumname", false))
    {
	$sRaum_notiz = \utility\forms\post("txt_Raumnotiz", false);
	$sRaum_stockwerk = \utility\forms\post("txt_Stockwerk", false);
	if(func_form_insertRaum($sRaum_name, $sRaum_notiz, $sRaum_stockwerk))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=raeume");
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
<form action="fro_Raeume_hinzufuegen.php" method="post">
        <table class="formular">
            <tr>
                <td>Name:</td><td><input type="text" name="txt_Raumname"/></td>
            </tr>
            <tr>
                <td>Stockwerk</td><td><input type="text" name="txt_Stockwerk"/></td>
            </tr>
            <tr>
                <td >Raumnotiz:</td><td><input type="text" name="txt_Raumnotiz"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
</form>
<?php
    }
?>
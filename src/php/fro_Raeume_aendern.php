<!-----------------------------------------------------------------
Ersteller:          K!l1an
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
	$iRaum_id = \utility\forms\post("int_id", false);
	$sRaum_notiz = \utility\forms\post("txt_Raumnotiz", false);
	if(func_b_updateRaum($iRaum_id, $sRaum_name, $sRaum_notiz))
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
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
	    $aRaum_daten = func_a_getRaum($int_selektiert);
?>
<form action="fro_Raeume_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aRaum_daten["raum_id"];?>"/>
        <table border="1" class="formular">
            <tr>
                <td width="100px">Name:</td><td><input type="text" name="txt_Raumname" size="20" value="<?php echo $aRaum_daten["raum_name"];?>"/></td>
            </tr>
            <tr>
                <td>Stockwerk</td><td><input type="text" name="txt_Stockwerk" size="20"/></td>
            </tr>
            <tr>
                <td >Raumnotiz:</td><td><input type="text" name="txt_Raumnotiz" size="20" value="<?php echo $aRaum_daten["raum_notiz"];?>"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
</form>
<?php
	}
    }
?>
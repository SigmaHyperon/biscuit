
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Geraeteart_name = \utility\forms\post("txt_geraete_art_name", false))
    {
	$s_Geraeteart_id = \utility\forms\post("int_id", false);
	if(func_form_updateGeraeteArt($s_Geraeteart_id, $s_Geraeteart_name))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=geraetearten");
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
	    $aGeraetearten_daten = func_a_getGeraeteArt($int_selektiert);
//	    var_dump($aGeraetearten_daten);
?>
<h2 align="center">Gerätearten</h2>
<form action="fro_Geraetearten_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aGeraetearten_daten["geraete_art_id"];?>"/>
        <table  class="formular">
            <tr>
                <td>Gerätearten Name</td><td><input type="text" name="txt_geraete_art_name" value="<?php echo $aGeraetearten_daten["geraete_art_name"];?>"/></td>
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


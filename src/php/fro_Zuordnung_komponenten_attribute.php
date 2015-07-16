<?php
    if($iKomponenten_id = \utility\forms\get("selektiert", false));    
    {
//	prüfen ob daten übertragen wurden
	if(isset($_POST["ac_selected"]))
	{
//	    unnecessary check 
	    if ($s_Selected = $_POST["ac_selected"])
	    {
//		json decodierung der daten
		$a_Selected = json_decode($s_Selected);
//		löscht alle attribute der komponente
		func_form_delKomponente_attribute($iKomponenten_id);
//		fügt alle ausgewählten attribute wieder hinzu
		foreach ($a_Selected as $value)
		{
		    func_form_insertKompontente_attribut($iKomponenten_id, $value);
		}
	    }

	}
?>
<script>
    
    $(function(){
//	schiebt alle ausgewählten einträge von ursprung zu ziel
	function moveItems(origin, dest) {
	    $(origin).find(':selected').appendTo(dest);
	    update();
	}
//	schiebt alle einträge von ursprung zu ziel
	function moveAllItems(origin, dest) {
	    $(origin).children().appendTo(dest);
	    update();
	}
	
//	schreibt ausgewählte daten json enkodiert in ein hidden field
	function update()
	{
	    var values = [];
	    $("#selected option").each(function(){
		values.push($(this).val());
	    });
	    $("input[name='ac_selected']").val(JSON.stringify(values));

	}
	
	/**
	 * fügt events für die buttons hinzu
	 * links
	 * rechts
	 * alle links
	 * alle rechts
	 */
	$('#move_left').click(function (e) {
	    e.preventDefault();
	    moveItems('#selected', '#available');
	});

	$('#move_right').on('click', function (e) {
	    e.preventDefault();
	    moveItems('#available', '#selected');
	});
	
	$('#move_left_all').click(function (e) {
	    e.preventDefault();
	    moveAllItems('#selected', '#available');
	});

	$('#move_right_all').on('click', function (e) {
	    e.preventDefault();
	    moveAllItems('#available', '#selected');
	});
//	führt update einmal aus
	update();
    });
</script>
<div>
    <form action="" method="post">
	<input type="hidden" name="ac_selected" value=""/>
    <table class="multi_form">
	<tr>
	    <td>
		verfügbare Attribute
	    </td>
	    <td>
		
	    </td>
	    <td>
		zugeordnete Attribute
	    </td>
	</tr>
	<tr>
	    <td>
		<select size="10" name="available[]" id="available" multiple="multiple">
<?php
//lädt alle attribute
    $aAlle_Attribute = func_a_getAttribute();
//    lädt alle ausgewählten attibute
    $aAusgewaehlte_attribute = func_a_getKomponente_attribute($iKomponenten_id);
//    initialisiert ein leeres array
    $aAKId = [];
//    liest alle ausgewählten attirbute_ids in das leere array
    foreach ($aAusgewaehlte_attribute as $aElement)
    {
	$aAKId[] = $aElement["komponenten_attribut_fk"];
    }
    /**
     * gibt alle nicht sugewählten attribute als auswahlliste aus
     */
    foreach ($aAlle_Attribute as $aElement)
    {
//	prüft, ob ein attibut nict ausgewählt ist
	if(!in_array($aElement["komponenten_attribut_id"], $aAKId))
	{
	    echo "<option value='".$aElement["komponenten_attribut_id"]."'>".$aElement["komponenten_attribut_name"]."</option>";
	}
    }
?>
		</select>
	    </td>
	    <td>
		<button id="move_right">
		    ->
		</button>
		<br>
		<button id="move_left">
		    <-
		</button>
		<br>
		<button id="move_right_all">
		    ->>
		</button>
		<br>
		<button id="move_left_all">
		    <<-
		</button>
	    </td>
	    <td>
		<select size="10" name="selected[]" id="selected" multiple="multiple">
<?php
//git alle ausgweählten attribute als auswahlliste aus
    foreach ($aAusgewaehlte_attribute as $aElement)
    {
	echo "<option value='".$aElement["komponenten_attribut_fk"]."'>".$aElement["komponenten_attribut_name"]."</option>";
    }
?>
		</select>
	    </td>
	</tr>
	<tr>
            <td colspan="3" align="center">
                <input type="submit" value="Speichern"/><input type="reset" value="Zurücksetzen"/>
	    </td>
	</tr>
    </table>
	<?php
    }
    ?>
</div>


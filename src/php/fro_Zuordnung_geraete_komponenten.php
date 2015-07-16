<?php
//prüfen, ob formular abgeschickt wurde
    if($iGeraete_id = \utility\forms\get("selektiert", false));    
    {
//	prüfen ob daten übertragen wurden
	if(isset($_POST["ac_selected"]))
	{
//	    unnecessary check 
	    if ($s_Selected = $_POST["ac_selected"])
	    {
//		json decodierung der daten
		$a_Selected = json_decode($s_Selected);
//		löschen aller komponenten des geräts
		func_form_delGeraet_komponenten($iGeraete_id);
//		alle ausgewählten komponenten neu hinzufügen
		foreach ($a_Selected as $value)
		{
		    func_form_insertGeraet_komponente($iGeraete_id, $value);
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
		verfügbare Komponenten
	    </td>
	    <td>
		
	    </td>
	    <td>
		zugeordnete Komponenten
	    </td>
	</tr>
	<tr>
	    <td>
		<select size="10" name="available[]" id="available" multiple="multiple">
<?php
//lädt alle komponenten
    $aAlle_komponenten = func_a_getKomponenten();
//    lädt alle ausgewählten komponenten
    $aAusgewaehlte_komponenten = func_a_getGeraete_komponenten($iGeraete_id);
//    initialisiert ein neues array
    $aAKId = [];
//    liest ausgewählte komponenten ids in des leere array
    foreach ($aAusgewaehlte_komponenten as $aElement)
    {
	$aAKId[] = $aElement["komponente_fk"];
    }
    /**
     * git alle nicht ausgewählten komponenten als auswahlfeld aus
     */
    foreach ($aAlle_komponenten as $aElement)
    {
//	prüft ob komponenten id nicht in der ausgewählten liste
	if(!in_array($aElement["komponenten_id"], $aAKId))
	{
	    echo "<option value='".$aElement["komponenten_id"]."'>".$aElement["komponente_name"]."</option>";
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
    /**
     * gibt alle ausgewählten komponenten als auswahllliste aus
     */
    foreach ($aAusgewaehlte_komponenten as $aElement)
    {
	echo "<option value='".$aElement["komponente_fk"]."'>".$aElement["komponente_name"]."</option>";
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


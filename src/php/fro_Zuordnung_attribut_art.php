<?php
    if($iAttribut_id = \utility\forms\get("selektiert", false));    
    {
	if(isset($_POST["ac_selected"]))
	{
	    if ($s_Selected = $_POST["ac_selected"])
	    {
		$a_Selected = json_decode($s_Selected);
		var_dump($a_Selected);
		func_form_delAttribut_art($iAttribut_id);
		foreach ($a_Selected as $value)
		{
		    var_dump(func_form_insertAttribut_art($iAttribut_id, $value));
		}
	    }

	}
?>
<script>
    
    $(function(){
	function moveItems(origin, dest) {
	    $(origin).find(':selected').appendTo(dest);
	    update();
	}

	function moveAllItems(origin, dest) {
	    $(origin).children().appendTo(dest);
	    update();
	}
	
	function update()
	{
	    var values = [];
	    $("#selected option").each(function(){
		values.push($(this).val());
	    });
	    $("input[name='ac_selected']").val(JSON.stringify(values));

	}
	
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
	update();
    });
</script>
<div>
    <form action="" method="post">
	<input type="hidden" name="ac_selected" value=""/>
    <table class="multi_form">
	<tr>
	    <td>
		<select size="10" name="available[]" id="available" multiple="multiple">
<?php
    $aAlle_arten = func_a_getKomponentenArten();
    $aAusgewaehlte_arten = func_a_getAttribut_art($iKomponente_id);
    $aAKId = [];
    foreach ($aAusgewaehlte_arten as $aElement)
    {
	$aAKId[] = $aElement["geraet_fk"];
    }
//    var_dump($aAKId);
    foreach ($aAlle_arten as $aElement)
    {
//	var_dump($aElement);
	if(!in_array($aElement["geraete_id"], $aAKId))
	{
	    echo "<option value='".$aElement["komponenten_art_id"]."'>".$aElement["komponenten_art_name"]."</option>";
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
    foreach ($aAusgewaehlte_geraete as $aElement)
    {
	echo "<option value='".$aElement["komponenten_art_fk"]."'>".$aElement["komponenten_art_name"]."</option>";
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


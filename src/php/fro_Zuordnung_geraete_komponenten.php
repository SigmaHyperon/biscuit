<?php
    if($iGeraete_id = \utility\forms\get("selektiert", false));    
    {
	if(isset($_POST["ac_selected"]))
	{
	    if ($s_Selected = $_POST["ac_selected"])
	    {
		$a_Selected = json_decode($s_Selected);
		func_form_delGeraet_komponeten($iGeraete_id);
		foreach ($a_Selected as $value)
		{
		    func_form_insertGeraet_komponete($iGeraete_id, $value);
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
    $aAlle_komponenten = func_a_getKomponenten();
    $aAusgewaehlte_komponenten = func_a_getGeraete_komponenten($iGeraete_id);
    $aAKId = [];
    foreach ($aAusgewaehlte_komponenten as $aElement)
    {
	$aAKId[] = $aElement["komponente_fk"];
    }
//    var_dump($aAKId);
    foreach ($aAlle_komponenten as $aElement)
    {
//	var_dump($aElement);
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
    foreach ($aAusgewaehlte_komponenten as $aElement)
    {
	echo "<option value='".$aElement["komponente_fk"]."'>".$aElement["komponente_name"]."</option>";
    }
?>
		</select>
	    </td>
	</tr>
	<tr>
	    <td>
		
	    </td>
	    <td>
		<input type="submit"/>
	    </td>
	    <td>
		<input type="reset"/>
	    </td>
	</tr>
    </table>
	<?php
    }
    ?>
</div>


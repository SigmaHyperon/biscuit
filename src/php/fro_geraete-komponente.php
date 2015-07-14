<?php
?>
<script>
    
    $(function(){
	function moveItems(origin, dest) {
	    $(origin).find(':selected').appendTo(dest);
	}

	function moveAllItems(origin, dest) {
	    $(origin).children().appendTo(dest);
	}
	$('#move_left').click(function () {
	    moveItems('#selected', '#available');
	});

	$('#move_right').on('click', function () {
	    moveItems('#available', '#selected');
	});
	
	$('#move_left_all').click(function () {
	    moveAllItems('#selected', '#available');
	});

	$('#move_right_all').on('click', function () {
	    moveAllItems('#available', '#selected');
	});
    });
</script>
<div>
    <table class="multi_form">
	<tr>
	    <td>
		<select size="10" name="available" id="available" multiple="multiple">
		<option value="2">Row 2</option>
                <option value="4">Row 4</option>
                <option value="5">Row 5</option>
                <option value="6">Row 6</option>
                <option value="7">Row 7</option>
                <option value="8">Row 8</option>
                <option value="9">Row 9</option>
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
		<select size="10" name="selected" id="selected" multiple="multiple">
		    <option value="1">Row 1</option>
		    <option value="3">Row 3</option>
		</select>
	    </td>
	</tr>
    </table>
</div>


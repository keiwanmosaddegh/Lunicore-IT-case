<?php
//Reformat every warehouse for a dropdown menu, and add the Strings to the form,
//in order for the user to easily pick what warehouse to print information about.
include("../functions.php");
$data = import_data("../data.json");

$warehouses = '';
foreach($data['asset_manager']['warehouses'] AS $warehouse)
{
	$warehouses .= '<option value="'.$warehouse['id'].'">'.$warehouse['name'].', '.$warehouse['city'].'</option>';
}

?>
<form method="GET" action="/single_warehouse">
	Warehouse:<br><select name="warehouse"><?=$warehouses?></select><br><br>
	
	<input type="submit" value="View Warehouse">
</form>
<br><a href="/">Tillbaka till start</a>
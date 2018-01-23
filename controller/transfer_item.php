<?php
//Reformat every item, warehouse, employee, for a dropdown menu, and add the Strings to the form,
//In order for the user to easily pick what item to send to what warehouse by what employee.
include("../functions.php");
$data = import_data("../data.json");

$items = $warehouses = $employees = '';
foreach($data['asset_manager']['items'] AS $item)
{
	$items .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
}
foreach($data['asset_manager']['warehouses'] AS $warehouse)
{
	$warehouses .= '<option value="'.$warehouse['id'].'">'.$warehouse['name'].', '.$warehouse['city'].'</option>';
}
foreach($data['asset_manager']['employees'] AS $employee)
{
	$employees .= '<option value="'.$employee['id'].'">'.$employee['name'].'</option>';
}

?>

<form method="POST" action="/item_transfer">
    Item ID:<br><select name="item"><?php echo $items; ?></select><br><br> 
	Destination Warehouse ID:<br><select name="warehouse"><?php echo $warehouses; ?></select><br><br>
	Employee ID:<br><select name="employee"><?php echo $employees; ?></select><br><br>
	
	<input type="submit" value="Transfer Item">
</form>
<br><a href="/">Tillbaka till start</a>
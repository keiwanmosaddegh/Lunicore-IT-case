<?php
echo '<h2>Warehouse</h2>';
$warehouses = warehouse_data($data);

//Use the input data from the form in order to find and print information about the desired warehouse.
foreach($warehouses AS $warehouse)
{
	if($warehouse['id'] == $_GET['warehouse'])
	{
		echo '<strong>'.$warehouse['name'].', '.$warehouse['city'].'</strong><br>';
		echo 'Warehouse ID: '.$warehouse['id'].'<br>';
		echo 'Warehouse Employees: '.count($warehouse['employees']).'<br>';
		echo 'Warehouse Items: '.count($warehouse['items']).'<br>';
		echo '<hr>';
		
		echo '<h5>Items</h5>';
		foreach($warehouse['items'] AS $item)
		{
			echo $item['name'].' (id '.$item['id'].')<br>';
		}
	}
}
?>
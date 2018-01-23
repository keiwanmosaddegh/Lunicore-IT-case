<?php
//Prints information about all warehouses
echo '<h2>Warehouses</h2>';
$warehouses = warehouse_data($data);
foreach($warehouses AS $warehouse)
{
	echo '<strong>'.$warehouse['name'].', '.$warehouse['city'].'</strong><br>';
	echo 'Warehouse ID: '.$warehouse['id'].'<br>';
	echo 'Warehouse Employees: '.count($warehouse['employees']).'<br>';
	echo 'Warehouse Items: '.count($warehouse['items']).'<br>';
	echo '<hr>';
}
?>
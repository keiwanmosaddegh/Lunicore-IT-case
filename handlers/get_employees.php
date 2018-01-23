<?php
//Loop through all employees of every warehouse, and print relevant attributes about them.
echo '<h2>Employees</h2>';
$warehouses = warehouse_data($data);
foreach($warehouses AS $warehouse)
{
	foreach($warehouse['employees'] AS $employee)
	{
		echo '<strong>'.$employee['name'].'</strong><br>';
		echo 'Employee ID: '.$employee['id'].'<br>';
		echo 'Employee Warehouse: '.$warehouse['name'].', '.$warehouse['city'].' (<i>Warehouse id '.$warehouse['id'].'</i>)<br>';
		echo '<hr>';
	}
}
?>
<?php
//Use the form input in order to add a new warehouse, and print out all the current warehouses.
include("../functions.php");
$data = import_data("../data.json");

$id = $_POST['id'];
$name = $_POST['name'];
$city = $_POST['city'];

$response = add_warehouse($id, $name, $city, $data);
if($response['status'] == 'success')
{
	$data = $response['data'];
	$warehouses = warehouse_data($data);

	echo '<h2>Warehouses</h2>';
	foreach($warehouses AS $warehouse)
	{
		echo '<strong>'.$warehouse['name'].', '.$warehouse['city'].'</strong><br>';
		echo 'Warehouse ID: '.$warehouse['id'].'<br>';
		echo 'Warehouse Employees: '.count($warehouse['employees']).'<br>';
		echo 'Warehouse Items: '.count($warehouse['items']).'<br>';
		echo '<hr>';
	}
	save_data("../data.json", $data);
}
else
{
	echo $response['message'];
}
echo '<br><a href="/">Tillbaka till start</a>';
?>
<?php
//Use the input data from the form in order to make the actual transfer.
$item_id = $_POST['item'];
$destination_warehouse = $_POST['warehouse'];
$employee = $_POST['employee'];

$transfer = transfer_item($item_id, $destination_warehouse, $employee, $data);

if($transfer['change'] == true)
{
	echo 'Transfer has been made successfully';
	$data = $transfer['data'];
	save_data("data.json", $data);
}
else
{
	echo 'No item found for the transfer';
}
?>
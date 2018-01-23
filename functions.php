<?php

//Transfer a specific item from one warehouse to another, using a desired employee.
function transfer_item($id, $to_warehouse, $employee, $data)
{
	$inventoryChange = false;
	$newInventory = array();
	
	foreach($data['asset_manager']['items'] AS $item)
	{
		if($item['id'] == $id)
		{
			$data['events'][] = array(
				'event' => 'Move Item',
				'item' => $id,
				'from_warehouse' => $item['warehouse_id'],
				'to_warehouse' => $to_warehouse,
				'employee' => $employee
			);
			$item['warehouse_id'] = $to_warehouse;
			$inventoryChange = true;
		}
		$newInventory[] = $item;
	}
	$data['asset_manager']['items'] = $newInventory;
	return array('change' => $inventoryChange, 'data' => $data);
}

//Add new warehouse to $data if there already isn't a warehouse with the same ID.
function add_warehouse($id, $name, $city, $data) 
{
	$response = array();
	if(findRelation($data['asset_manager']['warehouses'], 'id', $id) == null) 
	{
		$data['asset_manager']['warehouses'][] = array(
			'id' => $id,
			'name' => $name,
			'city' => $city
		);
		$response['status'] = 'success';
	}
	else
	{
		$response['status'] = 'error';
		$response['message'] = 'Warehouse id already exists';
	}
	$response['data'] = $data;
	return $response;
}

//Create an array of warehouses, each containing relevant information about employees, and items.
function warehouse_data($data)
{
	$warehouses = array();
	foreach($data['asset_manager']['warehouses'] AS $warehouse)
	{
		$employees = findRelation($data['asset_manager']['employees'], 'warehouse_id', $warehouse['id'], true);
		$items = findRelation($data['asset_manager']['items'], 'warehouse_id', $warehouse['id'], true);
		
		$warehouse['employees'] = $employees;
		$warehouse['items'] = $items;
		
		$warehouses[] = $warehouse;
	}
	return $warehouses;
}

// Given an array, a "key", and "value", iterate through the array,
// and check if the value received through the "key" equals "value".
// If "multipleResults" is true, instead of returning the item that meets the condition (key == value), add that specific value in a list.
function findRelation($array, $key, $value, $multipleResults = false)
{
	$listResults = array();
	foreach($array AS $item)
	{
		if($item[$key] == $value) 
		{
			if($multipleResults) $listResults[] = $item;
			else return $item;
		}
	}
	if($multipleResults) return $listResults;
	else return null;
}

//Import JSON data by decoding it.
function import_data($path)
{
	$json = json_decode(file_get_contents($path), TRUE);
	return $json;
}

//Export/save data by converting it to JSON before.
function save_data($path, $data)
{
	file_put_contents($path, json_encode($data));
}
?>
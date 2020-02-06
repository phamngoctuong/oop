<?php
	require_once 'config/database.php';
	require_once 'objects/product.php';
	$database  = new Database;
	$db        = $database->getConnection();
	$product = new Product($db);
	$object_id = $_POST['object_id'];
	$product->id = $object_id;
	$product->delete();
	echo $object_id;
?>
